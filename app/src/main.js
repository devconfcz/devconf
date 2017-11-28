
import Vue from 'vue'

import Vuetify from 'vuetify'
import './stylus/main.styl'

import App from './Cfpoint'
import router from './router'
import { store } from './store'

Vue.use(Vuetify)

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App),
  created () {
    this.$store.dispatch('initAuth')
  }
})
