<template>
  <div>
    <v-banner single-line>
      <v-btn small color="info" class="white--text">
        <v-icon left dark>mdi-check-underline-circle</v-icon>Guardar
      </v-btn>
      <v-btn small color="grey" class="white--text">
        <v-icon left dark>mdi-check-underline-circle</v-icon>Guardar y cerrar
      </v-btn>
      <v-btn small color="red" class="white--text">
        <v-icon left dark>mdi-close-circle</v-icon>Cerrar
      </v-btn>

      <template v-slot:actions>
        <v-btn color="primary" text>Nuevo hotel</v-btn>
      </template>
    </v-banner>
  </div>
</template>

<script>
export default {
    name: "BotonesSuperiores"
}
</script>