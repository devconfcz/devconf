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
var storage = firebase.storage()

export const store = new Vuex.Store({
  state: {
    // formId: '1xrtWTn6mA-1zHvM6q8kRlPjoy0yLIAwOfjsv-nGhWPM', // FIXME: Shouldn't be hardcoded
    formId: '1xrtWTn6mA-1zHvM6q8kRlPjoy0yLIAwOfjsv-nGhWPM__1',
    _debug: {
      limitToFirst: 500
    },
    _bus: new Vue(),
    _isLoading: true,
    _isLoginError: false,
    _currentUser: null,
    _domainRestriction: 'redhat.com',
    _submissions: [],
    _unreviewed: [],
    _approved: [],
    _rejected: [],
    _votes: {},
    _voted: {},
    _themes: [],
    _themesFilter: [],
    _favorited: {},
    _favoritedFilter: [],
    _details: {},
    _detailsActive: false
  },
  getters: {
    getBus: (state) => {
      return state._bus
    },
    getDetails: (state) => (submissionId) => {
      return state._details
    },
    getDetailsActive: (state) => {
      return state._detailsActive
    },
    getFavorited: (state) => (submissionId) => {
      // console.log(`getters.getFavorited:`) // ${submissionId}`)
      if (!(state._favorited[submissionId])) return
      return state._favorited[submissionId].results[state._currentUser.id] || 0
    },
    getFavoritedFilter: (state) => {
      return state._favoritedFilter
    },
    getVoted: (state) => (submissionId) => {
      return state._voted[submissionId] || 0
    },
    debug (state) {
      return (state._debug !== undefined)
    },
    themes (state) {
      return state._themes.sort()
    },
    themesFilter (state) {
      return state._themesFilter.sort()
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
    submissions (state) {
      // console.log('Loading data: all submissions')
      return state._submissions.sort((a, b) => a.type > b.type)
    },
    workshops (state) {
      return state._submissions.filter(s => s.type === 'Workshop')
    },
    presentations (state) {
      return state._submissions.filter(s => s.type === 'Presentation')
    },
    discussions (state) {
      return state._submissions.filter(s => s.type === 'Discussion')
    },
    unreviewed (state) {
      // console.log('Loading data: unreviewed')
      let submissions = state._submissions
      let themesFilter = new Set(state._themesFilter)
      return submissions.filter(val =>
          (val.themes.filter(theme =>
            themesFilter.has(theme)
          ).length > 0) &&
          (state._unreviewed.indexOf(val.id) > -1)
        )
    },
    approved (state) {
      // console.log('Loading data: approved')
      let themesFilter = new Set(state._themesFilter)
      return state._submissions.filter(val =>
          (val.themes.filter(theme =>
            themesFilter.has(theme)
          ).length > 0) &&
          (state._approved.indexOf(val.id) > -1)
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
        type: '',
        abstract: '',
        duration: '',
        difficulty: '',
        themes: []
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
    db (state) {
      return db
    },
    storage (state) {
      return storage
    }
  },
  mutations: {  // triggered with "commit" and MUST BE SYNCHRONOUS
    setDetails (state, submissionId) {
      console.log('mutation.setDetails')
      let submissions = state._submissions.filter(s => s.id === submissionId)
      if (submissions.length > 0) {
        let submission = submissions[0]
        state._details = submission
      }
    },
    showDetails (state) {
      state._detailsActive = true
    },
    closeDetails (state) {
      state._detailsActive = false
    },
    setFavorited (state, payload) {
      Vue.set(state._favorited, payload.submissionId, payload.value)
    },
    incrementFavoriteCount (state, payload) {
      // console.log(`mutations.incrementFavoriteCount: ${Object.values(payload)}`)
      let path = '/programs/' + state.formId + '/submissions/' + payload.submissionId + '/meta/favorited'
      return db.ref(path)
        .transaction(function (favorited) {
          const uid = state._currentUser.id
          if (favorited === undefined || favorited === null) {
            // console.log('No voting data found, creating it now.')
            if (payload.value === 0) {
              favorited = {
                total: 0,
                count_total: 0,
                results: {[uid]: 0
                }
              }
            } else {
              favorited = {
                total: payload.value,
                count_total: payload.value,
                results: {[uid]: payload.value}
              }
            }
          } else {
            // console.log('Voting data found. Updating.')
            favorited.results[uid] = payload.value
            favorited.total = Object.values(favorited.results).reduce((a, b) => {
              return a + b
            })
            favorited.count_total = Object.keys(favorited.results).length
          }
          Vue.set(state._favorited, payload.submissionId, favorited)
          let result = favorited
          return result // transaction requires a return value!
        })
    },
    setVoted (state, payload) {
      // console.log(`mutations.setVoted`)
      Vue.set(state._voted, payload.submissionId, payload.value)
    },
    incrementVoteCount (state, payload) {
      // console.log(`store.mutations.incrementVoteCountPlus: ${payload.submissionId}' ${payload.incrementValue}'`)
      var submissionId = payload.submissionId
      var incrementValue = payload.value
      // FIXME: check incrementValue ...
      let path = '/programs/' + state.formId + '/submissions/' + submissionId + '/meta/votes'
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
    },
    toggleLoading (state, bool) {
      state._isLoading = bool
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
      state._themesFilter = themes.slice() // get a copy
      state._submissions = submissions
    },
    loadSubmission (state, submission) {
      // console.log(`Loading submission (${submission.id})`)
      const sid = submission.id
      Vue.set(state._submissions, sid, submission)
      // console.log(`... loading submission (${submission.id}) complete.`)
    },
    refreshSubmissionStatus (state) {
      // state._isLoading = true
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
          Vue.set(state._votes, sid, votes)  // FIXME: can this be done more lazily?
          unreviewed.push(sid)
        } else {
          Vue.set(state._votes, sid, votes)
          const myVote = votes.results[uid] || 0
          if (myVote === 1) {
            approved.push(sid)
          } else if (myVote === 0) {
            unreviewed.push(sid)
          } else if (myVote === -1) {
            rejected.push(sid)
          } else {
            throw new Error(`Invalid vote value for currentUser (${uid})! Must be 1, 0 or -1 data (${myVote})`)
          }
        }

        let favorited = submission.meta.favorited
        if (favorited === undefined) {
          favorited = {
            total: 0,
            count_total: 0,
            results: {[uid]: 0}
          }
          Vue.set(state._favorited, sid, favorited)
        }

        state._unreviewed = unreviewed
        state._approved = approved
        state._rejected = rejected
        // state._isLoading = false
      }
    },
    setVoteCount (state, payload) {  // FIXME: This is not used? Obsolete?
      // console.log('store.mutations.setVoteCount: ', submissionId)
      var submissionId = payload.submissionId
      var newValue = payload.value
      let path = '/programs/' + state.formId + '/submissions/' + submissionId + '/meta/votes'
      return db.ref(path)
      .transaction(function (votes) {
        const uid = state._currentUser.id
        if (votes !== undefined && votes !== null) {
          votes.results[uid] = newValue
          votes.vote_total = Object.values(votes.results).reduce((a, b) => {
            return a + b
          })
          votes.vote_count_total = Object.keys(votes.results).length
          votes.vote_count_plus = Object.values(votes.results).filter(val => val === 1).length
          votes.vote_count_minus = Object.values(votes.results).filter(val => val === -1).length
        } else {
          // console.log('No voting data found, creating it now.')
          votes = {
            vote_total: newValue,
            vote_count_total: newValue,
            results: {[uid]: newValue}
          }
          if (newValue === 0) {
            votes.vote_count_plus = 0
            votes.vote_count_minus = 0
          } else if (newValue > 0) {
            votes.vote_count_plus = newValue
            votes.vote_count_minus = 0
          } else {
            votes.vote_count_plus = 0
            votes.vote_count_minus = -1 * newValue
          }
        }
      })
    },
    updateFavoritedFilter (state, value) {
      state._favoritedFilter = value
    },
    updateThemesFilter (state, value) {
      state._themesFilter = value
    },
    updateSubmissionBucket (state, payload) {
      let submissionId = payload.submissionId
      let bucketName = payload.bucketName
      let incrementValue = payload.incrementValue
      let ix = state['_' + bucketName].indexOf(submissionId)
      // remove from existing bucket
      state['_' + bucketName].splice(ix, 1)
      // add to new bucket
      if (incrementValue === 1) {
        state['_approved'].push(submissionId)
      } else if (incrementValue === -1) {
        state['_rejected'].push(submissionId)
      } else {
        throw new Error(`Unexpected increment value (${incrementValue})!`)
      }
    }
  },
  actions: {
    setDetails ({ commit }, submissionId) {
      // console.log('actions.showDetails')
      commit('setDetails', submissionId)
    },
    showDetails ({ commit }, submissionId) {
      // console.log('actions.showDetails')
      commit('showDetails')
    },
    closeDetails ({ commit }) {
      // console.log('actions.closeDetails')
      commit('closeDetails')
    },
    setFavorited ({ commit }, payload) {
      commit('setFavorited', payload)
      commit('incrementFavoriteCount', payload)
    },
    setVoted ({ state, commit }, payload) {
      // console.log(`actions.setVoted: ${Object.values(payload)}`)
      commit('setVoted', payload)
      commit('incrementVoteCount', payload)
      commit('refreshSubmissionStatus')
      // console.log('... actions.setVoted: COMPLETE')
    },
    incrementVoteCount ({ commit }, payload) {
      // console.log(`actions.incrementVoteCount`)
      commit('incrementVoteCount', payload) // IS IT TRUE? That commit() returns only ever undefined?
      // console.log('... Done')
    },
    updateThemesFilter ({ commit }, value) {
      // console.log('actions.updateThemesFilter')
      commit('updateThemesFilter', value)
    },
    updateFavoritedFilter ({ commit }, value) {
      commit('updateFavoritedFilter', value)
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
            throw new Error('Sorry, you are not able to access this site right now')
          }
          commit('updateCurrentUser', user)
          dispatch('loadSubmissions')
        } else {
          commit('logOutCurrentUser')
        }
      }, (error) => {
        console.log(`ERROR: ${error}`)
        commit('loginFailed')
        throw new Error(error)
      })
    },
    toggleLoading ({ state, commit }, bool) {
      // console.('actions.toggleLoading')
      commit('toggleLoading', bool)
    },
    loadSubmissions ({ commit, state }, payload) {
      // console.('actions.loadSubmissions')
      commit('toggleLoading', true)
      return new Promise((resolve, reject) => {
        if (state._debug === undefined || state._debug === null) {
          db.ref('programs/' + state.formId + '/submissions/')
          .orderByChild('id')
          .once('value', (snapshot) => {
            let submissions = Object.values(snapshot.val())
            commit('loadQueue', submissions)
            commit('refreshSubmissionStatus')
          }).then(() => {
            commit('toggleLoading', false)
          })
        } else {
          db.ref('programs/' + state.formId + '/submissions/')
          .orderByChild('id')
          .limitToFirst(state._debug.limitToFirst)
          .once('value', (snapshot) => {
            // console.('... submissions loaded')
            let submissions = Object.values(snapshot.val())
            commit('loadQueue', submissions)
            commit('refreshSubmissionStatus')
          }).then(() => {
            commit('toggleLoading', false)
          })
        }
      })
    },
    setVoteCount ({ commit }, payload) {
      // console.log('actions.setVoteCount')
      commit('setVoteCount', payload)
    },
    refreshSubmissionStatus ({ commit }) {
      // console.log('actions.refreshSubmissionStatus')
      commit('refreshSubmissionStatus')
    },
    updateSubmissionBucket ({ commit }, submissionId) {
      // console.log('action.updateSubmissionBucket')
      commit('updateSubmissionBucket', submissionId)
    }
  }
})
