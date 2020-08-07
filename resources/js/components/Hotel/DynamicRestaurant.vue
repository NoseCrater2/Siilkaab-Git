<template>
  <v-carousel-item>
    <v-sheet color="#eeeeee" height="100%">
      <div style="padding: 2%">
        <v-row class="ml-1">
          <span>
            <h2>
              <strong>Restaurante #{{idCompo+1}}</strong>
            </h2>
          </span>
          <v-btn
            small
            class="ml-9 white--text"
            depressed
            color="red"
            @click="removeCompo(id)"
          >Eliminar restaurante</v-btn>
        </v-row>
        <br />
        <v-text-field v-model="restaurantName" label="Nombre del restaurante" required></v-text-field>
        <br />
        <span>
          <strong>Tipo de menú</strong>
        </span>
        <v-row justify="space-around">
          <v-checkbox v-model="arrayChk" value="a la carte" label="A la carta"></v-checkbox>
          <v-checkbox v-model="arrayChk" value="buffet" label="Buffet"></v-checkbox>
        </v-row>
        <br />
        <span>
          <strong>Introduce el horario</strong>
        </span>
        <br />
        <br />
        <span>Dile a los clientes cuándo pueden usar este servicio</span>
        <v-row>
          <v-col md="13" style="display: flex">
            <v-autocomplete
              :items="weekDays"
              v-model="ddwnDayModel"
              dense
              filled
              label="Dia"
              style="margin-right: 4%"
            ></v-autocomplete>
            <v-dialog
              ref="dialogFromHour"
              v-model="modalFromHour"
              :return-value.sync="fromHour"
              persistent
              width="290px"
            >
              <template v-slot:activator="{ on, attrs }">
                <v-autocomplete
                  :items="[fromHour]"
                  v-model="fromHour"
                  v-bind="attrs"
                  v-on="on"
                  readonly
                  dense
                  filled
                  label="Desde"
                  style="margin-right: 2%"
                ></v-autocomplete>
              </template>
              <v-time-picker v-if="modalFromHour" v-model="fromHour" format="24hr" full-width>
                <v-spacer></v-spacer>
                <v-btn text color="primary" @click="modalFromHour = false">Cancelar</v-btn>
                <v-btn text color="primary" @click="$refs.dialogFromHour.save(fromHour)">Aceptar</v-btn>
              </v-time-picker>
            </v-dialog>
            <v-dialog
              ref="dialogToHour"
              v-model="modalToHour"
              :return-value.sync="toHour"
              persistent
              width="290px"
            >
              <template v-slot:activator="{ on, attrs }">
                <v-autocomplete
                  :items="[toHour]"
                  v-model="toHour"
                  v-bind="attrs"
                  v-on="on"
                  readonly
                  dense
                  filled
                  label="Hasta"
                  style="margin-right: 2%"
                ></v-autocomplete>
              </template>
              <v-time-picker v-if="modalToHour" v-model="toHour" format="24hr" full-width>
                <v-spacer></v-spacer>
                <v-btn text color="primary" @click="modalToHour = false">Cancelar</v-btn>
                <v-btn text color="primary" @click="$refs.dialogToHour.save(toHour)">Aceptar</v-btn>
              </v-time-picker>
            </v-dialog>
            <v-btn class="mt-3" x-small depressed fab dark color="primary">
              <v-icon dark>mdi-pencil</v-icon>
            </v-btn>
          </v-col>
        </v-row>
      </div>
    </v-sheet>
  </v-carousel-item>
</template>

<script>
import { mapState } from "vuex";
export default {
  name: "DynamicRestaurant",
  mounted() {
    if (this.objArrCompo != null) {
      if (this.objArrCompo.name != null) {
        this.restaurantName = this.objArrCompo.name;
      }

      if (this.objArrCompo.menu_type != null) {
        if (this.objArrCompo.menu_type == "both") {
          this.arrayChk.push("a la carte");
          this.arrayChk.push("buffet");
        }
      }

      if (this.objArrCompo.schedules[0] != null) {
        if (this.objArrCompo.schedules[0].day != null) {
          if (this.objArrCompo.schedules[0].day == "domingo") {
            this.ddwnDayModel = "Domingo";
          }
          if (this.objArrCompo.schedules[0].day == "lunes") {
            this.ddwnDayModel = "Lunes";
          }
          if (this.objArrCompo.schedules[0].day == "martes") {
            this.ddwnDayModel = "Martes";
          }
          if (this.objArrCompo.schedules[0].day == "miercoles") {
            this.ddwnDayModel = "Miércoles";
          }
          if (this.objArrCompo.schedules[0].day == "jueves") {
            this.ddwnDayModel = "Jueves";
          }
          if (this.objArrCompo.schedules[0].day == "viernes") {
            this.ddwnDayModel = "Viernes";
          }
          if (this.objArrCompo.schedules[0].day == "sabado") {
            this.ddwnDayModel = "Sábado";
          }
        }
        this.fromHour = this.objArrCompo.schedules[0].start_time.slice(0, -3);
        this.toHour = this.objArrCompo.schedules[0].end_time.slice(0, -3);
      }
    }
  },
  data() {
    return {
      id: this.idCompo,
      weekDays: [
        "Domingo",
        "Lunes",
        "Martes",
        "Miércoles",
        "Jueves",
        "Viernes",
        "Sábado",
      ],
      ddwnDayModel: null,
      fromHour: null,
      modalFromHour: false,
      toHour: null,
      modalToHour: false,
      restaurantName: null,
      arrayChk: [],
    };
  },
  computed: {
    ...mapState({
      restaurants: (state) => state.HotelModule.restaurants,
    }),
  },
  methods: {
    removeCompo(id) {
      this.$emit("removeCompo", id);
    },
  },
  props: {
    idCompo: Number,
    objArrCompo: Object,
  },
};
</script>

<style scoped>
/*Estilo para el scroll del carousel*/
.v-sheet {
  overflow-x: hidden;
  overflow-y: auto;
}
</style>