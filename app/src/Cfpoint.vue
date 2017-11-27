<template>
  <v-app :class="{ 'pointer-loading': isWorking }">
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
      <v-alert :value="isLoginError" color="red text-darken-4" class="text-xs-center display-1">
        <b>403: Permission denied</b>
      </v-alert>
      <div v-if="isLoading" class="text-xs-center">
        <p class="display-1 mt-5">Loading...</p>
        <v-progress-circular indeterminate color="primary"></v-progress-circular>
      </div>
      <div v-else-if="isLoggedIn">
        <cfp-dashboard></cfp-dashboard>
      </div>
      <div v-else class="text-xs-center">
        <p class="display-1 mt-5">You must log-in to continue... </p>
        <v-btn :loading="isLoading" color="red" large flat @click="logIn">
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
  computed: {
    isWorking () {
      return this.$store.getters.getIsWorking
    },
    isLoginError () {
      return this.$store.getters.isLoginError
    },
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
.pointer {
   cursor: pointer;
}

.pointer-off {
  cursor: not-allowed;
}

.pointer-loading {
  cursor: wait;
}

.list--group .list__tile {
  padding-left: 12px!important;
}
</style>
