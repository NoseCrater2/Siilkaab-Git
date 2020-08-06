<template>
  <div>
    <v-card class="pa-2" outlined tile>
      <!--Contenido del card-->
      <!--CONDICIONES-->
      <v-banner single-line>
        <div class="flexed">
          <v-icon class="iconsInformation" left>mdi-gavel</v-icon>
          <h3>Condiciones</h3>
        </div>
      </v-banner>
      <v-row class="pa-6">
        <v-col cols="12" md="6">
          <v-switch v-model="conditions.adults" inset label="Solo adultos"></v-switch>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="conditions.children_age" label="Niño desde" required></v-text-field>
        </v-col>

        <v-col cols="12" md="6">
          <v-text-field v-model="conditions.adults_regimen" label="Regimen adulto desde" required></v-text-field>
        </v-col>

        <v-col cols="12" md="6">
          <v-text-field v-model="conditions.adults_age" label="Adulto desde" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="conditions.checkin_time" label="Check-in time" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="conditions.checkout_time" label="Check-out time" required></v-text-field>
        </v-col>
      </v-row>
      <v-banner single-line>
        <!--TEXTOS DE CONDICIONES-->
        <div class="flexed">
          <v-icon class="iconsInformation" left>mdi-text</v-icon>
          <h3>Textos de condiciones</h3>
        </div>
      </v-banner>
      <div class="pa-4">
        <v-col cols="12" sm="6" md="12">
          <!--<v-textarea outlined no-resize rows="13" row-height="30" v-model="textoLargo"></v-textarea>-->
          <!--<vue-markdown :source="textoLargo" :html="false" :toc="false" show="show"></vue-markdown>-->
          <MarkdownCompo containerType="Conditions"></MarkdownCompo>
        </v-col>
      </div>
    </v-card>
  </div>
</template>

<script>
import MarkdownCompo from "../../components/Markdown/MarkdownCompo";
import { mapState } from "vuex";
export default {
  name: "Condiciones",
  components: {
    //Usamos componente MarkdownCompo (ubicado en la carpeta componentes. Es un componente de otro compo llamado TipTap)
    MarkdownCompo
  },
  computed: {
    ...mapState({
      conditions: state => state.HotelModule.conditions
    })
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