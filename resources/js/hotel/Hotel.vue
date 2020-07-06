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
                  <v-list-item-group v-model="item" color="primary">
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
            <v-col cols="12" sm="auto" md="auto" xs="auto">
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
                    <!--INICIA TOOLBAR-->
                    <!--<v-toolbar dense>
                      <v-overflow-btn
                        :items="textos_ToolbalSize"
                        label="Tamaño"
                        hide-details
                        menu-props="top"
                        overflow
                        class="pa-0"
                      ></v-overflow-btn>

                      <v-btn-toggle v-model="seleccionUnica" color="black" dense group>
                        <v-btn>
                          <v-icon small>mdi-format-title</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-format-bold</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-format-italic</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-format-underline</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-format-color-fill</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-format-quote-close</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-link-variant</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-table-large</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-format-list-bulleted</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-format-list-numbered</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-format-align-justify</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-emoticon</v-icon>
                        </v-btn>
                        <v-btn>
                          <v-icon small>mdi-eye</v-icon>
                        </v-btn>
                      </v-btn-toggle>
                    </v-toolbar>-->
                    <!--TERMINA TOOLBAR-->
                    <!--<v-textarea outlined no-resize rows="13" row-height="30" v-model="textoLargo"></v-textarea>-->
                    <!--<vue-markdown :source="textoLargo" :html="false" :toc="false" show="show"></vue-markdown>-->
                    <markdown :value="markdownText" :options="markdownOptions" :html="editorHtml" :visible="editorVisible" previewStyle="vertical" initialEditType="wysiwyg" height="400px"></markdown>
                  </v-col>
                </div>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-app>
    </div>
  </div>
</template>

<script>
//import VueMarkdown from "vue-markdown";

import "@toast-ui/editor/dist/toastui-editor.css";
import "codemirror/lib/codemirror.css";
import '@toast-ui/editor/dist/i18n/es-es';
import { Editor } from "@toast-ui/vue-editor";

export default {
  data() {
    return {
      hotel: null,
      loading: false,
      //Al inicializar item en 0 indicamos que se por defecto el item seleccionado es el primero
      item: 0,
      itemsListOptions: [
        { text: "Información", icon: "mdi-information" },
        { text: "Configuración", icon: "mdi-cog" },
        { text: "Contacto", icon: "mdi-email" },
        { text: "Condiciones", icon: "mdi-gavel" },
        { text: "Tarifa maestra", icon: "mdi-calculator" },
        { text: "Regimenes", icon: "mdi-silverware-fork-knife" },
        { text: "Amenities", icon: "mdi-tag-multiple" },
        { text: "Integraciones", icon: "mdi-power-plug" }
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
      markdownText: "",
      markdownOptions: {
        minHeight: "200px",
        language: "es-ES",
        useCommandShortcut: true,
        useDefaultHTMLSanitizer: true,
        usageStatistics: true,
        hideModeSwitch: true,
        toolbarItems: [
          "heading",
          "bold",
          "italic",
          "hr",
          "quote",
          "ul",
          "ol",
          "table",
          "link"
        ]
      },
      editorHtml: "",
      editorVisible: true
      //CAMPO TEXTO LARGO TERMINA
      //SECCION TEXTOS TERMINA
    };
  },
  components: {
    //VueMarkdown,
    markdown: Editor
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

