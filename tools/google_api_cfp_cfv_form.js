// PRODUCTION CODE
// FIXME: Move the email sending functionality over to firebase functions?
// FIXME: Add Bio summary to 
// NOTE: we use key_name_form with _ separators for firebase data objects

var eventAlias = 'devconfcz-2018';

var firebaseURL="https://XXXXXXXXX.firebaseio.com/";
var store = FirebaseApp.getDatabaseByUrl(firebaseURL, "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");

function onSubmit(e) {
  Logger.log('FORM SUBMIT at ... ' + new Date())

  try {   
    if (e) {
      var formId = e.source.getId();
      var formResponse = e.response
      var formResponseId = formResponse.getId()
      var formResponseTimestamp = formResponse.getTimestamp();
      var formResponseEditUrl = formResponse.getEditResponseUrl();
      var itemResponses = formResponse.getItemResponses();
      
      Logger.log('Setting up Firebase path to save submission data ...')
      var formSubmitterEmail = formResponse.getRespondentEmail();
      var submissionPath = "submissions/" + formId + "/" + formResponseId;
      var submissionVersionPath = submissionPath + '/meta/version';
      var submissionVersion = (store.getData(submissionVersionPath) || 0) + 1;
      Logger.log('... Submission version: ' + submissionVersion);
      
      if (submissionVersion > 1) {
        // save the historical versions
        previousVersionPayload = store.getData(submissionPath);
        delete previousVersionPayload['history'];
        pushData(submissionPath + '/history', previousVersionPayload);  // save the data to fb
      }
      
      Logger.log('Preparing response data ...');
      var formData = {
        meta: {
          form_id: formId,
          form_response_id: formResponseId,
          form_response_timestamp: formResponseTimestamp,
          form_edit_url: formResponseEditUrl,
          version: submissionVersion,
          submitter_email: formSubmitterEmail,
          event_alias: eventAlias,
          profiles: [formSubmitterEmail] // will store list of speaker emails here later; primary is seeded
        },
        response: {
        },
        profiles: [ // three pre-defined speaker profiles 
          {
            email: formSubmitterEmail, 
            domain: formSubmitterEmail.split('@')[1]}, 
          {}, 
          {}
        ]
      };
      
      for (var j = 0; j < itemResponses.length; j++) {
        var itemResponse = itemResponses[j];
        var item = itemResponse.getItem();
        var title = item.getTitle();
        if (typeof title === "string") {
          title = title.trim().toLowerCase();
          title = title.replace(/[)(\]\[\-?]/gi, '');
          title = title.replace(/[\W]+/gi, '_');
        }
        
        var response = itemResponse.getResponse();
        if (typeof response === "string") {
          response = response.trim();
        }
        formData['response'][title] = response;
      }
      
      Logger.log('Extracting form response data...')
      var i;
      for(var key in formData['response']) {
        Logger.log(' ... KEY: ' + key)
        var user = {};
        if (key === 'submission_type') {
          var val;
          switch(formData['response'][key]) {
            case 'Session proposal':
              val = 'proposal';
              break;
            case 'Booth table request':
              val = 'booth';
              break;
            case 'Community Meetup':
              val = 'meetup';
              break;
            default:
              Logger.log('ERROR: invalid session type detected. ' + formData['response'][key])
          }
          formData['meta']['type'] = val;
          delete formData['response'][key]; // ... it'll be stored in meta
        }
        else if (key.search(/^(primary|second|third)_profile/) >= 0) {
          Logger.log('Extracting profile data ... ' + key)
          if (key.search(/^primary_profile/) >= 0) {
            i = 0;
          } else if (key.search(/^second_profile/) >= 0) {
            i = 1;
          } else if (key.search(/^third_profile/) >= 0) {
            i = 2;
          } else {
            Logger.log('ERROR: got strange speaker key. ' + key)
          }
          
          val = formData['response'][key];
          field = key.split('_').splice(2).join('_');
          if (field === 'name') {
            field = 'display_name';
          } 
          else if (field === 'picture') {
            field = 'photo_url';
          } 
          else if (field === 'email') {
            formData['profiles'][i]['domain'] = val.split('@')[1];
            formData['meta']['profiles'].push(val);
          } 
          else if (field === 'biography') {
            field = 'description'; 
          }
          formData['profiles'][i][field] = val;
          delete formData['response'][key]; // ... it'll be stored in profiles 
        } 
        else if (key.search(/^session_/) >= 0) {
          Logger.log('Extracting submission responses ... ' + key)
          var short_key = key.replace(/^session_/, '');
          formData['response'][short_key] = formData['response'][key];
          delete formData['response'][key];
        } 
        else if (key.search(/^meetup_/) >= 0) {
          var val;
          if (key.search(/^meetup_date/) >= 0) {
            val = new Date(formData['response'][key]);
          }
          else {
            val = formData['response'][key];
          }
          var short_key = key.replace(/^meetup_/, '');
          formData['response'][short_key] = val;
          delete formData['response'][key];
        }
        else if (key.search(/^booth_/) >= 0) {
          var val;
          if (key.search(/^booth_reservation_dates/) >= 0) {
            val = [];
            for (var k = 0; k < formData['response'][key].length; k++) {
              val.push(new Date(formData['response'][key][k]));
            }
          }
          else {
            val = formData['response'][key];
          }
          var short_key = key.replace(/^booth_/, '');
          formData['response'][short_key] = val;
          delete formData['response'][key];
        }
        else if (key === 'i_and_all_other_secondary_participants_have_read_and_agree_with_the_devconf_cz_participation_agreement') {
          new_key = 'speaker_agreement_confirmed';
          formData['response'][new_key] = true;
          delete formData['response'][key];
        }
        else {
          delete formData['response'][key]; // Don't keep the useless 'transition' questions
        }
      }
      payload = {submission: formData['response'], profiles: formData['profiles'], meta: formData['meta']};
      updateData(submissionPath, payload);  // save the data to fb
      switch(formData['meta']['type']) {
        case 'proposal':
          mailSpeakers(payload);
          break;
        case 'booth':
          mailBoothOperators(payload);
          break;
        case 'meetup':
          mailMeetupOrganizers(payload);
          break;
        default:
          Logger.log('ERROR: invalid session type detected. ' + formData['meta']['type'])
      }
      Logger.log('FORM SAVE - SUCCESS');
    } else {
      Logger.log('No trigger event object found.')     
    }
  } 
  catch (error) {
    Logger.log('ERROR: ' + error.message)
  }
}

