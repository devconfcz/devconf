<template>
  <div>
    <cfp-dashboard></cfp-dashboard>
  </div>
</template>

<script>
import CfpDashboard from '@/components/CfpDashboard'

export default {
  name: 'app-cfp',
  components: {
    'cfp-dashboard': CfpDashboard
  }
}
</script>

<style>
</style>
