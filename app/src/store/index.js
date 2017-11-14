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
    _currentUser: 'no@body.com',
    _submissions: {},
    _speakers: {},
    _comments: {},
    _votes: {}
  },
  getters: {
    currentUser: (state) => {
      return state._currentUser
    },
    tailSubmissions: (state) => (payload) => {
      // console.log('getters.tailSubmissions')
      if (!payload.skip) {
        payload.skip = 0
      }
      let submissions = Object.values(state._submissions)
      submissions = submissions.slice(payload.skip, payload.limit)
      return submissions
    },
    unreviewedSubmissions: (state) => {
      console.log('store.getters.unreviewedSubmissions')
      // FIXME: lookup
      return submissions
    },
    getSubmission: (state) => (submissionId) => {
      // console.log('getters.Getting Submission: ', submissionId)
      let submission = state._submissions[submissionId]
      return submission
    },
    getSubmissionComments: (state) => (submissionId) => {
      console.log('store.getters.getSubmissionComments: ', submissionId)
      let submissionComments = state._comments[submissionId] || []
      return submissionComments
    },
    getSubmissionVoteCountPlus: (state) => (submissionId) => {
      console.log('store.getters.getSubmissionVoteCountPlus: ', submissionId)
      let submissionVotes = state._votes[submissionId]
      console.log(state._votes)
      let voteCount = 0
      if (submissionVotes) {
        voteCount = submissionVotes['vote_count_plus']
      }
      console.log('... voteCount: ', voteCount)
      return voteCount
    },
    getSubmissionVoteCountMinus: (state) => (submissionId) => {
      console.log('store.getters.getSubmissionVoteCountMinus: ', submissionId)
      let voteCount = (state._votes[submissionId] || {})['vote_count_minus'] || 0
      console.log('... voteCount: ', voteCount)
      return voteCount
    },
    getSubmissionVotes: (state) => (submissionId) => {
      console.console.log('store.getters.getSubmissionVotes: ', submissionId)
      let votes = state._votes || []
      console.log('... votes: ', votes)
      return votes
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
  mutations: {
    updateSubmissions (state, submissions) {
      // console.log('mutations.updateSubmissions: ', submissions)
      state._submissions = submissions
    },
    updateSpeaker (state, speaker) {
      // console.log('mutations.updateSpeaker: ', speaker)
      Vue.set(state._speakers, speaker.id, speaker)
    },
    incrementVoteCountPlus (state, submissionId) {
      console.log('store.mutations.incrementVoteCountPlus: ', submissionId)
      let path = '/votes/' + submissionId + '/vote_count_plus'
      db.ref(path).transaction(function (voteCount) {
        voteCount = voteCount || 0
        db.ref(path).set(voteCount + 1)
        Vue.set(state._votes[submissionId], 'voteCountPlus', voteCount)
      })
    },
    incrementVoteCountMinus (state, submissionId) {
      console.log('store.mutations.incrementVoteCountMinus: ', submissionId)
      let path = '/votes/' + submissionId + '/vote_count_minus'
      db.ref(path).transaction(function (voteCount) {
        voteCount = voteCount || 0
        db.ref(path).set(voteCount + 1)
        Vue.set(state._votes[submissionId], 'voteCountMinus', voteCount)
      })
    }
  },
  actions: {
    tailFirebaseDatabaseSubmissions ({ commit }, payload) {
      if (!payload.limit) {
        payload.limit = 10
      }
      db.ref('/submissions/' + payload.dbRefPathForm)
      .limitToFirst(payload.limit)
      .on('value', (snapshot) => {
        let submissions = snapshot.val()
        // console.log('... Updating submissions: ', submissions)
        commit('updateSubmissions', submissions)
        // Get the speaker data
        for (var submissionIdIndex in submissions) {
          let speakersIds = submissions[submissionIdIndex].speakers
          // console.log('... Getting Speakers: ', speakersIds)
          if (!speakersIds) {
            console.warn('... submission has no known speakers')
            continue
          }
          for (var speakerIdIndex in speakersIds) {
            let speakerId = submissions[submissionIdIndex].speakers[speakerIdIndex]
            // console.log('... Speaker Id: ', speakerId)
            db.ref('/speakers/' + speakerId).on('value', (snapshot) => {
              let speaker = snapshot.val()
              // console.log('... ... Speaker: ', speaker)
              commit('updateSpeaker', speaker)
            })
          }
        }
      })
    },
    submissionVotePlus ({ commit, state }, submissionId) {
      console.log('store.actions.submissionVotePlus: ', submissionId)
      db.ref('/votes/' + submissionId + '/vote_count_plus')
      .transaction(function (voteCount) {
        commit('incrementVoteCountPlus', submissionId)
      })
    },
    submissionVoteMinus ({ commit, state }, submissionId) {
      console.log('store.actions.submissionVoteMinus: ', submissionId)
      db.ref('/votes/' + submissionId + '/vote_count_minus')
      .transaction(function (voteCount) {
        commit('incrementVoteCountMinus', submissionId)
      })
    },
    getFirebaseDatabaseVoting ({ commit, state }, submissionId) {
      console.log('store.actions.getFirebaseDatabaseVoting: ', submissionId)
      db.ref('/votes/' + submissionId).on('value', (snapshot) => {
        let voteCount = snapshot.val() || {'vote_count_plus': 0, 'vote_count_minus': 0}
        console.log('... voteCountPlus: ', submissionId, voteCount)
        Vue.set(state._votes, submissionId, voteCount)
      })
    },
    getFirebaseDatabaseSubmissionComments ({ commit, state }, submissionId) {
      console.log('store.actions.getFirebaseDatabaseSubmissionComments: ', submissionId)
      db.ref('/comments/' + submissionId).on('value', (snapshot) => {
        let comments = snapshot.val() || {}
        console.log('... comments: ', comments)
        Vue.set(state._comments, submissionId, comments)
      })
    }
  }
})
