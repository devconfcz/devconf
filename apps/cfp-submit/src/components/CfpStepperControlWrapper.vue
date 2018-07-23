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
          <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
          <v-btn color="primary" @click.native="$emit('stepperUpdatePosition', 3)">Continue</v-btn>
          <v-btn color="secondary" @click.native="$emit('stepperUpdatePosition', 1)">Back</v-btn>
        </v-stepper-content>
        <v-stepper-content step="3">
          <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
          <v-btn color="primary" @click.native="$emit('stepperUpdatePosition', 4)">Continue</v-btn>
          <v-btn color="secondary" @click.native="$emit('stepperUpdatePosition', 2)">Back</v-btn>
        </v-stepper-content>
        <v-stepper-content step="4">
          <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
          <v-btn color="primary" @click.native="$emit('stepperUpdatePosition', 1)">Submit</v-btn>
          <v-btn color="secondary" @click.native="$emit('stepperUpdatePosition', )">Back</v-btn>
        </v-stepper-content>
      </v-stepper-items>
    </v-stepper>
  </div>

</template>

<script>
import ReviewProfile from '@/components/ReviewProfile'

export default {
  name: 'cfp-stepper',
  computed: {
    stepperPosition: {
      get () {
        return this.$store.getters.stepperPosition
      },
      set (position) {
        this.$store.commit('updateStepperPosition', position)
      }
    }
  },
  components: {
    'review-profile': ReviewProfile
  },
  props: ['currentUser']
}
</script>

<style>
</style>
