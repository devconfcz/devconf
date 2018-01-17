// Tools for processing CfP submissions and creating final program, etc.

let DEBUG = false
const debug = require('debug')('on')  // eg, call with DEBUG=on node cfp.js

const fs = require('fs')
const path = require('path')
const gm = require('gm').subClass({imageMagick: true})
const request = require('request')

const json2csv = require('json2csv');

const lib = require('./cfp-lib')
const fb = require('./firebase-lib')
const google = require('./google-lib')
const mailgun = require('./mailgun-lib')

// ////////////////////////////////////////////////////////////////////////////
const NOW = new Date().toISOString()

const VERSION = '__1'
const formId = '1xrtWTn6mA-1zHvM6q8kRlPjoy0yLIAwOfjsv-nGhWPM' + VERSION
const submissionsPath = 'submissions/' + formId
const programsPath = 'programs/' + formId
const programsUpdateCompletePath = programsPath + '/__update_complete'
const programsSubmissionsPath = programsPath + '/submissions'
const programsSpeakersPath = programsPath + '/speakers'
const programsMeetupsPath = programsPath + '/meetups'
const programsBoothsPath = programsPath + '/booths'
const programsMetaPath = programsPath + '/meta'
const programsHistoryPath = programsPath + '/__history'
const speakersPath = 'speakers/'  // no formId is intentional; pool speakers
const votesPath = 'votes/' + formId

let db = fb.database

/*
let data = require('/tmp/out.json')
const qePath = 'programs/' + '1v7r4ZgaJl97t751UnCKPPuk2SDRugsIjesBedmtSYhA__1'
db.ref(qePath).set(data)
console.log('DONE')
*/

// google.callWithAuth(buildCommitteeSheets)
// google.callWithAuth(importGoogleForm)
// google.callWithAuth(finalSheetPrep)
google.callWithAuth(scheduleReport)
// finalSheetPrep()

function scheduleReport (auth) {
  const formId = '1a8u3ywCgoEqyffvQ_6X1B2LNv91xVpfUtdqD4VEVYzI'
  debug('Getting Spreadsheet data...')
  google.sheets.spreadsheets.values.get({
    auth: auth,
    spreadsheetId: formId,
    range: 'Vote Results!A:BE',
  }, (err, response) => {
    if (err) { throw new Error ('The API returned an error: ' + err) }
    else { debug('... done.') }

    const rows = response.values
    if (rows.length == 0) { throw new Error ('No data found.') }
    debug(`Found ${rows.length} responses.`)
    let allSpeakers = {}
    db.ref(programsSubmissionsPath).once('value', snapshot => {
      let submissions = snapshot.val()
      Object.values(submissions).forEach(submission => {
        // console.log(submission.meta.contacts)
        Object.values(submission.meta.contacts).forEach(contact => {
          allSpeakers[contact.email] = contact
        })
      })

      let acceptedPrimarySpeakers = []
      rows.forEach(row => {
        const inSched = row[1]
        const accepted = row[2]
        const track = row[3]
        const id = row[4]
        const title = row[5]
        const primary = row[6]
        acceptedPrimarySpeakers.push(primary)
      })

      let wearableSizes = {}
      Object.values(acceptedPrimarySpeakers).forEach(email => {
        let contact = allSpeakers[email]
        if (!contact) {
          debug(email + ', L')
        } else {
          wearableSizes[email] = contact.wearable_size || 'L'
        }
      })
      console.log(wearableSizes)
    })
  })
}

