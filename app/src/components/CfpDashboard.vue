<template>
  <cfp-reviews-submissions-lists></cfp-reviews-submissions-lists>
</template>

<script>
import CfpReviewsSubmissionsLists from '@/components/CfpReviewsSubmissionsLists'

export default {
  name: 'cfp-dashboard',
  components: {
    'cfp-reviews-submissions-lists': CfpReviewsSubmissionsLists
  }
}
</script>

<style>
.pointer {
   cursor: pointer
}
</style>
