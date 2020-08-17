<template>
  <div>
    <div v-if="loading">
      <v-app id="inspire">
        <v-data-table
          item-key="title"
          class="elevation-1"
          loading
          loading-text="Obteniendo datos..."
        ></v-data-table>
      </v-app>
    </div>

    <div v-else>
      <v-app id="inspire">
        <v-card>
          <v-card-title>
            Mis Hoteles
            <v-spacer></v-spacer>
            <v-text-field
              v-model="search"
              append-icon="mdi-magnify"
              label="Buscar hotel"
              single-line
              hide-details
            ></v-text-field>
          </v-card-title>

          <v-data-table
            v-model="selected"
            item-key="id"
            show-select
            :headers="headers"
            :items="hotels"
            :items-per-page="20"
            :single-select="singleSelect"
            multi-sort
            class="elevation-1"
            :search="search"
          >
            <template v-slot:top>
              <v-switch v-model="singleSelect" label="Selección única" class="pa-3" inset></v-switch>
            </template>
            <template v-slot:item.rooms>
              <v-icon small>mdi-bed</v-icon>
            </template>
            <template v-slot:item.pays>
              <v-icon small>mdi-cash-multiple</v-icon>
            </template>
            <template v-slot:item.disccount>
              <v-icon small>mdi-label-percent</v-icon>
            </template>
            <template v-slot:item.extras>
              <v-icon small>mdi-tag-plus</v-icon>
            </template>
            <template v-slot:item.actions="{ item }">
              <router-link :to="{name: 'Hotel' , params: {id: item.id}}" style="text-decoration: none;">
                <v-icon small class="mr-2">mdi-pencil</v-icon>
              </router-link>
              <v-icon small>mdi-delete</v-icon>
            </template>
          </v-data-table>
        </v-card>
      </v-app>
    </div>
  </div>
</template>

<script>
export default {
  name: "HotelsTable",
  created() {
    this.loading = true;
    const request = axios.get("/api/hotels").then(response => {
      this.hotels = response.data.data;
      this.loading = false;
    });
  },
  data() {
    return {
      selected: [],
      search: "",
      singleSelect: false,
      hotels: null,
      loading: false,
      columns: 3,
      headers: [
        {
          text: "Título",
          align: "start",
          sortable: true,
          value: "title"
        },
        { text: "Código de referencia", value: "reference_code" },
        { text: "Habitaciones", value: "rooms" },
        { text: "Tarifas", value: "pays" },
        { text: "Descuentos", value: "disccount" },
        { text: "Extras", value: "extras" },
        { text: "ID", value: "id" },
        { text: "Actions", value: "actions", sortable: false }
      ]
    };
  },
  methods: {
    editItem(item) {},

    deleteItem(item) {}
  }
};
</script>