<template>
  <div>
 
      <div v-if="users === []">
        <v-app id="inspire">
           
        <v-data-table item-key="title" class="elevation-1" loading loading-text="Obteniendo datos..."></v-data-table>
      </v-app>  
      </div>
        <div v-else>
            <v-app id="inspire" >
              
                <v-card>
                    
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
              align="center"
            ></v-text-field>
            
          <v-dialog v-model="dialog" persistent max-width="500px">
            <template v-slot:activator="{ on, attrs }">
             
              <v-btn
                color="primary"
                dark
                class="mb-2"
                v-bind="attrs"
               
                v-on="on"
              ><v-icon left dark>mdi-plus</v-icon>Nuevo Usuario </v-btn>
              <v-spacer></v-spacer>
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
                    :error-messages="getErrors.data.name"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="6">
                  <v-text-field label="Apellido(s)" v-model="editedItem.last_name" :error-messages="getErrors.data.last_name"  ></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-text-field label="Email*" v-model="editedItem.email" required :error-messages="getErrors.data.email"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-select
                    :items="['super', 'administrator', 'manager']"
                    label="Tipo*"
                    :error-messages="getErrors.data.type"
                    v-model="editedItem.type"
                    required
                  ></v-select>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-select
                    :items="['Spanish', 'English']"
                    label="Lenguaje*"
                    v-model="editedItem.language"
                    :error-messages="getErrors.data.language"
                    required
                  ></v-select>
                </v-col>
                <v-col cols="12" sm="6">

                  <div v-if="timezones !== []">
                    <v-autocomplete
                    :items="timezones"
                    label="Zona horaria*"
                    :error-messages="getErrors.data.timezone"
                    v-model="editedItem.timezone"
                    required
                  ></v-autocomplete>
                  </div>

                  <div v-else>
                    <v-autocomplete
                    :items="[]"
                    label="Zona horaria*"
                    v-model="editedItem.timezone"
                    :error-messages="getErrors.data.type.timezone"
                    required
                  ></v-autocomplete>
                  </div>
                  


                </v-col>
              </v-row>
             
            </v-container>
            </v-form>
      
          </v-card-text>
              
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">Cancelar</v-btn>
                <v-btn color="blue darken-1" text @click="save">Guardar</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <v-dialog v-model="deleteDialog" persistent max-width="290">
        
        <v-card>
          <v-card-title class="headline">¿Eliminar usuario?</v-card-title>
          <v-card-text>
            {{editedItem.name}}
            {{editedItem.last_name}}
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="gray darken-1" text @click="deleteDialog = false">CANCELAR</v-btn>
            <v-btn color="red darken-1" text @click="deleteItem()">ELIMINAR</v-btn>
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
          @click="showDeleteDialog(item)"
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

import { mapActions, mapState } from 'vuex';
import { mapMutations, mapGetters, mapModules} from 'vuex';
export default {
    
    data(){
        return {
          editedIndex: -1,
          dialog: false,
          deleteDialog: false,
          valid:false,
          search:'',
           singleSelect: false,
           selected: [],
          loading: false,
          editedItem:{
            name:null,
            last_name:null,
            email: null,
            type:null,
            language:null,
            timezone:null,
            currency:null,
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
          defaultErrors : {
            data:[{
              currency_id:[],
              email:[],
              language:[],
              name:[],
              timezone:[],
              type:[],
            }]
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
      },
      ...mapState({
        users: state => state.UsersModule.users,
        //currencies: state => state.UsersModule.currencies,
        timezones: state => state.UsersModule.timezones,
      }),
     ...mapGetters([
       'getErrors',
       'getStatus',
     ]),
     
    },

    mounted(){
    
     this.$store.dispatch('getUsers'),
     this.$store.dispatch('getTimeZones')
    // this.$store.dispatch('getCurrencies')
     
    },

    methods:{
    editItem (item) {
      
      this.editedIndex = this.users.indexOf(item)
      this.editedItem = Object.assign({},item)
      this.dialog = true

    },

    showDeleteDialog (item) {
      this.editedIndex = this.users.indexOf(item)
      this.editedItem = Object.assign({},item)
      this.deleteDialog = true
      
    },
    deleteItem(){
      this.$store.dispatch('deleteUser',this.editedItem);
      this.close();
    },
     close () {
      this.dialog = false
      this.deleteDialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
      this.$store.commit('setErrors',this.defaultErrors)
    },
    
    save () {
      
      if (this.editedIndex > -1) {
        this.$store.dispatch('editUser',this.editedItem).then(()=>{
          if(this.getStatus=== 200){
            this.close()
          }
          })
      } else {        
          this.$store.dispatch('saveUser',this.editedItem).then(()=>{
          if(this.getStatus=== 200){
            this.close()
          }
          })
      }
     
    },
    }

}
</script>