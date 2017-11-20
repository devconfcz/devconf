<template>
  <v-tabs-items>
    <v-tabs-content key="speakers" id="speakers">
      <div class="mt-3">
      <v-flex xs12>
        <v-card v-for="speaker in submissionSpeakers" :key="speaker.id">
          <v-container fluid grid-list-lg>
            <v-layout row>
              <v-flex xs12>
                <v-card-media
                  :src="speaker.photo_url"
                  height="125px"
                  contain
                ></v-card-media>
              </v-flex>
            </v-layout>
            <v-layout row>
              <v-flex xs12>
                <div>
                  <ul style="list-style: none; padding: 0">
                    <li><em>Name</em>: {{ speaker.full_name }}</li>
                    <li><em>Organization</em>: {{ speaker.organization }}</li>
                    <li><em>Description</em>: {{ speaker.short_description }}</li>
                    <li><em>About</em>: {{ speaker.description }}</li>
                  </ul>
                </div>
              </v-flex>
              </v-layout>
          </v-container>
        </v-card>
      </v-flex>
      </div>
    </v-tabs-content>
  </v-tabs-items>
</template>

<script>

export default {
  name: 'cfp-review-tab-speakers',
  data () {
    return {
    }
  },
  computed: {
  },
  methods: {
  },
  props: ['submission-speakers'],
  components: {
  }
}
</script>

<style scoped>
</style>