function finalSheetPrep () {
  debug('Getting data...')
  db.ref(programsSubmissionsPath).once('value', snapshot => {
    let submissions = snapshot.val()
    console.log(Object.keys(submissions).length)
    let columns = [
      'id',
      'title',
      'primary_contact',
      'type',
      'duration',
      'short_description',
      'difficulty',
      'abstract',
      'themes',
      'score'
    ]
    let rows = [columns]
    submissions.forEach(s => {
      console.log(s)
      let row = [
        s.id,
        s.title,
        s.email,
        s.type,
        `00:${s.duration}:00`,
        s.short_description,
        s.difficulty,
        s.abstract,
        s.themes,
        s.meta.votes.vote_total
      ]
      rows.push(row)
    })
    console.log(rows.length)
    writeCsv('/tmp/out.csv', rows)
    console.log('DONE')
  })
}
function importGoogleForm (auth) {
  debug('Getting Spreadsheet data...')
  google.sheets.spreadsheets.values.get({
    auth: auth,
    spreadsheetId: '180zx7rd0ocHHZnNgr_HiQltPSu8PvFM_wfHzN8iWHXI',
    range: 'Form Responses 1!A:BE',
  }, (err, response) => {
    if (err) { throw new Error ('The API returned an error: ' + err) }
    else { debug('... done.') }

    const rows = response.values
    if (rows.length == 0) { throw new Error ('No data found.') }
    debug(`Found ${rows.length} responses.`)

    let payload = rowsToDict(rows)
    let submissions = payload.submissions
    let columns = payload.columns
    let buckets = splitIntoBuckets(submissions)
    let data = {
      meta: {},
      meetups: buckets.meetups,
      booths: buckets.booths,
      submissions: Object.assign(buckets.talks, buckets.workshops, buckets.discussions)
    }

    // submissions.meta.contacts per submission...
    // submissions.meta.votes
    // submissions.meta.favorited
    // and id: generatePushID()

    let newSubmission = {}
    for (submissionId in data.submissions) {
      let submissionSpeakers = {
        Primary: {id: lib.generatePushID(), meta: {last_updated: NOW}},
        Second: {id: lib.generatePushID(), meta: {last_updated: NOW}},
        Third: {id: lib.generatePushID(), meta: {last_updated: NOW}}
      }
      let submission = data.submissions[submissionId]
      newSubmission['meta'] = {
        contacts: {}
      }
      for (let field in submission) {
        if (!field || submission[field] === '') {
          // debug(`... skipping empty field: ${field}`)
          // delete submission[field]
          continue
        }
        let newField = sheetColumnMap[field]
        if (!newField) {
          if (field === 'id' ||
              field === 'meta' ||
              field === 'email'
          ) {
            newSubmission[field] = submission[field]
            continue
          } else if (
            field === 'Is there another profile to add?' ||
            field === 'I and all other secondary participants have read, and agree with the DevConf.cz participation agreement'
          ) {
            // delete submission[field]
            continue
          } else {
            throw new Error(`ERROR: Invalid field map value. (${field})`)
          }
        }
        // Figure out which type of event it is
        let whichField = field.match(/(Primary)|(Second)|(Third)|(Session)|(Meet-up)|(Booth)/) || []
        switch (whichField[0]) {
          case 'Session':
            newField = newField.split('_').splice(1).join('_')
            switch (newField) {
              case 'themes':
                let themes = submission[field].split(',')
                for (let i = 0, len = themes.length; i < len; i++) {
                  themes[i] = themes[i].trim()
                }
                newSubmission[newField] = themes
                break
              case 'duration':
                const blocks = submission[field].split(' ')[0]
                newSubmission['blocks'] = blocks
                newSubmission['duration'] = blocks * 30
                break
              case 'difficulty':
                newSubmission[newField] = submission[field].split(' ')[0].trim()
                break
              case 'type':
                newSubmission['meta'][newField] = submission[field].split(' ')[0].trim()
              default:
                newSubmission[newField] = submission[field].trim()
            }
            break
          case 'Primary':
            submissionSpeakers[whichField[0]][newField] = submission[field]
            break
          case 'Second':
            submissionSpeakers[whichField[0]][newField] = submission[field]
            break
          case 'Third':
            submissionSpeakers[whichField[0]][newField] = submission[field]
            break
          default:
            newSubmission['meta'][newField] = submission[field]
        }
        // delete submission[field]
      }

      newSubmission.email = submission['Email Address']

      let speakersEmails = []
      let speakers = {}
      if (speakersEmails.indexOf(submission.email) > 0) {
        speakers[submissionSpeakers['Primary'].id]['submission_count']++
      } else {
        speakers[submissionSpeakers['Primary'].id] = submissionSpeakers['Primary']
        speakers[submissionSpeakers['Primary'].id]['email'] = newSubmission.email
        speakers[submissionSpeakers['Primary'].id]['meta'] = {'submission_count': 1}
      }
      if (speakersEmails.indexOf(submissionSpeakers['Second'].email) > 0) {
        speakers[submissionSpeakers['Second'].id]['meta']['submission_count']++
      } else {
        if (submissionSpeakers['Second'].email) {
          speakers[submissionSpeakers['Second'].id] = submissionSpeakers['Second']
          speakers[submissionSpeakers['Second'].id]['meta'] = {'submission_count': 1}
        }
      }
      if (speakersEmails.indexOf(submissionSpeakers['Third'].email) > 0) {
        speakers[submissionSpeakers['Third'].id]['meta']['submission_count']++
      } else {
        if (submissionSpeakers['Third'].email) {
          speakers[submissionSpeakers['Third'].id] = submissionSpeakers['Third']
          speakers[submissionSpeakers['Third'].id]['meta'] = {'submission_count': 1}
        }
      }

      newSubmission['meta']['primary_contact'] = submissionSpeakers['Primary']
      newSubmission['meta']['contacts'][submissionSpeakers['Primary'].id] = submissionSpeakers['Primary']
      if (submissionSpeakers['Second'].email) {
        newSubmission['meta']['contacts'][submissionSpeakers['Second'].id] = submissionSpeakers['Second']
      }
      if (submissionSpeakers['Third'].email) {
        newSubmission['meta']['contacts'][submissionSpeakers['Third'].id] = submissionSpeakers['Third']
      }

      // data['submissions'][submissionId] = submission
      let path = programsSubmissionsPath + '/' + submissionId
      db.ref(path).update(newSubmission).then(() => {
        debug('... Submissions Saved')
      })
    }

    // lib.writeJson('/tmp/out.json', data.submissions)
    // console.log(programsSubmissionsPath)
    // db.ref(programsSubmissionsPath).set(data.submissions).then(() => {
    //   debug('... Submissions Saved')
    // })
    // db.ref(programsBoothsPath).set(booths).then(() => {debug('... Booths Saved')})
    // db.ref(programsMeetupsPath).set(meetups).then(() => {debug('... Meetups Saved')})
    // db.ref(programsSpeakersPath).set(speakers).then(() => {debug('... Speakers Saved')})
    db.ref(programsMetaPath + '/update_complete').set(new Date().toISOString())

    // console.log(submissionSpeakers)
    // lib.writeJson('/tmp/out.json', data)
  })
}
function buildCommitteeSheets (auth) {
  debug('Getting Spreadsheet data...')
  google.sheets.spreadsheets.values.get({
    auth: auth,
    spreadsheetId: '180zx7rd0ocHHZnNgr_HiQltPSu8PvFM_wfHzN8iWHXI',
    range: 'Form Responses 1!A:BE',
  }, (err, response) => {
    if (err) { throw new Error ('The API returned an error: ' + err) }
    else { debug('... done.') }

    const rows = response.values
    if (rows.length == 0) { throw new Error ('No data found.') }
    debug(`Found ${rows.length} responses.`)


    let payload = rowsToDict(rows)
    let submissions = payload.submissions
    let columns = payload.columns
    let buckets = splitIntoBuckets(submissions)

    let panels = getPanels(buckets, columns)

    // debugger

    // FIXME FIXME //
    // throw new Error('exit')
    // FIXME FIXME //

    // prepare one document per panel member with
    // - one sheet with their track / theme talks
    // - one sheet with all 'other'
    let counter = -1
    Object.keys(panels).forEach(async (track) => {
      let t = ++counter * 5000
      debug(`SLEEPING ${t/1000/60} MINUTES before creating a new sheet...`)
      await lib.sleep(t)
      let title = `DevConf.cz 2018 - Track - ${track}`
      google.sheets.spreadsheets.create({
        auth: auth,
        resource: {
          properties: {
            'title': `[IN_PROGRESS] ${title}`.trim()
          }
        }
      }, async (err, newDoc) => {
        if (err) { throw new Error ('The API returned an error: ' + err) }
        else { debug('... done.') }

        let spreadsheetId = newDoc.spreadsheetId
        let spreadsheetUrl = newDoc.spreadsheetUrl
        let spreadsheetSheets = newDoc.sheets
        debug(`${track}: ${spreadsheetUrl}`)

        google.sheets.spreadsheets.batchUpdate({
          spreadsheetId: spreadsheetId,
          auth: auth,
          resource: {
            requests: [
              {
                "addSheet": {
                  "properties": {
                    "title": 'Track Themes',
                    "gridProperties": {
                      "rowCount": 500,
                      "columnCount": 80
                    }
                  }
                }
              },
              {
                "addSheet": {
                  "properties": {
                    "title": 'Other',
                    "gridProperties": {
                      "rowCount": 500,
                      "columnCount": 80
                    }
                  }
                }
              }
            ]
          }
        }, (error, response) => {
          debug(`... updating sheets`)
          google.sheets.spreadsheets.values.append({
            spreadsheetId: spreadsheetId,
            valueInputOption: 'RAW',
            insertDataOption: 'INSERT_ROWS',
            range: 'Track Themes',
            resource: {
              values: removeEmptyColumns(panels[track].submissions)
            },
            auth: auth
          }, (error, response) => {
            console.log(error)
          })
          google.sheets.spreadsheets.values.append({
            spreadsheetId: spreadsheetId,
            valueInputOption: 'RAW',
            insertDataOption: 'INSERT_ROWS',
            range: 'Other',
            resource: {
              values: removeEmptyColumns(panels[track].other)
            },
            auth: auth
          }, (error, response) => {
            debug(`... deleting default sheet`)
            google.sheets.spreadsheets.batchUpdate({
              spreadsheetId: spreadsheetId,
              auth: auth,
              resource: {
                requests: [
                  {
                    "deleteSheet": {
                      "sheetId": '0'
                    }
                  }
                ]
              }
            })
          })
        })
      })
    })
  })
}
const themes = {
  'Development': {
    tracks: ['CI/CD', 'DevTools', 'Java / Middleware', '.NET']
  },
  'Testing': {
    tracks: ['CI/CD', 'Testing']
  },
  'Containers': {
    tracks: ['Atomic', 'Containers', 'OpenShift']
  },
  'Automation': {
    tracks: ['Ansible', 'DevTools', 'OpenShift', 'OpenStack']
  },
  'Documentation': {
    tracks: []
  },
  'Workload Management': {
    tracks: ['DevTools', 'OpenStack']
  },
  'Security': {
    tracks: ['Enterprise Security', 'Identity Management']
  },
  'DevOps': {
    tracks: ['DevOps']
  },
  'Platform / OS': {
    tracks: ['Atomic', 'CentOS', 'Containers', 'Fedora', 'Platform / OS']
  },
  'Cloud': {
    tracks: ['Atomic', 'Cloud', 'OpenShift', 'OpenStack']
  },
  'Community': {
    tracks: ['Community', 'Fedora']
  },
  'Virtualization': {
    tracks: ['Atomic', 'Containers', 'OpenShift', 'OpenStack', 'Virtualization']
  },
  'Configuration Management': {
    tracks: ['Ansible', 'DevTools']
  },
  'Middleware': {
    tracks: ['Java / Middleware']
  },
  'Kernel': {
    tracks: ['Kernel', 'Virtualization']
  },
  'Networking': {
    tracks: ['Networking', 'OpenStack', 'Virtualization']
  },
  'Identity Management': {
    tracks: ['Enterprise Security', 'Identity Management']
  },
  'Desktop': {
    tracks: ['Desktop']
  },
  'Storage': {
    tracks: ['Storage, Ceph, Gluster']
  },
  'Database': {
    tracks: ['DevTools']
  },
  'Web': {
    tracks: []
  },
  'AI / Machine Learning': {
    tracks: []
  },
  'Research': {
    tracks: []
  },
  'Hardware': {
    tracks: ['Kernel', 'IoT']
  },
  'Mobile': {
    tracks: ['IoT']
  },
  'Debugging / Tracing': {
    tracks: ['CI/CD', 'DevTools']
  },
  'Agile': {
    tracks: ['Agile', 'CI/CD', 'DevOps']
  },
  'IoT': {
    tracks: ['IoT']
  },
  'Design / UX': {
    tracks: ['Desktop']
  }
}
var tracks
if (DEBUG) {
  tracks = {
    'Java / Middleware': ['Jiri Pechanec <jpechane@redhat.com>']
  }
} else {
  tracks = {
    'Agile': ['Jen Krieger <jkrieger@redhat.com>'],
    'Ansible': ['Rashid Khan <rkhan@redhat.com>', 'Ondrej Vasik <ovasik@redhat.com>', 'Bill Nottingham <notting@redhat.com>', 'Josh Berkus <jberkus@redhat.com>'],
    'Atomic': ['Joe Brockmeier <jzb@redhat.com>', 'Eliska Slobodova <eliska@redhat.com>', 'Josh Berkus <jberkus@redhat.com>'],
    'CentOS': ['Brian Exelbierd <bexelbie@redhat.com>', 'Rashid Khan <rkhan@redhat.com>', 'Ondrej Vasik <ovasik@redhat.com>', 'Jim Perrin <jperrin@redhat.com>'],
    'Cloud': ['Tomas Tomecek <ttomecek@redhat.com>'],
    'CI/CD': ['Ari LiVigni <alivigni@redhat.com>', 'Jeffrey Burke <jburke@redhat.com>'],
    'Community': ['Brian Exelbierd <bexelbie@redhat.com>', 'Leslie Hawthorn <lhawthor@redhat.com>', 'Brian Proffitt <bproffit@redhat.com>', 'Milan Broz <mbroz@redhat.com>'],
    'Containers': ['Radek Vokál <rvokal@redhat.com>', 'Josh Berkus <jberkus@redhat.com>', 'Joe Brockmeier <jzb@redhat.com>', 'Eliska Slobodova <eliska@redhat.com>', 'Jan Pazdziora <jpazdziora@redhat.com>', 'Honza Horak <hhorak@redhat.com>', 'Tomas Tomecek <ttomecek@redhat.com>'],
    'Desktop': ['Tomas Popela <tpopela@redhat.com>'],
    'DevOps': ['Jen Krieger <jkrieger@redhat.com>', 'Josh Berkus <jberkus@redhat.com>'],
    'DevTools': ['Patrick Macdonald <patrickm@redhat.com>', 'Adi Sakala <asakala@redhat.com>', 'Vaclav Pavlin <vpavlin@redhat.com>'],
    'Enterprise Security': ['Alexander Bokovoy <abokovoy@redhat.com>', 'Martin Kosek <mkosek@redhat.com>', 'Peter Vrabec <pvrabec@redhat.com>', 'Jan Pazdziora <jpazdziora@redhat.com>'],
    'Fedora': ['Jiri Eischmann <jeischma@redhat.com>', 'Matthew Miller <mattdm@redhat.com>', 'Brian Exelbierd <bexelbie@redhat.com>'],
    'Identity Management': ['Jan Pazdziora <jpazdziora@redhat.com>', 'Martin Kosek <mkosek@redhat.com>', 'Peter Vrabec <pvrabec@redhat.com>'],
    'Kernel': ['Stanislav Kozina <skozina@redhat.com>'],
    'Java / Middleware': ['Vaclav Tunka <vtunka@redhat.com>', 'Mark Little <mlittle@redhat.com>', 'Steven Pousty <spousty@redhat.com>'],
    'Networking': ['Rashid Khan <rkhan@redhat.com>'],
    'OpenShift': ['Joe Brockmeier <jzb@redhat.com>', 'Eliska Slobodova <eliska@redhat.com>', 'Jan Pazdziora <jpazdziora@redhat.com>', 'Tomas Tomecek <ttomecek@redhat.com>', 'Radek Vokál <rvokal@redhat.com>', 'Josh Berkus <jberkus@redhat.com>'],
    'OpenStack': ['Rashid Khan <rkhan@redhat.com>', 'Ilya Etingof <ietingof@redhat.com>'],
    'Platform / OS': ['Brian Exelbierd <bexelbie@redhat.com>', 'Rashid Khan <rkhan@redhat.com>', 'Ondrej Vasik <ovasik@redhat.com>'],
    'Storage, Ceph, Gluster': ['Milan Broz <mbroz@redhat.com>'],
    'Testing': ['Ondrej Hudlicky <ohudlick@redhat.com>', 'Suprith Gangawar <sgangawa@redhat.com>', 'Ilya Etingof <ietingof@redhat.com>', 'Lisa Reed <lireed@redhat.com>'],
    'Virtualization': ['Karen Noel <knoel@redhat.com>'],
    '.NET': ['Deepak Bhole <dbhole@redhat.com>', 'Patrick Macdonald <patrickm@redhat.com>'],
    'IoT': ['Peter Robinson <pbrobinson@redhat.com>', 'Ilya Etingof <ietingof@redhat.com>']
  }
}
let sheetColumnMap = {
  'Timestamp': 'timestamp',
  'Email Address': 'email',
  'Submission Type': 'type',
  'Booth Title': 'booth_title',
  'Booth Description': 'booth_description',
  'Booth Reservation Dates': 'booth_reservation_dates',
  'Booth Requirements': 'booth_requirements',
  'Meet-up Title': 'meetup_title',
  'Meet-up Description': 'meetup_description',
  'Meet-up Date': 'meetup_date',
  'Meet-up Duration': 'meetup_duration',
  'Meet-up Capacity': 'meetup_capacity',
  'Meet-up projector / screen is required?': 'meetup_projector_required',
  'Meet-up private room is required?': 'meetup_private_room_required',
  'Meet-up Requirements': 'meetup_requirements',
  'Session Title': 'session_title',
  'Session Type': 'session_type',
  'Session Duration': 'session_duration',
  'Session Themes': 'session_themes',
  'Session Difficulty': 'session_difficulty',
  'Session Abstract': 'session_abstract',
  'Session Summary': 'session_short_description',
  'Primary Profile Name': 'display_name',
  'Primary Profile Picture': 'photo_url',
  'Primary Profile Short Description': 'short_description',
  'Primary Profile Biography': 'description',
  'Primary Profile Organization': 'organization',
  'Primary Profile Community': 'communities',
  'Primary Profile Wearable Size Preference': 'wearable_size',
  'Primary Profile Twitter URL': 'twitter',
  'Primary Profile GitHub URL': 'github',
  'Primary Profile Website URL': 'website',
  'Second Profile Name': 'display_name',
  'Second Profile Email': 'email',
  'Second Profile Picture': 'photo_url',
  'Second Profile Short Description': 'short_description',
  'Second Profile Biography': 'description',
  'Second Profile Organization': 'organization',
  'Secondary Profile Community': 'communities',
  'Second Profile Wearable Size Preference': 'wearable_size',
  'Second Profile Twitter URL': 'twitter',
  'Second Profile GitHub URL': 'github',
  'Second Profile Website URL': 'website',
  'Third Profile Name': 'display_name',
  'Third Profile Email': 'email',
  'Third Profile Picture': 'photo_url',
  'Third Profile Short Description': 'short_description',
  'Third Profile Biography': 'description',
  'Third Profile Organization': 'organization',
  'Third Profile Community': 'communities',
  'Third Profile Wearable Size Preference': 'wearable_size',
  'Third Profile Twitter URL': 'twitter',
  'Third Profile GitHub URL': 'github',
  'Third Profile Website URL': 'website'}
