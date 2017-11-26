<template>
  <div>
    <v-footer class="pa-3">
      <v-btn icon class="ml-5 green--text text--darken-3" @click="openDrawerApproved()">
        <v-icon class="black--text">chevron_right</v-icon>
        <v-icon class="mr-2">check</v-icon>
        Approved ({{ approved.length }})
      </v-btn>
      <v-spacer></v-spacer>
      <v-btn flat @click="reloadSubmissions()">
          <v-icon>refresh</v-icon>
      </v-btn>
      <v-spacer></v-spacer>
      <v-btn icon class="mr-5 red--text text--darken-3" @click="openDrawerRejected()">
        ({{ rejected.length }})
        Rejected
        <v-icon class="ml-2">delete_sweep</v-icon>
        <v-icon class="black--text">chevron_left</v-icon>
      </v-btn>
    </v-footer>

    <v-layout row justify-center>
      <v-dialog v-model="details.active" max-width="800">
        <v-card>
          <v-toolbar color="purple darken-3" class="pr-3 pl-5" dark>
            <v-btn icon @click="loadPreviousDetails(details.submission.id, unreviewed)">
              Previous
              <v-icon>chevron_left</v-icon>
            </v-btn>
            <v-spacer></v-spacer>
            <v-btn icon @click="loadNextDetails(details.submission.id, unreviewed)">
              Next
              <v-icon>chevron_right</v-icon>
            </v-btn>
            <v-btn icon @click="details.active = false" class="ml-4" color="" dark>
                <v-icon>photo_size_select_small</v-icon>
            </v-btn>
          </v-toolbar>
          <v-toolbar>
            <v-toolbar-title class="ml-3">{{ details.submission.title }}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-list-tile-action>
              <v-icon
                class=""
                color="black"
                @click.stop=""
              >
                insert_comment
              </v-icon>
            </v-list-tile-action>

            <v-list-tile-action>
              <v-icon v-if="hasVoted(details.submission.id) > 0"
                  color="grey lighten-1"
                  disable
                  @click.stop="setVoted(details.submission.id, 0)"
              >
                exposure_plus_1
              </v-icon>
              <v-icon v-else
                color="green darken-4"
                class="pointer"
                @click.stop="setVoted(details.submission.id, 1)"
              >
                exposure_plus_1
              </v-icon>
            </v-list-tile-action>

            <v-list-tile-action>
              <v-icon v-if="hasVoted(details.submission.id) < 0"
                  disable
                  color="grey lighten-1"
                  @click.stop="setVoted(details.submission.id, 0)"
              >
                exposure_minus_1
              </v-icon>
              <v-icon v-else
                color="red darken-4"
                class="pointer"
                @click.stop="setVoted(details.submission.id, -1)"
              >
                exposure_minus_1
              </v-icon>
            </v-list-tile-action>


          </v-toolbar>
          <v-card-text>
            <span>
              <ul class="blocked">
                <li><em><b>Type</b></em>: {{ details.submission.type }}</li>
                <li><em><b>Difficulty:</b></em> {{ details.submission.difficulty.split(' ').slice(0,1).join('') }}</li>
                <li><em><b>Duration:</b></em> {{ details.submission.duration }} minutes</li>
                <li><em><b>Themes:</b></em>[ {{ details.submission.themes.join(', ') }} ]</li>
                <li><em><b>Abstract:</b></em></li>
              </ul>
              <p v-html="details.submission.abstract.replace(/\n/g, '<br/>')" class="mt-1 ml-2"></p>
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
        <v-card v-for="speaker in details.submission.meta.contacts" :key="speaker.id">
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


    <v-container fluid>
      <v-expansion-panel class="mb-3 grey lighten-5 text-xs-right" inset>
        <v-expansion-panel-content>
          <div slot="header"><b>Theme filter ({{ themesFilter.length }} of {{ themes.length }} selected)</b></div>
          <cfp-reviews-theme-filter></cfp-reviews-theme-filter>
        </v-expansion-panel-content>
      </v-expansion-panel>

      <cfp-reviews-submissions-lists-drawer
        v-for="drawer in Object.values(drawers)"
        :key="drawer.id"
        :drawer="drawer"
        :types="types"
      ></cfp-reviews-submissions-lists-drawer>

      <cfp-reviews-submissions-lists-main :drawer="drawers['unreviewed']" :types="types" :details="details">

      </cfp-reviews-submissions-lists-main>

    </v-container>
  </div>
