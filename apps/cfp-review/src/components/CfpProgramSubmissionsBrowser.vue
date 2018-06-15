<template>
  <cfp-program-submissions-results-table :event="event"></cfp-program-submissions-results-table>
</template>

<script>
import CfpProgramSubmissionsResultsTable from '@/components/CfpProgramSubmissionsResultsTable'

export default {
  name: 'cfp-program-submission-browser',
  components: {
    'cfp-program-submissions-results-table': CfpProgramSubmissionsResultsTable
  },
  props: ['event']
}
</script>

<style>
</style>
