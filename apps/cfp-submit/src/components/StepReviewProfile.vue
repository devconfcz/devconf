<template>
  <v-container grid-list-xl>
    <v-layout row wrap>
      <v-flex xs6 offset-xs3>
        <v-card v-if="currentUser.profile" flat>
          <v-card-media
            :src="currentUser.photoURL"
            height="200px"
            contain
          ></v-card-media>
          <v-card-title primary-title>
              <blockquote class="blockquote ma-2 subheading">
                Name:    {{ currentUser.profile.display_name }}
                <br/>
                Email:   {{ currentUser.profile.email }}
                <br/>
                Organization: {{ currentUser.profile.organization }}
                <br/>
                Tagline: {{ currentUser.profile.short_description }}
                <br/>
                GitHub:  {{ currentUser.profile.github_url }}
                <br/>
                Twitter: {{ currentUser.profile.twitter_url }}
                <br/>
                About me:
                <br/>
                {{ currentUser.profile.description }}
              </blockquote>
          </v-card-title>
          <v-card-actions>
            <v-btn
              color="secondary"
              @click.stop="toggleProfileEditDialog()"
            >
            Edit
          </v-btn>
          </v-card-actions>
        </v-card>
        <v-card v-else>
            <div>looks like we need to import data FIRST TIME HERE?</div>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  name: 'review-profile',
  methods: {
    toggleProfileEditDialog () {
      this.$store.commit('toggleProfileEditDialog')
    }
  },
  props: ['currentUser']
}
</script>
