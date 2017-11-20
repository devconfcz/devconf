var fs = require('fs')
var path = require('path')
var readline = require('readline')

var google = require('googleapis')
var googleAuth = require('google-auth-library')

// Set-up Google Spreadsheets
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/sheets.googleapis.com-nodejs-quickstart.json
var SCOPES = ['https://www.googleapis.com/auth/spreadsheets.readonly',
              'https://www.googleapis.com/auth/drive.file']
var HOME = (process.env.HOME || process.env.HOMEPATH || process.env.USERPROFILE)
var HOME_CONFIG = process.env.CFP_CONFIG // FIXME: UGLY, requires setting env variable
var TOKEN_PATH = process.env.CFP_TOKENS


// FUNCTION DEFINITIONS

/**
 * Create an OAuth2 client with the given credentials, and then execute the
 * given callback function.
 *
 * @param {Object} credentials The authorization client credentials.
 * @param {function} callback The callback to call with the authorized client.
 */
function authorize(credentials, callback) {
  var clientSecret = credentials.installed.client_secret
  var clientId = credentials.installed.client_id
  var redirectUrl = credentials.installed.redirect_uris[0]
  var auth = new googleAuth()
  var oauth2Client = new auth.OAuth2(clientId, clientSecret, redirectUrl)

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
  var authUrl = oauth2Client.generateAuthUrl({
    access_type: 'offline',
    scope: SCOPES
  })
  console.log('Authorize this app by visiting this url: ', authUrl)
  var rl = readline.createInterface({
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


/////////////////////////////////////

function writeSheet(sheetName, data) {
  Logger.log('Writing data to sheet: ' + sheetName)
  // Now that we have the data, go ahead and refresh the live sheet data
  var _tmpSheet = doc.getSheetByName(sheetName)
  if (_tmpSheet) { doc.deleteSheet(_tmpSheet) }
  var docTmp = doc.insertSheet(sheetName, -1)

  // get all known fields columns keys
  var columns = []
  for (var _fi in data) {
    for (var _gi in data[_fi]) {
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
  var _xRows = []
  for (var _ei in data) {
    _item = data[_ei]
    var _xRow = []
    for (var _xKey in columns) {
      _xRow[columns.indexOf(columns[_xKey])] = _item[columns[_xKey]]
    }
   _xRows.push(_xRow)
  }
  Logger.log("**********************")
  Logger.log(columns)
  docTmp.appendRow(columns)
  for (var _fi in _xRows) {
    docTmp.appendRow(_xRows[_fi])
  }
}

//////////////////////////////////////////////

/**
 * Fancy ID generator that creates 20-character string identifiers with the following properties:
 * src: https://gist.github.com/mikelehen/3596a30bd69384624c11
 *
 * 1. They're based on timestamp so that they sort *after* any existing ids.
 * 2. They contain 72-bits of random data after the timestamp so that IDs won't collide with other clients' IDs.
 * 3. They sort *lexicographically* (so the timestamp is converted to characters that will sort properly).
 * 4. They're monotonically increasing.  Even if you generate more than one in the same timestamp, the
 *    latter ones will sort after the former ones.  We do this by using the previous random bits
 *    but "incrementing" them by 1 (only in the case of a timestamp collision).
 */
function generatePushID() {
  // Modeled after base64 web-safe chars, but ordered by ASCII.
  var PUSH_CHARS = '-0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz'

  // Timestamp of last push, used to prevent local collisions if you push twice in one ms.
  var lastPushTime = 0

  // We generate 72-bits of randomness which get turned into 12 characters and appended to the
  // timestamp to prevent collisions with other clients.  We store the last characters we
  // generated because in the event of a collision, we'll use those same characters except
  // "incremented" by one.
  var lastRandChars = []

  var now = new Date().getTime()
  var duplicateTime = (now === lastPushTime)
  lastPushTime = now

  var timeStampChars = new Array(8)
  for (var i = 7; i >= 0; i--) {
    timeStampChars[i] = PUSH_CHARS.charAt(now % 64)
    // NOTE: Can't use << here because javascript will convert to int and lose the upper bits.
    now = Math.floor(now / 64)
  }
  if (now !== 0) throw new Error('We should have converted the entire timestamp.')

  var id = timeStampChars.join('')

  if (!duplicateTime) {
    for (i = 0; i < 12; i++) {
      lastRandChars[i] = Math.floor(Math.random() * 64)
    }
  } else {
    // If the timestamp hasn't changed since last push, use the same random number, except incremented by 1.
    for (i = 11; i >= 0 && lastRandChars[i] === 63; i--) {
      lastRandChars[i] = 0
    }
    lastRandChars[i]++
  }
  for (i = 0; i < 12; i++) {
    id += PUSH_CHARS.charAt(lastRandChars[i])
  }
  if(id.length != 20) throw new Error('Length should be 20.')

  return id
}

exports.authorize = authorize
exports.generatePushID = generatePushID
