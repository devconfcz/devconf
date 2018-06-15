<template>
  <v-container fluid>
    <v-expansion-panel class="mb-3 grey lighten-5 text-xs-right" inset>
      <v-expansion-panel-content class="mb-3 grey lighten-5 text-xs-right">
        <div slot="header"><strong>({{ filter.length }} of {{ themes.length }} selected)</strong></div>

        <v-container fluid>
          <v-layout row wrap>
            <v-flex xs2 v-for="item in filter" :key="item.id">
                <v-checkbox
                  :label="item.text"
                  v-model="selected"
                ></v-checkbox>
            </v-flex>
          </v-layout>
          <v-layout row wrap>
            <v-flex xs2 offset-xs4>
              <div class="text-xs-center ma-3">
                <v-btn right @click="selectAll">Select all</v-btn>
              </div>
            </v-flex>
            <v-flex xs2>
              <div class="text-xs-center ma-3">
                <v-btn right @click="clearAll">Clear</v-btn>
              </div>
            </v-flex>
          </v-layout>
        </v-container>

      </v-expansion-panel-content>
    </v-expansion-panel>
  </v-container>
</template>

<script>
export default {
  name: 'cfp-program-submissions-filter',
  data () {
    return {
      filter: []
    }
  },
  computed: {
    selected: {
      get () {
        console.log('computed.selected', this.type)
        if (this.type === 'themes') {
          console.log('**********')
          return this.$store.getters.themesFilter
        } else if (this.type === 'tracks') {
          return this.$store.getters.tracksFilter
        } else {
          throw new Error('WHoops!')
        }
      },
      set (value) {
        this.$store.commit('updateThemesFilter', value)
      }
    },
    tracks () {
      console.log(this.$store.getters.tracks, '++++')
      return this.$store.getters.tracks
    },
    themes () {
      console.log(this.$store.getters.themes, '****')
      return this.$store.getters.themes
    }
  },
  methods: {
    selectAll () {
      console.log('methods.selectAll')
    },
    clearAll () {
      console.log('methods.clearAll')
    },
    selectThemes () {
      this.selectedThemes = this.themes.slice()
    },
    clearThemes () {
      this.selectedThemes = []
    },
    selectTracks () {
      this.selectedTracks = this.tracks.slice()
    },
    clearTracks () {
      this.selectedTracks = []
    }
  },
  props: ['type'],
  components: {}
}
</script>

<style></style>
