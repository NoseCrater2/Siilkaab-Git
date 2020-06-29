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
                    item-key="id"
                    show-select
                    :headers="headers"
                    :items="users" 

                    :items-per-page="20"
                    :single-select="singleSelect"
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
          <v-dialog v-model="dialog" persistent max-width="500px">
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
            <span class="headline">{{ formTitle }}</span>
             </v-card-title>
              <v-card-text>
                <v-form v-model="valid">
            <v-container>
              <v-row>
                <v-col cols="12" sm="6" md="6">
                  <v-text-field 
                    label="Nombre(s)*" 
                    v-model="editedItem.name" 
                    required

                    ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="6">
                  <v-text-field label="Apellido(s)*" v-model="editedItem.last_name"  ></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-text-field label="Email*" v-model="editedItem.email" required ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-select
                    :items="['super', 'administrator', 'manager']"
                    label="Tipo*"

                    v-model="editedItem.type"
                    required
                  ></v-select>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-select
                    :items="['Spanish', 'English']"
                    label="Lenguaje*"
                    v-model="editedItem.language"

                    required
                  ></v-select>
                </v-col>
                <v-col cols="12" sm="6">

                  <div v-if="timezones">
                    <v-autocomplete
                    :items="timezones"
                    label="Zona horaria*"

                    v-model="editedItem.timezone"
                    required
                  ></v-autocomplete>
                  </div>

                  <div v-else>
                    <v-autocomplete
                    :items="[]"
                    label="Zona horaria*"
                    v-model="editedItem.timezone"

                    required
                  ></v-autocomplete>
                  </div>
                  


                </v-col>
                <v-col cols="12" sm="6">

                  <div v-if="currencies">
                    <v-autocomplete
                    :items="currencies"
                    label="Moneda*"
                    item-value="currency_id"
                    item-text="currency"
                    v-model="editedItem.currency_id"
                    required
                    >
                    
                    </v-autocomplete>
                  </div>

                  <div v-else>
                    <v-autocomplete
                    :items="[]"
                    label="Moneda*"
                    item-text="currency"
                    item-value="currency_id"
                    v-model="editedItem.currency_id"
                    required
                    ></v-autocomplete>
                  </div>
                  
                </v-col>
              </v-row>
            </v-container>
            </v-form>
            <div v-if="errors">
              
                <div v-for=" error in errors" :key="error.id">
                   <v-alert type="error">
                     {{error}}
                    </v-alert>
                 </div> 

            </div>
            
          </v-card-text>
              
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
         
        </div>     
    </div>
</template>

<script>


export default {
    
    data(){
        return {
          editedIndex: -1,
          dialog: false,
          valid:false,
          search:'',
           singleSelect: false,
           selected: [],
           timezones:[],
           errors:[],
          users: null,
          currencies:'',
          loading: false,
          editedItem:{
            name:'',
            last_name:'',
            email: '',
            type:'',
            language:'',
            timezone:'',
            currency:'',
            currency_id:'',
          },
          defaultItem:{
            name:'',
            last_name:'',
            email: '',
            type:'',
            language:'',
            timezone:'',
            currency:'',
            currency_id:'',

          },
          headers: [
        {
          text: 'Nombre',
          align: 'start',
          sortable: true,
          value: 'all_name',
        },
        { text: 'Email', value: 'email' },
        { text: 'Tipo', value: 'type' },
        { text: 'ID', value: 'id' },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
     
        };
    },
    
    computed:{
      formTitle(){
        return this.editedIndex === -1 ? 'Nuevo Usuario' : 'Editar Usuario'
      }
    },

    created(){
        this.loading = true;
        const request = axios
            .get("/api/users")
            .then(response => { 
                this.users = response.data.data;
                this.loading = false;
        });
         this.getTimeZones();
        this.chargeAddProps();
       
    },

    methods:{

      chargeAddProps(){
        const request = axios
            .get("/api/currencies")
            .then(response => { 
                this.currencies = response.data.data;
                
               });
      },

    getTimeZones(){
      const request = axios
            .get("/api/timezones")
            .then(response => { 
                this.timezones = response.data;
        });
    },
    editItem (item) {
      
      this.editedIndex = this.users.indexOf(item)
      this.editedItem = Object.assign({},item)
      this.dialog = true

    },

    deleteItem (item) {
      const index = this.users.indexOf(item)
      confirm('¿Eliminar este usuario?') && axios.delete('/api/users/'+item.id);
    },
     close () {
      this.dialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
        this.errors = [];
      })
    },
    
    save () {
      this.errors =[]
      if (this.editedIndex > -1) {
        axios.put('/api/users/'+this.editedItem.id,this.editedItem);
      } else {        
         axios.post('/api/users',this.editedItem).catch(err => {
           if(err.response && err.response.status && 422 === err.response.status){
                this.errors = err.response.data.errors
                
              }
          });

          console.log('primero paso por aqui'+this.errors);
       
      }
       if(this.errors.length === 0){
          this.close();
        }
    },
    }

}
</script>