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
                  <ul class="blocked">
                    <li><em>Name</em>: {{ speaker.display_name }}</li>
                    <li><em>Organization</em>: {{ speaker.organization }}</li>
                    <li><em>Description</em>: {{ speaker.short_description }}</li>
                    <li><em>About</em>: </li>
                  </ul>
                  <p v-html="speaker.description.replace(/\n/g, '<br/>')" class="mt-1 ml-2"></p>
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
  methods: {
    speakerImage (email) {
      console.log(email)
      // console.log(this.$store.getters.storage.ref('users').getDownloadURL().then((url) => {
      // }))
    }
  },
  props: ['submission-speakers']
}
</script>

<style scoped>
.blocked {
  list-style: none;
  padding: 0;
  display: grid;
}

em {
  font-weight: 600;
}
</style>
