<template>
  <v-toolbar app>
    <v-toolbar-title>{{ site.title }}</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-side-icon class="hidden-md-and-up"></v-toolbar-side-icon>
    <v-toolbar-items class="hidden-sm-and-down">
      <v-btn v-if="isLoggedIn" flat disabled>{{ currentUser.email }}</v-btn>
      <v-btn v-if="isLoggedIn" flat @click="logOut">
        logout
        <v-icon>exit_to_app</v-icon>
      </v-btn>
    </v-toolbar-items>
  </v-toolbar>
</template>

<script>
export default {
  name: 'navbar',
  computed: {
    site () {
      return this.$store.getters.site
    }
  },
  methods: {
    logOut () {
      this.$store.dispatch('logOut')
    }
  },
  props: ['currentUser', 'isLoggedIn']
}
</script>

<style>

</style>
