<template>
  <div>
    <v-card class="pa-2" outlined tile>
      <!--Contenido del card-->
      <!--DIRECCION-->
      <v-banner single-line>
        <h3>Direccion</h3>
      </v-banner>
      <v-row class="pa-6">
        <v-col cols="12" md="6">
          <v-text-field v-model="titulo" label="URL del sitio web" required></v-text-field>
        </v-col>

        <v-col cols="12" md="6">
          <v-text-field v-model="url" label="Email" required></v-text-field>
        </v-col>

        <v-col cols="12" md="6">
          <v-text-field v-model="codigRef" label="Telefono" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="titulo" label="Direccion" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="titulo" label="Codigo postal" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="titulo" label="Ciudad" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="titulo" label="Provincia" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-autocomplete v-model="value" :items="items" dense filled label="Pais"></v-autocomplete>
        </v-col>
      </v-row>
      <!--LOCALIZACION-->
      <v-banner single-line>
        <h3>Localizacion</h3>
      </v-banner>
      <v-row class="pa-6">
        <v-col cols="12" md="6">
          <v-text-field v-model="titulo" label="Representante legal" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="url" label="Nombre de gerente" required></v-text-field>
        </v-col>
      </v-row>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "Contacto"
};
</script>