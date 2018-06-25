import Vue from 'vue'
import Vuex from 'vuex'
import firebase from 'firebase'

Vue.use(Vuex)
Vue.use(firebase)

const DEBUG = {
  limitToFirst: 10,
  domainRestriction: 'redhat.com',
  config: {
    site: {
      // title: 'QEcamp.18 Main Event'
      title: 'DevConf.cz Main Event'
    }
  }
}

const FIREBASE_CONFIG_DEVEL = {
  // FIXME: load dynamically, depending if debug is set or not
  apiKey: 'AIzaSyCkqawqxYCd8qFKpykvEIevdsu44PKN5sU', // devel
  // DO NOT CHANGE THIS in 'PRODUCTION' BEFORE VOTING ENDS!
  // devel is prod for devconf 2018 voting... whoops!
  authDomain: 'cward-cfpoint-devel.firebaseapp.com',
  databaseURL: 'https://cward-cfpoint-devel.firebaseio.com',
  projectId: 'cward-cfpoint-devel',
  storageBucket: 'cward-cfpoint-devel.appspot.com',
  messagingSenderId: '505843562851'
}

const firebaseConfig = FIREBASE_CONFIG_DEVEL
var firebaseApp = firebase.initializeApp(firebaseConfig)

var db = firebaseApp.database()
var storage = firebase.storage()

