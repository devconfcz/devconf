<template>
  <v-container fluid>

    <navbar :currentUser="currentUser" :isLoggedIn="isLoggedIn"></navbar>

    <v-content>
      <v-alert
        :value="isLoginError"
        color="red text-darken-4"
        class="text-xs-center display-1"
      >
        <b>403: Permission denied</b>
      </v-alert>

      <div v-if="isLoading" class="text-xs-center">
        <p class="display-1 mt-5">Loading...</p>
        <v-progress-circular indeterminate color="primary"></v-progress-circular>
      </div>
      <div v-else-if="isLoggedIn">
        <!-- IF FIRST TIME LOGGING IN, IMPORT / SET-UP USER PROFILE -->
        <cfp-stepper :currentUser="currentUser"></cfp-stepper>
      </div>
      <div v-else class="text-xs-center">
        <p class="display-1 mt-5">You must log-in to continue... </p>
        <v-btn :loading="isLoading" color="red" large flat @click="logIn">
          Click here to login-in
          <v-icon class="ml-3">account_circle</v-icon>
        </v-btn>
      </div>
    </v-content>
  </v-container>
</template>

<script>
import Navbar from '@/components/Navbar'
import CfpStepper from '@/components/CfpStepper'

export default {
  name: 'cfp-submit-home',
  computed: {
    currentUser () {
      return this.$store.getters.currentUser
    },
    isLoggedIn () {
      // CAN THIS BE REPLACED WITH A SIMPLE CHECK FOR currentUser?
      return this.$store.getters.isLoggedIn
    },
    isLoginError () {
      return this.$store.getters.isLoginError
    },
    isLoading () {
      return this.$store.getters.isLoading
    }
  },
  methods: {
    logIn () {
      this.$store.dispatch('logInPopup')
    }
  },
  components: {
    'navbar': Navbar,
    'cfp-stepper': CfpStepper
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
