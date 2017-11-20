<template>
  <div>
    <h1>Cfp Dashboard</h1>
    <cfp-reviews></cfp-reviews>
  </div>
</template>

<script>
import CfpReviews from '@/components/CfpReviews'

export default {
  name: 'cfp-dashboard',
  components: {
    'cfp-reviews': CfpReviews
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
