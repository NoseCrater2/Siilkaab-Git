<template>
  <div>
    <v-card class="pa-2" outlined tile>
      <!--Contenido del card-->
      <!--DIRECCION-->
      <v-banner single-line>
        <div class="flexed">
          <v-icon class="iconsInformation" left>mdi-email</v-icon>
          <h3>Direccion</h3>
        </div>
      </v-banner>
      <v-row class="pa-6">
        <v-col cols="12" md="6">
          <v-text-field v-model="contacts.url" label="URL del sitio web" required></v-text-field>
        </v-col>

        <v-col cols="12" md="6">
          <v-text-field v-model="contacts.email" label="Email" required></v-text-field>
        </v-col>

        <v-col cols="12" md="6">
          <v-text-field v-model="contacts.phone" label="Telefono" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="contacts.address" label="Direccion" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="contacts.zipcode" label="Codigo postal" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="contacts.city" label="Ciudad" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="contacts.state" label="Provincia" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-autocomplete
            :items="countries"
            item-text="name"
            item-value="id"
            v-model="contacts.country_id"
            dense
            filled
            label="Pais"
          ></v-autocomplete>
        </v-col>
      </v-row>
      <!--LOCALIZACION-->
      <v-banner single-line>
        <div class="flexed">
          <v-icon class="iconsInformation" left>mdi-map-marker</v-icon>
          <h3>Localizacion</h3>
        </div>
      </v-banner>
      <v-row class="pa-6">
        <v-col cols="12" md="6">
          <v-text-field v-model="contacts.legal_rep" label="Representante legal" required></v-text-field>
        </v-col>
        <v-col cols="12" md="6">
          <v-text-field v-model="contacts.manager_name" label="Nombre de gerente" required></v-text-field>
        </v-col>
      </v-row>
    </v-card>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
  name: "Contacto",
  mounted() {
    this.getCountries().then(() => {});
  },
  computed: {
    ...mapState({
      contacts: state => state.HotelModule.contacts,
      countries: state => state.HotelModule.countries
    })
  },
  methods: {
    ...mapActions(["getCountries"])
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