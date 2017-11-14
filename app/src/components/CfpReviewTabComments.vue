<template>
  <v-tabs-content key="comments" id="comments">
    <v-flex xs12>
      <v-card flat v-if="!comments.length > 0">
        <v-card-title>No comments yet</v-card-title>
      </v-card>
      <v-card v-else class="pb-3"
       :key="key" v-for="(comment, key) in comments"
      >
        <v-card-text class="mb-0 pb-0">
          <p class="mb-0 pb-0" v-text="comment.text"></p>
        </v-card-text>
        <v-card-title v-if="comment.creator" class="mt-0 pt-0">
          <b>by {{ comment.creator }}</b>
        </v-card-title>
      </v-card>
      <v-flex xs12>
        <v-form v-model="valid">
          <v-text-field v-model="newComment" label="Click here to add a new Comment" required></v-text-field>
          <v-btn @click="newSubmissionComment">submit</v-btn>
        </v-form>
      </v-flex>
    </v-flex>
  </v-tabs-content>
</template>

<script>

export default {
  name: 'cfp-review-tab-comments',
  data () {
    return {
      valid: false,
      newComment: ''
    }
  },
  computed: {
    comments: function () {
      console.log('CfpReviewTabComments.computed.comments: ', this.submissionId)
      let comments = Object.values(this.$store.getters.getSubmissionComments(this.submissionId))
      return comments
    }
  },
  methods: {
    newSubmissionComment: function (event) {
      console.log('CfpReviewTabComments.methods.newSubmissionComment: ', this.submissionId)
      let payload = {
        text: this.newComment,
        submitter: this.$store.getters.currentUser
      }
      this.$store.getters.db.ref('/comments/' + this.submissionId).push(payload)
      this.newComment = ''
    }
  },
  props: ['submissionId'],
  components: {},
  created: function () {
    console.log('CfpReviewTabComments.created: ', this.submissionId)
    this.$store.dispatch('getFirebaseDatabaseSubmissionComments', this.submissionId)
  }

}
</script>

<style scoped>
</style>