function mailSpeakers(payload) {
  Logger.log('Sending mail to SPEAKERS')
  // Send an email to each of the speakers with submitted data for confirmation
  var speakers = payload['profiles'];
  var response = payload['submission'];
  var meta = payload['meta'];
  var fname = speakers[0]['display_name'].split(' ')[0];
  subject = '[DevConf.cz 2018 | CfP] - Submission Summary: "' + response['title'] + '" (v' + meta['version'] + ')';
  html_body = '\
<body>\
<p>Hi ' + fname + ',</p>\n'
  if (meta['version'] === 1) {
    html_body += '<p>Nice work on submitting your proposal to DevConf.cz 2018! To summarize:</p>\n'
  }
  else {
    html_body += '<p>Just writing to let you know your proposal has been updated! To summarize:</p>\n'
  }
  html_body += '\
<ul><li><b>Title: </b><em>' + response['title'] + '</em></li>\n\
    <li><b>Primary Speaker: </b><em>"' + speakers[0]['display_name'] + '" &lt;' + speakers[0]['email'] + '&gt;</em></li>\n';
  if (!speakers[1]['display_name']) {
    html_body += '\
    <li><b>Additional Speakers: </b><em>None</em></li>\n';  
  }
  else {
    html_body += '\
    <li><b>Additional Speakers:</b><em>"' + speakers[1]['display_name'] + '" &lt;' + speakers[1]['email'] + '&gt;</em>';
  }
  if (speakers[2]['display_name']) {
    html_body += '\
    <em>, "' + speakers[2]['display_name'] + '" &lt;' + speakers[2]['email'] + '&gt;</em>\n';
  }
  html_body += '</li>\n\
    <li><b>Version: </b><em>' + meta['version'] + '</em></li>\n\
    <li><b>Type: </b><em>' + response['type'] + '</em></li>\n\
    <li><b>Difficulty: </b><em>' + response['difficulty'] + '</em></li>\n\
    <li><b>Duration: </b><em>' + response['duration'] + '</em></li>\n\
    <li><b>Themes: </b><em>' + response['themes'] + '</em></li>\n\
    <li><b>Abstract: </b><br/><em>' + response['abstract'].replace(/\n/g, '<br/>') + '</em></li>\n\
</ul>\n'
  html_body += generateFooter(meta);
  for (var speaker in speakers) {
    if (speakers[speaker]['email']) {
      sendMail(speakers[speaker]['email'], subject, html_body);
    }
    else {
      Logger.log(' ... invalid Speaker: ' + speakers[speaker]);
    }
  }
  sendMail('cward@redhat.com', '[COPY] - ' + subject, html_body);
}

