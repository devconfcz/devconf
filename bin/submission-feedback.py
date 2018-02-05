#!/usr/bin/env python3
# -*- coding: utf-8 -*-
# Author: Chris Ward <cward@redhat.com>

import jinja2
from collections import defaultdict
import pandas
import re
import ipdb

from comdev.lib import dumps, render_template, load_config, expand_path
from comdev.gmail_api import Gmailer

#send = False
#app_name = 'devconf'
#sender = 'cward@redhat.com'
#template = 'mail/'
#subject = 'QEcamp.18 - Session feedback'
#src = pandas.read_excel('/home/cward/Downloads/session-feedback-qecamp18mainevent-2018-02-04.xlsx')
#sch = pandas.read_excel('/home/cward/Downloads/qecamp18mainevent-event-export-2018-02-04-14-39-06.xlsx')
#spk = pandas.read_excel('/home/cward/Downloads/qecamp18mainevent-speakers-directory-2018-02-04-14-39-09.xlsx')
#id_col = 'Downloaded on 2018-02-04 2:39:09 pm'

send = False
app_name = 'devconf'
sender = 'info@devconf.cz'
template = 'mail/'
subject = 'DevConf.cz \'18 - Session feedback'
src = pandas.read_excel('/home/cward/Downloads/session-feedback-devconfcz2018-2018-02-04.xlsx')
sch = pandas.read_excel('/home/cward/Downloads/devconfcz2018-event-export-2018-02-04-13-05-53.xlsx')
spk = pandas.read_excel('/home/cward/Downloads/devconfcz2018-speakers-directory-2018-02-04-13-23-45.xlsx')
id_col = 'Downloaded on 2018-02-04 1:23:45 pm'

config = load_config(app_name)
path_templates = expand_path(config['paths']['templates'].get())
path_export = expand_path(config['paths']['export'].get())

gmailer = Gmailer(app_name, sender)

env = jinja2.Environment(loader=jinja2.FileSystemLoader(path_templates))

d = defaultdict(dict)

for row in src.iterrows():
    _id = row[1][0]
    title = row[1][1]
    slug = re.sub('\W', '', title)
    email = row[1][4]
    rating = row[1][6]
    feedback = '' if str(row[1][7]) == 'nan' else row[1][7].strip()
    d[_id]['feedback'] = d[_id]['feedback'] if 'feedback' in d[_id] else []

    if feedback:
        d[_id]['feedback'].append(feedback)

    d[_id]['title'] = title

    d[_id]['emails'] = d[_id]['emails'] if 'emails' in d[_id] else []
    d[_id]['emails'].append(email)
    d[_id]['emails_k'] = len(d[_id]['emails'])

    d[_id]['rating'] = d[_id]['rating'] if 'rating' in d[_id] else []
    d[_id]['rating'].append(rating)
    d[_id]['rating_sum'] = sum(d[_id]['rating'])
    d[_id]['rating_k'] = len(d[_id]['rating'])

    session = sch[sch['When Completed ⇒ [Open Upload Form]'] == str(_id)]

    speakers = str(session['Unnamed: 9'].values[0])
    speakers = [x.strip() for x in speakers.split(';')]
    d[_id]['speakers'] = ', '.join(speakers)
    speaker_emails = []
    for name in speakers:
        s = spk[spk['Sched: Speakers'] == name]
        if len(s) == 0:
            continue
        spkr_email = str(s[id_col].values[0])
        speaker_emails.append(spkr_email)

    d[_id]['speaker_emails'] = speaker_emails
    d[_id]['speaker_emails_k'] = len(speaker_emails)



for _id in d.keys():
    s = d[_id]
    content = '''
Hi, included below is the feedback we got from attendees about your session.

Title: {}
Speakers: {}

Your total feedback score was {}, from a total of {} votes. Each person voting could vote -1/0/+1
'''.format(s['title'], s['speakers'], s['rating_sum'], s['rating_k']).strip()

    content += '\n\nAttendee Notes:\n'
    if s['feedback']:
        content += '\n'.join(s['feedback'])
    else:
        content += '  No additional feedback provided'

    for email in s['speaker_emails']:
        #print(email)
        #email = 'cward@redhat.com' #################################
        txt = content
        html = content.replace('\n', '<br />')
        subject_edited = '{} - {}'.format(subject, s['title'])
        print('Sending "{}" to {}'.format(subject_edited, email))
        gmailer.send(email, subject_edited, txt, html)
        # ipdb.set_trace()
        #print(content)
        #print('----------------------------------------\n')
        #export_html = os.path.join(
        #    path_export, 'announce/rejected', speaker + '.html' )
        #dumps(html, export_html)

ipdb.set_trace()
