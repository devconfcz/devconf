#!/usr/bin/env python3
# -*- coding: utf-8 -*-
# Author: Chris Ward <cward@redhat.com>

import datetime
import dateutil
from collections import defaultdict
import logging
import os

import jinja2
import ipdb  # NOQA
import pandas
import progressbar

from comdev.lib import dumps, render_template, load_config, expand_path
from comdev.gmail_api import Gmailer

# Setup console logging
log = logging.getLogger()
log.setLevel(logging.INFO)


# Prepare data for export to schedule

# Get list of all accepted sessions
schedule = pandas.read_csv('/home/cward/Downloads/DevConf.cz 2018 Main Event Program - Schedule.csv')
acceptedIds = defaultdict(int)
acceptedSched = {}
acceptedRoom = {}
day = '1/26/2018'
start_time = ''
end_time = ''
rooms = {
    3:  'A-D105',
    4:  'B-D0206',
    5:  'C-D0207',
    6:  'D-C228',
    7:  'E-G202',
    8:  'F-E104',
    9:  'G-E105',
    10: 'H-E112',
    11: 'I-A211',
    12: 'J-A218',
    13: 'K-M103',
    14: 'L-C236'
}
tracks = {
    'A-D105': ['AI / ML / Data', 'Containers', 'Platform / OS'],
    'B-D0206': ['Networking', 'Kernel', 'Kernel'],
    'C-D0207': ['Containers', 'Cloud', 'Security & IdM'],
    'D-C228': ['Community', 'Testing', 'Debug / Tracing'],
    'E-G202': ['Desktop', 'JUDCon', 'JUDCon'],
    'F-E104': ['Security & IdM', 'CI / CD', 'DevOps'],
    'G-E105': ['Storage', 'Virtualization', 'Agile'],
    'H-E112': ['Development', 'Config Management', 'Fedora'],
    'I-A211': ['Workshop', 'Workshop', 'Workshop'],
    'J-A218': ['Workshop', 'Workshop', 'Workshop'],
    'K-M103': ['Workshop', 'Workshop', 'Workshop'],
    'L-C236': ['Community Meet-ups', 'Community Meet-ups', 'Community Meet-ups']
}

capacity = {
    'A-D105': 350,
    'B-D0206': 200,
    'C-D0207': 200,
    'D-C228': 70,
    'E-G202': 70,
    'F-E104': 70,
    'G-E105': 70,
    'H-E112': 70,
    'I-A211': 30,
    'J-A218': 30,
    'K-M103': 30,
    'L-C236': 20
}

for row in schedule.iterrows():
    values = row[1]
    for k, value in enumerate(values):
        items = [x.strip() for x in value.split('|')] if '|' in str(value) else []
        if items and items[0]:
            try:
                _id = int(items[0].split(' ')[0])
                acceptedIds[_id] += 1
                if day == '1/26/2018':
                    track = tracks[rooms[k]][0]
                elif day == '1/27/2018':
                    track = tracks[rooms[k]][1]
                else:
                    track = tracks[rooms[k]][2]
                acceptedSched[_id] = {
                    'day': day,
                    'start_time': start_time,
                    'end_time': end_time,
                    'track': track,
                    'capacity': capacity[rooms[k]]
                    }
                acceptedRoom[_id] = rooms[k]
            except Exception as e:
                print('Error: {} ({})'.format(str(items), e))
                continue
        elif '00 AM' in str(value) or '00 PM' in str(value):
            if k == 0:
                start_time = value
            elif k == 1:
                end_time = value
            else:
                raise RuntimeError("Whhoops! {}".format(value))
        elif value == 'Day 1 - Friday':
            day = '1/26/2018'
        elif value == 'Day 2 - Saturday':
            day = '1/27/2018'
        elif value == 'Day 3 - Sunday':
            day = '1/28/2018'
        else:
            continue

# Get list of all accepted speakers (primary and secondary)
programData = pandas.read_json('/home/cward/Downloads/cward-cfpoint-devel-export.json').to_dict()['programs']['1xrtWTn6mA-1zHvM6q8kRlPjoy0yLIAwOfjsv-nGhWPM__1']['submissions']

