import Vue from 'vue'
import Vuex from 'vuex'
import firebase from 'firebase'

Vue.use(Vuex)
Vue.use(firebase)

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

// Separate out into storage components (eg, stepper store...)

export default new Vuex.Store({
  state: {
    site: {
      title: 'DevConf - Call for Everything'
    },
    _isLoginError: false,
    _isLoading: true,
    _currentUser: null,
    _stepperPosition: 0,
    _profileEditDialogIsOpen: false
  },
  getters: {
    isLoggedIn (state) {
      if (state._currentUser === undefined || state._currentUser === null) {
        return false
      }
      return true
    },
    isLoginError (state) {
      return state._isLoginError
    },
    isLoading (state) {
      return state._isLoading
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
    site (state) {
      return state.site
    },
    stepperPosition (state) {
      return parseInt(state._stepperPosition)
    },
    isProfileEditDialogOpen (state) {
      return state._profileEditDialogIsOpen
    }
  },
  mutations: {
    loginFailed (state) {
      state._isLoginError = true
    },
    logOutCurrentUser (state) {
      // console.log('Logged out user!')
      state._currentUser = null
    },
    updateCurrentUser (state, user) {
      state._currentUser = user
      state._isLoginError = false
      state._isLoading = false
    },
    updateStepperPosition (state, position) {
      state._stepperPosition = position
    },
    toggleProfileEditDialog (state) {
      state._profileEditDialogIsOpen = !state._profileEditDialogIsOpen
    }
  },
  actions: {
    logInPopup ({ state, commit }) {
      // console.log('actions.logInPopup')
      var provider = new firebase.auth.GoogleAuthProvider()
      provider.setCustomParameters({
        prompt: 'select_account'
      })
      firebase.auth().signInWithPopup(provider)
      // FIXME: remove state, commit passin vars?
    },
    logOut ({ state, commit }) {
      firebase.auth().signOut()
      // FIXME: set isloggedin false
    },
    initAuth ({ state, commit, dispatch }) {
      firebase.auth().onAuthStateChanged(function (user) {
        if (user) {
          // User is signed in.
          console.log(`User logged in: ${user.email}`)
          user.id = user.uid
          user.eid = user.email.replace(/@/, '__at__').replace(/\./g, '__dot__')
          // commit('updateCurrentUser', user)
          console.log('Load User Profile data from db for user: ', user.eid)
          db.ref('profiles/' + user.eid)
            .on('value', (snapshot) => {
              user.profile = snapshot.val()
              commit('updateCurrentUser', user)
            })
        } else {
          commit('logOutCurrentUser')
        }
      }, (error) => {
        console.log(`ERROR: ${error}`)
        commit('loginFailed')
        throw new Error(error)
      })
    }
  }
})
