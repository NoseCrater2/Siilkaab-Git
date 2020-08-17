<template>
  <div>
    <div id="app">
      <v-app id="inspire">
        <!--Usamos componente ButtonActionsSup.vue-->
        <ButtonActionsSup :title="hotelTitle"></ButtonActionsSup>
        <v-container>
          <v-row no-gutters>
            <v-col id="columMenu" cols="6" md="3" sm="12">
              <!--Usamos componente LateralMenu-->
              <LateralMenu></LateralMenu>
            </v-col>
            <v-col cols="12" sm="auto" md="9">
              <div v-if="iditemsListOptions===0">
                <Information></Information>
              </div>

              <div v-if="iditemsListOptions===1">
                <Configuration></Configuration>
              </div>

              <div v-if="iditemsListOptions===2">
                <Contact></Contact>
              </div>

              <div v-if="iditemsListOptions===3">
                <Condition></Condition>
              </div>

              <div v-if="iditemsListOptions===4">
                <Regime></Regime>
              </div>
              <div v-if="iditemsListOptions===5">
                <AditionalInfo></AditionalInfo>
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

import ButtonActionsSup from "../../views/Hotel/ButtonActionsSup";
import LateralMenu from "../../views/Hotel/LateralMenu";
import Information from "../../views/Hotel/Information";
import Configuration from "../../views/Hotel/Configuration";
import Contact from "../../views/Hotel/Contact";
import Condition from "../../views/Hotel/Condition";
import Regime from "../../views/Hotel/Regime";
import AditionalInfo from "../../views/Hotel/AditionalInfo";

export default {
  created() {
    if (this.$route.params.id) {
      this.setReinicialized(); //Reinicia el objeto hotel (esto es por que no hay una recarga de pag con router-link)
      this.getHotel(this.$route.params.id).then(() => {
        this.hotelTitle = this.hotel.Title;
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
        if (this.hotel.idAmenity !== null) {
          this.getAditionalInfo(this.hotel.idAmenity).then(() => {});
          this.getRestaurants().then(() => {});
        }
      });
    }
  },
  data() {
    return {
      hotelTitle: "",
    };
  },
  computed: {
    ...mapState({
      hotel: (state) => state.HotelModule.hotel,
      iditemsListOptions: (state) => state.HotelModule.iditemsListOptions,
      configuration: (state) => state.HotelModule.configuration,
      contacts: (state) => state.HotelModule.contacts,
      conditions: (state) => state.HotelModule.conditions,
      regimes: (state) => state.HotelModule.regimes,
      restaurants: (state) => state.HotelModule.restaurants,
      aditionalInfo: (state) => state.HotelModule.aditionalInfo,
    }),
  },
  methods: {
    ...mapActions([
      "getHotel",
      "getConfiguration",
      "getContacts",
      "getConditions",
      "getRegimes",
      "getRestaurants",
      "getAditionalInfo",
    ]),
    ...mapMutations(["setReinicialized"]),
  },
  components: {
    ButtonActionsSup,
    LateralMenu,
    Information,
    Configuration,
    Contact,
    Condition,
    Regime,
    AditionalInfo,
  },
};
</script>

