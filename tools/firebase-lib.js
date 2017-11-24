const debug = require('debug')('on')  // eg, call with DEBUG=on node cfp.js

const google = require('googleapis')
const firebase = require('firebase')
const gcloud = require('google-cloud')

const config = {
  apiKey: process.env.CFP_FB_APIKEY,
  authDomain: process.env.CFP_FB_PROJECT,
  databaseURL: process.env.CFP_FB_DB,
  storageBucket: process.env.CFP_FB_BUCKET
}

const app = firebase.initializeApp(config)
const database = app.database()

const storage = gcloud.storage({
    projectId: process.env.CFP_FB_PROJECT,
    keyFilename: process.env.CFP_FB_STORAGE_CERT
  })

const bucket = storage.bucket(process.env.CFP_FB_BUCKET)

/* Firebase ADMIN sdk
const admin = require('firebase-admin')
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  databaseURL: process.env.CFP_FB_DB
})
*/

exports.app = app
exports.database = database
exports.storage = storage
exports.bucket = bucket
