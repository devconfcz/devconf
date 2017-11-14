<template>
  <div>
    <v-tabs light grow centered v-model="valid">
      <v-tabs-bar class="white">
        <v-tabs-slider color="black"></v-tabs-slider>
        <v-tabs-item key="unreviewed" href="#unreviewed">
          Unreviewed
        </v-tabs-item>
        <v-tabs-item key="approved" href="#approved">
          Approved
        </v-tabs-item>
        <v-tabs-item key="rejected" href="#rejected">
          Rejected
        </v-tabs-item>
      </v-tabs-bar>
      <v-tabs-items>
        <v-tabs-content key="unreviewed" id="unreviewed">
            <v-container fluid style="min-height: 0;" grid-list-lg>
              <v-layout row wrap>
                <v-flex xs12 sm8 md6 lg5 xl4 v-for='submission in unreviewedSubmissions' :key='submission.id'>
                  <v-card color="white">
                    <v-card-title primary-title>
                      <div>
                        <h1 class="headline mb-0 text-xs-center">{{ submission.title }}</h1>
                        <p class="text-xs-right">by {{ submission.email }} ({{ submission.location }})</p>
                      </div>
                    </v-card-title>
                    <v-card-text class="mt-0 pt-0">
                      <v-tabs fixed icons centered>
                        <v-tabs-bar class="white ma-0 pa-0">
                          <v-tabs-slider class="black"></v-tabs-slider>
                          <v-tabs-item key="details" href="#details" class="white">
                            <v-icon>pageview</v-icon>
                            Details
                          </v-tabs-item>
                          <v-tabs-item key="comments" href="#comments" class="white">
                          <v-badge left>
                            <span slot="badge">{{ getSubmissionCommentsLength(submission.id) }}</span>
                            <v-icon>chat</v-icon>
                          </v-badge>
                            Comments
                          </v-tabs-item>
                          <v-tabs-item key="speakers" href="#speakers" class="white">
                            <v-icon>child_care</v-icon>
                            Speakers
                          </v-tabs-item>
                        </v-tabs-bar>
                        <v-tabs-items>
                          <cfp-submission :submission="submission"></cfp-submission>
                          <cfp-speakers :submission-speakers="submission.speakers"></cfp-speakers>
                          <cfp-comments :submission-id="submission.id"></cfp-comments>
                      </v-tabs-items>
                    </v-tabs>
                    </v-card-text>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn small flat v-if="true" color='white'>
                        <v-icon>assignment_turned_in</v-icon>
                        saved
                      </v-btn>
                      <v-btn small flat v-else color='white'>
                        <v-icon color="red lighten-4">assignment_late</v-icon>
                        not saved
                      </v-btn>
                    </v-card-actions>
                    <cfp-reviews-navbar-voting :submission-id="submission.id"></cfp-reviews-navbar-voting>
                  </v-card>
                </v-flex>
              </v-layout>
            </v-container>
        </v-tabs-content>
        <v-tabs-content key="approved" id="approved">
          <v-card flat>
            <v-card-text> Approved </v-card-text>
          </v-card>
        </v-tabs-content>
        <v-tabs-content key="rejected" id="rejected">
          <v-card flat>
            <v-card-text> Rejected </v-card-text>
          </v-card>
        </v-tabs-content>

      </v-tabs-items>
    </v-tabs>
  </div>
</template>

<script>
import CfpReviewTabComments from '@/components/CfpReviewTabComments'
import CfpReviewTabSpeakers from '@/components/CfpReviewTabSpeakers'
import CfpReviewTabSubmissionDetail from '@/components/CfpReviewTabSubmissionDetail'
import CfpReviewNavbarVoting from '@/components/CfpReviewNavbarVoting'

export default {
  name: 'cfp-reviews',
  data () {
    return {
      valid: false
    }
  },
  computed: {
    tailSubmissions: function () {
      let kwargs = {
        skip: 0,
        limit: 3
      }
      let submissions = this.$store.getters.tailSubmissions(kwargs)
      return submissions
    },
    unreviewedSubmissions: function () {
      let submissions = this.$store.getters.unreviewedSubmissions
      return submissions
    }
  },
  methods: {
    getSubmissionCommentsLength: function (submissionId) {
      let commentsLength = Object.keys(this.$store.getters.getSubmissionComments(submissionId)).length
      return commentsLength
    }
  },
  props: ['cfpId'],
  components: {
    'cfp-comments': CfpReviewTabComments,
    'cfp-speakers': CfpReviewTabSpeakers,
    'cfp-submission': CfpReviewTabSubmissionDetail,
    'cfp-reviews-navbar-voting': CfpReviewNavbarVoting
  }
}
</script>

<style scoped>
</style>
