<template>
  <v-container fluid class="pt-1">
    <cfp-reviews-submissions-lists-theme-filter></cfp-reviews-submissions-lists-theme-filter>

    <!--
    <cfp-program-submissions-filter-tracks
      type="tracks"
    ></cfp-program-submissions-filter-tracks>
  -->
    <v-divider></v-divider>

    <v-container grid-list-md fluid>
      <v-layout row wrap>
        <v-flex xs12>
          <p class="text-xs-right content">Filter by track?</p>
        </v-flex>
      </v-layout>
      <v-layout row wrap>
        <v-flex xs2 v-for="track in tracks" :key="track.id">
          <v-switch
            @click="setTrackFilter(track)"
            value
            v-model="activeTrackFilter[track.id]"
            :label="track.text"
            class=""
          ></v-switch>
        </v-flex>
      </v-layout>
    </v-container>

    <v-divider></v-divider>

    <v-toolbar>
      <v-icon disabled class="green--text text--darken-4 pl-2 pb-1">cloud_done</v-icon>
      <v-btn class="ml-5 grey lighten-5">
          <v-badge left color="green darken-4">
            <span slot="badge">{{ selected.length }}</span>
            <v-icon large color="grey lighten-1">playlist_add_check</v-icon>
          </v-badge>
          Accept
      </v-btn>
      <v-spacer></v-spacer>
        <v-btn flat class="ml-2" @click="disableSelectedSubmissions()">
            <v-badge left color="red darken-4">
              <span slot="badge">{{ selected.length }}</span>
              <v-icon large color="grey lighten-1">delete_sweep</v-icon>
            </v-badge>
            Remove

        </v-btn>
    </v-toolbar>

    <v-data-table
        :headers="headers"
        :items="submissions"
        hide-actions
        class="elevation-1"
        v-model="selected"
        item-key="id"
        select-all
      >
      <template slot="items" slot-scope="props">
        <td>
          <v-checkbox
            primary
            hide-details
            v-model="props.selected"
            label=""
          ></v-checkbox>
        </td>
        <td class="text-xs-left"><p class="ellipsis">{{ props.item.title }}</p></td>
        <td class="text-xs-left">
          <span>
            <strong
              :class="positiveCheck(props.item.vote_total)"
              class="caption number"
              v-html="pad(props.item.vote_total)"
            ></strong>
            <em
              class="caption grey--text lighten-1 number"
            >(+{{ props.item.vote_count_plus }}/-{{ props.item.vote_count_minus }})</em>
          </span>
        </td>
        <td class="text-xs-left number">{{ props.item.vote_count_total }}</td>
        <!--
        <td class="text-xs-center">
          <v-avatar
              class="deep-purple lighten-5"
            >
            <img
              :src="props.item.photo_url"
              style="height:32px; width:32px"
            >
          </v-avatar>
        </td>
        -->
        <td class="text-xs-left email">
          <a :href="'mailto://' + props.item.primary_contact.email">
            {{ props.item.display_name }}
          </a>
        </td>
        <td class="text-xs-left number">{{ props.item.contact_count }}</td>
        <td class="text-xs-left">{{ props.item.location.split('/')[0].split(',')[0] }}</td>
        <td class="text-xs-left">{{ props.item.themes.join(', ') }}</td>
        <td class="text-xs-left">{{ props.item.type }}</td>
      </template>
    </v-data-table>
  </v-container>
</template>

<script>
import CfpReviewsSubmissionsListsThemeFilter from '@/components/CfpReviewsSubmissionsListsThemeFilter.vue'
import CfpProgramSubmissionsFilter from '@/components/CfpProgramSubmissionsFilter'