rows = []
for _id in acceptedIds:
    if _id < 0:
        print('Skipping Meetup ID: {}'.format(_id))
        continue
    s = programData[_id]

    #end_time = acceptedSched[s['id']]['end_time']
    start_time = acceptedSched[s['id']]['start_time']
    start_time = start_time.replace(':00 AM', ' AM')
    start_time = start_time.replace(':00 PM', ' PM')
    duration = int(s['blocks']) * 30
    end_time = (dateutil.parser.parse(start_time) + datetime.timedelta(minutes = duration)).strftime('%I:%M %p')

    row = [
        s['id'],
        s['title'],
        'Y',
        '{} {}'.format(acceptedSched[s['id']]['day'], start_time), # start_time eg: 12/25/2016 9:00 AM
        '{} {}'.format(acceptedSched[s['id']]['day'], end_time), # end_time eg: 12/25/2016 9:00 AM
        acceptedSched[s['id']]['track'], #', '.join(s['themes']),
        s['type'], # subtype
        '', # acceptedSched[s['id']]['capacity'], # capacity
        '"{}"'.format(s['abstract']),
        ', '.join([c['display_name'] for c in s['meta']['contacts'].values()]),
        '', # moderators
        '', # artists
        '', # sponsors
        '', # exhibitors
        '', # volunteers
        acceptedRoom[_id], # venue
        'Faculty of Information Technology (VUT FIT)', # venue address
        '', # image
        ', '.join(s['themes']), # custom filter 1
        '', # custom filter 2
        '', # cf 3
        '', # cf 4
        '', # tags
        'Red Hat', # host organization
        '', # feedback survey url
        'Y'
    ]
    rows.append(row)

df = pandas.DataFrame(rows)
ipdb.set_trace()



# Speakers import
acceptedSpeakers = defaultdict(dict)
rows = []
for _id in acceptedIds:
    if _id < 0:
        print('Skipping Meetup ID: {}'.format(_id))
        continue
    primaryId = programData[_id]['meta']['primary_contact']['id']
    primaryEmail = programData[_id]['meta']['primary_contact']['email']
    primaryDisplayName = programData[_id]['meta']['primary_contact']['display_name']
    contacts = programData[_id]['meta']['contacts']
    for _cid, contact in contacts.items():
        row = [
            contact['display_name'],
            contact['email'],
            '',
            '',
            contact.get('short_description', ''),
            '',
            contact['description'],
            contact.get('website', ''),
            contact.get('photo_url',
                        'https://firebasestorage.googleapis.com/v0/b/cward-cfpoint-devel.appspot.com/o/profile-blank-150x150.jpg?alt=media&token=5a12132b-5011-4f59-a852-dba1aa2895de')
        ]
        rows.append(row)

df = pandas.DataFrame(rows)
ipdb.set_trace()







# Prepare data for hotels
qecampProgram = pandas.read_csv('/home/cward/Downloads/QEcamp.18 Program (ACCEPTED) - Vote Results.csv')
qecampSpeakers = pandas.read_csv('/home/cward/Downloads/QEcamp.18 Program (ACCEPTED) - All CfP Speakers.csv')

qecampAcceptedTravelSpeakers = qecampProgram[qecampProgram['est. travel'] > 0].primary.unique().tolist()
rows = []
for email in qecampAcceptedTravelSpeakers:
    try:
        speaker = qecampSpeakers[qecampSpeakers['email'] == email].values[0]
    except Exception as e:
        print('ERROR: {} ({})'.format(e, email))
    name = '{} {}'.format(speaker[5], speaker[7]).strip()
    row = [email, name]
    rows.append(row)
pandas.DataFrame(rows).to_csv('/tmp/outqecamp.csv')

# Get list of all accepted sessions
schedule = pandas.read_csv('/home/cward/Downloads/DevConf.cz 2018 Main Event Program - Schedule.csv')
acceptedIds = defaultdict(int)
for row in schedule.iterrows():
    values = row[1]
    for value in values:
        items = [x.strip() for x in value.split('|')] if '|' in str(value) else []
        if items and items[0]:
            try:
                _id = int(items[0].split(' ')[0])
                acceptedIds[_id] += 1
            except Exception as e:
                print('Error: {} ({})'.format(str(items), e))
                continue

# Get list of all accepted speakers (primary and secondary)
programData = pandas.read_json('/home/cward/Downloads/cward-cfpoint-devel-export.json').to_dict()['programs']['1xrtWTn6mA-1zHvM6q8kRlPjoy0yLIAwOfjsv-nGhWPM__1']['submissions']

