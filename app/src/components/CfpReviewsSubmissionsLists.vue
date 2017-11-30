<template>
  <v-container fluid>
    <cfp-reviews-submissions-lists-drawers-nav
      :drawers="drawers"
      :types="types"
    ></cfp-reviews-submissions-lists-drawers-nav>
    
    <cfp-reviews-submissions-lists-theme-filter></cfp-reviews-submissions-lists-theme-filter>

    <!--
    <cfp-reviews-submissions-favorited-filter
    ></cfp-reviews-submissions-favorited-filter>
  -->

    <cfp-reviews-submissions-lists-panel
      :drawer="drawers.unreviewed"
      :types="types"
    ></cfp-reviews-submissions-lists-panel>

    <cfp-reviews-submissions-details></cfp-reviews-submissions-details>

  </v-container>
</template>

<script>
import CfpReviewTabSpeakers from '@/components/CfpReviewTabSpeakers'
import CfpReviewsSubmissionsListsPanel from '@/components/CfpReviewsSubmissionsListsPanel'
import CfpReviewsSubmissionsListsDrawersNav from '@/components/CfpReviewsSubmissionsListsDrawersNav'
import CfpReviewsSubmissionsDetails from '@/components/CfpReviewsSubmissionsDetails'
import CfpReviewsSubmissionsListsThemeFilter from '@/components/CfpReviewsSubmissionsListsThemeFilter.vue'
import CfpReviewsSubmissionsFavoritedFilter from '@/components/CfpReviewsSubmissionsFavoritedFilter.vue'

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
      types: [
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
        /*,
        {
          id: 'Booth',
          label: 'Booths',
          icon: 'child_care',
          toolbarColor: 'purple',
          toolbarIsDark: true,
          submissions: this.$store.getters.discussions,
          iconClass: '',
          iconColor: ''
        },
        {
          id: 'Meetup',
          label: 'Meetups',
          icon: 'hot_tub',
          toolbarColor: 'purple',
          toolbarIsDark: true,
          submissions: this.$store.getters.discussions,
          iconClass: '',
          iconColor: ''
        }
        */
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
  },
  props: [],
  components: {
    'cfp-reviews-submissions-favorited-filter': CfpReviewsSubmissionsFavoritedFilter,
    'cfp-reviews-submissions-lists-theme-filter': CfpReviewsSubmissionsListsThemeFilter,
    'cfp-reviews-tab-speakers': CfpReviewTabSpeakers,
    'cfp-reviews-submissions-lists-panel': CfpReviewsSubmissionsListsPanel,
    'cfp-reviews-submissions-lists-drawers-nav': CfpReviewsSubmissionsListsDrawersNav,
    'cfp-reviews-submissions-details': CfpReviewsSubmissionsDetails
  }
}
</script>

<style>
</style>
