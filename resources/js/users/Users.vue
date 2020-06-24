<template>
  <div>
 
      <div v-if="loading">
        <v-app id="inspire">
        <v-data-table item-key="title" class="elevation-1" loading loading-text="Obteniendo datos..."></v-data-table>
      </v-app>  
      </div>
        <div v-else>
            <v-app id="inspire" >
                <v-card
                
                >
                    
                <v-data-table
                    v-model="selected"  
                    item-key="name"
                    show-select
                    :headers="headers"
                    :items="users" 
                    :items-per-page="20"
                    :single-select="singleSelect"
                    :sort-by="['name']"
                    :short-desc="[true,false]"
                    multi-sort
                    class="elevation-1"
                    :search="search"
            >
            
            <template v-slot:top>     
        <v-toolbar flat color="white">
          <v-toolbar-title>Usuarios</v-toolbar-title>
          <v-divider
            class="mx-4"
            inset
            vertical
          ></v-divider>
          <v-spacer></v-spacer>
           <v-text-field
                              v-model="search"
                              append-icon="mdi-magnify"
                              label="Buscar Usuario"
                              single-line
                              hide-details
                            ></v-text-field>
          <v-dialog v-model="dialog" max-width="500px">
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                color="primary"
                dark
                class="mb-2"
                v-bind="attrs"
                v-on="on"
              >Nuevo Usuario</v-btn>
            </template>
            <v-card>
              <v-card-title>
            <span class="headline">Nuevo Usuario</span>
             </v-card-title>
              <v-card-text>
            <v-container>
              <v-row>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Nombre(s)*" required></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Apellido(s)*" hint="example of helper text only on focus"></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-text-field label="Email*" required></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-select
                    :items="['Super Admin', 'Administrador', 'Manager']"
                    label="Tipo*"
                    required
                  ></v-select>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-autocomplete
                    :items="['Español', 'Inglish']"
                    label="Lenguaje"
                    required
                  ></v-autocomplete>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-select
                    :items="['America/Mexico_City', 'America/Chihuahua', 'America/Hermosillo', 'America/Mazatlan']"
                    label="Zona horaria*"
                    required
                  ></v-select>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-autocomplete
                    :items="['Peso-MXN', 'Dollar-USD']"
                    label="Moneda"
                    required
                  ></v-autocomplete>
                </v-col>
              </v-row>
            </v-container>
            <small>*Campos obligatorios</small>
          </v-card-text>
              <!--<v-card-text>
                <v-container>
                  <v-row>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.name" label="Nombre(s)"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.calories" label="Apellido(s)"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.fat" label="Email"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.carbs" label="Tipo"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.protein" label="Lenguaje"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.protein" label="Zona horaria"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.protein" label="Moneda"></v-text-field>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card-text>-->
  
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="save">Save</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
                <v-switch v-model="singleSelect" label="Selección única" class="pa-3"></v-switch>
            </template>
             <template v-slot:item.actions="{ item }">
        <v-icon
          small
          class="mr-2"
          @click="editItem(item)"
        >
          mdi-pencil
        </v-icon>
        <v-icon
          small
          @click="deleteItem(item)"
        >
          mdi-delete
        </v-icon>
      </template>
            </v-data-table>
            </v-card>
        </v-app>
           <!-- <div class="row" v-for="row in rows" :key="'row' + row">
                <div class="col d-flex align-items-stetch" v-for="(hotel,column) in hotelsInRow(row)" :key="'row' + row + column">
                    <hotel-list-item 
                       v-bind="hotel"
                    ></hotel-list-item>
                </div>

                <div class="col" v-for="p in placeholdersInRow(row)"  :key="'placeholder' + row + p">

                </div>
            </div>-->
         
        </div>     
    </div>
</template>

<script>


export default {
    
    data(){
        return {
          dialog: false,
            search:'',
           singleSelect: false,
           selected: [],
          users: null,
          loading: false,
          columns: 3,
          headers: [
        {
          text: 'Nombre',
          align: 'start',
          sortable: true,
          value: 'name',
        },
        { text: 'Email', value: 'email' },
        { text: 'Tipo', value: 'type' },
        { text: 'ID', value: 'id' },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      editedItem:{

      },
      defaultItem:{

      }
        };
    },
    
    created(){
        this.loading = true;
        const request = axios
            .get("/api/users")
            .then(response => { 
                this.users = response.data.data;
                this.loading = false;
        });
    },

    methods:{
       editItem (item) {
      
    },

    deleteItem (item) {
      
    },
     close () {
      this.dialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    save () {
      if (this.editedIndex > -1) {
        Object.assign(this.desserts[this.editedIndex], this.editedItem)
      } else {
        this.desserts.push(this.editedItem)
      }
      this.close()
    },
    }

}
</script>