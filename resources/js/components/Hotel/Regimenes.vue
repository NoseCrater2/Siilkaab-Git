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
        <v-col cols="12" md="8">
          <v-switch v-model="switch1" inset label="Solo habitacion"></v-switch>
        </v-col>
        <v-col cols="12" md="5">
          <v-switch v-model="switch1" inset label="Alojamiento y desayuno"></v-switch>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
        </v-col>

        <v-col cols="12" md="5">
          <v-switch v-model="switch1" inset label="Media pension"></v-switch>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
        </v-col>
        <v-col cols="12" md="5">
          <v-switch v-model="switch1" inset label="Pension completa"></v-switch>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
        </v-col>
        <v-col cols="12" md="5">
          <v-switch v-model="switch1" inset label="Todo incluido"></v-switch>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="3">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
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

export default {
  name: "Regimenes",
  data() {
    return {
      arrayComponents: [],
      countIdCompo: -1
    };
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