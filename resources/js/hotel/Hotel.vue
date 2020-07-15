<template>
  <div>
    <div id="app">
      <v-app id="inspire">
        <!--Usamos componente BotonesSuperiores.vue-->
        <BotonesSuperiores></BotonesSuperiores>
        <v-container>
          <v-row no-gutters>
            <v-col id="columMenu" cols="6" md="3" sm="12">
              <!--Usamos componente MenuLateral-->
              <MenuLateral></MenuLateral>
            </v-col>
            <v-col cols="12" sm="auto" md="9">
              <!--
              <div :v-if="iditemsListOptions===0">
                <Informacion></Informacion>
              </div>

              <div v-if="iditemsListOptions===1">
                <Configuracion></Configuracion>
              </div>-->
              
              <div v-if="iditemsListOptions===2">
                <Contacto></Contacto>
              </div>
              <!--
              <div :v-if="iditemsListOptions===3">
                <Condiciones></Condiciones>
              </div>
              <div :v-if="iditemsListOptions===4">
                <Regimenes></Regimenes>
              </div>-->
            </v-col>
          </v-row>
        </v-container>
      </v-app>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";

import BotonesSuperiores from "../components/Hotel/BotonesSuperiores";
import MenuLateral from "../components/Hotel/MenuLateral";
import Informacion from "../components/Hotel/Informacion";
import Configuracion from "../components/Hotel/Configuracion";
import Contacto from "../components/Hotel/Contacto";
import Condiciones from "../components/Hotel/Condiciones";
import Regimenes from "../components/Hotel/Regimenes";

export default {
  created() {
    if (this.$route.params.id) {
      this.getHotel(this.$route.params.id).then(() => {
        if (this.hotel.idConfiguration!==null) {
          this.getConfiguration(this.hotel.idConfiguration).then(() => {});
        }
      });
    }
  },
  computed: {
    ...mapState({
      hotel: state => state.HotelModule.hotel,
      iditemsListOptions: state => state.HotelModule.iditemsListOptions,
      configuration: state => state.HotelModule.configuration
    })
  },
  methods: {
    ...mapActions(["getHotel", "getConfiguration"])
  },
  components: {
    BotonesSuperiores,
    MenuLateral,
    Informacion,
    Configuracion,
    Contacto,
    Condiciones,
    Regimenes
  }
};
</script>

