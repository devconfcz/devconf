// Tools for processing CfP submissions and creating final program, etc.

//var admin = require('firebase-admin')
//admin.initializeApp({
//  credential: admin.credential.cert(serviceAccount),
//  databaseURL: process.env.CFP_FB_DB
//})
var fs = require('fs')
var path = require('path')
var gm = require('gm').subClass({imageMagick: true})
var request = require('request')

var google = require('googleapis')
var firebase = require('firebase')
var gcloud = require('google-cloud')

var json2csv = require('json2csv');

var lib = require('./cfp-lib')

const debug = require('debug')('on')

// Load client secrets from a local file.
var _secretsPath = process.env.CFP_SECRETS
const formId = '1xrtWTn6mA-1zHvM6q8kRlPjoy0yLIAwOfjsv-nGhWPM'
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

var config = {
  apiKey: process.env.CFP_FB_APIKEY,
  authDomain: process.env.CFP_FB_PROJECT,
  databaseURL: process.env.CFP_FB_DB,
  storageBucket: process.env.CFP_FB_BUCKET
}

/*
let firebaseApp = firebase.initializeApp(config)
let db = firebaseApp.database()

const storage = gcloud.storage({
    projectId: 'cward-cfpoint-devel',
    keyFilename: process.env.CFP_FB_STORAGE_CERT
})
const bucket = storage.bucket(process.env.CFP_FB_STORAGE_BUCKET)
*/

function download (url, dest, cb) {
    var file = fs.createWriteStream(dest)
    var sendReq = request.get(url)
    // verify response code
    sendReq.on('response', function(response) {
        if (response.statusCode !== 200) {
            return cb('Response status was ' + response.statusCode)
        }
    })
    // check for request errors
    sendReq.on('error', function (err) {
        fs.unlink(dest)
        return cb(err.message)
    })
    sendReq.pipe(file)
    file.on('finish', function() {
        file.close(cb)  // close() is async, call cb after close completes.
    })
    file.on('error', function(err) { // Handle errors
        fs.unlink(dest) // Delete the file async. (But we don't check the result)
        return cb(err.message)
    })
}

