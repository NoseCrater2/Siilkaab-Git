<template>
    <div>

        <div id="app">
  <v-app id="inspire">


    <v-banner single-line>
            <v-btn
        color="info"
        class="ma-2 white--text"
      >
        <v-icon left dark>mdi-check-underline-circle</v-icon>
        Guardar

      </v-btn>
<v-btn
        color="grey"
        class="ma-2 white--text"
      >
        <v-icon left dark>mdi-check-underline-circle</v-icon>
        Guardar y cerrar

      </v-btn>
      <v-btn
        color="red"
        class="ma-2 white--text"
      >
        <v-icon left dark>mdi-close-circle</v-icon>
        Cerrar

      </v-btn>

  
      <template v-slot:actions>
        <v-btn
          color="primary"
          text
        >
          Connecting Settings
        </v-btn>
      </template>
    </v-banner>




    <v-container class="grey lighten-5">
      <v-row no-gutters>
        <v-col
          cols="6"
          md="3"
        >
          <v-card
            class="pa-2"
            outlined
            tile
          >
                  <v-list dense>
        <v-subheader>REPORTS</v-subheader>
        <v-list-item-group v-model="item" color="primary">
          <v-list-item
            v-for="(item, i) in items"
            :key="i"
          >
            <v-list-item-icon>
              <v-icon v-text="item.icon"></v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title v-text="item.text"></v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>


          </v-card>
        </v-col>
                <v-col
          cols="12"
          sm="6"
          md="9"
        >
          <v-card
            class="pa-2"
            outlined
            tile
          >
            .col-12 .col-sm-6 .col-md-8
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</div>

    </div>
</template>

<script>



export default {

   
    data(){
        return{
            hotel: null,
            loading: false,


item: 1,
      items: [
        { text: 'Real-Time', icon: 'mdi-clock' },
        { text: 'Audience', icon: 'mdi-account' },
        { text: 'Conversions', icon: 'mdi-flag' },
      ]


        };
    },
    mounted(){
        this.loading= true;
        if(this.$route.params.id){
            this.getHotel(this.$route.params.id)
        }
    
    },
    methods:{
        getHotel(id){
            axios
            .get(`/api/hotels/${id}`)
            .then(response => {
                this.hotel = response.data.data;
                this.loading = false;
                console.log(this.hotel);
            });
        },
    }
}
</script>