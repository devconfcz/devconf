<template>
  <v-navigation-drawer
    v-model="drawer.active"
    light
    absolute
    :right="drawer.right === true"
    :width="drawer.width"
  >
    <v-toolbar :color="drawer.toolbarColor" :dark="drawer.toolbarIsDark">
      <v-toolbar-title>{{ drawer.label }} ({{ submissions.length }})</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-icon dark @click='drawer.active = false' class="pointer">clear</v-icon>
    </v-toolbar>
    <v-list two-line>
      <v-list-group v-for="type in types" :key="type.id" :value="type.active">
        <v-list-tile slot="item" @click="">
          <v-list-tile-action>
            <v-icon color="type.iconColor" class="type.iconClass">{{ type.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ type.label }} ({{ filterSubmissions(type.id).length }})</v-list-tile-title>
          </v-list-tile-content>
          <v-list-tile-action>
            <v-icon>keyboard_arrow_down</v-icon>
          </v-list-tile-action>
        </v-list-tile>
        <v-list-tile v-for="submission in submissions" :key="submission.id"
          avatar
          @click="showDetails(submission.id)"
        >
          <!--
          <v-list-tile-action>
            <v-icon v-if="hasFavorited(submission.id)"
              class=""
              color="amber darken-4"
              @click.stop.prevent="setFavorited(submission.id, 0)"
            >
              star_border
            </v-icon>
            <v-icon v-else
              class=""
              color="grey lighten-1"
              @click.stop.prevent="setFavorited(submission.id, 1)"
            >
              star_border
            </v-icon>
          </v-list-tile-action>
          -->

          <v-list-tile-action>
            <v-icon v-if="hasVoted(submission.id) > 0"
                color="grey lighten-1"
                disable
                class="pointer-off"
                @click.stop="setVoted(submission.id, 0)"
            >
              exposure_plus_1
            </v-icon>
            <v-icon v-else
              color="green darken-4"
              class=""
              @click.stop="setVoted(submission.id, 1)"
            >
              exposure_plus_1
            </v-icon>
          </v-list-tile-action>

          <v-list-tile-action>
            <v-icon v-if="hasVoted(submission.id) < 0"
                color="grey lighten-1"
                disable
                class="pointer-off"
                @click.stop="setVoted(submission.id, 0)"
            >
              exposure_minus_1
            </v-icon>
            <v-icon v-else
              color="red darken-4"
              class="pointer"
              @click.stop="setVoted(submission.id, -1)"
            >
              exposure_minus_1
            </v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title><b>{{ submission.title }}</b></v-list-tile-title>
            <v-list-tile-sub-title class="grey--text text--darken-2">{{ submission.abstract }}</v-list-tile-sub-title>
            <v-list-tile-sub-title class="deep-purple--text text--darken-4"><em>[ {{ submission.themes.join(', ') }} ]</em></v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list-group>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
import CfpReviewsSubmissionsListsPanel from '@/components/CfpReviewsSubmissionsListsPanel'

export default {
  name: 'cfp-reviews-submissions-lists-drawer',
  computed: {
    submissions () {
      return this.$store.getters[this.drawer.id]
    }
  },
  methods: {
    setFavorited (submissionId, value) {
      // console.log(`methods.setFavorited`)
      this.$store.dispatch('setFavorited', {
        submissionId: submissionId,
        value: value
      })
    },
    hasFavorited (submissionId) {
      // console.log(`methods.hasFavorited`) // : ${submissionId}`)
      // console.log(this.$store.getters.getFavorited(submissionId))
      return this.$store.getters.getFavorited(submissionId)
    },
    closeDrawer () {
      this.drawer.active = false
    },
    hasVoted (submissionId) {
      // console.log(`methods.hasVoted`)
      return this.$store.getters.getVoted(submissionId)
    },
    setVoted (submissionId, value) {
      this.$store.dispatch('setVoted', {
        submissionId: submissionId,
        value: value
      })
    },
    voteCount (submissionId) {
      // console.log('methods.voteCount: ', this.submissionId)
      return this.$store.getters.getVoteCount(submissionId)
    },
    voteTotal (submissionId) {
      // console.log('methods.voteTotal: ', this.submissionId)
      return this.$store.getters.getVoteTotal(submissionId)
    },
    filterSubmissions (type) {
      if (!(this.submissions)) {
        // console.log('... empty submissions. Nothing to filter.')
        return []
      }
      return this.submissions.filter(s => s.type === type)
    },
    showDetails (submissionId) {
      // console.log('methods.showDetails... ')
      this.$store.getters.getBus.$emit('showDetails', submissionId)
    }
  },
  props: ['drawer', 'types'],
  components: {
    'cfp-reviews-submissions-lists-panel': CfpReviewsSubmissionsListsPanel
  }
}
</script>

<style>
.list--group .list__tile {
  padding-left: 12px!important;
}
</style>
