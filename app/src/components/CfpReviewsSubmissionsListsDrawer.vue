<template>
  <v-navigation-drawer
    v-model="drawer.active"
    light
    absolute
    :right="drawer.right === true"
    :width="drawer.width"
  >
  <v-toolbar :color="drawer.toolbarColor" :dark="drawer.toolbarIsDark">
    <v-btn v-if="drawer.right === false" @click="closeDrawer()" icon>
      <v-icon >chevron_left</v-icon>
    </v-btn>
    <v-toolbar-title>{{ drawer.label }}</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-btn v-if="drawer.right === true" @click="closeDrawer()" icon>
      <v-icon >chevron_right</v-icon>
    </v-btn>
  </v-toolbar>
  <v-list two-line>
    <v-list-group v-for="type in types" :key="type.id" :value="type.active">
      <v-list-tile slot="item" @click="">
        <v-list-tile-action>
          <v-icon @click.stop="closeDrawer()"></v-icon>
        </v-list-tile-action>
        <v-list-tile-action>
          <v-icon large :color="type.iconColor" :class="type.iconClass">{{ type.icon }}</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>{{ type.label }} ({{ filterSubmissions(drawer.submissions, type.id).length }})</v-list-tile-title>
        </v-list-tile-content>
        <v-list-tile-action>
          <v-icon>keyboard_arrow_down</v-icon>
        </v-list-tile-action>
      </v-list-tile>
      <v-list-tile avatar v-for="submission in filterSubmissions(drawer.submissions, type.id)" :key="submission.id" @click="loadDetails(submission.id)">
        <v-list-tile-action>
          <v-icon v-if="hasVoted(submission.id)" color="red darken-3" @click="setVoteCount(submission.id, 1)">whatshot</v-icon>
          <v-icon v-else color="grey lighten-4" @click="setVoteCount(submission.id, 0)">whatshot</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>{{ submission.title }}</v-list-tile-title>
          <v-list-tile-sub-title>{{ submission.themes.join(', ') }}</v-list-tile-sub-title>
        </v-list-tile-content>
      </v-list-tile>
    </v-list-group>
  </v-list>
  </v-navigation-drawer>
</template>

<script>

export default {
  name: 'cfp-reviews-submissions-lists-drawers',
  data () {
    return {
    }
  },
  computed: {
  },
  methods: {
    closeDrawer () {
      this.drawer.active = false
    },
    hasVoted (submissionId) {
      // console.log(`methods.hasVoted`)
      return this.$store.getters.getVoted(submissionId)
    },
    voteCount (submissionId) {
      // console.log('methods.voteCount: ', this.submissionId)
      return this.$store.getters.getVoteCount(submissionId)
    },
    voteTotal (submissionId) {
      // console.log('methods.voteTotal: ', this.submissionId)
      return this.$store.getters.getVoteTotal(submissionId)
    },
    filterSubmissions (submissions, type) {
      // // console.log(`filterSubmissions: ${type}`, submissions)
      return submissions.filter(s => s.type === type)
    },
    loadDetails (submissionId) {
      return this.$store.getters.getSubmission(submissionId)
    }
  },
  props: ['drawer', 'submissions', 'types'],
  components: {
  }
}
</script>

<style>
.list--group .list__tile {
  padding-left: 12px!important;
}
</style>
