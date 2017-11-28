<template>
  <v-layout row justify-center>
    <v-dialog v-if="isValid" v-model="active" max-width="800">
      <v-card>
        <v-toolbar color="purple darken-3" class="" dark>
          <!--
          <v-btn flat @click="loadNextDetails(-1)">
            Previous
            <v-icon>chevron_left</v-icon>
          </v-btn>
          <v-btn flat @click="loadNextDetails(1)">
            Next
            <v-icon>chevron_right</v-icon>
          </v-btn>
          -->
          <v-spacer></v-spacer>
          <v-btn icon small @click="closeDetails" class="mr-3" color="white darken-4" dark>
              <v-icon color="red darken-4">clear</v-icon>
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
                class="pointer-off"
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
                color="grey lighten-1"
                disable
                class="pointer-off"
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
        <v-container fluid grid-list-lg class="pt-4 pb-4">
          <v-layout row>
            <v-flex xs3 offset-xs1>
              <v-avatar
                :tile="false"
                size="150px"
                class="grey lighten-4 elevation-20"
              >
                <img :src="speaker.photo_url"
                  style="background-image: url('https://firebasestorage.googleapis.com/v0/b/cward-cfpoint-devel.appspot.com/o/profile-blank-150x150.jpg?alt=media&token=5a12132b-5011-4f59-a852-dba1aa2895de')"
                >
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
      masterIndex: 0
    }
  },
  computed: {
    isValid () {
      let s = this.submission
      return (s !== undefined && s !== null)
    },
    submission () {
      if (this.submissionId !== undefined && this.submissionId !== null) {
        const submission = this.$store.getters.getSubmission(this.submissionId)
        if (submission.id !== undefined && submission.id !== null) {
          // console.log(`Found submission: ${submission.id}`)
          return submission
        }
      }
      // console.log(`No (or Invalid) submission found for ${this.submissionId}`)
      return {
        id: null,
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
      const submissions = this.$store.getters.submissions
      if (submissions !== undefined && submissions !== null && submissions.length > 0) {
        return submissions[this.masterIndex].id
      }
    }
  },
  methods: {
    closeDetails () {
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
    loadNextDetails (indexIncrement) {
      // console.log(`methods.loadNextDetails`)
      let bucket = this.$store.getters[this.bucket]
      if (!(bucket) || bucket.length === 0) {
        console.warn(`... methods.loadNextDetails: Empty bucket... returning!`)
        this.closeDetails()
        return
      }
      let bucketIx = bucket.findIndex(s => s.id === this.submissionId)
      let targetBucketIx = bucketIx + indexIncrement
      if (targetBucketIx > bucket.length - 1) {
        targetBucketIx = 0 // went past the end, start over
      } else if (targetBucketIx < 0) {
        targetBucketIx = bucket.length - 1 // we past beginning, start at end
      }
      if (targetBucketIx > bucket.length - 1) {
        targetBucketIx = 0 // went past the end, start over
      } else if (targetBucketIx < 0) {
        targetBucketIx = bucket.length - 1 // we past beginning, start at end
      }
      let targetSubmissionId = bucket[targetBucketIx].id
      let targetSubmissionMasterIndex = this.$store.getters.submissions.findIndex(s => s.id === targetSubmissionId)
      this.masterIndex = targetSubmissionMasterIndex
    },
    setVoted (value) {
      this.$store.dispatch('toggleIsWorking', true)
      this.$store.dispatch('setVoted', {
        submissionId: this.submissionId,
        value: value
      })
      this.active = false
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
    this.$store.getters.getBus.$on('showDetails', (submissionId) => {
      // console.log(`getBus.on.showDetails: ${submissionId}`)
      this.masterIndex = this.$store.getters.submissions.findIndex(s => s.id === submissionId)
      this.active = true
      // console.log(`New masterIndex -> ${this.masterIndex}`)
    })
  }
}
</script>

<style>
.dialog {
  font-size: 1.2em;
}
</style>
