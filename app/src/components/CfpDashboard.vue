<template>
  <cfp-reviews :buckets="buckets"></cfp-reviews>
</template>

<script>
import CfpReviews from '@/components/CfpReviews'

export default {
  name: 'cfp-dashboard',
  computed: {
    buckets () {
      let buckets = [
        {id: 'unreviewed', text: 'Unreviewed', badgeColor: 'black', submissions: this.$store.getters.unreviewed},
        {id: 'approved', text: 'Approved', badgeColor: 'green', submissions: this.$store.getters.approved},
        {id: 'rejected', text: 'Rejected', badgeColor: 'red', submissions: this.$store.getters.rejected}
      ]
      return buckets
    }
  },
  components: {
    'cfp-reviews': CfpReviews
  }
}
</script>

<style>
ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
