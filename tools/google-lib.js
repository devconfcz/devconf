const debug = require('debug')('on')  // eg, call with DEBUG=on node cfp.js

const fs = require('fs')
const path = require('path')
const readline = require('readline')

const google = require('googleapis')
const googleAuth = require('google-auth-library')

const sheets = google.sheets('v4')
const drive = google.drive('v3');


// Set-up Google Spreadsheets
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/sheets.googleapis.com-nodejs-quickstart.json
const SCOPES = [
  'https://www.googleapis.com/auth/spreadsheets.readonly',
  'https://www.googleapis.com/auth/drive'
]
const TOKEN_PATH = process.env.CFP_TOKENS
const SECRETS_PATH = process.env.CFP_SECRETS

// FUNCTION DEFINITIONS

/**
 * Create an OAuth2 client with the given credentials, and then execute the
 * given callback function.
 *
 * @param {Object} credentials The authorization client credentials.
 * @param {function} callback The callback to call with the authorized client.
 */
function authorize(credentials, callback) {
  const clientSecret = credentials.installed.client_secret
  const clientId = credentials.installed.client_id
  const redirectUrl = credentials.installed.redirect_uris[0]
  const auth = new googleAuth()
  const oauth2Client = new auth.OAuth2(clientId, clientSecret, redirectUrl)

  // Check if we have previously stored a token.
  fs.readFile(TOKEN_PATH, function(err, token) {
    if (err) {
      getNewToken(oauth2Client, callback)
    } else {
      oauth2Client.credentials = JSON.parse(token)
      callback(oauth2Client)
    }
  })
}

/**
 * Get and store new token after prompting for user authorization, and then
 * execute the given callback with the authorized OAuth2 client.
 *
 * @param {google.auth.OAuth2} oauth2Client The OAuth2 client to get token for.
 * @param {getEventsCallback} callback The callback to call with the authorized
 *     client.
 */
function getNewToken(oauth2Client, callback) {
  const authUrl = oauth2Client.generateAuthUrl({
    access_type: 'offline',
    scope: SCOPES
  })
  console.log('Authorize this app by visiting this url: ', authUrl)
  const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
  })
  rl.question('Enter the code from that page here: ', function(code) {
    rl.close()
    oauth2Client.getToken(code, function(err, token) {
      if (err) {
        console.log('Error while trying to retrieve access token', err)
        return
      }
      oauth2Client.credentials = token
      storeToken(token)
      callback(oauth2Client)
    })
  })
}

/**
 * Store token to disk be used in later program executions.
 *
 * @param {Object} token The token to store to disk.
 */
function storeToken(token) {
  try {
    fs.mkdirSync(path.basename(TOKEN_PATH))
  } catch (err) {
    if (err.code != 'EEXIST') {
      throw err
    }
  }
  fs.writeFile(TOKEN_PATH, JSON.stringify(token))
  console.log('Token stored to ' + TOKEN_PATH)
}

function callWithAuth(callback) {
  fs.readFile(SECRETS_PATH, function processClientSecrets(error, content) {
    if (error) {
      throw new Error ('Error loading client secret file: ' + error)
    }
    authorize(JSON.parse(content), callback)
  })
}

function writeSheet(sheetName, data) {
  Logger.log('Writing data to sheet: ' + sheetName)
  // Now that we have the data, go ahead and refresh the live sheet data
  const _tmpSheet = doc.getSheetByName(sheetName)
  if (_tmpSheet) { doc.deleteSheet(_tmpSheet) }
  const docTmp = doc.insertSheet(sheetName, -1)

  // get all known fields columns keys
  let columns = []
  for (const _fi in data) {
    for (let _gi in data[_fi]) {
      _gi = _gi.trim()
      if (_gi.startsWith('__')) {  // skip private fields by default
        continue
      }
      if (columns.indexOf(_gi) < 0) {
        columns.push(_gi)
      }
    }
  }
  columns = columns.sort()

  // Write it out to the sheet nowl; make sure columns are aligned.
  let _xRows = []
  for (const _ei in data) {
    _item = data[_ei]
    let _xRow = []
    for (const _xKey in columns) {
      _xRow[columns.indexOf(columns[_xKey])] = _item[columns[_xKey]]
    }
   _xRows.push(_xRow)
  }
  docTmp.appendRow(columns)
  for (const _fi in _xRows) {
    docTmp.appendRow(_xRows[_fi])
  }
}

//////////////////////////////////////////////

exports.callWithAuth = callWithAuth
exports.sheets = sheets
exports.drive = drive
