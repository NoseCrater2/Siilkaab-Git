<template>
  <div>
    <v-row class="pa-6">
      <v-col cols="1" md="3">
        <v-btn
          small
          color="red"
          class="white--text"
          style="margin-top: 9%"
          @click="removeCompo(id)"
        >
          <v-icon left dark>mdi-close-circle</v-icon>Eliminar
        </v-btn>
      </v-col>
      <!--MENU DESDE-->
      <v-col cols="12" md="4">
        <DateTimePicker :dates="getStartDate"></DateTimePicker>
      </v-col>

      <!--MENU HASTA-->
      <v-col cols="12" md="4">
        <DateTimePicker :dates="getFinalDate"></DateTimePicker>
      </v-col>

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
  </div>
</template>

<script>
import { mapState } from "vuex";
import DateTimePicker from "../DateTimePicker/DateTimePicker";

export default {
  name: "SpecialRegimes",
  created() {
    if (this.objArrCompo.start_period != null && this.objArrCompo.final_period != null) {
      this.propStartDate = {
        info: "Start",
        prop: this.objArrCompo.start_period
      };
      this.propFinalDate = {
        info: "Final",
        prop: this.objArrCompo.final_period
      };
    }
    this.swOnlyRoom = this.objArrCompo.only_room;
    if (this.objArrCompo.priority != null) {
      if (this.objArrCompo.priority == "normal") {
        this.ddwnPriority = "Normal";
      }
      if (this.objArrCompo.priority == "medium") {
        this.ddwnPriority = "Media";
      }
      if (this.objArrCompo.priority == "high") {
        this.ddwnPriority = "Alta";
      }
    }
    this.txtBreakfastChildren = this.objArrCompo.lodging_breakfast_children;
    this.txtBreakfastAdult = this.objArrCompo.lodging_breakfast_adult;
    if (this.txtBreakfastChildren != null) {
      this.swBreakfast = 1;
    }
    this.txtHalfPensionChildren = this.objArrCompo.half_pension_children;
    this.txtHalfPensionAdult = this.objArrCompo.half_pension_adult;
    if (this.txtHalfPensionChildren != null) {
      this.swHalfPension = 1;
    }
    this.txtFullPensionChildren = this.objArrCompo.full_pension_children;
    this.txtFullPensionAdult = this.objArrCompo.full_pension_adult;
    if (this.txtFullPensionChildren != null) {
      this.swFullPension = 1;
    }
    this.txtAllIncludedChildren = this.objArrCompo.all_included_children;
    this.txtAllIncludedAdult = this.objArrCompo.all_included_adult;
    if (this.txtAllIncludedChildren != null) {
      this.swAllIncluded = 1;
    }
  },
  updated() {
    if (this.ddwnPriority == "Normal") {
      this.objArrCompo.priority = "normal";
    }
    if (this.ddwnPriority == "Media") {
      this.objArrCompo.priority = "medium";
    }
    if (this.ddwnPriority == "Alta") {
      this.objArrCompo.priority = "high";
    }
  },
  data() {
    return {
      //DATOS DEL FORMULARIO
      priorities: ["Normal", "Media", "Alta"],
      countIdCompo: -1,
      propStartDate: null,
      propFinalDate: null,
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
    }),
    getStartDate(){
      return this.propStartDate;
    },
    getFinalDate(){
      return this.propFinalDate;
    }
  },
  methods: {
    removeCompo(id) {
      this.$emit("removeCompo", id);
    }
  },
  components: {
    DateTimePicker
  },
  props: {
    idCompo: Number,
    objArrCompo: Object
  }
};
</script>