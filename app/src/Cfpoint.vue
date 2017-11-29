<template>
  <v-app :class="{ 'pointer-loading': isWorking }">
    <v-toolbar app>
      <v-toolbar-title>{{ site.title }}</v-toolbar-title>
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

    <v-toolbar app v-if="isLoggedIn" class="grey lighten-5">
      <v-toolbar-side-icon class="hidden-md-and-up"></v-toolbar-side-icon>

      <v-btn v-for="link in site.links" :key="link.id"
        flat
        class="ml-5 black--text"
        @click="changePage(link)"
      >
          <v-icon class="mr-1" :class="link.class">{{ link.icon }}</v-icon>
          {{ link.title }}
      </v-btn>
      <v-spacer></v-spacer>

      <v-select
        :items="events"
        v-model="eventSelected"
        label="Event"
        single-line
        item-text="display_name"
        item-value="id"
        return-object
        prepend-icon="dns"
        @input="changeEvent()"
      ></v-select>

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

        <div
          v-if="currentPage.id === 'cfp_reviews'"
          class="text-xs-center pt-5"
        >
          <cfp-dashboard
            :event="this.$store.getters.eventDisplayed"></cfp-dashboard>
        </div>

        <div
          v-else-if="currentPage.id === 'cfp_program_submissions_browser'"
          class="text-xs-center pt-5"
        >
          <cfp-program-submissions-browser :event="this.$store.getters.eventDisplayed"></cfp-program-submissions-browser>
        </div>

        <div v-else
          class="text-xs-center pt-5"
        >
            <p class="display-3">Whoops! There been an error.</p>
        </div>
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
import CfpProgramSubmissionsBrowser from '@/components/CfpProgramSubmissionsBrowser'

export default {
  name: 'app-cfp',
  data () {
    return {
      eventSelected: null
    }
  },
  computed: {
    events () {
      return Object.values(this.site.events)
    },
    currentEvent () {
      console.log('Event displayed: ', this.$store.getters.eventDisplayed)
      return this.$store.getters.eventDisplayed
    },
    currentPage: {
      get () {
        console.log('current page: ', this.$store.getters.pageDisplayed)
        return this.$store.getters.pageDisplayed
      },
      set (value) {
        console.log('got set request for page: ', value)
        this.$store.dispatch('changePage', value)
      }
    },
    site () {
      return this.$store.getters.site
    },
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
    changeEvent () {
      console.log('methods.changeEvent ', this.eventSelected)
      this.$store.dispatch('changeEvent', this.eventSelected)
    },
    changePage (to) {
      this.currentPage = to
    },
    logIn () {
      this.$store.dispatch('logInPopup')
    },
    logOut () {
      this.$store.dispatch('logOut')
    }
  },
  components: {
    'cfp-dashboard': CfpDashboard,
    'cfp-program-submissions-browser': CfpProgramSubmissionsBrowser
  },
  beforeMount () {
    let links = this.site.links
    if (links.length > 0) {
      this.currentPage = links[0]
    }
    let events = Object.values(this.site.events)
    if (events.length > 0) {
      this.$store.dispatch('changeEvent', events[0])  // FIXME: user profile default
    }
  },
  mounted () {
    this.$store.dispatch('loadSubmissions')
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
