<template>
  <v-card-actions class="white">
    <v-spacer></v-spacer>
    <v-btn flat right @click="submissionVotePlus()">
      <v-badge left color="green">
        <span slot="badge">{{ voteCountPlus }}</span>
        <v-icon class="ma-2">thumb_up</v-icon>
          Vote +1
      </v-badge>
    </v-btn>
    <v-btn flat right @click="submissionVoteSkip()"><v-icon class="ma-2">next_week</v-icon>Skip</v-btn>
    <v-btn flat right @click="submissionVoteMinus()">
      <v-badge right color="red">
        <span slot="badge">{{ voteCountMinus }}</span>
        <v-icon class="ma-2">thumb_down</v-icon>
          Vote -1
      </v-badge>
    </v-btn>
    <v-spacer></v-spacer>
  </v-card-actions>
</template>

<script>
export default {
  name: 'cfp-reviews-navbar-voting',
  computed: {
    voteCountPlus: function () {
      console.log('CfpReviewNavbarVoting.computed.voteCountPlus: ', this.submissionId)
      return this.$store.getters.getSubmissionVoteCountPlus(this.submissionId)
    },
    voteCountMinus: function () {
      console.log('CfpReviewNavbarVoting.computed.voteCountMinus: ', this.submissionId)
      return this.$store.getters.getSubmissionVoteCountMinus(this.submissionId)
    },
    votes: function () {
      console.log('CfpReviewNavbarVoting.computed.votes: ', this.submissionId)
      return this.$store.getters.getSubmissionVotes(this.submissionId)
    }
  },
  methods: {
    submissionVotePlus: function () {
      console.log('CfpReviewNavbarVoting.methods.submissionVotePlus: ', this.submissionId)
      this.$store.dispatch('submissionVotePlus', this.submissionId)
    },
    submissionVoteMinus: function () {
      console.log('CfpReviewNavbarVoting.methods.submissionVoteMinus: ', this.submissionId)
      this.$store.dispatch('submissionVoteMinus', this.submissionId)
    }
  },
  props: ['submissionId'],
  components: {},
  created: function () {
    console.log('CfpReviewNavbarVoting.created: ', this.submissionId)
    this.$store.dispatch('getFirebaseDatabaseVoting', this.submissionId)
  }
}
</script>

<style scoped>
</style>
