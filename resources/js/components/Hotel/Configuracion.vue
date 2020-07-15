<template>
  <div>
    <v-card class="pa-2" outlined tile>
      <!--Contenido del card-->
      <!--PRINCIPAL-->
      <v-banner single-line>
        <h3>Principal</h3>
      </v-banner>
      <v-row class="pa-6">
        <v-col cols="12" md="8">
          <v-autocomplete :items="currencies" item-text="currency" item-value="currency_id" v-model="configuration.currency_id" dense filled label="Divisa"></v-autocomplete>
        </v-col>
        <v-col cols="12" md="8">
          <v-autocomplete :items="timezones" v-model="configuration.timezone" dense filled label="Zona horaria"></v-autocomplete>
        </v-col>
      </v-row>
      <!--NOTIFICACION-->
      <v-banner single-line>
        <h3>Notificacion</h3>
      </v-banner>
      <v-row class="pa-6">
        <v-col cols="12" md="8">
          <v-text-field v-model="configuration.notification_voucher" label="Notificacion voucher reservas" required></v-text-field>
        </v-col>

        <v-col cols="12" md="8">
          <v-text-field v-model="configuration.notification_details" label="Notificacion detalles de la reserva" required></v-text-field>
        </v-col>

        <v-col cols="12" md="8">
          <v-text-field v-model="configuration.notification_card" label="Notificación datos de tarjeta" required></v-text-field>
        </v-col>
      </v-row>
    </v-card>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
export default {
  name: "Configuracion",
  data() {
    return {};
  },
  mounted() {
     this.getCurrencies().then(() => {
      });
      this.getTimezones().then(() => {
      });
  },
  computed: {
    ...mapState({
      currencies: state => state.HotelModule.currencies,
      timezones: state => state.HotelModule.timezones,
      configuration: state => state.HotelModule.configuration
    })
  },
  methods:{
    ...mapActions(['getCurrencies', 'getTimezones'])
  }
};
</script>