acceptedSpeakers = defaultdict(dict)
rows = []
for _id in acceptedIds:
    row = []
    if _id < 0:
        print('Skipping Meetup ID: {}'.format(_id))
        continue
    primaryId = programData[_id]['meta']['primary_contact']['id']
    primaryEmail = programData[_id]['meta']['primary_contact']['email']
    primaryDisplayName = programData[_id]['meta']['primary_contact']['display_name']
    row.extend([_id, primaryEmail, primaryDisplayName])
    contacts = programData[_id]['meta']['contacts']
    for _cid, contact in contacts.items():
        print(contact)
        if contact['email'] == primaryEmail:
            continue
        else:
            row.extend([contact['email'], contact['display_name']])
    rows.append(row)

df = pandas.DataFrame(rows)
ipdb.set_trace()


raise

send = False
app_name = 'devconf'
sender = 'info@devconf.cz'
template = 'mail/'
subject = 'DevConf.cz 18 (Jan 26-28) - Submission Status Update'

config = load_config(app_name)
path_templates = expand_path(config['paths']['templates'].get())
path_export = expand_path(config['paths']['export'].get())

gmailer = Gmailer(app_name, sender)

env = jinja2.Environment(loader=jinja2.FileSystemLoader(path_templates))

allSpeakers = pandas.read_json('/home/cward/Downloads/redhat-cfpoint-export.json').to_dict()['speakers']
allSubmissions = pandas.read_json('/home/cward/Downloads/redhat-cfpoint-export.json').to_dict()['responses']['2018']['qecampx18']

df = pandas.read_csv('/home/cward/Downloads/QEcamp.18 Program (STRAWMAN DRAFT INCOMPLETE NOT FINAL) - Vote Results.csv')
accepted = df[df['accepted'] == 1]
rejected = df[df['accepted'] != 1]

def getSpeaker(email):
    _id = email.replace('.', '')
    if _id in allSpeakers:
        speaker = allSpeakers[_id]
    else:
        print('Did not find: ' + _id)
        speaker = {
            'avatar': '',
            'bio': 'Coming soon!',
            'email': email,
            'first-name': 'Unknown',
            'last-name': 'Name',
            'title': '',
            'organization': '',
            'twitter': ''
        }
    return speaker

speakers = defaultdict(dict)
for i, row in accepted.iterrows():
    try:
        budget = int(row['est. travel'])
    except:
        budget = 0
    speakers[row.primary][row.id] = {
        'primary': row.primary,
        'id': row.id,
        'budget': budget,
        'themes': row.themes,
        'title': row.title,
        'track': row.track,
        'type': row.type,
        'difficulty': row.difficulty,
        'abstract': row.abstract,
        'duration': row.duration,
        'primary': getSpeaker(row.primary),
        'speakers': [getSpeaker(c.replace('redhatcom', 'redhat.com')) for c in allSubmissions[row.id]['speakers']]
    }

pbar = progressbar.ProgressBar()

for speaker in pbar(speakers):
    # Build all the pages for the site
    budget = [b['budget'] for b in speakers[speaker].values() if b['budget'] > 0]
    budget = int(budget[0]) if len(budget) > 0 else 0
    params = {
        'submissions': speakers[speaker],
        'budget': budget
    }
    # txt = render_template(env, template_txt, params)
    # template_txt = '.'.join(template.split('.')[:-1]) + '.txt'
    template_html = '.'.join(template.split('.')[:-1]) + '.html'
    html = render_template(env, template_html, params)
    if send:
        gmailer.send(sender, email, subject, txt, html)
    else:
        export_html = os.path.join(
            path_export, 'announce/accepted', speaker + '.html' )
        dumps(html, export_html)
        #export_txt = os.path.join(path_export,
        #                          email.split('@')[0], template_txt)
        # dumps(txt, export_txt)




speakers = defaultdict(dict)
for i, row in rejected.iterrows():
    speakers[row.primary][row.id] = {
        'title': row.title,
        'id': row.id
    }

pbar = progressbar.ProgressBar()

template = 'mail/announce-rejected.html'
for speaker in pbar(speakers):
    # Build all the pages for the site
    params = {
        'submissions': speakers[speaker]
    }
    # txt = render_template(env, template_txt, params)
    # template_txt = '.'.join(template.split('.')[:-1]) + '.txt'
    template_html = '.'.join(template.split('.')[:-1]) + '.html'
    html = render_template(env, template_html, params)
    if send:
        gmailer.send(sender, email, subject, txt, html)
    else:
        export_html = os.path.join(
            path_export, 'announce/rejected', speaker + '.html' )
        dumps(html, export_html)
        #export_txt = os.path.join(path_export,
        #                          email.split('@')[0], template_txt)
        # dumps(txt, export_txt)
