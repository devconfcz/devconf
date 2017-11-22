<template>
  <v-app>
    <v-toolbar app>
      <v-toolbar-title>DevConf.cz 2018 - Main Event - Submission Review</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-side-icon class="hidden-md-and-up"></v-toolbar-side-icon>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn v-if="isLoggedIn" flat disabled>{{ currentUser.email }}</v-btn>
        <v-btn v-if="isLoggedIn" flat @click="logOut">
          logout
          <v-icon>exit_to_app</v-icon>
        </v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-content>
      <div v-if="isLoading" class="text-xs-center">
        <p class="display-5 mt-5">Loading... </p>
        <v-progress-circular indeterminate color="primary"></v-progress-circular>
      </div>
      <div v-else-if="isLoggedIn">
        <cfp-dashboard></cfp-dashboard>
      </div>
      <div v-else class="text-xs-center">
        <p class="display-5 mt-5">You must log-in to continue... </p>
        <v-btn :loading="isLoggingIn" color="red" large flat @click="logIn">
          Click here to login-in
          <v-icon class="ml-3">account_circle</v-icon>
        </v-btn>
      </div>
    </v-content>
  </v-app>
</template>

<script>
import CfpDashboard from '@/components/CfpDashboard'

export default {
  name: 'app-cfp',
  data () {
    return {
      isLoggingIn: false
    }
  },
  computed: {
    isLoading () {
      return this.$store.getters.isLoading
    },
    currentUser () {
      return this.$store.getters.currentUser
    },
    isLoggedIn () {
      return this.$store.getters.isLoggedIn
    }
  },
  methods: {
    logIn () {
      this.isLoggingIn = true
      this.$store.dispatch('logInPopup')
      .catch((error) => {
        if (error) {
          this.isLoggingIn = false
        }
      })
    },
    logOut () {
      this.$store.dispatch('logOut')
    }
  },
  components: {
    'cfp-dashboard': CfpDashboard
  }
}
</script>

<style>
</style>
