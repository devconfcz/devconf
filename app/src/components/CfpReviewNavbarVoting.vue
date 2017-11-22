<template>
  <div>
    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn :color="(hasVotedPlus) ? 'grey':'black'" flat right :disabled="hasVotedPlus" @click="incrementVoteCount(1)">
        <v-badge left color="green">
          <span slot="badge">{{ voteCountPlus }}</span>
          <v-icon class="ma-2">thumb_up</v-icon>
            Vote +1
        </v-badge>
      </v-btn>
      <v-btn disabled flat right class="display-1 ma-3 mb-4">{{ voteTotal }}</v-btn>
      <v-btn :color="(hasVotedMinus) ? 'grey':'black'" flat right :disabled="hasVotedMinus" @click="incrementVoteCount(-1)">
        <v-badge right color="red">
          <span slot="badge">{{ voteCountMinus }}</span>
          <v-icon class="ma-2">thumb_down</v-icon>
            Vote -1
        </v-badge>
      </v-btn>
      <v-spacer></v-spacer>
    </v-card-actions>
  </div>
</template>

<script>

export default {
  name: 'cfp-reviews-navbar-voting',
  data () {
    return {
      voted: {}
    }
  },
  computed: {
    hasVotedPlus () {
      return (this.voted[this.submission.id] === 1) // FIXME: pull from $STORE
    },
    hasVotedMinus () {
      return (this.voted[this.submission.id] === -1)
    },
    voteCountPlus () {
      // console.log('CfpReviewNavbarVoting.computed.voteCountPlus: ', this.submissionId)
      return this.$store.getters.getVoteCountPlus(this.submission.id)
    },
    voteCountMinus () {
      // console.log('CfpReviewNavbarVoting.computed.voteCountMinus: ', this.submissionId)
      return this.$store.getters.getVoteCountMinus(this.submission.id)
    },
    voteTotal () {
      // console.log('CfpReviewNavbarVoting.computed.votes: ', this.submissionId)
      return this.$store.getters.getVoteTotal(this.submission.id)
    }
  },
  methods: {
    incrementVoteCount (incrementValue) {
      // console.log('CfpReviewNavbarVoting.methods.submissionVotePlus: ', this.submissionId)
      const payload = {
        submissionId: this.submission.id,
        incrementValue: incrementValue
      }
      this.$store.dispatch('incrementVoteCount', payload)
      .then(() => {
        // console.log(`${this.submission.id} -> ${incrementValue}`)
        this.$set(this.voted, this.submission.id, incrementValue)
        // this.$store.dispatch('refreshSubmissionStatus')
        let payload = {
          incrementValue: incrementValue,
          bucketName: this.bucketName,
          submissionId: this.submission.id
        }
        this.$store.dispatch('updateSubmissionBucket', payload)
      })
      .catch((e) => {
        console.log(`ERROR: ${e}`)
      })
    }
  },
  props: ['submission', 'bucketName']
}
</script>

<style scoped>
</style>
