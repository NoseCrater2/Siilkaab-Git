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
        <v-menu
          ref="fromMenu"
          v-model="fromMenu"
          :close-on-content-click="false"
          :nudge-right="40"
          :return-value.sync="now"
          transition="scale-transition"
          min-width="290px"
          offset-y
        >
          <template v-slot:activator="{ on, attrs }">
            <v-text-field
              v-model="from"
              class="mt-3"
              label="Desde"
              prepend-icon="mdi-calendar-month"
              dense
              readonly
              outlined
              hide-details
              v-bind="attrs"
              v-on="on"
            ></v-text-field>
          </template>
          <v-date-picker v-model="from" no-title scrollable>
            <v-spacer></v-spacer>
            <v-btn text color="primary" @click="fromMenu = false">Cancelar</v-btn>
            <v-btn text color="primary" @click="$refs.fromMenu.save(from)">Aceptar</v-btn>
          </v-date-picker>
        </v-menu>
      </v-col>
      <!--MENU HASTA-->
      <v-col cols="12" md="4">
        <v-menu
          ref="toMenu"
          v-model="toMenu"
          :close-on-content-click="false"
          :nudge-right="40"
          :return-value.sync="to"
          transition="scale-transition"
          min-width="290px"
          offset-y
        >
          <template v-slot:activator="{ on, attrs }">
            <v-text-field
              v-model="to"
              class="mt-3"
              label="Hasta"
              prepend-icon="mdi-calendar-month"
              dense
              readonly
              outlined
              hide-details
              v-bind="attrs"
              v-on="on"
            ></v-text-field>
          </template>
          <v-date-picker v-model="to" no-title scrollable>
            <v-spacer></v-spacer>
            <v-btn text color="primary" @click="toMenu = false">Cancelar</v-btn>
            <v-btn text color="primary" @click="$refs.toMenu.save(to)">Aceptar</v-btn>
          </v-date-picker>
        </v-menu>
      </v-col>

      <v-col cols="12" md="8">
        <v-switch v-model="swOnlyRoom" inset label="Solo habitacion"></v-switch>
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
        <v-text-field v-model="txtHalPensionAdult" label="Adulto" required></v-text-field>
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
export default {
  el: "#ppp",
  name: "SpecialRegimes",
  data() {
    return {
      //Variables de calendario
      from: null,
      fromMenu: false,
      to: null,
      toMenu: false,
      id: this.idCompo
    };
  },
  methods: {
    removeCompo(id) {
      this.$emit("removeCompo", id);
    }
  },
  props: {
    idCompo: Number
  }
};
</script>