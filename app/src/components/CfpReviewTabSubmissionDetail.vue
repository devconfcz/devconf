<template>
  <v-tabs-content key="details" id="details">
    <div class="mt-3">
      <span>
        <ul style="list-style: none; padding: 0">
          <li><em>Type</em>: {{ submission.type }}</li>
          <li><em>Difficulty:</em> {{ submission.difficulty.split(' ').slice(0,1).join('') }}</li>
          <li><em>Duration:</em> {{ submission.duration }}</li>
          <li><em>Themes:</em> {{ submission.themes.join(', ') }}</li>
          <li><em>Abstract:</em></li>
        </ul>
        <p v-html="submission.abstract.replace(/\n/g, '<br/>')" class="mt-1 ml-2"></p>
      </span>
    </div>
  </v-tabs-content>
</template>

<script>
export default {
  name: 'cfp-review-tab-submission-detail',
  computed: {
  },
  methods: {
  },
  props: ['submission'],
  components: {
  }
}
</script>

<style scoped>
</style>
