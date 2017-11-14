import Vue from 'vue'
import Router from 'vue-router'
import App from '@/Cfpoint'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'app',
      component: App
    }
  ]
})