function getPanelMemberEmails() {
  let emails = []
  Object.values(tracks).forEach(arr => {
    emails.push.apply(emails, arr)
  })
  return Array.from(new Set(emails)).sort()
}
function rowsToDict(rows) {
  let columns = rows.shift(0)
  let submissions = {}
  let _id = 0
  rows.forEach(row => {
    let submission = {id: _id}
    for (let i=0, len=row.length; i < len; i++) {
      // debug(columns[i], row[i])
      submission[columns[i]] = row[i]
    }
    submissions[_id] = submission
    _id++
  })
  columns.unshift('id')
  return {submissions: submissions, columns: columns}
}
function getPanels() {
  // themes are arbitrary; each theme is linked to a track; each track has panel.
  let panels = {}
  Object.keys(tracks).forEach((track) => {
    if (!panels[track]) {
      panels[track] = {
        panel: tracks[track],
        themes: [],
        submissions: [columns],
        other: [columns]
      }
    } else {
      panels[track][panel].push.apply(panels[track][panel], tracks[track])
    }
  })
  Object.keys(themes).forEach(theme => {
    let themeTracks = themes[theme].tracks
    Object.keys(panels).forEach(track => {
      if (themeTracks.indexOf(track) > -1) {
        panels[track].themes.push(theme)

        Object.keys(buckets).forEach(bucket => {
          Object.keys(buckets[bucket]).forEach(sid => {
            let submission = buckets[bucket][sid]
            if (submission['Submission Type'] !== 'Session proposal')
              {
                return
              }
            let themes = submission['Session Themes']
            if (themes.split(', ').indexOf(theme) > -1) {
              panels[track].submissions.push(Object.values(submission))
              // panels[track].submissions.push(submission)
            } else {
              panels[track].other.push(Object.values(submission))
            }
          })
        })
      }
    })
  })
  return panels
}
function getPanelMemberTracks(filterBy) {
  return Object.keys(tracks).filter(key => tracks[key].indexOf(filterBy) > -1)
}
function getPanelMemberThemes(filterBy) {
  let panelMembers = {}
  // themes = {'THEME': ['track 1', 'track 2']}
  // tracks = {'track 1': ['person 1', 'person 2']}
  Object.keys(tracks).forEach((track) => {
    let panel = tracks[track]
    panel.forEach((panelMember) => {
      if (filterBy && filterBy !== panelMember) {
        return
      }
      if (!panelMembers[panelMember]) panelMembers[panelMember] = []
      Object.keys(themes).forEach((theme) => {
        if (themes[theme]['tracks'].indexOf(track) > -1) panelMembers[panelMember].push(theme)
      })
    })
  })
  return panelMembers
}
function splitIntoBuckets(submissions) {
  let buckets = {
    meetups: {},
    booths: {},
    talks: {},
    workshops: {},
    discussions: {}
  }
  Object.keys(submissions).forEach((submissionId) => {
    let submission = submissions[submissionId]
    switch (submission['Submission Type']) {
      case 'Community Meetup':
        buckets['meetups'][submissionId] = submission
        break
      case 'Booth table request':
        buckets['booths'][submissionId] = submission
        break
      default:  // Session proposal
        if (submission['Session Type'] === 'Presentation') {
          buckets['talks'][submissionId] = submission
        } else if (submission['Session Type'] === 'Workshop') {
          buckets['workshops'][submissionId] = submission
        } else if (submission['Session Type'] === 'Discussion') {
          buckets['discussions'][submissionId] = submission
        } else {
            throw new Error(`UNKNOWN session type: ${submission['Session Type']}`)
        }
    }
  })
  return buckets
}
function getPanelMemberSubmissions(buckets, panelMembers) {
  let panelMemberSubmissions = {}
  Object.keys(panelMembers).forEach(panelMember => {
    panelMemberSubmissions[panelMember] = {'My themes': {}, 'Other': {}, 'Workshops / Discussions': {}}
    // debug(`${panelMember}: ${panelMembers[panelMember]}`)
    let panelMemberThemes = panelMembers[panelMember]
    Object.keys(buckets['talks']).forEach(submissionId => {
      let submission = buckets['talks'][submissionId]
      panelMemberThemes.forEach(theme => {
        if (submission['Session Themes'].indexOf(theme) > -1) {
          panelMemberSubmissions[panelMember]['My themes'][submissionId] = submission
        } else {
          panelMemberSubmissions[panelMember]["Other"][submissionId] = submission
        }
      })
    })

    Object.keys(buckets['workshops']).forEach(submissionId => {
      let submission = buckets['talks'][submissionId]
      panelMemberThemes.forEach(theme => {
        panelMemberSubmissions[panelMember]['Workshops / Discussions'][submissionId] = submission
      })
    })

    Object.keys(buckets['discussions']).forEach(submissionId => {
      let submission = buckets['talks'][submissionId]
      panelMemberThemes.forEach(theme => {
        panelMemberSubmissions[panelMember]['Workshops / Discussions'][submissionId] = submission
      })
    })
  })
  return panelMemberSubmissions
}
function getPanelMemberDocs(panelMemberSubmissions, columns) {
  let docs = {}
  Object.keys(panelMemberSubmissions).forEach(panelMember => {
    docs[panelMember] = {}
    let myThemeSubmissions = panelMemberSubmissions[panelMember]['My themes']
    let myThemeRows = [columns]
    Object.values(myThemeSubmissions).forEach(submission => {
      myThemeRows.push(Object.values(submission))
    })
    docs[panelMember]['My themes'] = removeEmptyColumns(myThemeRows)

    let otherThemeSubmissions = panelMemberSubmissions[panelMember]['Other']
    let otherThemeRows = [columns]
    Object.values(otherThemeSubmissions).forEach(submission => {
      otherThemeRows.push(Object.values(submission))
    })
    docs[panelMember]['Other'] = removeEmptyColumns(otherThemeRows)

    let miscThemeSubmissions = panelMemberSubmissions[panelMember]['Workshops / Discussions']
    let miscThemeRows = [columns]
    Object.values(miscThemeSubmissions).forEach(submission => {
      if (submission) {
        miscThemeRows.push(Object.values(submission))
      }
    })
    docs[panelMember]['Workshops / Discussions'] = removeEmptyColumns(miscThemeRows)
  })
  return docs
}
function removeEmptyColumns(rows) {
  let columns = rows.shift()
  let r = 0
  let columnCheck = []
  rows.forEach(row => {
    let c = 0
    row.forEach(cellValue => {
      if (typeof cellValue === 'string') cellValue = cellValue.trim()
      if (cellValue === '') {
        columnCheck[c] = 0
      } else {
        columnCheck[c] = 1
      }
      c++
    })
  })
  let updatedRows = []
  rows.forEach(row => {
    let updatedRow = []
    for (let c=0, len=columnCheck.length; c < len; c++) {
      if (columnCheck[c] === 1) {
        updatedRow.push(row[c])
      }
    }
    updatedRows.push(updatedRow)
  })
  let updatedColumns = []
  for (let c=0, len=columnCheck.length; c < len; c++) {
    if (columnCheck[c] === 1) {
      updatedColumns.push(columns[c])
    }
  }
  updatedRows.unshift(updatedColumns)
  return updatedRows
}
function writeCsv(path, rows) {
  console.log(`writecsv: ${path}`)
  return new Promise ((resolve, reject) => {
    let csvString = ''
    rows.forEach(row => {
      for (let i=0, len=row.length; i<len; i++) {
        row[i] = `"${row[i]}"`.replace(/\n+/g, '<br>')
      }
      let rowString = row.join('^')
      csvString += rowString + '\n'
    })
    fs.writeFileSync(path.replace(/[- ]/g, '_'), csvString)
    return resolve()
  })
}
function processPhotos(auth) {
  bucket.getFiles().then(results => {
    const files = results[0]
    debug('Files:')
    files.forEach(file => {
      debug(file.name)
    })
  }).then(() => {
    throw new Error()
  })

  debug('Processing Speaker Photos ...')

  debug('Getting Spreadsheet data...')
  google.sheets.spreadsheets.values.get({
    auth: auth,
    spreadsheetId: '180zx7rd0ocHHZnNgr_HiQltPSu8PvFM_wfHzN8iWHXI',
    range: 'Form Responses 1!A:BE',
  }, function(err, response) {
    if (err) {
      debug('The API returned an error: ' + err)
      return
    } else {
      debug('... done.')
    }
    const rows = response.values.slice(1)  // drop the columns header row
    if (rows.length == 0) {
      debug('No data found.')
      return
    }
    debug(`Found ${rows.length} responses.`)
    let savedFiles = {}
    blankProfile = '/tmp/photos/profile-blank.jpg'
    for (const row of rows) {
      let url = row[23]
      let email = row[1]
      let prefix = email.replace(/@/, '__at__').replace(/\./g, '__dot__')
      filename = path.basename(url).split('?')[0].toLowerCase()
      filename = filename.replace(/jpeg/, 'jpg')
      let saveAs = '/tmp/photos/original/' + prefix + '___' + filename
      if (!fs.existsSync(saveAs)) {
        download(url, saveAs, function (error) {
          if (error) {
            savedFiles[email] = blankProfile
            debug(`Error: ${saveAs} (${error}) \n ---> ${url}`)
          } else {
            debug(`Success: ${saveAs}`)
            savedFiles[email] = saveAs
            let _fileSplit = filename.split('.')
            let saveAsModified
            if (_fileSplit.length === 1 || (_fileSplit[0] === '' && _fileSplit.length === 2)) {
              // we have a file without extension
              saveAsModified = 'mod-' + saveAs + '.jpg'
            } else {
              saveAsModified = 'mod-' + _fileSplit.slice(0, -1) + '.jpg'
            }
            saveAsModified = saveAsModified.replace(/original/, 'modified')
            gm(saveAs)
            .autoOrient()
            .resize(240, 240)
            .noProfile()
            .write(saveAsModified, function (err) {
              if (err) debug(`Failed to manipulate: ${saveAsModified}`)
            })
          }
        })
      } else {
        debug(`Skipping: ${saveAs}`)
      }
    }
    debug(savedFiles)
  })
}
function getEmails(auth) {
  const sheets = google.sheets('v4')
  debug('Getting Spreadsheet data...')
  google.sheets.spreadsheets.values.get({
    auth: auth,
    spreadsheetId: '180zx7rd0ocHHZnNgr_HiQltPSu8PvFM_wfHzN8iWHXI',
    range: 'Form Responses 1!A:BE',
  }, function(err, response) {
    if (err) {
      debug('The API returned an error: ' + err)
      return
    } else {
      debug('... done.')
    }
    const rows = response.values
    if (rows.length == 0) {
      debug('No data found.')
      return
    }
    debug(`Found ${rows.length} responses.`)
    let emails = new Set()
    for (let i=0, len=rows.length; i < len; i++) {
      for (let ix=0, len=rows[i].length; ix < len; ix++) {
          if (rows[i][ix].match(/@/) && !rows[i][ix].match(/[\n, ]/)) emails.add(rows[i][ix])
      }
    }
    debug (Array.from(emails).sort().join(', '))
  })
}
function processSubmissions(auth) {
  debug('Processing submissions ...')
  debug('Getting Spreadsheet data...')
  google.sheets.spreadsheets.values.get({
    auth: auth,
    spreadsheetId: '180zx7rd0ocHHZnNgr_HiQltPSu8PvFM_wfHzN8iWHXI',
    range: 'Form Responses 1!A:BE',
  }, function(err, response) {
    if (err) {
      debug('The API returned an error: ' + err)
      return
    } else {
      debug('... done.')
    }
    const rows = response.values
    if (rows.length == 0) {
      debug('No data found.')
      return
    }
    debug(`Found ${rows.length} responses.`)
    let submissions = []
    let speakers = []
    let meetups = []
    let booths = []
    let fields = rows[0]
    const NOW = new Date().toISOString()
    for (let i = 1; i < rows.length; i++) {
      //        ^^^ skip the header row
      const row = rows[i]
      let submissionTypes = {
        meta: {},
        booth: {
          meta: {
            last_updated: NOW,
            contacts: {}
          },
          id: lib.generatePushID()
        },
        meetup: {
          meta: {
            last_updated: NOW,
            contacts: {}
          },
          id: lib.generatePushID()
        },
        session: {
          meta: {
            last_updated: NOW,
            contacts: {},
            votes: {
              vote_total: 0,
              vote_count_total: 0,
              vote_count_plus: 0,
              vote_count_minus: 0,
              results: {}
            }
          },
          id: lib.generatePushID()
        }
      }
      let submissionSpeakers = {
        Primary: {id: lib.generatePushID(), meta: {last_updated: NOW}},
        Second: {id: lib.generatePushID(), meta: {last_updated: NOW}},
        Third: {id: lib.generatePushID(), meta: {last_updated: NOW}}
      }
      let k = -1
      for (let field of fields) {
        k++
        if (row[k] === '') {
          // debug(`... skipping empty field: ${field}`)
          continue
        }
        newField = sheetColumnMap[field]
        if (!newField) {
          if (field === 'Is there another profile to add?' ||
              field === 'I and all other secondary participants have read, and agree with the DevConf.cz participation agreement') {
            continue
          } else {
            throw new Error(`ERROR: Invalid field map value. (${field})`)
          }
        }
        // Figure out which type of event it is
        let whichField = field.match(/(Primary)|(Second)|(Third)|(Session)|(Meet-up)|(Booth)/) || []
        let submissionType
        switch (whichField[0]) {
          case 'Meet-up':
            submissionType = 'meetup'
            newField = newField.split('_').splice(1).join('_')
            submissionTypes['meta']['type'] = submissionType
            switch (newField) {
              case 'date':
                submissionTypes[submissionType][newField] = new Date(row[k])
                break
              case 'duration':
                submissionTypes[submissionType][newField] = row[k].split(' ')[0] * 60
                submissionTypes[submissionType]['time'] = `0${row[k].split(' ')[0]}:00:00`
                break
              default:
                submissionTypes[submissionType][newField] = row[k]
            }
            break
          case 'Booth':
            submissionType = 'booth'
            newField = newField.split('_').splice(1).join('_')
            submissionTypes['meta']['type'] = submissionType
            switch (newField) {
              case 'reservation_dates':
                let _dates = []
                let dates = row[k].split(',')
                for (let i = 0, len = dates.length; i < len; i += 2) {
                  let date = new Date(dates.slice(i, i+1).join(', '))
                  _dates.push(date)
                }
                submissionTypes[submissionType][newField] = _dates
                break
              default:
                submissionTypes[submissionType][newField] = row[k]
            }
            break
          case 'Session':
            submissionType = 'session'
            newField = newField.split('_').splice(1).join('_')
            submissionTypes['meta']['type'] = submissionType
            switch (newField) {
              case 'themes':
                let themes = row[k].split(',')
                for (let i = 0, len = themes.length; i < len; i++) {
                  themes[i] = themes[i].trim()
                }
                submissionTypes[submissionType][newField] = themes
                break
              case 'duration':
                const blocks = row[k].split(' ')[0]
                submissionTypes[submissionType]['blocks'] = blocks
                submissionTypes[submissionType]['duration'] = blocks * 30
                break
              case 'difficulty':
                submissionTypes[submissionType][newField] = row[k].split(' ')[0].trim()
                break
              default:
                submissionTypes[submissionType][newField] = row[k].trim()
            }
            break
          case 'Primary':
            submissionSpeakers[whichField[0]][newField] = row[k]
            break
          case 'Second':
            submissionSpeakers[whichField[0]][newField] = row[k]
            break
          case 'Third':
            submissionSpeakers[whichField[0]][newField] = row[k]
            break
          default:
            submissionTypes['meta'][newField] = row[k]
        }
      }

      let speakersEmails = []
      if (speakersEmails.indexOf(submissionTypes['meta'].email) > 0) {
        speakers[submissionSpeakers['Primary'].id]['submission_count']++
      } else {
        speakers[submissionSpeakers['Primary'].id] = submissionSpeakers['Primary']
        speakers[submissionSpeakers['Primary'].id]['email'] = submissionTypes['meta'].email
        speakers[submissionSpeakers['Primary'].id]['meta'] = {'submission_count': 1}
      }
      if (speakersEmails.indexOf(submissionSpeakers['Second'].email) > 0) {
        speakers[submissionSpeakers['Second'].id]['meta']['submission_count']++
      } else {
        if (submissionSpeakers['Second'].email) {
          speakers[submissionSpeakers['Second'].id] = submissionSpeakers['Second']
          speakers[submissionSpeakers['Second'].id]['meta'] = {'submission_count': 1}
        }
      }
      if (speakersEmails.indexOf(submissionSpeakers['Third'].email) > 0) {
        speakers[submissionSpeakers['Third'].id]['meta']['submission_count']++
      } else {
        if (submissionSpeakers['Third'].email) {
          speakers[submissionSpeakers['Third'].id] = submissionSpeakers['Third']
          speakers[submissionSpeakers['Third'].id]['meta'] = {'submission_count': 1}
        }
      }

      const submissionType = submissionTypes['meta']['type']

      submissionTypes[submissionType]['meta']['primary_contact'] = submissionSpeakers['Primary']
      submissionTypes[submissionType]['meta']['contacts'][submissionSpeakers['Primary'].id] = submissionSpeakers['Primary']
      if (submissionSpeakers['Second'].email) {
        submissionTypes[submissionType]['meta']['contacts'][submissionSpeakers['Second'].id] = submissionSpeakers['Second']
      }
      if (submissionSpeakers['Third'].email) {
        submissionTypes[submissionType]['meta']['contacts'][submissionSpeakers['Third'].id] = submissionSpeakers['Third']
      }

      switch (submissionType) {
        case 'session':
          submissions[submissionTypes[submissionType].id] = submissionTypes[submissionType]
          break
        case 'meetup':
          meetups[submissionTypes[submissionType].id] = submissionTypes[submissionType]
          break
        case 'booth':
          booths[submissionTypes[submissionType].id] = submissionTypes[submissionType]
          break
        default:
          throw new Error('Whoops something went wrong!')
      }
    }

    db.ref(programsSubmissionsPath).set(submissions).then(() => {debug('... Submissions Saved')})
    db.ref(programsBoothsPath).set(booths).then(() => {debug('... Booths Saved')})
    db.ref(programsMeetupsPath).set(meetups).then(() => {debug('... Meetups Saved')})
    db.ref(programsSpeakersPath).set(speakers).then(() => {debug('... Speakers Saved')})
    db.ref(programsMetaPath + '/update_complete').set(new Date().toISOString())

  })
}
