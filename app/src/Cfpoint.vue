<template>
  <v-app>
    <v-toolbar app>
      <v-toolbar-title>DevConf.cz 2018 - Main Event - Submission Review</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-side-icon class="hidden-md-and-up"></v-toolbar-side-icon>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn v-if="isLoggedIn" flat disabled>{{ currentUser.email }}</v-btn>
        <v-btn v-if="!isLoggedIn" flat @click="logIn">
          login
          <v-icon>account_circle</v-icon>
        </v-btn>
        <v-btn v-if="isLoggedIn" flat @click="logOut">
          logout
          <v-icon>exit_to_app</v-icon>
        </v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-content>
      <cfp-dashboard></cfp-dashboard>
    </v-content>
  </v-app>
</template>

<script>
import CfpDashboard from '@/components/CfpDashboard'

export default {
  name: 'app-cfp',
  computed: {
    currentUser () {
      return this.$store.getters.currentUser
    },
    isLoggedIn () {
      return this.$store.getters.isLoggedIn
    }
  },
  methods: {
    logIn () {
      this.$store.dispatch('logInPopup')
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
