<template>
  <div>
    <v-card class="pa-2" outlined tile>
      <!--Contenido del card-->
      <!--REGIMENES-->
      <v-banner single-line>
        <h3>Regimenes</h3>
      </v-banner>
      <v-row class="pa-6">
        <v-col cols="12" md="8">
          <v-switch v-model="switch1" inset label="Solo habitacion"></v-switch>
        </v-col>
        <v-col cols="12" md="8">
          <v-switch v-model="switch1" inset label="Alojamiento y desayuno"></v-switch>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
        </v-col>

        <v-col cols="12" md="8">
          <v-switch v-model="switch1" inset label="Media pension"></v-switch>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
        </v-col>
        <v-col cols="12" md="8">
          <v-switch v-model="switch1" inset label="Pension completa"></v-switch>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
        </v-col>
        <v-col cols="12" md="8">
          <v-switch v-model="switch1" inset label="Todo incluido"></v-switch>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
        </v-col>
      </v-row>
      <v-banner single-line>
        <!--PERIODOS REGIMENES-->
        <h3>Periodos especiales de regimenes</h3>
      </v-banner>
      <v-row class="pa-6">
        <v-col cols="12" md="8">
          <v-switch v-model="switch1" inset label="Solo habitacion"></v-switch>
        </v-col>
        <v-col cols="12" md="8">
          <v-switch v-model="switch1" inset label="Alojamiento y desayuno"></v-switch>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
        </v-col>

        <v-col cols="12" md="8">
          <v-switch v-model="switch1" inset label="Media pension"></v-switch>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
        </v-col>
        <v-col cols="12" md="8">
          <v-switch v-model="switch1" inset label="Pension completa"></v-switch>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
        </v-col>
        <v-col cols="12" md="8">
          <v-switch v-model="switch1" inset label="Todo incluido"></v-switch>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Adulto" required></v-text-field>
        </v-col>
        <v-col cols="2" md="2">
          <v-text-field v-model="titulo" label="Niño" required></v-text-field>
        </v-col>
      </v-row>
    </v-card>
  </div>
</template>

<script>
export default {
    name: "Regimenes"
}
</script>