<template>
  <v-container fluid grid-list-lg>
    <v-layout row wrap>
      <v-flex xs12 sm8 md6 lg5 xl4 v-for='submission in submissions' :key='submission.id'>
        <v-card color="white">
          <v-card-title primary-title>
            <div>
              <h1 class="headline mb-0 text-xs-center">{{ submission.title }}</h1>
              <p class="text-xs-right">by {{ submission.meta.primary_contact.display_name }}</p>
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
                <v-tabs-item key="speakers" href="#speakers" class="white">
                  <v-icon>child_care</v-icon>
                  Speakers
                </v-tabs-item>
              </v-tabs-bar>
              <v-tabs-items>
                <cfp-submission :submission="submission"></cfp-submission>
                <cfp-speakers :submission-speakers="submission.meta.contacts"></cfp-speakers>
              </v-tabs-items>
            </v-tabs>
          </v-card-text>
          <cfp-reviews-navbar-voting :submission="submission" :bucketName="bucketName"></cfp-reviews-navbar-voting>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import CfpReviewTabComments from '@/components/CfpReviewTabComments'
import CfpReviewTabSpeakers from '@/components/CfpReviewTabSpeakers'
import CfpReviewTabSubmissionDetail from '@/components/CfpReviewTabSubmissionDetail'
import CfpReviewNavbarVoting from '@/components/CfpReviewNavbarVoting'

export default {
  name: 'cfp-reviews-unreviewed',
  data () {
    return {
    }
  },
  methods: {
  },
  props: ['submissions', 'bucketName'],
  components: {
    'cfp-reviews-navbar-voting': CfpReviewNavbarVoting,
    'cfp-comments': CfpReviewTabComments,
    'cfp-speakers': CfpReviewTabSpeakers,
    'cfp-submission': CfpReviewTabSubmissionDetail
  }
}
</script>