export default {
  name: 'cfp-program-submissions-results-table',
  components: {
    'cfp-reviews-submissions-lists-theme-filter': CfpReviewsSubmissionsListsThemeFilter,
    'cfp-program-submissions-filter-tracks': CfpProgramSubmissionsFilter
  },
  data () {
    return {
      inputTracks: {},
      active: null,
      activeTrackFilter: {},
      selected: [],
      headers: [
        /*
        {
          text: 'Track',
          align: 'left',
          sortable: true,
          value: 'track'
        },
        {
          text: 'Start Time',
          align: 'left',
          sortable: true,
          value: 'start_time'
        },
        {
          text: 'Duration',
          align: 'left',
          sortable: true,
          value: 'duration'
        },
        */
        {
          text: 'Title',
          align: 'left',
          sortable: true,
          value: 'title'
        },
        {
          text: 'Score',
          align: 'left',
          sortable: true,
          value: 'vote_total'
        },
        {
          text: 'Total votes',
          align: 'left',
          sortable: true,
          value: 'vote_count_total'
        },
        {
          text: 'Primary Contact',
          align: 'left',
          sortable: true,
          value: 'primary_contact'
        },
        {
          text: 'Speakers',
          align: 'left',
          sortable: true,
          value: 'contact_count'
        },
        {
          text: 'Location',
          align: 'left',
          sortable: true,
          value: 'location'
        },
        /* {
          text: 'Photo',
          align: 'left',
          sortable: false,
          value: 'photo_url'
        }, */
        {
          text: 'Themes',
          align: 'left',
          sortable: true,
          value: 'themes'
        },
        {
          text: 'Type',
          align: 'left',
          sortable: true,
          value: 'type'
        }
      ]
    }
  },
  computed: {
    themesFilter () {
      return this.$store.getters.themesFilter
    },
    themes () {
      return this.$store.getters.themes
    },
    tracks () {
      console.log('TRACKS', Object.values(this.$store.getters.eventDisplayed.program.tracks))
      return Object.values(this.$store.getters.eventDisplayed.program.tracks)
    },
    isWorking () {
      return this.$store.getters.getIsWorking
    },
    approved () {
      return this.$store.getters.approved
    },
    submissions () {
      const submissions = Object.values(this.$store.getters.submissions)
      console.log('Getting submissions!')
      let _submissions = []
      submissions.forEach(s => {
        // console.log('___', s)
        s.themes.forEach(t => {
          // console.log('*****', t)
          // console.log(this.tracks)
          if (this.tracks.findIndex(tr => {
            //  console.log('T: ', t)
            return tr.themes.indexOf(t) > -1
          })) {
            _submissions.push(s)
          }
        })
      })

      const filtered = submissions.map(s => {
        return {
          id: s.id,
          title: s.title,
          vote_total: s.meta.votes.vote_total,
          vote_count_plus: s.meta.votes.vote_count_plus,
          vote_count_minus: s.meta.votes.vote_count_minus,
          vote_count_total: s.meta.votes.vote_count_total,
          primary_contact: `${s.meta.primary_contact.display_name} <${s.meta.primary_contact.email}>`,
          contact_count: Object.keys(s.meta.contacts).length,
          location: s.meta.primary_contact.location || '',
          photo_url: s.meta.primary_contact.photo_url,
          display_name: s.meta.primary_contact.display_name,
          type: s.type,
          themes: s.themes.map(v => v)
        }
      })
      return filtered
    }
  },
  methods: {
    trackFilterIsSelected (track) {
      console.log(track, '@@@@@@___________', this.activeTrackFilter === track, this.activeTrackFilter)
      return this.activeTrackFilter[track]
    },
    setTrackFilter (track) {
      console.log('methods.setTrackFilter', track)
      if (!track) {
        this.$store.dispatch('refreshThemesFilter')
        return
      }
      console.log('@@@@@@@@@@@@@@@@@@@@@@@@@@@')
      this.$store.dispatch('updateThemesFilter', track.themes)
      console.log(track.id, '(((((((((((((((((((())))))))))))))))))))')
      if (this.activeTrackFilter[track.id] !== undefined &&
          this.activeTrackFilter[track.id] !== null &&
          this.activeTrackFilter[track.id] !== false
        ) {
        this.$set(this.activeTrackFilter, track.id, false)
      } else {
        this.$set(this.activeTrackFilter, track.id, true)
      }
      console.log(this.activeTrackFilter)
    },
    disableSelectedSubmissions () {
      const idsSelected = this.selected.map(s => s.id)
      console.log(idsSelected)
    },
    pad (str) {
      return `${String(str).padStart(5, ' ')}`
    },
    positiveCheck (value) {
      // console.log('methods.positiveCheck', value)
      if (value === 0) {
        return 'black--text'
      } else if (value > 0) {
        return 'green--text text--darken-4'
      } else {
        return 'red--text text--darken-4'
      }
    }
  },
  props: ['event']
}
</script>

<style>
.number {
  font-family: monospace;
}

.smaller {
  font-size: .7em;
}

.truncate {
  width: 250px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

a:active {
  text-decoration: underline;
}
</style>
