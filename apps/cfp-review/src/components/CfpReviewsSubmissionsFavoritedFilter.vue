<template>
  <v-container fluid>
    <v-layout row wrap>
      <v-flex xs2>
          <v-checkbox
            label="theme"
            v-model="selected"
            :value="isFavoritedFilter"
          ></v-checkbox>
      </v-flex>
    </v-layout>
    <v-layout>
      <v-flex xs12>
        <v-divider></v-divider>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  name: 'cfp-reviews-favorited-filter',
  data () {
    return {}
  },
  computed: {
    selected: {
      get () {
        return this.$store.getters.getFavoritedFilter
      },
      set (value) {
        console.log('UPDATE: ' + value)
        this.$store.commit('updateFavoritedFilter', value)
      }
    },
    isFavoritedFilter () {
      return this.$store.getters.getFavoritedFilter
    }
  },
  methods: {},
  props: [],
  components: {}
}
</script>

<style></style>
