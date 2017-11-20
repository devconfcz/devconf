import Vue from 'vue'
import Vuex from 'vuex'
import firebase from 'firebase'

Vue.use(Vuex)
Vue.use(firebase)

var firebaseApp = firebase.initializeApp({
  apiKey: 'AIzaSyCkqawqxYCd8qFKpykvEIevdsu44PKN5sU',
  authDomain: 'cward-cfpoint-devel.firebaseapp.com',
  databaseURL: 'https://cward-cfpoint-devel.firebaseio.com',
  projectId: 'cward-cfpoint-devel',
  storageBucket: 'cward-cfpoint-devel.appspot.com',
  messagingSenderId: '505843562851'
})
var db = firebaseApp.database()

export const store = new Vuex.Store({
  state: {
    _isLoading: true,
    _currentUser: { // FIXME: enable authentication ///////////////
      id: '3',
      email: 'cward@redhat.com'
    },
    formId: '1xrtWTn6mA-1zHvM6q8kRlPjoy0yLIAwOfjsv-nGhWPM',
    _submissions: {},
    _speakers: {},
    _comments: {},
    _voting: {},
    _unreviewed: {},
    _approved: {},
    _rejected: {}
  },
  getters: {
    isLoading (state) {
      return state._isLoading
    },
    currentUser: (state) => {
      return state._currentUser
    },
    submissions: (state) => {
      return Object.values(state._submissions)
    },
    unreviewed: (state) => {
      console.log('Loading data: unreviewed')
      return Object.values(state._unreviewed)
    },
    approved: (state) => {
      console.log('Loading data: approved')
      return Object.values(state._approved)
    },
    rejected: (state) => {
      console.log('Loading data: rejected')
      return Object.values(state._rejected)
    },
    submissionIds: (state) => {
      return Object.keys(state._submissions)
    },
    getSubmission: (state) => (submissionId) => {
      // console.log('getters.Getting Submission: ', submissionId)
      let submission = state._submissions[submissionId]
      return submission
    },
    getVoteCountPlus: (state) => (submissionId) => {
      try {
        return state._submissions[submissionId].meta.votes.results.vote_count_plus
      } catch (e) {
        return '-'
      }
    },
    getVoteCountMinus: (state) => (submissionId) => {
      try {
        return state._submissions[submissionId].meta.votes.results.vote_minus
      } catch (e) {
        return '-'
      }
    },
    getVoteTotal: (state) => (submissionId) => {
      try {
        return state._submissions[submissionId].meta.votes.results.vote_total
      } catch (e) {
        return '-'
      }
    },
    getSubmissionVoteCountPlus: (state) => (submissionId) => {
      // console.log('store.getters.getSubmissionVoteCountPlus: ', submissionId)
      return state._voting[submissionId].vote_count_plus
    },
    getSubmissionVoteCountMinus: (state) => (submissionId) => {
      // console.log('store.getters.getSubmissionVoteCountMinus: ', submissionId)
      return state._voting[submissionId].vote_count_minus
    },
    getSubmissionVoteTotal: (state) => (submissionId) => {
      // console.log('store.getters.getSubmissionVoteTotal: ', submissionId)
      return state._voting[submissionId].vote_total
    },
    getSubmissionSpeakers: (state) => (submissionId) => {
      // console.log('getters.getSubmissionSpeakers: ', submissionId)
      let speakersIds = state._submissions[submissionId]['speakers']
      let speakers = []
      for (var speakerId in speakersIds) {
        speakers.push(state._speakers[speakerId])
      }
      return speakers
    },
    getSpeaker: (state, getters) => (speakerId) => {
      // console.log('getters.getSpeaker: ', speakerId)
      let speaker = state._speakers[speakerId]
      return speaker
    },
    getSpeakers: (state, getters) => (speakersIds) => {
      let speakers = {}
      for (var speakerIdIndex in speakersIds) {
        let speakerId = speakersIds[speakerIdIndex]
        let speaker = state._speakers[speakerId]
        if (!speaker) {
          // console.warn('Empty speaker: ', speaker)
          continue
        }
        speakers[speaker.id] = speaker
      }
      return speakers
    },
    db: (state, getters) => {
      return db
    }
  },
  mutations: {  // triggered with "commit"
    toggleLoading (state) {
      state._isLoading = !state._isLoading
    },
    loadSpeaker (state, speaker) {
      state._speakers[speaker.id] = speaker
    },
    loadSubmission (state, submission) {
      console.log(`Loading submission (${submission.id})`)
      const uid = state._currentUser.id
      const sid = submission.id
      const votes = submission.meta.votes
      if (votes === undefined || votes.results === undefined) {
        console.log('No votes structure found ... using default')
        submission.meta.votes = {results: {uid: 0}}
        Vue.set(state._unreviewed, sid, submission)
      } else {
        const myVote = votes.results[uid]
        if (myVote === 1) {
          Vue.set(state._approved, sid, submission)
        } else if (myVote === 0) {
          Vue.set(state._unreviewed, sid, submission)
        } else if (myVote === -1) {
          Vue.set(state._rejected, sid, submission)
        } else {
          throw new Error(`Invalid vote value for currentUser (${uid})! Must be 1, 0 or -1 data (${myVote})`)
        }
      }
      console.log(`... loading submission (${submission.id}) complete.`)
    },
    updateSubmissions (state, submissions) {
      // console.log('mutations.updateSubmissions: ', submissions)
      state._submissions = submissions
    },
    updateSubmission (state, submission) {
      state._submissions[submission.id] = submission
    },
    updateSpeaker (state, speaker) {
      // console.log('mutations.updateSpeaker: ', speaker)
      Vue.set(state._speakers, speaker.id, speaker)
    },
    updateVoting (state, payload) {
      console.log('mutations.updateVoting: ', payload)
      Vue.set(state._voting, payload.submissionId, payload.voting)
    },
    incrementVoteCount (state, payload) {
      // console.log('store.mutations.incrementVoteCountPlus: ', submissionId)
      var submissionId = payload.submissionId
      var incrementValue = payload.incrementValue
      let path = '/voting/' + state.formId + '/' + submissionId
      console.log(submissionId)
      db.ref(path)
        .transaction(function (voting) {
          const uid = state._currentUser.id
          var previousVote = 0
          if (voting) {
            let newVote
            const previousVoteIx = voting.votes.findIndex(val => val.uid === uid)
            if (previousVoteIx >= 0) {
              previousVote = voting.votes[previousVoteIx].value
            } // else previousVote = 0 (default above)
            console.log(previousVote, '******')
            console.log(submissionId)
            if (incrementValue === 1 && previousVote !== 1) {
              newVote = {uid: uid, value: 1}
            } else if (incrementValue === -1 && previousVote !== -1) {
              newVote = {uid: uid, value: -1}
            } else {
              console.log('Nothing changed!')
              return voting
            }
            if (previousVoteIx === -1) {
              voting.votes.push(newVote)
            } else {
              voting.votes[previousVoteIx] = newVote
            }
            voting.vote_total = Object.values(voting.votes).reduce((a, b) => {
              return {value: a.value + b.value}
            }).value
            voting.vote_count_total = voting.votes.length
            voting.vote_count_plus = Object.values(voting.votes).filter(val => val.value === 1).length
            voting.vote_count_minus = Object.values(voting.votes).filter(val => val.value === -1).length
            console.log('((((', voting)
            Vue.set(state._voting, submissionId, voting)
            return voting
          } else {
            console.log('*********************************')
            if (incrementValue === 1) {
              return {
                vote_total: 1,
                vote_count_total: 1,
                vote_count_plus: 1,
                vote_count_minus: 0,
                votes: [{uid: uid, value: 1}]
              }
            } else {
              return {
                vote_total: -1,
                vote_count_total: 1,
                vote_count_plus: 0,
                vote_count_minus: 1,
                votes: [{uid: uid, value: -1}]
              }
            }
          }
        })
    }
  },
  actions: {
    toggleLoading ({ state, commit }) {
      commit('toggleLoading')
    },
    loadSubmissions ({ commit, state }, payload) {
      console.log(`Loading firebase submissions...(limit: ${payload.limit}, skip: ${payload.skip})`)
      if (!payload.limit) {
        payload.limit = 10
      }
      var promises = []
      db.ref('programs/' + state.formId + '/submissions/')
      .limitToFirst(payload.limit)
      .once('value', (snapshot) => {
        for (const submission of Object.values(snapshot.val())) {
          let speakers = Object.values(submission.meta.contacts)
          if (!speakers.length) {
            throw new Error(`... submission has no known speakers (${submission.id})`)
          }
          promises.push(commit('loadSubmission', submission))
        }
      })

      Promise.all(promises).then(() => {
        console.log('All submissions loaded!')
      })
    },
    tailFirebaseDatabaseSubmissions ({ commit, state }, payload) {
      return new Promise((resolve, reject) => {
        console.log('Tailing firebase submissions...')
        if (!payload.limit) {
          payload.limit = 10
        }
        db.ref('programs/' + state.formId + '/submissions/')
        .limitToFirst(payload.limit)
        .on('value', (snapshot) => {   // FIXME: /programs/.../submissions SHOULD NOT CHANGE; use ONCE?
          let promises = []
          let submissions = snapshot.val()
          // console.log('... Updating submissions: ', submissions)
          promises.push(commit('updateSubmissions', submissions))
          // console.log('... Getting Speaker data ...', submissions)
          // Get the speaker data
          for (let submission of Object.values(submissions)) {
            let speakers = Object.values(submission.meta.contacts)
            if (!speakers) {
              console.warn('... submission has no known speakers')
              continue
            }
            for (let speaker of speakers) {
              // console.log('... Speaker Id: ', speaker.id)
              db.ref('programs/' + state.formId + '/speakers/' + speaker.id).on('value', (snapshot) => {
                let speaker = snapshot.val()
                // console.log('... ... Speaker: ', speaker)
                promises.push(commit('updateSpeaker', speaker))
              })
            }
            // cache submission voting
            promises.push(db.ref('voting/' + state.formId + '/' + submission.id).on('value', (snapshot) => {
              let voting = snapshot.val()
              if (voting === null) {
                voting = {
                  vote_total: 0,
                  vote_count_total: 0,
                  vote_count_plus: 0,
                  vote_count_minus: 0,
                  votes: []
                }
              }
              return commit('updateVoting', {submissionId: submission.id, voting: voting})
            }))
          }
          Promise.all(promises).then(() => {
            console.log('All Firebase data initialization promises resolved')
            resolve()
          })
        })
      })
    },
    incrementVoteCount ({ commit }, payload) {
      commit('incrementVoteCount', payload)
    },
    submissionVote ({ commit, state }, payload) {
      // console.log('store.actions.submissionVotePlus: ', submissionId)
      commit('incrementVoteCount', payload)
    },
    getFirebaseDatabaseVoting ({ commit, state }, submissionId) {
      return new Promise((resolve, reject) => {
        db.ref('/voting/' + state.formId + '/' + submissionId).on('value', (snapshot) => {
          console.log(`store.actions.getFirebaseDatabaseVoting (${submissionId})`)
          const blankVote = {
            vote_total: 0,
            vote_count_total: 0,
            vote_count_plus: 0,
            vote_count_minus: 0,
            votes: []
          }
          let votes = snapshot.val() || blankVote
          // FIXME: this updates the entire _voting tree, which triggers ALL submissions to recalculate
          Vue.set(state._voting, submissionId, votes)
          console.log(`... getFirebaseDatabaseVoting (${submissionId}):  DONE.`)
          resolve(votes)
        })
      })
    }
  }
})
