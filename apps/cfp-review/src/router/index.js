import Vue from 'vue'
import Router from 'vue-router'
import App from '@/Cfpoint'
// import AuthGuard from 'authGuard'

Vue.use(Router)

export default new Router({
  mode: 'history', // https://router.vuejs.org/en/essentials/history-mode.html
  routes: [
    {
      path: '/',
      name: 'app',
      component: App
      // beforeEnter: AuthGuard
    }
  ]
})
