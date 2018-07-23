<template>
  <v-dialog
    v-model="dialogEditProfileIsOpen"
    hide-overlay
    fullscreen
    transition="dialog-bottom-transition"
    scrollable
  >
    <v-card tile>
      <v-toolbar card dark color="primary">
        <v-btn icon dark @click.native="toggleProfileEditDialog()">
          <v-icon>close</v-icon>
        </v-btn>
        <v-toolbar-title>Edit Submitter Profile</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
          <v-btn dark flat @click.native="toggleProfileEditDialog()">Save</v-btn>
        </v-toolbar-items>
      </v-toolbar>
      <v-card-text>
        <v-container>
          <v-layout>
            <v-flex xs6
            text-xs-center
            align-center
            justify-center
          >
            <div>
              <v-avatar
                :tile="false"
                :size="300"
                color="grey lighten-4"
              >
                <img src="https://firebasestorage.googleapis.com/v0/b/cward-cfpoint-devel.appspot.com/o/profile-blank.jpg?alt=media&token=59510d6a-861c-4b46-a906-abf3f554e0e2" alt="avatar">
              </v-avatar>
            </div>
            <div>
              <v-btn
                large
                @click.native="alert('UPLOAD')"
              >
                <v-icon>edit</v-icon>
                Upload
              </v-btn>
            </div>
            </v-flex>
            <v-flex xs6>
              <v-form ref="form" v-model="valid" lazy-validation>
                <v-text-field
                  :value="currentUser.profile.display_name"
                  :rules="nameRules"
                  :counter="30"
                  label="Full Name"
                  required
                ></v-text-field>
                <v-text-field
                  :value="currentUser.profile.short_description"
                  :rules="shortDescriptionRules"
                  label="Short description (eg, job title, role, whatever describes you in a few words)"
                  required
                ></v-text-field>
                <v-text-field
                  :value="currentUser.profile.description"
                  :rules="biographyRules"
                  :counter="300"
                  label="Bio / About me"
                  multi-line
                  required
                ></v-text-field>
                <v-select
                  value="currentUser.profile.status || []"
                  :items="statusOptions"
                  :rules="statusRules"
                  label="Select one or more of the following which describes your current situation best..."
                  multiple
                  chips
                  required
                ></v-select>

                <v-btn
                  :disabled="!valid"
                  @click.native="alert('SAVED')"
                >
                  submit
                </v-btn>
                <v-btn @click="toggleProfileEditDialog()">cancel</v-btn>
              </v-form>
            </v-flex>

            <v-flex xs4 offset-xs2>

            </v-flex>
          </v-layout>
        </v-container>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: 'form-profile-edit-dialog',
  data () {
    return {
      valid: false,
      nameRules: [
        v => !!v || 'This field is required',
        v => (v && v.length <= 30) || 'Name must be less than 30 characters'
      ],
      shortDescriptionRules: [
        v => !!v || 'This field is required',
        v => (v && v.length <= 100) || 'Name must be less than 100 characters'
      ],
      biographyRules: [
        v => !!v || 'This field is required',
        v => (v && v.length <= 300) || 'Biography must be less than 300 characters'
      ],
      statusOptions: [
        'Employed',
        'Student'
      ],
      statusRules: [
        // FIXME NOT WORKING?
        v => !!v || 'This field is required'
      ],
      // MOVE TO SESSION FORM
      themesOptions: [
        'Containers and Orchestration',
        'Machine Learning & Artificial Intelligence',
        'Serverless computing',
        'Middleware technologies',
        'Operating Systems',
        'Ensuring Software Quality',
        'User Experience in Open Source'
      ],
      themesRules: [
        // FIXME NOT WORKING?
        v => !!v || 'This field is required'
      ],
      difficultyOptions: [
        // FIXME NOT WORKING?
        'Beginner - no experience needed',
        'Intermediate - attendees should be familiar with the subject',
        'Advanced - background knowledge and skills are required'
      ],
      difficultyRules: [
        v => !!v || 'This field is required'
      ]
    }
  },
  computed: {
    dialogEditProfileIsOpen: {
      get () {
        return this.$store.getters.isProfileEditDialogOpen
      },
      set (value) {
        this.$store.commit('toggleProfileEditDialog')
      }
    }
  },
  methods: {
    toggleProfileEditDialog () {
      this.$store.commit('toggleProfileEditDialog')
    }
  },
  props: ['currentUser']
}
</script>
