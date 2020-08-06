<template>
  <div>
    <v-card class="pa-2" outlined tile>
      <!--Contenido del card-->
      <!--REGIMENES-->
      <v-banner single-line>
        <div class="flexed">
          <v-icon class="iconsInformation" left>mdi-silverware-fork-knife</v-icon>
          <h3>Regimenes</h3>
        </div>
      </v-banner>
      <v-row class="pa-6">
        <v-col cols="12" md="5">
          <v-switch v-model="swOnlyRoom" inset label="Solo habitacion"></v-switch>
        </v-col>
        <v-col cols="2" md="6">
          <v-autocomplete :items="priorities" v-model="ddwnPriority" dense filled label="Prioridad"></v-autocomplete>
        </v-col>
        <v-col cols="12" md="5">
          <v-switch v-model="swBreakfast" inset label="Alojamiento y desayuno"></v-switch>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="txtBreakfastAdult" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="txtBreakfastChildren" label="Niño" required></v-text-field>
        </v-col>

        <v-col cols="12" md="5">
          <v-switch v-model="swHalfPension" inset label="Media pension"></v-switch>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="txtHalfPensionAdult" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="txtHalfPensionChildren" label="Niño" required></v-text-field>
        </v-col>
        <v-col cols="12" md="5">
          <v-switch v-model="swFullPension" inset label="Pension completa"></v-switch>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="txtFullPensionAdult" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="txtFullPensionChildren" label="Niño" required></v-text-field>
        </v-col>
        <v-col cols="12" md="5">
          <v-switch v-model="swAllIncluded" inset label="Todo incluido"></v-switch>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="txtAllIncludedAdult" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="txtAllIncludedChildren" label="Niño" required></v-text-field>
        </v-col>
      </v-row>
      <v-banner single-line>
        <!--PERIODOS REGIMENES-->
        <div class="flexed">
          <v-icon class="iconsInformation" left>mdi-calendar-month</v-icon>
          <h3>Periodos especiales de regimenes</h3>
        </div>
      </v-banner>
      <v-row class="pa-6">
        <span>
          Puedes añadir periodos de regimenes especiales.
          Si un regimen no esta disponible para todas las fechas de la reserva, no
          se aplicará
        </span>
      </v-row>
      <!--ETIQUETA SpecialRegimes.vue-->
      <component
        v-for="(component) in arrayComponents"
        :idCompo="component.idCompo"
        :objArrCompo="component.objArrCompo"
        :key="component.idCompo"
        :is="component.TagSRegimes"
        @removeCompo="removeCompo"
      ></component>
      <v-row class="pa-6">
        <v-btn small color="info" class="white--text" @click="addCompo()">
          <v-icon left dark>mdi-plus-circle</v-icon>Agregar
        </v-btn>
      </v-row>
    </v-card>
  </div>
</template>

<script>
import SpecialRegimes from "../Hotel/SpecialRegimes";

import { mapState } from "vuex";

export default {
  name: "Regimenes",
  created() {
    let count = this.regimes.length-1;
    while(count>0){
      this.addCompo(this.regimes[count])
      count--
    }
    if (this.regimes[0] != null) {
      this.swOnlyRoom = this.regimes[0].only_room;
      if (this.regimes[0].priority != null) {
        if (this.regimes[0].priority == "normal") {
          this.ddwnPriority = "Normal";
        }
        if (this.regimes[0].priority == "medium") {
          this.ddwnPriority = "Media";
        }
        if (this.regimes[0].priority == "high") {
          this.ddwnPriority = "Alta";
        }
      }
      this.txtBreakfastChildren = this.regimes[0].lodging_breakfast_children;
      this.txtBreakfastAdult = this.regimes[0].lodging_breakfast_adult;
      if (this.txtBreakfastChildren != null) {
        this.swBreakfast = 1;
      }
      this.txtHalfPensionChildren = this.regimes[0].half_pension_children;
      this.txtHalfPensionAdult = this.regimes[0].half_pension_adult;
      if (this.txtHalfPensionChildren != null) {
        this.swHalfPension = 1;
      }
      this.txtFullPensionChildren = this.regimes[0].full_pension_children;
      this.txtFullPensionAdult = this.regimes[0].full_pension_adult;
      if (this.txtFullPensionChildren != null) {
        this.swFullPension = 1;
      }
      this.txtAllIncludedChildren = this.regimes[0].all_included_children;
      this.txtAllIncludedAdult = this.regimes[0].all_included_adult;
      if (this.txtAllIncludedChildren != null) {
        this.swAllIncluded = 1;
      }
    }
  },
  updated() {
    if (this.ddwnPriority == "Normal") {
      this.regimes.priority = "normal";
    }
    if (this.ddwnPriority == "Media") {
      this.regimes.priority = "medium";
    }
    if (this.ddwnPriority == "Alta") {
      this.regimes.priority = "high";
    }
  },
  data() {
    return {
      arrayComponents: [],
      priorities: ["Normal", "Media", "Alta"],
      countIdCompo: -1,
      swOnlyRoom: null,
      ddwnPriority: null,
      swBreakfast: null,
      txtBreakfastAdult: null,
      txtBreakfastChildren: null,
      swHalfPension: null,
      txtHalfPensionAdult: null,
      txtHalfPensionChildren: null,
      swFullPension: null,
      txtFullPensionAdult: null,
      txtFullPensionChildren: null,
      swAllIncluded: null,
      txtAllIncludedAdult: null,
      txtAllIncludedChildren: null
    };
  },
  computed: {
    ...mapState({
      regimes: state => state.HotelModule.regimes
    })
  },
  components: {
    SpecialRegimes
  },
  methods: {
    addCompo() {
      this.countIdCompo++;
      this.arrayComponents.push({
        idCompo: this.countIdCompo,
        TagSRegimes: SpecialRegimes
      });
    },
    addCompo(obj) {
      this.countIdCompo++;
      this.arrayComponents.push({
        idCompo: this.countIdCompo,
        TagSRegimes: SpecialRegimes,
        objArrCompo: obj
      });
    },
    removeCompo(idCompoParam) {
      this.countIdCompo--;
      let idCompoMap = this.arrayComponents
        .map(element => element.idCompo)
        .indexOf(idCompoParam);
      this.arrayComponents.splice(idCompoMap, 1);
    }
  }
};
</script>

<style scoped>
.iconsInformation {
  margin-bottom: 6px;
}
.flexed {
  display: flex;
}
</style>