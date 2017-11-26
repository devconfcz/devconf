<template>
  <div>
    <v-footer class="pa-3">

      <v-btn icon class="ml-5 green--text text--darken-3" @click="openDrawerApproved()">
        <v-icon class="black--text">chevron_right</v-icon>
        <v-icon class="mr-2">check</v-icon>
        Approved ({{ approved.length }})
      </v-btn>

      <v-spacer></v-spacer>

      <v-btn flat @click="reloadSubmissions()">
          <v-icon>refresh</v-icon>
      </v-btn>

      <v-spacer></v-spacer>

      <v-btn icon class="mr-5 red--text text--darken-3" @click="openDrawerRejected()">
        ({{ rejected.length }})
        Rejected
        <v-icon class="ml-2">delete_sweep</v-icon>
        <v-icon class="black--text">chevron_left</v-icon>
      </v-btn>

    </v-footer>

    <cfp-reviews-submissions-lists-drawer
      :drawer="drawers.approved"
      :types="types"
    ></cfp-reviews-submissions-lists-drawer>
    
    <cfp-reviews-submissions-lists-drawer
      :drawer="drawers.rejected"
      :types="types"
    ></cfp-reviews-submissions-lists-drawer>
  </div>
</template>

<script>
import CfpReviewsSubmissionsListsDrawer from '@/components/CfpReviewsSubmissionsListsDrawer'

export default {
  name: 'cfp-reviews-submissions-lists-drawers-nav',
  data () {
    return {}
  },
  computed: {
    approved () {
      return this.$store.getters.approved
    },
    rejected () {
      return this.$store.getters.rejected
    }
  },
  methods: {
    reloadSubmissions () {
      this.$store.dispatch('loadSubmissions')
    },
    openDrawerApproved () {
      this.drawers.approved.active = true
    },
    openDrawerRejected () {
      this.drawers.rejected.active = true
    }
  },
  props: ['drawers', 'types', 'details'],
  components: {
    'cfp-reviews-submissions-lists-drawer': CfpReviewsSubmissionsListsDrawer
  }
}
</script>

<style></style>
