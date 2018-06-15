import { store } from '../store'

export default (to, from, next) {
  if (store.getters.currentUser) {
    next()
  } else {
    //next('/signin')
    store.dispatch('logIn')
  }

}