function mailBoothOperators(payload) {
  Logger.log('Sending mail to BOOTH OPERATORS')
  var profiles = payload['profiles'];
  var response = payload['submission'];
  var meta = payload['meta'];
  var fname = profiles[0]['display_name'].split(' ')[0];
  subject = '[DevConf.cz 2018 | CfP] - Booth Request Summary: "' + response['title'] + '" (v' + meta['version'] + ')';
  html_body = '\
<body>\
<p>Hi ' + fname + ',</p>\n'
  if (meta['version'] === 1) {
    html_body += '<p>Nice work on submitting your request to run a booth at DevConf.cz 2018! To summarize:</p>\n'
  }
  else {
    html_body += '<p>Just writing to let you know your proposal has been updated! To summarize:</p>\n'
  }
  html_body += '\
<ul><li><b>Title: </b><em>' + response['title'] + '</em></li>\n\
    <li><b>Primary Contact: </b><em>"' + profiles[0]['display_name'] + '" &lt;' + profiles[0]['email'] + '&gt;</em></li>\n';
  if (profiles[1]['display_name']) {
    html_body += '\
    <li><b>Additional Contacts:</b><em>"' + profiles[1]['display_name'] + '" &lt;' + profiles[1]['email'] + '&gt;</em>';
    if (profiles[2]['display_name']) {
      html_body += '\
<em>, "' + profiles[2]['display_name'] + '" &lt;' + profiles[2]['email'] + '&gt;</em>\n';
    }
  }
  else {
    html_body += '\
    <li><b>Additional Contacts: </b><em>None</em></li>\n';  
  }
  html_body += '</li>\n\
    <li><b>Version: </b><em>' + meta['version'] + '</em></li>\n\
    <li><b>Description: </b><br/><em>' + response['description'] + '</em></li>\n\
    <li><b>Reservation Dates: </b><em>' + response['reservation_dates'] + '</em></li>\n\
    <li><b>Requirements: </b><em>' + response['requirements'].replace(/\n/g, '<br/>') + '</em></li>\n\
</ul>\n'
  html_body += generateFooter(meta);
  for (var profile in profiles) {
    if (profiles[profile]['email']) {
      sendMail(profiles[profile]['email'], subject, html_body);
    }
  }
  sendMail('cward@redhat.com', '[COPY] - ' + subject, html_body);
  sendMail('rblanco@redhat.com', '[COPY] - ' + subject, html_body);
}


function mailMeetupOrganizers(payload) {
  Logger.log('Sending mail to Meetup Organizers')
  var profiles = payload['profiles'];
  var response = payload['submission'];
  var meta = payload['meta'];
  var fname = profiles[0]['display_name'].split(' ')[0];
  subject = '[DevConf.cz 2018 | CfP] - Meetup Request Summary: "' + response['title'] + '" (v' + meta['version'] + ')';
  html_body = '\
<body>\
<p>Hi ' + fname + ',</p>\n'
  if (meta['version'] === 1) {
    html_body += '<p>Nice work on submitting your request to organize a meet-up at DevConf.cz 2018! To summarize:</p>\n'
  }
  else {
    html_body += '<p>Just writing to let you know your proposal has been updated! To summarize:</p>\n'
  }
  html_body += '\
<ul><li><b>Title: </b><em>' + response['title'] + '</em></li>\n\
    <li><b>Primary Contact: </b><em>"' + profiles[0]['display_name'] + '" &lt;' + profiles[0]['email'] + '&gt;</em></li>\n';
  if (profiles[1]['display_name']) {
    html_body += '\
    <li><b>Additional Contacts:</b><em>"' + profiles[1]['display_name'] + '" &lt;' + profiles[1]['email'] + '&gt;</em>';
    if (profiles[2]['display_name']) {
      html_body += '\
<em>, "' + profiles[2]['display_name'] + '" &lt;' + profiles[2]['email'] + '&gt;</em>\n';
    }
  }
  else {
    html_body += '\
    <li><b>Additional Contacts: </b><em>None</em></li>\n';  
  }
  html_body += '</li>\n\
    <li><b>Version: </b><em>' + meta['version'] + '</em></li>\n\
    <li><b>Description: </b><br/><em>' + response['description'] + '</em></li>\n\
    <li><b>Date: </b><em>' + response['date'] + '</em></li>\n\
    <li><b>Duration: </b><em>' + response['duration'] + '</em></li>\n\
    <li><b>Capacity: </b><em>' + response['capacity'] + '</em></li>\n\
    <li><b>Requirements: </b><em>' + response['requirements'].replace(/\n/g, '<br/>') + '</em></li>\n\
</ul>\n'
  html_body += generateFooter(meta);
  for (var profile in profiles) {
    if (profiles[profile]['email']) {
      sendMail(profiles[profile]['email'], subject, html_body);
    }
  }
  sendMail('cward@redhat.com', '[COPY] - ' + subject, html_body);
}

