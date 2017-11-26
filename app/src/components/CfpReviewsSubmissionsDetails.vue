<template>
  <v-layout row justify-center>
    <v-dialog v-model="active" max-width="800">
      <v-card>
        <v-toolbar color="purple darken-3" class="pr-3 pl-5" dark>
          <v-btn icon @click="loadPreviousDetails()">
            Previous
            <v-icon>chevron_left</v-icon>
          </v-btn>
          <v-spacer></v-spacer>
          <v-btn icon @click="loadNextDetails()">
            Next
            <v-icon>chevron_right</v-icon>
          </v-btn>
          <v-btn icon @click="hideDetails" class="ml-4" color="" dark>
              <v-icon>photo_size_select_small</v-icon>
          </v-btn>
        </v-toolbar>
        <v-toolbar>
          <!--
          <v-list-tile-action>
            <v-icon v-if="hasFavorited"
              class="pointer"
              color="amber darken-4"
              @click.stop.prevent="setFavorited(0)"
            >
              star
            </v-icon>
            <v-icon v-else
              class="pointer"
              color="grey lighten-1"
              @click.stop.prevent="setFavorited(1)"
            >
              star_border
            </v-icon>
          </v-list-tile-action>
        -->

          <v-toolbar-title class="ml-3">{{ submission.title }}</v-toolbar-title>

          <v-spacer></v-spacer>

          <v-list-tile-action click="">
            <v-icon
              class="pointer"
              color="black"
              @click.stop=""
            >

            </v-icon>
          </v-list-tile-action>

          <v-list-tile-action>
            <v-icon v-if="hasVoted() > 0"
                color="grey lighten-1"
                disable
                @click.stop="setVoted(0)"
            >
              exposure_plus_1
            </v-icon>
            <v-icon v-else
              color="green darken-4"
              class="pointer"
              @click.stop="setVoted(1)"
            >
              exposure_plus_1
            </v-icon>
          </v-list-tile-action>

          <v-list-tile-action>
            <v-icon v-if="hasVoted() < 0"
                disable
                color="grey lighten-1"
                @click.stop="setVoted(0)"
            >
              exposure_minus_1
            </v-icon>
            <v-icon v-else
              color="red darken-4"
              class="pointer"
              @click.stop="setVoted(-1)"
            >
              exposure_minus_1
            </v-icon>
          </v-list-tile-action>

        </v-toolbar>
        <v-card-text>
          <span>
            <ul class="blocked">
              <li><em><b>Type</b></em>: {{ submission.type }}</li>
              <li><em><b>Difficulty:</b></em> {{ submission.difficulty.split(' ').slice(0,1).join('') }}</li>
              <li><em><b>Duration:</b></em> {{ submission.duration }} minutes</li>
              <li><em><b>Themes:</b></em> {{ submission.themes.join(', ') }}</li>
              <li><em><b>Abstract:</b></em></li>
            </ul>
            <p v-html="submission.abstract.replace(/\n/g, '<br/>')" class="mt-1 ml-2"></p>
          </span>
        </v-card-text>
      </v-card>
      <v-divider class="deep-purple darken-3"></v-divider>
      <v-card>
        <v-card-title primary-title>
          <div>
              <h3 class="headline">Speakers</h3>
          </div>
        </v-card-title>
      </v-card>
      <v-card v-for="speaker in submission.meta.contacts" :key="speaker.id">
        <v-container fluid grid-list-lg class="">
          <v-layout row>
            <v-flex xs3 offset-xs1>
              <v-avatar
                :tile="false"
                size="150px"
                class="grey lighten-4 elevation-20"
              >
                <img :src="speaker.photo_url" alt="avatar">
              </v-avatar>
            </v-flex>
            <v-flex xs7>
              <div>
                <ul class="blocked">
                  <li><em><b>Name</b></em>: {{ speaker.display_name }}</li>
                  <li><em><b>Organization</b></em>: {{ speaker.organization }}</li>
                  <li><em><b>Description</b></em>: {{ speaker.short_description }}</li>
                  <li><em><b>About</b></em>: </li>
                </ul>
                <p v-html="speaker.description.replace(/\n/g, '<br/>')" class="mt-1 ml-2"></p>
              </div>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card>
    </v-dialog>
  </v-layout>
</template>

<script>
export default {
  name: 'cfp-reviews-submissions-details',
  data () {
    return {
      active: false,
      ix: 0
    }
  },
  computed: {
    submission () {
      if (this.submissionId) {
        return this.$store.getters.getSubmission(this.submissionId)
      }
      // console.log('No submission found')
      return {
        type: '',
        abstract: '',
        duration: '',
        difficulty: '',
        themes: [],
        meta: {
          contacts: {}
        }
      }
    },
    submissionId () {
      if (this.$store.getters[this.bucket].length > 0) {
        return this.$store.getters[this.bucket][this.ix].id
      }
    }
  },
  methods: {
    hideDetails () {
      this.active = false
    },
    setFavorited (value) {
      // console.log(`methods.setFavorited`)
      this.$store.dispatch('setFavorited', {
        submissionId: this.submissionId,
        value: value
      })
    },
    hasFavorited () {
      // console.log(`methods.hasFavorited`) // : ${submissionId}`)
      // console.log(this.$store.getters.getFavorited(submissionId))
      return this.$store.getters.getFavorited(this.submissionId)
    },
    loadNextDetails () {
      // console.log(`methods.loadNextDetails`)
      let bucket = this.$store.getters[this.bucket]
      if (!(bucket)) {
        // console.log(`... methods.loadNextDetails: Empty bucket... returning!`)
        return
      }
      let ix = bucket.findIndex(s => s.id === this.submissionId)
      let nix = ix
      if (ix > -1) {
        // we have a submissionId
        if (ix < bucket.length - 1) {
          nix = ix + 1
        } else {
          // we're at the end of the list... start over...
          nix = 0
        }
      } else {
        // we didn't find the submission
      }
      let submissionId = bucket[nix].id
      this.ix = nix
      this.$store.dispatch('showDetails', submissionId)
    },
    loadPreviousDetails () {
      // // console.log(`methods.loadPreviousDetails: ${submissionId};`)
      let bucket = this.$store.getters[this.bucket]
      if (!(bucket)) {
        // console.log(`... methods.loadPreviousDetails: Empty bucket... returning!`)
        return
      }
      let ix = bucket.findIndex(s => s.id === this.submissionId)
      let nix = ix
      if (ix > -1) {
        // we have a submissionId
        if (ix > 0) {
          nix = ix - 1
        } else {
          // we're at the start of the list... loop to the end...
          nix = bucket.length - 1
        }
      } else {
        // we didn't find the submission
      }
      let submissionId = bucket[nix].id
      this.ix = nix
      this.$store.dispatch('showDetails', submissionId)
    },
    setVoted (value) {
      this.$store.dispatch('setVoted', {
        submissionId: this.submissionId,
        value: value
      })
    },
    hasVoted () {
      // // console.log('CfpReviewNavbarVoting.computed.voteCountPlus: ', this.submissionId)
      return this.$store.getters.getVoted(this.submissionId)
    },
    voteCount () {
      return this.$store.getters.getVoteCount(this.submissionId)
    }
  },
  props: ['bucket'],
  components: {
  },
  created () {
    this.$store.getters.getBus.$on('active', (value) => {
      if (this.ix !== undefined && this.ix !== null) {
        this.ix = value
        this.active = true
      }
    })
  }
}
</script>

<style>
.dialog {
  font-size: 1.3em;
}
</style>
