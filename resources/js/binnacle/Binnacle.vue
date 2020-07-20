<template>
    <div>
        <div id="app">
  <v-app id="inspire">
      <div v-if="binnacles">

     
    <v-timeline :reverse=true :dense="$vuetify.breakpoint.smAndDown">
      <v-timeline-item
      v-for="(binnacle, i) in binnacles"
      :key="i"
       
        color="orange"
        small
       
      >
      <template v-slot:opposite>
          <span
            :class="`headline font-weight-bold `"
            v-text="binnacle.created_at"
          ></span>
        </template>
      
        <v-card>
          <v-expansion-panels focusable>
            <v-expansion-panel>
              <div v-if="binnacle.action==='CREATED'">
                <v-expansion-panel-header  :class="`${colors.create}`">
                  <v-responsive class="text-uppercase dense" >
                    {{binnacle.action }} over table  <strong>{{binnacle.model }}</strong>
                  </v-responsive>
                </v-expansion-panel-header>
              </div>
              <div v-if="binnacle.action==='UPDATED'">
                <v-expansion-panel-header  :class="`${colors.update}`">
                  <v-responsive class="text-uppercase dense" >
                    {{binnacle.action }} over table  <strong>{{binnacle.model }}</strong>
                  </v-responsive>
                </v-expansion-panel-header>
              </div>
              <div v-if="binnacle.action==='DELETED'">
                <v-expansion-panel-header  :class="`${colors.delete}`">
                  <v-responsive class="text-uppercase dense" >
                    {{binnacle.action }} over table  <strong>{{binnacle.model }}</strong>
                  </v-responsive>
                </v-expansion-panel-header>
              </div>


            <v-expansion-panel-content>
              <div v-for="(details,d) in binnacle.details" :key="d">
                <strong>{{d}}</strong>: {{details}} <br>
              </div>
            </v-expansion-panel-content>
            </v-expansion-panel>
            </v-expansion-panels>
         <!-- <div v-if="binnacle.action==='CREATED'">
          <v-card-title :class="`${colors.create}`">
            <v-icon dark size="30" class="mr-4">mdi-database-check</v-icon>
            <h1 class="display-1 white--text font-weight-light">{{binnacle.action}}</h1>
          </v-card-title>
          </div>
          <div v-else-if="binnacle.action==='UPDATED'">
          <v-card-title :class="`${colors.update}`">
            <v-icon dark size="30" class="mr-4">mdi-database-edit</v-icon>
            <h1 class="display-1 white--text font-weight-light">{{binnacle.action}}</h1>
          </v-card-title>
          </div>
          <div v-else-if="binnacle.action==='DELETED'">
          <v-card-title :class="`${colors.delete}`">
            <v-icon dark size="30" class="mr-4">mdi-database-remove</v-icon>
            <h1 class="display-1 white--text font-weight-light">{{binnacle.action}}</h1>
          </v-card-title>
          </div>
          <v-container>
            <v-row>
              <v-col cols="12" md="10">
               <div v-for="(details,d) in binnacle.details" :key="d">
                  
                 <strong>{{d}}</strong>: {{details}} <br>
                 
               </div>
               Con IP {{binnacle.ip}}
              </v-col>
              <v-col
                class="hidden-sm-and-down text-right"
                md="2"
              >
              <div v-if="binnacle.model == 'users'">
                <v-icon size="64">mdi-account</v-icon>
              </div>
              <div v-if="binnacle.model == 'Hotel'">
                <v-icon size="64">mdi-office-building</v-icon>
              </div>
              </v-col>
            </v-row>
          </v-container> -->
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
            colors:{
              create: 'blue lighten-2',
              update: 'green lighten-2',
              delete: 'red lighten-2',
              forcedelete: 'black lighten-2',
            }
   
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