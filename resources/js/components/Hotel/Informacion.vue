<template>
  <div>
    <v-card class="pa-2" outlined tile>
      <!--Contenido del card-->
      <!--PRINCIPAL-->
      <div v-if="hotel!==null">
        <v-banner single-line>
          <h3>Principal</h3>
        </v-banner>
        <v-row class="pa-6">
          <v-col cols="12" md="8">
            <v-text-field v-model="hotel.Title" label="Titulo" required></v-text-field>
          </v-col>

          <v-col cols="12" md="8">
            <v-text-field v-model="hotel.Url" label="URL" required></v-text-field>
          </v-col>

          <v-col cols="12" md="8">
            <v-text-field v-model="hotel.ReferenceCode" label="Codigo de referencia" required></v-text-field>
          </v-col>
        </v-row>
        <!--FOTOS-->
        <v-banner single-line>
          <h3>Fotos</h3>
        </v-banner>

        <div class="pa-10">
          <v-row>
            <v-card class="mx-3" max-width="400" outlined color="#eee">
              <v-icon size="70" style="height:210px; width:300px">mdi-image</v-icon>
            </v-card>
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
              v-model="hotel.ShortText"
            ></v-textarea>
          </v-col>
          <v-col cols="12" sm="6" md="12">
            <!--<v-textarea outlined no-resize rows="13" row-height="30" v-model="textoLargo"></v-textarea>-->
            <!--<vue-markdown :source="textoLargo" :html="false" :toc="false" show="show"></vue-markdown>-->
            <MarkdownCompo></MarkdownCompo>
          </v-col>
        </div>
      </div>
    </v-card>
  </div>
</template>

<script>
import MarkdownCompo from "../../components/Markdown/MarkdownCompo";
import { mapState } from "vuex";
export default {
  name: "Informacion",
  data() {
    return {};
  },
  components: {
    //Usamos componente MarkdownCompo (ubicado en la carpeta componentes. Es un componente de otro compo llamado TipTap)
    MarkdownCompo
  },
  computed: {
    ...mapState({
      hotel: state => state.HotelModule.hotel
    })
  }
};
</script>