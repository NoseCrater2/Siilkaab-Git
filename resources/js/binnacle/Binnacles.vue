<template>
    <div>
       
        <div v-if="loading">
           <v-app id="inspire">
            <v-data-table item-key="title" class="elevation-1" loading loading-text="Obteniendo datos..."></v-data-table>
          </v-app>  
        </div>

        <div v-else>
            <v-app id="inspire">
                <v-card >
                     <v-card-title>Historial de Usuarios
                         <v-spacer></v-spacer>
                            <v-text-field
                              v-model="search"
                              append-icon="mdi-magnify"
                              label="Buscar registro"
                              single-line
                              hide-details
                            ></v-text-field>
                             
                    </v-card-title>
                <v-data-table
                    v-model="selected"
                    item-key="Fecha"
                    show-select
                    :headers="headers"
                    :items="binnacles" 
                    :items-per-page="20"
                    :single-select="singleSelect"
                    multi-sort
                    class="elevation-1"
                    :search="search"
            >
            
            <template v-slot:top>
                <v-switch v-model="singleSelect" label="Selección única" class="pa-3"></v-switch>
            </template>
             <template v-slot:item.actions="{ item }">
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

import { mapActions, mapState } from 'vuex';
export default {
    
    data(){
        return {
            search:'',
           singleSelect: false,
           selected: [],
          loading: false,
          columns: 3,
          headers: [
        {
          text: 'Fecha',
          align: 'start',
          sortable: true,
          value: 'created_at',
        },
        { text: 'Acción', value: 'action' },
        { text: 'Mdelo', value: 'model' },
        { text: 'Detalles', value: 'details' },
        { text: 'ID', value: 'id' },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
        };
    },
    computed:{
       ...mapState({
        binnacles: state => state.BinnacleModule.binnacles,
      }),
    },
    mounted(){
        this.loading = true;
        this.$store.dispatch('getBinnacles'),
         this.loading = false;
    },

    methods:{

    deleteItem (item) {
      
    },
    }
}
</script>