</template>

<script>
import CfpReviewsThemeFilter from '@/components/CfpReviewsThemeFilter'
import CfpReviewsSubmissionsListsDrawer from '@/components/CfpReviewsSubmissionsListsDrawer'
import CfpReviewTabSpeakers from '@/components/CfpReviewTabSpeakers'
import CfpReviewsSubmissionsListsMain from '@/components/CfpReviewsSubmissionsListsMain'

export default {
  name: 'cfp-reviews-submissions-lists',
  data () {
    return {
      drawers: {
        approved: {
          id: 'approved',
          label: 'Approved',
          icon: 'check',
          active: false,
          toolbarColor: 'green darken-4',
          toolbarIsDark: true,
          model: undefined,
          right: false,
          width: '600',
          submissions: this.$store.getters.approved
        },
        rejected: {
          id: 'rejected',
          label: 'Rejected',
          icon: 'clear',
          active: false,
          toolbarColor: 'red darken-4',
          toolbarIsDark: true,
          model: undefined,
          right: true,
          width: '600',
          submissions: this.$store.getters.rejected
        },
        unreviewed: {
          id: 'unreviewed',
          label: 'Unreviewed',
          icon: 'priority_high',
          active: false,
          toolbarColor: 'deep-purple darken-4',
          toolbarIsDark: true,
          model: undefined,
          right: 'middle',
          width: undefined,
          submissions: this.$store.getters.unreviewed
        }
      },
      details: {
        active: undefined,
        nextSubmissionId: undefined,
        previousSubmissionId: undefined,
        submission: {
          type: '',
          abstract: '',
          duration: '',
          difficulty: '',
          themes: [],
          meta: {
            contacts: {
            }
          }
        }
      },
      types: [   // FIXME: are these being used anywhere?? or just drawers prop?
        {
          id: 'Workshop',
          label: 'Workshops',
          icon: 'keyboard',
          toolbarColor: 'purple',
          toolbarIsDark: true,
          submissions: this.$store.getters.workshops,
          iconClass: '',
          iconColor: ''
        },
        {
          id: 'Presentation',
          label: 'Presentations',
          icon: 'cast',
          toolbarColor: 'purple',
          toolbarIsDark: true,
          submissions: this.$store.getters.presentations,
          iconClass: '',
          iconColor: ''
        },
        {
          id: 'Discussion',
          label: 'Discussions',
          icon: 'question_answer',
          toolbarColor: 'purple',
          toolbarIsDark: true,
          submissions: this.$store.getters.discussions,
          iconClass: '',
          iconColor: ''
        }
      ]
    }
  },
  computed: {
    approved () {
      return this.$store.getters.approved
    },
    unreviewed () {
      return this.$store.getters.unreviewed
    },
    rejected () {
      return this.$store.getters.rejected
    },
    themes () {
      return this.$store.getters.themes
    },
    themesFilter () {
      return this.$store.getters.themesFilter
    }
  },
  methods: {
    reloadSubmissions () {
      this.$store.dispatch('loadSubmissions')
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
      this.$set(this.details, 'submission', bucket[nix])
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
    openDrawerApproved () {
      this.drawers.approved.active = true
    },
    closeDrawerApproved () {
      this.drawers.approved.active = false
    },
    openDrawerRejected () {
      this.drawers.rejected.active = true
    },
    closeDrawerRejected () {
      this.drawers.rejected.active = false
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
  props: [],
  components: {
    'cfp-reviews-theme-filter': CfpReviewsThemeFilter,
    'cfp-reviews-submissions-lists-drawer': CfpReviewsSubmissionsListsDrawer,
    'cfp-reviews-tab-speakers': CfpReviewTabSpeakers,
    'cfp-reviews-submissions-lists-main': CfpReviewsSubmissionsListsMain
  }
}
</script>

<style scoped>
p {
  font-size: 1.3em;
}
.list--group .list__tile {
  padding-left: 12px!important;
}

.pointer {
   cursor: pointer
}
</style>