fs.readFile(_secretsPath, function processClientSecrets(err, content) {
  if (err) {
    debug('Error loading client secret file: ' + err)
    return
  }
  // lib.authorize(JSON.parse(content), processSubmissions)
  // lib.authorize(JSON.parse(content), processPhotos)
  // lib.authorize(JSON.parse(content), getEmails)
  lib.authorize(JSON.parse(content), buildCommitteeSheets)
})

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
  const sheets = google.sheets('v4')
  debug('Getting Spreadsheet data...')
  sheets.spreadsheets.values.get({
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
  sheets.spreadsheets.values.get({
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

function buildCommitteeSheets(auth) {
  const sheets = google.sheets('v4')
  debug('Getting Spreadsheet data...')
  sheets.spreadsheets.values.get({
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
    let panelMembers = getPanelMemberThemes()
    let panelMemberSubmissions = getPanelMemberSubmissions(buckets, panelMembers)
    let panelMemberDocs = getPanelMemberDocs(panelMemberSubmissions, columns)

    // prepare one document per panel member with
    // - one sheet with their track / theme talks
    // - one sheet with all 'other'

    /*
    let promises = []
    Object.keys(panelMemberDocs).forEach(panelMember => {
      Object.keys(panelMemberDocs[panelMember]).forEach(sheet => {
        let path = `/tmp/out/${panelMember.split(' <')[0]}_${sheet}.csv`.replace(/[- ]/g, '_')
        promises.push(writeCsv(path, panelMemberDocs[panelMember][sheet]))
      })
    })
    Promise.all(promises)
    .then(() => {
      debugger
    })
    .catch(error => {
      debug(`ERROR: ${error}`)
    })
    */

    Object.keys(panelMemberDocs).forEach(panelMember => {
      let title = `DevConf.cz 2018 - ${panelMember.split(' <')[0]}`
      sheets.spreadsheets.create({
        auth: auth,
        resource: {
          properties: {
            'title': `devconf/${title}`
          }
        }
      }, (err, newDoc) => {
        if (err) { throw new Error ('The API returned an error: ' + err) }
        else { debug('... done.') }

        let spreadsheetId = newDoc.spreadsheetId
        let spreadsheetUrl = newDoc.spreadsheetUrl
        let spreadsheetSheets = newDoc.sheets
        debug(`${panelMember}: ${spreadsheetUrl}`)

        new Promise ((resolve, reject) => {
          Object.keys(panelMemberDocs[panelMember]).sort().forEach(sheet => {
            sheets.spreadsheets.batchUpdate({
              spreadsheetId: spreadsheetId,
              auth: auth,
              resource: {
                requests: [
                  {
                    "addSheet": {
                      "properties": {
                        "title": sheet,
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
              sheets.spreadsheets.values.append({
                spreadsheetId: spreadsheetId,
                valueInputOption: 'RAW',
                insertDataOption: 'INSERT_ROWS',
                range: sheet,
                resource: {
                  values: panelMemberDocs[panelMember][sheet]
                },
                auth: auth
              }, (error, response) => {
                debug('DONE')
                resolve()
              })
            })
          })
        }).then(() => {
          sheets.spreadsheets.batchUpdate({
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
}

function writeJson(filePath, data) {
  fs.writeFileSync(filePath, JSON.stringify(data, null, 2))
}

function processSubmissions(auth) {
  debug('Processing submissions ...')
  const sheets = google.sheets('v4')
  debug('Getting Spreadsheet data...')
  sheets.spreadsheets.values.get({
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
                var _dates = []
                var dates = row[k].split(',')
                for (let i = 0, len = dates.length; i < len; i += 2) {
                  var date = new Date(dates.slice(i, i+1).join(', '))
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

var themes = {
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

/*
var tracks = {
  'Agile': ['Jen Krieger <jkrieger@redhat.com>']
}
*/

var tracks = {
  'Agile': ['Jen Krieger <jkrieger@redhat.com>'],
  'Ansible': ['Rashid Khan <rkhan@redhat.com>', 'Ondrej Vasik <ovasik@redhat.com>', 'Bill Nottingham <notting@redhat.com>', 'Josh Berkus <jberkus@redhat.com>'],
  'Atomic': ['Joe Brockmeier <jzb@redhat.com>', 'Eliska Slobodova <eliska@redhat.com>', 'Josh Berkus <jberkus@redhat.com>'],
  'CentOS': ['Brian Exelbierd <bexelbie@redhat.com>', 'Rashid Khan <rkhan@redhat.com>', 'Ondrej Vasik <ovasik@redhat.com>', 'Jim Perrin <jperrin@redhat.com>'],
  'Cloud': ['Tomas Tomecek <ttomecek@redhat.com>'],
  'CI/CD': ['Ari LiVigni <alivigni@redhat.com>', 'Jeffrey Burke <jburke@redhat.com>'],
  'Community': ['Brian Exelbierd <bexelbie@redhat.com>', 'Leslie Hawthorn <lhawthor@redhat.com>', 'Brian Proffitt <bproffit@redhat.com>', 'Milan Broz <mbroz@redhat.com>'],
  'Containers': ['Josh Berkus <jberkus@redhat.com>', 'Joe Brockmeier <jzb@redhat.com>', 'Eliska Slobodova <eliska@redhat.com>', 'Jan Pazdziora <jpazdziora@redhat.com>', 'Honza Horak <hhorak@redhat.com>', 'Tomas Tomecek <ttomecek@redhat.com>'],
  'Desktop': ['Tomas Popela <tpopela@redhat.com>'],
  'DevOps': ['Jen Krieger <jkrieger@redhat.com>', 'Josh Berkus <jberkus@redhat.com>'],
  'DevTools': ['Patrick Macdonald <patrickm@redhat.com>', 'Adi Sakala <asakala@redhat.com>', 'Vaclav Pavlin <vpavlin@redhat.com>'],
  'Enterprise Security': ['Alexander Bokovoy <abokovoy@redhat.com>', 'Martin Kosek <mkosek@redhat.com>', 'Peter Vrabec <pvrabec@redhat.com>', 'Jan Pazdziora <jpazdziora@redhat.com>'],
  'Fedora': ['Jiri Eischmann <jeischma@redhat.com>', 'Matthew Miller <mattdm@redhat.com>', 'Brian Exelbierd <bexelbie@redhat.com>'],
  'Identity Management': ['Jan, Pazdziora <jpazdziora@redhat.com>', 'Martin Kosek <mkosek@redhat.com>', 'Peter Vrabec <pvrabec@redhat.com>'],
  'Kernel': ['Stanislav Kozina <skozina@redhat.com>'],
  'Java / Middleware': ['Vaclav Tunka <vtunka@redhat.com>', 'Mark Little <mlittle@redhat.com>', 'Steven Pousty <spousty@redhat.com>'],
  'Networking': ['Rashid Khan <rkhan@redhat.com>'],
  'OpenShift': ['Joe Brockmeier <jzb@redhat.com>', 'Eliska Slobodova <eliska@redhat.com>', 'Jan Pazdziora <jpazdziora@redhat.com>', 'Tomas Tomecek <ttomecek@redhat.com>', 'Radek Vokál <rvokal@redhat.com>', 'Josh Berkus <jberkus@redhat.com>'],
  'OpenStack': ['Rashid Khan <rkhan@redhat.com>'],
  'Platform / OS': ['Brian Exelbierd <bexelbie@redhat.com>', 'Rashid Khan <rkhan@redhat.com>', 'Ondrej Vasik <ovasik@redhat.com>'],
  'Storage, Ceph, Gluster': ['Milan Broz <mbroz@redhat.com>'],
  'Testing': ['Ondrej Hudlicky <ohudlick@redhat.com>', 'Suprith Gangawar <sgangawa@redhat.com>', 'Ilya Etingof <ietingof@redhat.com>', 'Lisa Reed <lireed@redhat.com>'],
  'Virtualization': ['Karen Noel <knoel@redhat.com>'],
  '.NET': ['Deepak Bhole <dbhole@redhat.com>', 'Patrick Macdonald <patrickm@redhat.com>'],
  'IoT': ['Peter Robinson <pbrobinson@redhat.com>']
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

function rowsToDict(rows) {
  let columns = rows.shift(0)
  submissions = {}
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
  Object.keys(themes).forEach((theme) => {
    let themeTracks = themes[theme]['tracks']
    let themePanel = {}
    themeTracks.forEach((themeTrack) => {
      themePanel[themeTrack] = tracks[themeTrack]
      // themePanel.push.apply(themePanel, tracks[themeTrack])
    })
    panels[theme] = themePanel
  })
  return panels
}

function getPanelMemberThemes() {
  let panelMembers = {}
  // themes = {'THEME': ['track 1', 'track 2']}
  // tracks = {'track 1': ['person 1', 'person 2']}
  Object.keys(tracks).forEach((track) => {
    let panel = tracks[track]
    panel.forEach((panelMember) => {
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
    panelMemberSubmissions[panelMember] = {'My themes': {}, 'Other': {}}
    // debug(`${panelMember}: ${panelMembers[panelMember]}`)
    let panelMemberThemes = panelMembers[panelMember]
    Object.keys(buckets['talks']).forEach(submissionId => {
      let submission = submissions[submissionId]
      panelMemberThemes.forEach(theme => {
        if (submission['Session Themes'].indexOf(theme) > -1) {
          panelMemberSubmissions[panelMember]['My themes'][submissionId] = submission
        } else {
          panelMemberSubmissions[panelMember]["Other"][submissionId] = submission
        }
      })
    })
  })
  return panelMemberSubmissions
}

function getPanelMemberDocs(panelMemberSubmissions, columns) {
  docs = {}
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
    csvString = ''
    rows.forEach(row => {
      for (let i=0, len=row.length; i<len; i++) {
        row[i] = `"${row[i]}"`
      }
      rowString = row.join(';')
      csvString += rowString + '\n'
    })
    fs.writeFileSync(path.replace(/[- ]/g, '_'), csvString)
    return resolve()
  })
}
