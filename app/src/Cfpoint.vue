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
  },
  created: function () {
    // FIXME: get dbRefPath from parent?
    let firebaseSubmissionsConfig = {
      skip: 0,
      limit: 5,
      dbRefPathForm: '1v7r4ZgaJl97t751UnCKPPuk2SDRugsIjesBedmtSYhA'
    }
    this.$store.dispatch(
      'tailFirebaseDatabaseSubmissions', firebaseSubmissionsConfig)
  }
}
</script>

<style>
h1 {
  font-size: 1.5em;
}

h2 {
  font-size: 1.2em;
}

h3 {
  font-size: 1.1em;
}

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
