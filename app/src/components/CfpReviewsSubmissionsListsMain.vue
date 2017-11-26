<template>
  <v-flex xs10 offset-xs1>
    <v-card>
      <v-toolbar :color="drawer.toolbarColor" :dark="drawer.toolbarIsDark">
        <v-toolbar-title>{{ drawer.label }} ({{ submissions.length }})</v-toolbar-title>
      </v-toolbar>
      <v-list three-line>
        <v-list-group v-for="type in types" :key="type.id" :value="type.active">
          <v-list-tile slot="item" @click="">
            <v-list-tile-action>
              <v-icon color="type.iconColor" class="type.iconClass">{{ type.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>{{ type.label }} ({{ filterSubmissions(submissions, type.id).length }})</v-list-tile-title>
            </v-list-tile-content>
            <v-list-tile-action>
              <v-icon>keyboard_arrow_down</v-icon>
            </v-list-tile-action>
          </v-list-tile>
          <v-list-tile v-for="submission in filterSubmissions(submissions, type.id)" :key="submission.id"
            avatar
            @click="loadDetails(submission.id, submissions)"
          >
            <v-list-tile-action>
              <v-icon v-if="hasFavorited(submission.id)"
                class=""
                color="amber darken-4"
                @click.stop.prevent="setFavorited(submission.id, 0)"
              >
                star_border
              </v-icon>
              <v-icon v-else
                class=""
                color="grey lighten-1"
                @click.stop.prevent="setFavorited(submission.id, 1)"
              >
                star_border
              </v-icon>
            </v-list-tile-action>

            <v-list-tile-action>
              <v-icon v-if="hasVoted(submission.id) > 0"
                  color="grey lighten-1"
                  disable
                  @click.stop="setVoted(submission.id, 0)"
              >
                exposure_plus_1
              </v-icon>
              <v-icon v-else
                color="green darken-4"
                class=""
                @click.stop="setVoted(submission.id, 1)"
              >
                exposure_plus_1
              </v-icon>
            </v-list-tile-action>

            <v-list-tile-action>
              <v-icon v-if="hasVoted(submission.id) < 0"
                  color="grey lighten-1"
                  @click.stop="setVoted(submission.id, 0)"
              >
                exposure_minus_1
              </v-icon>
              <v-icon v-else
                color="red darken-4"
                class=""
                @click.stop="setVoted(submission.id, -1)"
              >
                exposure_minus_1
              </v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title><b>{{ submission.title }}</b></v-list-tile-title>
              <v-list-tile-sub-title class="grey--text text--darken-2">{{ submission.abstract }}</v-list-tile-sub-title>
              <v-list-tile-sub-title class="deep-purple--text text--darken-4"><em>[ {{ submission.themes.join(', ') }} ]</em></v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list-group>
      </v-list>
    </v-card>
  </v-flex>
</template>

<script>
import CfpReviewsSubmissionsListsDrawer from '@/components/CfpReviewsSubmissionsListsDrawer'
import CfpReviewTabSpeakers from '@/components/CfpReviewTabSpeakers'

export default {
  name: 'cfp-reviews-submissions-lists',
  data () {
    return {
    }
  },
  computed: {
    submissions () {
      return this.$store.getters.unreviewed
    },
    themes () {
      return this.$store.getters.themes
    },
    themesFilter () {
      return this.$store.getters.themesFilter
    }
  },
  methods: {
    setFavorited (submissionId, value) {
      console.log(`methods.setFavorited`)
      this.$store.dispatch('setFavorited', {
        submissionId: submissionId,
        value: value
      })
    },
    hasFavorited (submissionId) {
      // console.log(`methods.hasFavorited`) // : ${submissionId}`)
      // console.log(this.$store.getters.getFavorited(submissionId))
      return this.$store.getters.getFavorited(submissionId)
    },
    loadNextDetails (submissionId, bucket) {
      // console.log((`methods.loadNextDetails: ${submissionId};`)
      if (!(bucket)) {
        // console.log((`... methods.loadNextDetails: Empty bucket... returning!`)
        return
      }
      let ix = bucket.findIndex(s => s.id === submissionId)
      let nix = ix
      if (ix > -1) {
        // we have a submissionId
        if (ix < bucket.length) {
          nix = ix + 1
        } else {
          // we're at the end of the list... start over...
          nix = 0
        }
      } else {
        // we didn't find the submission
      }
      this.$set(this.details, 'submission', bucket[nix])  // <--- this.details doesn't exist!?
    },
    loadPreviousDetails (submissionId, bucket) {
      // // console.log(`methods.loadPreviousDetails: ${submissionId};`)
      let ix = bucket.findIndex(s => s.id === submissionId)
      let nix = ix
      if (ix > -1) {
        // we have a submissionId
        if (ix > 0) {
          nix = ix - 1
        } else {
          // we're at the start of the list... loop to the end...
          nix = bucket.length
        }
      } else {
        // we didn't find the submission
      }
      this.$set(this.details, 'submission', bucket[nix])
    },
    setVoted (submissionId, value) {
      this.$store.dispatch('setVoted', {
        submissionId: submissionId,
        value: value
      })
    },
    hasVoted (submissionId) {
      // // console.log('CfpReviewNavbarVoting.computed.voteCountPlus: ', this.submissionId)
      return this.$store.getters.getVoted(submissionId)
    },
    voteCount (submissionId) {
      return this.$store.getters.getVoteCount(submissionId)
    },
    loadDetails (submissionId, bucket) {
      // console.log(`methods.loadDetails: ${submissionId}, ${bucket}`)
      this.$set(this.details, 'active', true)
      // console.log(this.$store.getters.getSubmission(submissionId))
      this.$set(this.details, 'submission', this.$store.getters.getSubmission(submissionId))
    },
    voteTotal (submissionId) {
      // // console.log('CfpReviewNavbarVoting.computed.votes: ', this.submissionId)
      return this.$store.getters.getVoteTotal(submissionId)
    },
    filterSubmissions (submissions, type) {
      // console.log(`filterSubmissions in lists: ${submissions}`)
      if (!(submissions)) {
        // console.log('... empty submissions. Nothing to filter.')
        return []
      }
      return submissions.filter(s => s.type === type)
    }
  },
  props: ['drawer', 'types', 'details'],
  components: {
    'cfp-reviews-submissions-lists-drawer': CfpReviewsSubmissionsListsDrawer,
    'cfp-reviews-tab-speakers': CfpReviewTabSpeakers
  }
}
</script>

<style scoped>
.list--group .list__tile {
  padding-left: 12px!important;
}

.pointer {
   cursor: pointer
}
</style>
