<template>
</template>

<script>
import CfpProgramSubmissionsResultsTable from '@/components/CfpProgramSubmissionsResultsTable'

export default {
  name: 'cfp-events-list',
  computed: {
    site () {
      return this.$store.getters.site
    },
    events () {
      return Object.values(this.site.events)
    }
  }
  components: {}
}
</script>

<style>
</style>
