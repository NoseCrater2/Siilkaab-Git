<template>
  <div>
    <v-card class="pa-2" outlined tile>
      <!--Contenido del card-->
      <!--CONDICIONES-->
      <v-banner single-line>
        <h3>Condiciones</h3>
      </v-banner>
      <v-row class="pa-6">
        <v-col cols="12" md="6">
          <v-switch v-model="switch1" inset label="Solo adultos"></v-switch>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="titulo" label="Niño desde" required></v-text-field>
        </v-col>

        <v-col cols="12" md="6">
          <v-text-field v-model="url" label="Regimen adulto desde" required></v-text-field>
        </v-col>

        <v-col cols="12" md="6">
          <v-text-field v-model="codigRef" label="Adulto desde" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="titulo" label="Check-in time" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="titulo" label="Check-out time" required></v-text-field>
        </v-col>
      </v-row>
      <v-banner single-line>
        <!--TEXTOS DE CONDICIONES-->
        <h3>Textos de condiciones</h3>
      </v-banner>
      <div class="pa-4">
        <v-col cols="12" sm="6" md="12">
          <!--<v-textarea outlined no-resize rows="13" row-height="30" v-model="textoLargo"></v-textarea>-->
          <!--<vue-markdown :source="textoLargo" :html="false" :toc="false" show="show"></vue-markdown>-->
          <MarkdownCompo></MarkdownCompo>
        </v-col>
      </div>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "Condiciones"
};
</script>