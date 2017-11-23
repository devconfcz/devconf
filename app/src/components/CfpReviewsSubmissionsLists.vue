<template>
  <v-container fluid>
    <v-expansion-panel class="mb-3 grey lighten-5 text-xs-right" inset>
      <v-expansion-panel-content>
        <div slot="header"><b>Theme filter</b></div>
        <cfp-reviews-theme-filter></cfp-reviews-theme-filter>
      </v-expansion-panel-content>
    </v-expansion-panel>
    <v-layout row>
      <v-flex v-for="bucket in buckets" :key="bucket.id" xs4 class="ma-1">
        <v-card>
          <v-toolbar :color="bucket.toolbarColor" :dark="bucket.toolbarIsDark">
            <v-toolbar-title>{{ bucket.label }}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon>
              <v-icon>search</v-icon>
            </v-btn>
          </v-toolbar>
          <v-list two-line dense>
            <v-list-group v-for="type in types" :key="type.id" :value="type.active">
              <v-list-tile slot="item" @click="">
                <v-list-tile-action>
                  <v-icon>{{ type.icon }}</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>{{ type.label }} ({{ filterSubmissions(bucket.submissions, type.id).length }})</v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-action>
                  <v-icon>keyboard_arrow_down</v-icon>
                </v-list-tile-action>
              </v-list-tile>
              <v-list-tile avatar v-for="submission in filterSubmissions(bucket.submissions, type.id)" :key="submission.id" @click="loadDetails(submission.id)">
                <v-list-tile-action>
                  <v-icon v-if="hasVotedMinus" color="green darken-4" @click="incrementVoteCount(submission.id, 1)">exposure_plus_1</v-icon>
                  <v-icon v-else color="grey lighten-4" @click="incrementVoteCount(submission.id, 1)">exposure_plus_1</v-icon>
                </v-list-tile-action>
                <v-list-tile-action>
                  <v-icon v-if="hasVotedPlus" color="red darken-4" @click="incrementVoteCount(submission.id, -1)">exposure_minus_1</v-icon>
                  <v-icon v-else color="grey lighten-4" @click="incrementVoteCount(submission.id, -1)">exposure_minus_1</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>{{ submission.title }}</v-list-tile-title>
                  <v-list-tile-sub-title>{{ submission.abstract }}</v-list-tile-sub-title>
                </v-list-tile-content>
                <v-list-tile-action>
                  <v-list-tile-action-text class="green--text text--darken-4">{{ voteCountPlus(submission.id) }}</v-list-tile-action-text>
                  <v-list-tile-action-text class="red--text text--darken-4">{{ voteCountMinus(submission.id) }}</v-list-tile-action-text>
                </v-list-tile-action>
              </v-list-tile>
            </v-list-group>
          </v-list>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import CfpReviewsThemeFilter from '@/components/CfpReviewsThemeFilter'

export default {
  name: 'cfp-reviews-submissions-lists',
  data () {
    return {
      voted: {},
      submissionTypes: {
        Workshop: {
          icon: 'keyboard',
          iconClass: 'blue darken-3 white--text'
        },
        Presentation: {
          icon: 'cast',
          iconClass: 'deep-purple darken-3 white--text'
        },
        Discussion: {
          icon: 'question_answer',
          iconClass: 'deep-purple darken-3 white--text'
        }
      },
      types: [
        {
          id: 'Workshop',
          label: 'Workshop',
          icon: 'keyboard',
          toolbarColor: 'purple',
          toolbarIsDark: true,
          submissions: this.$store.getters.workshops
        },
        {
          id: 'Presentation',
          label: 'Presentation',
          icon: 'cast',
          toolbarColor: 'purple',
          toolbarIsDark: true,
          submissions: this.$store.getters.presentations
        },
        {
          id: 'Discussion',
          label: 'Discussion',
          icon: 'question_answer',
          toolbarColor: 'purple',
          toolbarIsDark: true,
          submissions: this.$store.getters.discussions
        }
      ]
    }
  },
  computed: {
    buckets () {
      return [
        {
          id: 'approved',
          label: 'Approved',
          icon: 'check',
          toolbarColor: 'green darken-4',
          toolbarIsDark: true,
          submissions: this.$store.getters.approved
        },
        {
          id: 'unreviewed',
          label: 'Unreviewed',
          icon: 'check',
          toolbarColor: 'purple darken-4',
          toolbarIsDark: true,
          submissions: this.$store.getters.unreviewed
        },
        {
          id: 'rejected',
          label: 'Rejected',
          icon: 'check',
          toolbarColor: 'red darken-4',
          toolbarIsDark: true,
          submissions: this.$store.getters.rejected
        }
      ]
    }
  },
  methods: {
    loadDetails (submissionId) {
      return this.$store.getters.getSubmission(submissionId)
    },
    hasVotedPlus (submissionId) {
      return (this.voted[submissionId] === 1)
    },
    hasVotedMinus (submissionId) {
      return (this.voted[submissionId] === -1)
    },
    voteCountPlus (submissionId) {
      // console.log('CfpReviewNavbarVoting.computed.voteCountPlus: ', this.submissionId)
      return this.$store.getters.getVoteCountPlus(submissionId)
    },
    voteCountMinus (submissionId) {
      // console.log('CfpReviewNavbarVoting.computed.voteCountMinus: ', this.submissionId)
      return this.$store.getters.getVoteCountMinus(submissionId)
    },
    voteTotal (submissionId) {
      // console.log('CfpReviewNavbarVoting.computed.votes: ', this.submissionId)
      return this.$store.getters.getVoteTotal(submissionId)
    },
    incrementVoteCount (submissionId, incrementValue) {
      if ((this.hasVotedPlus(submissionId) && incrementValue === 1) || (this.hasVotedMinus(submissionId) && incrementValue === -1)) {
        console.log('Already voted...')
        return
      }
      // console.log('CfpReviewNavbarVoting.methods.submissionVotePlus: ', this.submissionId)
      const payload = {
        submissionId: submissionId,
        incrementValue: incrementValue
      }
      this.$set(this.voted, submissionId, incrementValue)
      this.$store.dispatch('incrementVoteCount', payload)
      // .then(() => {
        // console.log(`${this.submission.id} -> ${incrementValue}`)

        // this.$store.dispatch('refreshSubmissionStatus')
        /*
        let payload = {
          incrementValue: incrementValue,
          bucketName: this.bucketName,
          submissionId: submissionId
        }
        this.$store.dispatch('updateSubmissionBucket', payload)
        */
      // })
      // .catch((e) => {
      //  console.log(`ERROR: ${e}`)
      // })
    },
    filterSubmissions (submissions, type) {
      return submissions.filter(s => s.type === type)
    },
    voteStatusIcon (submissionId) {
      let ix = Object.keys(this.$store.state._votes).indexOf(submissionId)
      if (ix === -1) {
        return 'indeterminate_check_box'
      } else {
        if (this.$store.state._votes[ix] === 0) {
          return 'check_box_outline_blank'
        } else {
          return 'check_box'
        }
      }
    }
  },
  props: [],
  components: {
    'cfp-reviews-theme-filter': CfpReviewsThemeFilter
  }
}
</script>

<style>
.list--group .list__tile {
  padding-left: 12px!important;
}
</style>
