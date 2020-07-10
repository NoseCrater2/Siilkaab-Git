<template>
    <div>
        <div id="app">
  <v-app id="inspire">
      <div v-if="binnacles">

     
    <v-timeline :dense="$vuetify.breakpoint.smAndDown">
      <v-timeline-item
      v-for="(binnacle, i) in binnacles"
      :key="i"
        color="purple lighten-2"
        fill-dot
       
      >
      <template v-slot:opposite>
          <span
            :class="`headline font-weight-bold `"
            v-text="binnacle.created_at"
          ></span>
        </template>
      
        <v-card>
          <v-card-title class="purple lighten-2">
            <v-icon
              dark
              size="42"
              class="mr-4"
            >
              mdi-magnify
            </v-icon>
            <h2 class="display-1 white--text font-weight-light">{{binnacle.action}}</h2>
          </v-card-title>
          <v-container>
            <v-row>
              <v-col cols="12" md="10">
               {{binnacle.details}} Con IP {{binnacle.ip}}
              </v-col>
              <v-col
                class="hidden-sm-and-down text-right"
                md="2"
              >
                <v-icon size="64">mdi-calendar-text</v-icon>
              </v-col>
            </v-row>
          </v-container>
        </v-card>
      </v-timeline-item>
    </v-timeline>
     </div>
  </v-app>
</div>
    </div>
</template>

<script>

export default {
    
     data () {
        return{
            binnacles:null,
            loading: false,
   
        }
  },
    computed:{
       
    },
    mounted(){
        this.loading = true;
    if (this.$route.params.id) {
      this.getHotel(this.$route.params.id);
    }
    },

    methods:{

    getHotel(id) {
      axios.get(`/api/binnacles/${id}`).then(response => {
        this.binnacles = response.data.data;
        this.loading = false;
      });
    }
    }
}
</script>