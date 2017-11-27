<template>
  <v-container fluid>
    <v-layout row wrap>
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
    </v-layout>
  </v-container>
</template>

<script>
export default {
  name: 'cfp-reviews-theme-filter',
  data () {
    return {
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
    }
  },
  methods: {
    selectAllThemes () {
      this.selected = this.themes.slice()
    },
    clearThemes () {
      this.selected = []
    }
  },
  props: [],
  components: {
  }
}
</script>
