<template>
<div>
 <div id="app">
    <v-form>
      <v-container>
        <v-row >
          <v-col cols="12" sm="6">
            <v-text-field
              dense
              outlined
              label="Numero de tarjeta"
              prepend-inner-icon="mdi-credit-card"
              counter="16"
            ></v-text-field>
          </v-col>

          <v-col v-col cols="12" sm="3">
             <v-text-field
              outlined
              dense
              label="CVC"
              counter="4"
            ></v-text-field>
          </v-col>

           <v-col v-col cols="12" sm="3">
             <v-text-field
              dense
              outlined
              label="Mes/Año"
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
            <v-col cols="12" sm="6">
            <v-text-field
              dense
              outlined
              label="Nombre"
              prepend-inner-icon="mdi-account"
             
            ></v-text-field>
          </v-col>

           <v-col cols="12" sm="6">
            <v-text-field
              dense
              outlined
              label="Email"
              prepend-inner-icon="mdi-email"
             
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
             <v-col cols="12" sm="4">
            <v-select
            dense
            :items="items"
            label="Doc Type"
            outlined
          ></v-select>
          </v-col>

          <v-col cols="12" sm="8">
            <v-text-field
              dense
              outlined
              label="Doc Number"
            ></v-text-field>
            </v-col>
        </v-row>
        
      </v-container>
    </v-form>
 
</div>
</div>

</template>

<script>
export default {
  data () {
    return {
     items:[
         "C.C",
     ],
    }
  },

  methods:{

     
  },
}
</script>