export const store = new Vuex.Store({
  state: {
    site: {
      title: DEBUG.config.site.title,
      style: {}, // navbarColor: 'red'
      links: [
        {
          id: 'cfp_reviews',
          title: 'CfP Reviews',
          icon: 'rate_review',
          class: 'purple--text'
        },
        {
          id: 'cfp_program_submissions_browser',
          title: 'CfP Program Submissions',
          icon: 'queue',
          class: 'blue--text'
        }
      ],
      events: {
        '1xrtWTn6mA-1zHvM6q8kRlPjoy0yLIAwOfjsv-nGhWPM__1': {
          id: '1xrtWTn6mA-1zHvM6q8kRlPjoy0yLIAwOfjsv-nGhWPM__1',
          version: 2,
          display_name: 'DevConf.CZ \'18 Main Event',
          location: {
            country: 'Czechia',
            city: 'Brno',
            street_address: 'Address of FIT HERE',
            remote: 'https://youtube.com/STREAM_URL_HERE'
          },
          meta: {},
          program: {
            slots: [
              /*
                This needs to be specified some how
                48 of these, if each slot is 30 minutes
              {
                id: SUBMISSION_ID,
                duration: '00:30:00',

              },

              */
            ]
          }
        },
        '1v7r4ZgaJl97t751UnCKPPuk2SDRugsIjesBedmtSYhA__1': {
          id: '1v7r4ZgaJl97t751UnCKPPuk2SDRugsIjesBedmtSYhA__1',
          version: 1,
          display_name: 'QEcamp.18 Main Event',
          location: {
            country: 'Czechia',
            city: 'Brno',
            street_address: 'Purkynova 111 / TPB-B',
            remote: 'https://bluejeans.com/URL_HERE_FIXME'
          },
          program: {
            meta: {},
            slots: [
              /*

              {
                id: SUBMISSION_ID,
                duration: '01:00:00',
              }
              */
            ]
          }
        }
      }
    },
    _debug: DEBUG,
    _bus: new Vue(),
    _pageDisplayed: null,
    _eventDisplayed: null, //
    _isLoading: true,
    _isLoginError: false,
    _isWorking: false,
    _currentUser: null,
    _domainRestriction: DEBUG['domain_restriction'],
    _submissions: [],
    _unreviewed: [],
    _approved: [],
    _rejected: [],
    _disabled: [],
    _votes: {},
    _themes: [],
    _themesFilter: [],
    _tracks: [],
    _tracksFilter: [],
    _bucketSubmissionMap: {}
  },
  getters: {
    pageDisplayed (state) {
      let pageDisplayed = state._pageDisplayed || state.site.links[0]
      return pageDisplayed
    },
    eventDisplayed (state) {
      console.log('getters.eventDisplayed')
      let eventDisplayed = state._eventDisplayed
      console.log(eventDisplayed, '___________________')
      // || Object.values(state.site.events)[0]
      return eventDisplayed
    },
    site (state) {
      return state.site
    },
    findBucket: (state, getters) => (submissionId) => {
      if (!state._bucketSubmissionMap[submissionId]) {
        return
      }
      return getters[state._bucketSubmissionMap[submissionId]]
    },
    getVoted: (state) => (submissionId) => {
      let votes = state._votes[submissionId]
      let uid = state._currentUser.id
      if (votes !== undefined && votes !== null) {
        return votes.results[uid] || 0
      }
      return 0
    },
    themes (state) {
      return state._themes.sort()
    },
    themesFilter (state) {
      return state._themesFilter.sort()
    },
    tracks (state) {
      return state._tracks.sort()
    },
    tracksFilter (state) {
      return state._tracksFilter
    },
    submissions (state) {
      // console.log('Loading data: all submissions')
      // return state._submissions
      let submissions = state._submissions
      let themesFilter = new Set(state._themesFilter)
      return submissions.filter(val =>
        (val.themes.filter(theme =>
          themesFilter.has(theme)
        ).length > 0)
      )
    },
    unreviewed (state) {
      // console.log('Loading data: unreviewed')
      let submissions = state._submissions
      return submissions.filter(val =>
        state._unreviewed.indexOf(val.id) > -1
      )
    },
    approved (state) {
      // console.log('Loading data: approved')
      return state._submissions.filter(val =>
        state._approved.indexOf(val.id) > -1
      )
    },
    rejected (state) {
      // console.log('Loading data: rejected')
      let submissions = state._submissions
      let themesFilter = new Set(state._themesFilter)
      return submissions.filter(val =>
        (val.themes.filter(theme =>
          themesFilter.has(theme)
        ).length > 0) &&
          (state._rejected.indexOf(val.id) > -1)
      )
    },
    getVoteCount: (state) => (submissionId) => {
      // console.log(`getters.getVoteCount`) // : ${submissionId}`)
      try {
        return state._votes[submissionId].vote_count_plus
      } catch (e) {
        return 0
      }
    },
    getVoteCountPlus: (state) => (submissionId) => {
      try {
        return state._votes[submissionId].vote_count_plus
      } catch (e) {
        return 0
      }
    },
    getVoteCountMinus: (state) => (submissionId) => {
      try {
        return state._votes[submissionId].vote_count_minus
      } catch (e) {
        return 0
      }
    },
    getVoteTotal: (state) => (submissionId) => {
      try {
        return state._votes[submissionId].vote_total
      } catch (e) {
        return 0
      }
    },
    getSubmission: (state) => (submissionId) => {
      // console.log(`getters.getSubmission: ${submissionId}`)
      let defaultSubmission = {
        id: null,
        type: '',
        abstract: '',
        duration: '',
        difficulty: '',
        themes: [],
        meta: {
          contacts: {}
        }
      }
      let submissions = state._submissions.filter(s => s.id === submissionId)
      let submission
      if (submissions.length > 0) {
        submission = submissions[0]
      } else {
        submission = defaultSubmission
      }
      return submission
    },
    getIsWorking: (state) => {
      return state._isWorking
    },
    getBus: (state) => {
      return state._bus
    },
    isLoggedIn (state) {
      if (state._currentUser === undefined || state._currentUser === null) {
        return false
      }
      return true
    },
    isLoading (state) {
      return state._isLoading
    },
    isLoginError (state) {
      return state._isLoginError
    },
    currentUser (state) {
      return state._currentUser
    },
    db (state) {
      return db
    },
    storage (state) {
      return storage
    },
    debug (state) {
      return (state._debug !== undefined)
    }
  },
  mutations: { // triggered with 'commit' and MUST BE SYNCHRONOUS
    resetThemesFilter (state) {
      console.log('mutations.resetThemesFilter')
      state._themesFilter = []
    },
    refreshThemesFilter (state) {
      console.log('mutation.refreshThemesFilter')
      state._themesFilter = state._themes
    },
    changePage (state, to) {
      // FIXME: check it is a valid page
      console.log('mutations.changePage', to)
      state._pageDisplayed = to
    },
    changeEvent (state, to) {
      // FIXME: check it is a valid page
      console.log('mutations.changeEvent ', to)
      state._eventDisplayed = to
    },
    updateThemesFilter (state, value) {
      console.log('mutations.updateThemesFilter', value)
      state._themesFilter = value
    },
    loadQueue (state, submissions) {
      // console.log('mutations.loadQueue')
      let themes = {}
      for (let submission of submissions) {
        for (let theme of submission.themes) {
          themes[theme] = true
        }
      }
      themes = Object.keys(themes)
      state._themes = themes
      if (state._themesFilter.length === 0) {
        // set one once
        state._themesFilter = themes.slice() // get a copy
      }
      state._submissions = submissions
    },
    refreshSubmissionStatus (state) {
      if (!state._currentUser) {
        // console.log('not logged in!')
        state._unreviewed = []
        state._approved = []
        state._rejected = []
        // state._isLoading = false
        return
      }
      let uid = state._currentUser.id
      let unreviewed = []
      let approved = []
      let rejected = []
      for (let submission of state._submissions) {
        let sid = submission.id
        // Track which bucket the submission is in
        let votes = submission.meta.votes
        if (votes === undefined) {
          // console.log('No votes structure found ... using default')
          votes = {
            vote_total: 0,
            vote_count_total: 0,
            vote_count_plus: 0,
            vote_count_minus: 0,
            results: {[uid]: 0}
          }
          Vue.set(state._votes, sid, votes)
          state._bucketSubmissionMap[sid] = 'unreviewed'
          unreviewed.push(sid)
        } else {
          Vue.set(state._votes, sid, votes)
          if (!votes.results) {
            votes.results = {}
          }
          const myVote = votes.results[uid] || 0
          if (myVote === 1) {
            approved.push(sid)
            state._bucketSubmissionMap[sid] = 'approved'
          } else if (myVote === 0) {
            unreviewed.push(sid)
            state._bucketSubmissionMap[sid] = 'unreviewed'
          } else if (myVote === -1) {
            rejected.push(sid)
            state._bucketSubmissionMap[sid] = 'rejected'
          } else {
            throw new Error(`Invalid vote value for currentUser (${uid})! Must be 1, 0 or -1 data (${myVote})`)
          }
        }
        state._unreviewed = unreviewed
        state._approved = approved
        state._rejected = rejected
      }
    },
    incrementVoteCount (state, payload) {
      // console.log(`store.mutations.incrementVoteCountPlus: ${payload.submissionId}' ${payload.incrementValue}'`)
      var submissionId = payload.submissionId
      var incrementValue = payload.value
      // FIXME: check incrementValue ...
      let path = '/programs/' + state._eventDisplayed.id + '/submissions/' + submissionId + '/meta/votes'
      return db.ref(path)
        .transaction(function (votes) {
          const uid = state._currentUser.id
          if (votes === undefined || votes === null) {
            // console.log('No voting data found, creating it now.')
            if (incrementValue === 1) {
              votes = {
                vote_total: 1,
                vote_count_total: 1,
                vote_count_plus: 1,
                vote_count_minus: 0,
                results: {[uid]: 1}
              }
            } else if (incrementValue === 0) {
              votes = {
                vote_total: 0,
                vote_count_total: 0,
                vote_count_plus: 0,
                vote_count_minus: 0,
                results: {[uid]: 0}
              }
            } else {
              votes = {
                vote_total: -1,
                vote_count_total: 1,
                vote_count_plus: 0,
                vote_count_minus: 1,
                results: {[uid]: -1}
              }
            }
          } else {
            votes.results[uid] = incrementValue
            votes.vote_total = Object.values(votes.results).reduce((a, b) => {
              return a + b
            })
            votes.vote_count_total = Object.keys(votes.results).length
            votes.vote_count_plus = Object.values(votes.results).filter(val => val === 1).length
            votes.vote_count_minus = Object.values(votes.results).filter(val => val === -1).length
          }
          Vue.set(state._votes, submissionId, votes)
          let result = votes
          return result // transaction requires a return value!
        })
    },
    toggleIsWorking (state, value) {
      // console.log(`... going to be loading something? => ${value}`)
      state._isWorking = value
    },
    toggleLoading (state, bool) {
      state._isLoading = bool
    },
    loginFailed (state) {
      state._isLoginError = true
    },
    logOutCurrentUser (state) {
      // console.log('Logged out user!')
      state._currentUser = null
      state._isLoading = false
    },
    updateCurrentUser (state, user) {
      state._currentUser = user // FIXME: this brings in a lot of unwanted properties from firebase auth
      state._isLoginError = false
    }
  },
  actions: {
    changePage ({ state, commit }, to) {
      commit('changePage', to)
    },
    changeEvent ({ state, commit, dispatch }, to) {
      console.log('actions.changeEvent', to)
      commit('changeEvent', to)
      dispatch('loadSubmissions')
    },
    setVoted ({ state, commit, dispatch }, payload) {
      // console.log(`actions.setVoted`)
      commit('incrementVoteCount', payload)
      dispatch('loadSubmissions')
      // console.log('... actions.setVoted: COMPLETE')
    },
    incrementVoteCount ({ commit }, payload) {
      // console.log(`actions.incrementVoteCount`)
      commit('incrementVoteCount', payload)
      // console.log('... Done')
    },
    updateThemesFilter ({ commit }, value) {
      // console.log('actions.updateThemesFilter')
      commit('updateThemesFilter', value)
    },
    refreshThemesFilter ({ commit }) {
      commit('refreshThemesFilter')
    },
    resetThemesFilter ({ commit }) {
      commit('resetThemesFilter')
    },
    loadSubmissions ({ commit, state, getters }) {
      console.log('actions.loadSubmissions')
      return new Promise((resolve, reject) => {
        const event = getters.eventDisplayed
        console.log('programs/' + event.id + '/submissions/')
        if (state._debug === undefined || state._debug === null) {
          db.ref('programs/' + event.id + '/submissions/')
            .orderByChild('id')
            .once('value', (snapshot) => {
              let submissions = Object.values(snapshot.val())
              commit('resetThemesFilter')
              commit('loadQueue', submissions)
              commit('refreshSubmissionStatus')
            }).then(() => {
              commit('toggleIsWorking', false)
              console.log('... submissions loaded.')
            })
        } else {
          db.ref('programs/' + event.id + '/submissions/')
            .orderByChild('id')
            .limitToFirst(state._debug.limitToFirst)
            .once('value', (snapshot) => {
            // console.('... submissions loaded')
              let submissions = Object.values(snapshot.val())
              commit('resetThemesFilter')
              commit('loadQueue', submissions)
              commit('refreshSubmissionStatus')
            }).then(() => {
              commit('toggleIsWorking', false)
              console.log('... submissions loaded.')
            })
        }
      })
    },
    refreshSubmissionStatus ({ commit }) {
      // console.log('actions.refreshSubmissionStatus')
      commit('refreshSubmissionStatus')
      commit('toggleIsWorking', false)
    },
    toggleIsWorking ({ commit }, value) {
      commit('toggleIsWorking', value)
    },
    toggleLoading ({ state, commit }, bool) {
      commit('toggleLoading', bool)
    },
    logInPopup ({ state, commit }) {
      // console.log('actions.logInPopup')
      var provider = new firebase.auth.GoogleAuthProvider()
      provider.setCustomParameters({
        prompt: 'select_account'
      })
      firebase.auth().signInWithPopup(provider)
    },
    logOut ({ state, commit }) {
      // console.('actions.signOut')
      firebase.auth().signOut()
    },
    initAuth ({ state, commit, dispatch }) {
      // console.('actions.initAuth')
      commit('toggleLoading', true)
      commit('toggleIsWorking', true)
      firebase.auth().onAuthStateChanged(function (user) {
        if (user) {
          // User is signed in.
          user.id = user.uid
          // console.(`User logged in: ${user.email}`)
          user.domain = user.email.split('@')[1]
          if (state._domainRestriction && state._domainRestriction !== user.domain) {
            commit('loginFailed')
            dispatch('logOut')
            commit('toggleLoading', false)
            commit('toggleIsWorking', false)
            throw new Error('Sorry, you are not able to access this site right now')
          }
          commit('updateCurrentUser', user)
          dispatch('loadSubmissions')
          commit('toggleLoading', false)
        } else {
          commit('toggleLoading', false)
          commit('toggleIsWorking', false)
          commit('logOutCurrentUser')
        }
      }, (error) => {
        console.log(`ERROR: ${error}`)
        commit('toggleLoading', false)
        commit('toggleIsWorking', false)
        commit('loginFailed')
        throw new Error(error)
      })
    }
  }
})
