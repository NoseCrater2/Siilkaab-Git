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
            <v-col id="columMenu" cols="6" md="3" sm="12">
              <v-card class="pa-2" outlined tile>
                <v-list dense>
                  <v-subheader>
                    <h5>
                      <strong>{{hotel.Title}}</strong>
                    </h5>
                  </v-subheader>
                  <v-list-item-group v-model="iditemsListOptions" color="primary">
                    <v-list-item v-for="(item, i) in itemsListOptions" :key="i">
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
            <v-col cols="12" sm="auto" md="9">
              <v-div v-if="iditemsListOptions===0">
                <v-card class="pa-2" outlined tile>
                  <!--Contenido del card-->
                  <!--PRINCIPAL-->
                  <v-banner single-line>
                    <h3>Principal</h3>
                  </v-banner>
                  <v-row class="pa-6">
                    <v-col cols="12" md="8">
                      <v-text-field v-model="titulo" label="Titulo" required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="8">
                      <v-text-field v-model="url" label="URL" required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="8">
                      <v-text-field v-model="codigRef" label="Codigo de referencia" required></v-text-field>
                    </v-col>
                  </v-row>
                  <!--FOTOS-->
                  <v-banner single-line>
                    <h3>Fotos</h3>
                  </v-banner>

                  <div class="pa-10">
                    <v-row>
                      <v-img
                        max-width="400"
                        class="white--text align-end"
                        height="200px"
                        src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                      ></v-img>
                    </v-row>
                    <br />
                    <v-btn small color="grey" class="white--text">Seleccionar imagen</v-btn>
                  </div>
                  <br />
                  <!--TEXTOS-->
                  <v-banner single-line>
                    <h3>Textos</h3>
                  </v-banner>

                  <div class="pa-4">
                    <v-col cols="12" sm="6" md="12">
                      <v-textarea
                        outlined
                        label="Texto corto"
                        no-resize
                        rows="4"
                        row-height="30"
                        :counter="240"
                      ></v-textarea>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <!--<v-textarea outlined no-resize rows="13" row-height="30" v-model="textoLargo"></v-textarea>-->
                      <!--<vue-markdown :source="textoLargo" :html="false" :toc="false" show="show"></vue-markdown>-->

                      <div>
                        <!-- Use the component in the right place of the template -->
                        <tiptap-vuetify v-model="content" :extensions="extensions" />
                      </div>
                    </v-col>
                  </div>
                </v-card>
              </v-div>
              <v-div v-if="iditemsListOptions===1">
                <v-card class="pa-2" outlined tile>
                  <!--Contenido del card-->
                  <!--PRINCIPAL-->
                  <v-banner single-line>
                    <h3>Principal</h3>
                  </v-banner>
                  <v-row class="pa-6">
                    <v-col cols="12" md="8">
                      <v-autocomplete v-model="value" :items="items" dense filled label="Divisa"></v-autocomplete>
                    </v-col>

                    <v-col cols="12" md="8">
                      <v-autocomplete
                        v-model="value"
                        :items="items"
                        dense
                        filled
                        label="Zona horaria"
                      ></v-autocomplete>
                    </v-col>
                  </v-row>
                  <!--NOTIFICACION-->
                  <v-banner single-line>
                    <h3>Notificacion</h3>
                  </v-banner>
                  <v-row class="pa-6">
                    <v-col cols="12" md="8">
                      <v-text-field v-model="titulo" label="Notificacion voucher reservas" required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="8">
                      <v-text-field
                        v-model="url"
                        label="Notificacion detalles de la reserva"
                        required
                      ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="8">
                      <v-text-field
                        v-model="codigRef"
                        label="Notificación datos de tarjeta"
                        required
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-card>
              </v-div>
              <v-div v-if="iditemsListOptions===2">
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
              </v-div>
              <v-div v-if="iditemsListOptions===3">
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

                      <div>
                        <!-- Use the component in the right place of the template -->
                        <tiptap-vuetify v-model="content" :extensions="extensions" />
                      </div>
                    </v-col>
                  </div>
                </v-card>
              </v-div>
            </v-col>
          </v-row>
        </v-container>
      </v-app>
    </div>
  </div>
</template>

<script>
//import VueMarkdown from "vue-markdown";
import Vue from "vue";
import Vuetify from "vuetify";
// import plugin
import { TiptapVuetifyPlugin } from "tiptap-vuetify";
// don't forget to import CSS styles
import "tiptap-vuetify/dist/main.css";
// Vuetify Object (as described in the Vuetify 2 documentation)
const vuetify = new Vuetify({
 
});
// use Vuetify's plugin
Vue.use(Vuetify);
// use this package's plugin
Vue.use(TiptapVuetifyPlugin, {
  // the next line is important! You need to provide the Vuetify Object to this place.
  vuetify, // same as "vuetify: vuetify"
  // optional, default to 'md' (default vuetify icons before v2.0.0)
  iconsGroup: "mdi"
});

import {
  TiptapVuetify,
  Heading,
  Bold,
  Italic,
  Strike,
  Underline,
  Paragraph,
  BulletList,
  OrderedList,
  ListItem,
  Link,
  Table,
  TableHeader,
  TableCell,
  TableRow,
  Blockquote,
  HardBreak,
  HorizontalRule,
  History
} from "tiptap-vuetify";

export default {
  data() {
    return {
      hotel: null,
      loading: false,
      //Al inicializar item en 0 indicamos que se por defecto el item seleccionado es el primero
      iditemsListOptions: 0,
      itemsListOptions: [
        { text: "Información", icon: "mdi-information" },
        { text: "Configuración", icon: "mdi-cog" },
        { text: "Contacto", icon: "mdi-email" },
        { text: "Condiciones", icon: "mdi-gavel" },
        { text: "Regimenes", icon: "mdi-silverware-fork-knife" },
        { text: "Amenidades", icon: "mdi-tag-multiple" }
      ],
      //SECCION PRINCIPAL INICIA
      titulo: "",
      url: "",
      codigRef: "",
      //SECCION PRINCIPAL TERMINA

      //SECCION TEXTOS INICIA
      //CAMPO TEXTO LARGO INICIA
      textos_ToolbalSize: [
        { text: "100%" },
        { text: "75%" },
        { text: "50%" },
        { text: "25%" }
      ],
      //seleccionUnica: undefined,
      //textoLargo: ""
      // declare extensions you want to use
      extensions: [
        History,
        [
          Heading,
          {
            options: {
              levels: [1, 2, 3]
            }
          }
        ],
        Bold,
        Italic,
        Underline,
        Strike,
        HorizontalRule,
        Blockquote,
        ListItem,
        BulletList,
        OrderedList,
        Table,
        TableHeader,
        TableCell,
        TableRow,
        Link,
        HardBreak
      ],
      // starting editor's content
      content: ""
      //CAMPO TEXTO LARGO TERMINA
      //SECCION TEXTOS TERMINA
    };
  },
  components: {
    //VueMarkdown,
    TiptapVuetify
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