function sendMail(to, subject, bodyHtml) {
  Logger.log('Sending email to (' + to + ') ...'); 
  var mailgunURL="https://api.mailgun.net/v3/devconf.cz/messages";
  var mailgunAPI="key-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";     
  var params = {
    "from": 'info@devconf.cz <info@devconf.cz>',
    "replyto": 'info@devconf.cz <info@devconf.cz>',
    "to": to,
    "subject": subject,
    "html": bodyHtml
  }
  var options = {
    'method': 'post',
    'payload': params,
    'headers': {
         'Authorization': 'Basic ' + Utilities.base64Encode("api:" + mailgunAPI)
     }
  }    
  try {
     var response = JSON.parse(UrlFetchApp.fetch(mailgunURL, options));
     if (response && response["id"]) {
       Logger.log("... Send was successful");
     } else {
       Logger.log({msg: "... Send Failed", response: response});
     }    
  } catch (e) {
    Logger.log({msg: "... Oops, there was an error", response: e.message});
  }
}

function setData(path, data) {
  Logger.log('Setting data on Firebase at path: ' + path);
  return store.setData(path, data);
}

function updateData(path, data) {
  Logger.log('Updating data on Firebase at path: ' + path);
  return store.updateData(path, data);
}

function pushData(path, data) {
  Logger.log('Pushing data to Firebase at path: ' + path);
  return store.pushData(path, data);
}

function generateFooter(meta) {
  return '\
<p><u><b>Reminder: Important Dates</b></u></p>\
<ul>\
 <li><em>CfP closes:</em> November 17 , 2017</li>\
 <li><em>Accepted speakers confirmation:</em> December 1, 2017</li>\
 <li><em>Event dates:</em> Friday January 26 to Sunday January 28, 2018</li>\
 <li><em>Event Location:</em><a href="https://www.google.cz/maps/place/Faculty+of+Information+Technology,+Brno+University+of+Technology/@49.226616,16.5966401,15z/data=!4m2!3m1!1s0x0:0xbfcf161b01a48b0d?sa=X&ved=0ahUKEwj6ndTpm7vWAhVKblAKHXrUAmAQ_BIIfDAK">\
         Faculty of Information Technology, Brno University of Technology - Božetěchova 1, Brno, Czechia</a></li>\
</ul>\
<p><u><b>Additional information</u></b>\
<ul>\
<li>To make changes to your proposal (eg: update abstract, change primary speaker, etc), use the following link:<br/>\
    <a href = "' + meta['form_edit_url'] + '">' + meta['form_edit_url'] + '</a></li>\n\
<li>To submit a new proposal, use the following link:<br/>\n\
    <a href="http://bit.ly/devconfcz-2018-cfp">http://bit.ly/devconfcz-2018-cfp</a></li>\n\
</ul>\
<p>Questions, comments? <a href="mailto:info@devconf.cz">info@devconf.cz</a></p>\n\
<p>---- Chris and the DevConf.cz 2018 organizing team --</p>\n\
<p>Sign-up here to recieve Devconf.cz Announcements: <a href="http://bit.ly/devconfcz-announcements-signup">http://bit.ly/devconfcz-announcements-signup</a></p>\n\
<p>Sign-up here to recieve notifications about upcoming FLOSS community events around the world (one email per month): <a href="http://bit.ly/floss_events_monthly">http://bit.ly/floss_events_monthly</a></p>\n\
<p>----</p>\n\
<p><center><a href="https://devconf.cz">devconf.cz</a></center></p>\n\
</body>\
'
}
