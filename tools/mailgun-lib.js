const debug = require('debug')('on')  // eg, call with DEBUG=on node cfp.js

const api_private_key = process.env.MAILGUN_PRIVATE_APIKEY
const api_public_key = process.env.MAILGUN_PUBLIC_APIKEY
const domain = process.env.MAILGUN_DOMAIN
const mailgun = require('mailgun-js')({apiKey: api_private_key, domain: domain});

function sendMail(payload) {
  mailgun.messages().send(payload, (error, body) => {
    debug(`... Email message sent successfully.`)
  })
}

exports.sendMail = sendMail
