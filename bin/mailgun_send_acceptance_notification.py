#!/usr/bin/env python3
# -*- coding: utf-8 -*-
# Author: Chris Ward <cward@redhat.com>

import ipdb
import numpy as np
import math
import pandas as pd
import requests

config = {
    'us': {
        'domain': 'devconf.us',
        'api_key': '',  # pull from config!
        'addr_from': 'DevConf.US <info@devconf.us>'
    }
}

def send_simple_message(domain, api_key, addr_from, addr_to, subject, text, html=None):
    print('Sending mail to: {}'.format(addr_to))

    return requests.post(
        "https://api.mailgun.net/v3/{}/messages".format(domain),
        auth=("api", api_key),
        data={
            "from": addr_from,
            "to": addr_to,
            "subject": subject,
            "text": text,
            "html": html
        }
    )

template_body = '''
Dear {},

Thank you for your investment of time by responding to the DevConf.US call for proposals.

We appreciate your willingness and desire to expand our community’s body of knowledge. That said, our organizing committees have taken a thoughtful and collaborative approach in deciding which topics will be addressed during the conference.

We are now narrowing down the final tracks and speaker topics by vote. We appreciate your patience as we move through the process. We are truly excited about hosting the inaugural DevConf.US at our partner institution, Boston University.

You will be contacted *very soon* with an enthusiastic acceptance or gracious decline of your submission. Please know that we received hundreds of submissions and our decision will be based on a focused scope and vision for this first event.

If your submission is not selected, please do not be discouraged and we hope that you will still join us for the fall conference. Think: Hallway Track!

Again, we appreciate your interest and patience. You will hear from us soon.

If you have any questions or if your availability has changed, please contact us at info@devconf.us. For updates including our CentOS dojo to be held one day before DevConf.US, visit: https://devconf.info/us

Write us anytime at info@devconf.us or hello@devconf.info

Best regards,

The DevConf.US Crew
@DevConf_US #definefuture
'''.strip()

ipdb.set_trace()

if __name__ == '__main__':
    data = pd.read_csv('/home/cward/Downloads/DevConf.us 2018 Call for Proposals (Responses) - Form Responses 1.csv')
    sessions = data[data['Submission Type'] == 'Session proposal']
    speakers = sessions[['Email Address', 'Primary Profile Name', 'Second Profile Email', 'Second Profile Name',
'Third Profile Email', 'Third Profile Name']]
    unique_emails = set()
    emails_to_send = []

    for row in speakers.iterrows():
        row = row[1]
        p = [row['Email Address'].strip().lower(), row['Primary Profile Name'].strip().capitalize()]
        emails_to_send.append(p)

        s = [row['Second Profile Email'], row['Second Profile Name']]
        t = [row['Third Profile Email'], row['Third Profile Name']]

        if not (isinstance(s[0], float) and math.isnan(s[0])):
            s[0] = s[0].strip().lower()
            emails_to_send.append(s)

        if not (isinstance(t[0], float) and math.isnan(t[0])):
            t[0] = t[0].strip().lower()
            emails_to_send.append(t)

    for email in sorted(emails_to_send, key=lambda x: x[1]):
        if email[0] in unique_emails:
            continue

        addr, fname = email[0], email[1].split()[0].capitalize()

        body_text = template_body.format(fname)

        send_simple_message(
            config['us']['domain'],
            config['us']['api_key'],
            config['us']['addr_from'],
            addr,
            '[DevConf.US] OMG we\'re late!',
            body_text
        )

        unique_emails.add(email[0])
