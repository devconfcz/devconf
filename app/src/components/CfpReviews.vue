<template>
  <v-container fluid>
    <v-layout row wrap>
      <v-flex xs12>
        <p class="text-xs-center">Theme filter</p>
      </v-flex>
      <v-flex xs2 v-for="theme in themes" :key="theme">
          <v-checkbox
            :label="theme"
            v-model="selected"
            :value="theme"
          ></v-checkbox>
      </v-flex>
    </v-layout>
    <v-layout row wrap>
      <v-flex xs2 offset-xs4>
        <div class="text-xs-center ma-3">
          <v-btn right @click="selectAllThemes">Select all</v-btn>
        </div>
      </v-flex>
      <v-flex xs2>
        <div class="text-xs-center ma-3">
          <v-btn right @click="clearThemes">Clear</v-btn>
        </div>
      </v-flex>
      <v-flex xs12>
        <v-divider></v-divider>
      </v-flex>
      <v-flex xs12>
        <v-tabs :scrollable="scrollable" light grow centered v-model="active">
          <v-tabs-bar class="white">
            <v-tabs-item
              v-for="(bucket, i) in buckets"
              :key="bucket.id"
              :href="'#' + bucket.id"
            >
              {{ bucket.text }}
              <v-badge v-if="!isLoading" :color="bucket.badgeColor" class="ml-3">
                <span slot="badge" style="font-size: .8em; font-weight: 500">{{ bucket.submissions.length }}</span>
              </v-badge>
              <v-progress-circular
                v-if="isLoading"
                indeterminate
                v-bind:width="1"
                :color="bucket.badgeColor"
                class="ml-3"
              ></v-progress-circular>
            </v-tabs-item>
            <v-tabs-slider color="black"></v-tabs-slider>
          </v-tabs-bar>
          <v-tabs-items>
            <v-tabs-content class="white" v-for="(bucket, i) in buckets" :key="bucket.id" :id="bucket.id">
              <cfp-submissions
                :submissions="bucket.submissions.slice(startIx, 20)"
                :bucketName="bucket.id"
              ></cfp-submissions>
              <div v-if="bucket.id === 'unreviewed'">
                <p v-if="bucket.submissions.length > 0" :display="!isLoading" class="text-xs-right display-1 ma-4">... with {{ bucket.submissions.length }} submissions in the queue (autoload: enabled)</p>
                <p v-else class="text-xs-right display-1 ma-4">... That's it!</p>
              </div>
            </v-tabs-content>
          </v-tabs-items>
        </v-tabs>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import CfpReviewsSubmissions from '@/components/CfpReviewsSubmissions'

export default {
  name: 'cfp-reviews',
  data () {
    return {
      scrollable: false,
      active: null
    }
  },
  computed: {
    selected: {
      get () {
        return this.$store.getters.themesFilter
      },
      set (value) {
        this.$store.commit('updateThemesFilter', value)
      }
    },
    themes () {
      return this.$store.getters.themes
    },
    progressValue () {
      return 50
    },
    isLoading () {
      return this.$store.getters.isLoading
    },
    startIx () {
      return 0
    }
  },
  methods: {
    selectAllThemes () {
      this.selected = this.themes.slice()
    },
    clearThemes () {
      this.selected = []
    },
    calcRemaining (bucketIndex) {
      let remaining = this.buckets[bucketIndex].submissions.length
      if (remaining > this.sliceCount) {
        return remaining - this.sliceCount
      } else {
        return 0
      }
    },
    getSubmissions (tabId) {
      // console.log(`Getting submissions (${tabId})`)
      return this.$store.getters[tabId]
    }
  },
  props: ['cfpId', 'buckets'],
  components: {
    'cfp-submissions': CfpReviewsSubmissions
  },
  mounted: function () {
    this.active = 'unreviewed'
  },
  beforeCreate: function () {
  }
}
</script>

<style scoped>
</style>
