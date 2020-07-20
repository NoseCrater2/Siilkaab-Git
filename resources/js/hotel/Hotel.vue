<template>
  <div>
    <div id="app">
      <v-app id="inspire">
        <!--Usamos componente BotonesSuperiores.vue-->
        <BotonesSuperiores :titulo="tituloHotel"></BotonesSuperiores>
        <v-container>
          <v-row no-gutters>
            <v-col id="columMenu" cols="6" md="3" sm="12">
              <!--Usamos componente MenuLateral-->
              <MenuLateral></MenuLateral>
            </v-col>
            <v-col cols="12" sm="auto" md="9">
              <div v-if="iditemsListOptions===0">
                <Informacion></Informacion>
              </div>

              <div v-if="iditemsListOptions===1">
                <Configuracion></Configuracion>
              </div>

              <div v-if="iditemsListOptions===2">
                <Contacto></Contacto>
              </div>

              <div v-if="iditemsListOptions===3">
                <Condiciones></Condiciones>
              </div>

              <div v-if="iditemsListOptions===4">
                <Regimenes></Regimenes>
              </div>
            </v-col>
          </v-row>
        </v-container>
      </v-app>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions, mapMutations } from "vuex";

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
      this.setReinicialized(); //Reinicia el objeto hotel (esto es por que no hay una recarga de pag con router-link)
      this.getHotel(this.$route.params.id).then(() => {
        this.tituloHotel = this.hotel.Title;
        if (this.hotel.idConfiguration !== null) {
          this.getConfiguration(this.hotel.idConfiguration).then(() => {});
        }
        if (this.hotel.idContact !== null) {
          this.getContacts(this.hotel.idContact).then(() => {});
        }
        if (this.hotel.idCondition !== null) {
          this.getConditions(this.hotel.idCondition).then(() => {});
        }
        if (this.hotel.idRegime !== null) {
          this.getRegimes(this.hotel.idRegime).then(() => {});
        }
      });
    }
  },
  data() {
    return {
      tituloHotel: ""
    };
  },
  computed: {
    ...mapState({
      hotel: state => state.HotelModule.hotel,
      iditemsListOptions: state => state.HotelModule.iditemsListOptions,
      configuration: state => state.HotelModule.configuration,
      contacts: state => state.HotelModule.contacts,
      conditions: state => state.HotelModule.conditions,
      regimes: state => state.HotelModule.regimes
    })
  },
  methods: {
    ...mapActions([
      "getHotel",
      "getConfiguration",
      "getContacts",
      "getConditions",
      "getRegimes"
    ]),
    ...mapMutations(["setReinicialized"])
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

