<template>
  <div>
    <v-stepper v-model="stepperPosition">
      <v-stepper-header>
        <v-stepper-step :complete="stepperPosition > 1" step="1">Review Submitter Profile</v-stepper-step>
        <v-divider></v-divider>
        <v-stepper-step :complete="stepperPosition > 2" step="2">Edit Submission</v-stepper-step>
        <v-divider></v-divider>
        <v-stepper-step :complete="stepperPosition > 3" step="3">Review Submission</v-stepper-step>
        <v-divider></v-divider>
        <v-stepper-step step="4">Submit</v-stepper-step>
      </v-stepper-header>
      <v-stepper-items>
        <v-stepper-content step="1">
          <review-profile :currentUser="currentUser"></review-profile>
        </v-stepper-content>
        <v-stepper-content step="2">
          <edit-submission></edit-submission>
        </v-stepper-content>
        <v-stepper-content step="3">
          <review-submission></review-submission>
        </v-stepper-content>
        <v-stepper-content step="4">
          <submit-submission></submit-submission>
        </v-stepper-content>
      </v-stepper-items>
    </v-stepper>
    <v-toolbar>
      <v-spacer></v-spacer>
      <v-btn v-if="stepperPosition > 1"
        color="secondary"
        @click.native="backStepperPosition()"
      >
        Back
      </v-btn>
      <v-btn v-if="stepperPosition < 4"
        color="primary"
        @click.native="advanceStepperPosition()"
      >
        Continue
      </v-btn>
      <v-btn v-if="stepperPosition === 4"
        color="green"
        @click.native="confirmSubmission()"
      >
        Submit
      </v-btn>
    </v-toolbar>
    <!-- Dialog pre-loading -->
    <form-profile-edit-dialog :currentUser="currentUser"></form-profile-edit-dialog>
  </div>
</template>

<script>
import ReviewProfile from '@/components/StepReviewProfile'
import EditSubmission from '@/components/StepEditSubmission'
import ReviewSubmission from '@/components/StepReviewSubmission'
import SubmitSubmission from '@/components/StepSubmitSubmission'

import FormProfileEditDialog from '@/components/FormProfileEditDialog'

export default {
  name: 'cfp-stepper',
  computed: {
    stepperPosition: {
      get () {
        return this.$store.getters.stepperPosition
      },
      set (position) {
        this.$store.commit('updateStepperPosition', parseInt(position))
      }
    }
  },
  methods: {
    backStepperPosition () {let promise = 
      let newPosition = this.$store.getters.stepperPosition - 1
      this.$store.commit('updateStepperPosition', newPosition)
    },
    advanceStepperPosition () {
      let newPosition = this.$store.getters.stepperPosition + 1
      this.$store.commit('updateStepperPosition', newPosition)
    },
    confirmSubmission () {
      alert('SAVED')
    }
  },
  components: {
    'review-profile': ReviewProfile,
    'form-profile-edit-dialog': FormProfileEditDialog,
    'edit-submission': EditSubmission,
    'review-submission': ReviewSubmission,
    'submit-submission': SubmitSubmission
  },
  props: ['currentUser']
}
</script>
