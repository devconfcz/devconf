<template>
  <div>
    <v-tabs :scrollable="false" light grow centered v-model="active">
      <v-tabs-bar class="white">
        <v-tabs-item
          v-for="(tab, i) in tabs"
          :key="tab.id"
          :href="'#' + tab.id"
        >
          {{ tab.text }}
        </v-tabs-item>
        <v-tabs-slider color="black"></v-tabs-slider>
      </v-tabs-bar>
      <v-tabs-items>
        <v-tabs-content
          v-for="(tab, i) in tabs"
          :key="tab.id"
          :id="tab.id"
        >
          <cfp-submissions :submissions="getSubmissions(tab.id)"></cfp-submissions>
        </v-tabs-content>
      </v-tabs-items>
    </v-tabs>
  </div>
</template>

<script>
import CfpReviewsSubmissions from '@/components/CfpReviewsSubmissions'

export default {
  name: 'cfp-reviews',
  data () {
    return {
      active: null,
      tabs: [
        {id: 'unreviewed', text: 'Unreviewed'},
        {id: 'approved', text: 'Approved'},
        {id: 'rejected', text: 'Rejected'}
      ]
    }
  },
  computed: {
  },
  methods: {
    getSubmissions (tabId) {
      return this.$store.getters[tabId]
    }
  },
  props: ['cfpId'],
  components: {
    'cfp-submissions': CfpReviewsSubmissions
  },
  mounted: function () {
    this.active = 'unreviewed'
  },
  beforeCreate: function () {
    let payload = {
      skip: 0,
      limit: 2
    }
    this.$store.dispatch('loadSubmissions', payload)
    /*
    this.$store.dispatch('tailFirebaseDatabaseSubmissions', payload)
      .then(() => {
        console.log('Data Initialization Complete!')
        console.log(this.$store.state._submissions, this.$store.state._voting)
        this.$store.dispatch('toggleLoading')
      })
      .catch(e => {
        console.log(`ERROR during data initialization! (${e})`)
      })
    */
  }
}
</script>

<style scoped>
</style>
