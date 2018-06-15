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

    <cfp-reviews-submissions-details bucket="unreviewed"></cfp-reviews-submissions-details>

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
    }
  },
  methods: {
  },
  props: [],
  components: {
  }
}
</script>

<style>
</style>
