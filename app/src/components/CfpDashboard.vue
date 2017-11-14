<template>
  <div>
    <h1>Cfp Dashboard</h1>
    <cfp-reviews cfp-id='cfpId'></cfp-reviews>
  </div>
</template>

<script>
import CfpReviews from '@/components/CfpReviews'

export default {
  name: 'cfp-dashboard',
  data () {
    return {
      'cfpId': '1v7r4ZgaJl97t751UnCKPPuk2SDRugsIjesBedmtSYhA'  // FIXME: NOT BEING USED!?
    }
  },
  components: {
    'cfp-reviews': CfpReviews
  }
}
</script>

<style scoped>
</style>
