<template>
  <div>
    <div id="app">
      <v-app id="inspire">
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

        <v-container>
          <v-row no-gutters>
            <v-col cols="6" md="3">
              <v-card class="pa-2" outlined tile>
                <v-list dense>
                  <!--<v-subheader>REPORTS</v-subheader>-->
                  <v-list-item-group v-model="item" color="primary">
                    <v-list-item v-for="(item, i) in items" :key="i">
                      <v-list-item-icon>
                        <v-icon v-text="item.icon"></v-icon>
                      </v-list-item-icon>
                      <v-list-item-content>
                        <v-list-item-title v-text="item.text"></v-list-item-title>
                      </v-list-item-content>
                    </v-list-item>
                  </v-list-item-group>
                </v-list>
              </v-card>
            </v-col>
            <v-col cols="12" sm="6" md="9">
              <v-card class="pa-2" outlined tile>
                <!--Contenido del card-->

                <form>
                  <v-banner single-line>
                    <h3>Principal</h3>
                  </v-banner>

                  <v-row class="pa-6">
                    <v-col cols="12" md="8">
                      <v-text-field
                        v-model="titulo"
                        :rules="tituloRules"
                        label="Titulo"
                        required
                      ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="8">
                      <v-text-field
                        v-model="url"
                        :rules="urlRules"
                        label="URL"
                        required
                      ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="8">
                      <v-text-field
                        v-model="url"
                        :rules="urlRules"
                        label="Codigo de referencia"
                        required
                      ></v-text-field>
                    </v-col>
                  </v-row>

                  <v-banner single-line>
                    <h3>Fotos</h3>
                  </v-banner>

                  <v-row class="pa-6">
                    <v-img
                      max-width="400"
                      class="white--text align-end"
                      height="200px"
                      src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                    ></v-img>
                  </v-row>


                </form>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-app>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      hotel: null,
      loading: false,

      //Al inicializar item en 0 indicamos que se por defecto el item seleccionado es el primero
      item: 0,
      items: [
        { text: "Información", icon: "mdi-information" },
        { text: "Configuración", icon: "mdi-cog" },
        { text: "Contacto", icon: "mdi-email" },
        { text: "Condiciones", icon: "mdi-gavel" },
        { text: "Tarifa maestra", icon: "mdi-calculator" },
        { text: "Regimenes", icon: "mdi-silverware-fork-knife" },
        { text: "Amenities", icon: "mdi-tag-multiple" },
        { text: "Integraciones", icon: "mdi-power-plug" }
      ],
      //VALIDACIONES
      valid: false,
      titulo: "",
      url: "",
      tituloRules: [
        v => !!v || "El titulo es requerido",
        v => v.length <= 10 || "El titulo debe tener menos de 10 caracteres"
      ]
    };
  },
  mounted() {
    this.loading = true;
    if (this.$route.params.id) {
      this.getHotel(this.$route.params.id);
    }
  },
  methods: {
    getHotel(id) {
      axios.get(`/api/hotels/${id}`).then(response => {
        this.hotel = response.data.data;
        this.loading = false;
      });
    }
  }
};
</script>