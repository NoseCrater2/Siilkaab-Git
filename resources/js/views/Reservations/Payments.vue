<template>
<div>
<div id="app">
  <v-app id="inspire">
    <v-card
      max-width="550"
      class="mx-auto"
    >
      <v-list-item>
        
        <v-list-item-content>
          <v-list-item-title class="headline">Realizar pago</v-list-item-title>
          <v-list-item-subtitle>Selecciona una opción de pago e ingresa los datos requeridos.</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
  <v-divider horizontal></v-divider>
        <v-card-text>
        <v-row align="center" justify="center">
          <v-col class="display-2" cols="6">
            {{count}} MXN
          </v-col>
          <v-col cols="3"  >
            <v-chip-group
            v-model="selection"
            active-class="green accent-4 white--text"
            column
            >
              <v-chip>
                 <v-img
              src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/PayPal_logo.svg/300px-PayPal_logo.svg.png"
              alt="paypal"
              width="92"
            ></v-img>
              </v-chip>

              <v-chip>
                <v-img
              src="https://seeklogo.com/images/M/mercado-pago-logo-18C70D8C77-seeklogo.com.png"
              alt="mercadopago"
              width="92"
            ></v-img>
              </v-chip>
            </v-chip-group>
           
            
          </v-col>
         
        </v-row>
        
      </v-card-text>
  <v-divider horizontal></v-divider>
      <v-card-text>
        <div v-if="selection === 0">
          <component  :is="compo.p"></component>
        </div>
        <div v-else-if="selection === 1">
          <component  :is="compo.m"></component>
        </div>
       
      </v-card-text>
  
      <v-card-actions>
       <v-btn class="mx-2" fab dark color="red" >
        <v-icon dark>mdi-chevron-left</v-icon>
      </v-btn>

        <v-spacer></v-spacer>
        <div v-if="selection === 0">
         <v-btn class="mx-2" fab dark color="green" @click="makePayment()" >
        <v-icon dark>mdi-chevron-right</v-icon>
      </v-btn>
        </div>
         
      </v-card-actions>
    </v-card>
  </v-app>
</div>
</div>

</template>

<script>
import Paypal from "./Paypal";
import Mercadopago from "./Mercadopago";
export default {
  data () {
    return {
      loading: false,
      selection: 3,
      count: 0,
      payment:{
        value: this.count,
        currency: 'MXN',
        platform: 0,
      },
      compo:{
        p:Paypal,
        m:Mercadopago,
      }
    }
  },

components:{
  Paypal,
  Mercadopago,
},
  methods:{

     async makePayment () {
       this.payment.platform = 1;
       this.payment.value = this.count;
       console.log(this.payment)
         await axios.post("/api/payments/pay",this.payment).then(

         );
    },

    randomPrice(inferior,superior){
    var numPosibilidades = superior - inferior
    var aleat = Math.random() * numPosibilidades
    aleat = Math.round(aleat)
    return parseInt(inferior) + aleat
}
     
  },

  mounted(){
   this.count = this.randomPrice(300, 5000);
  },
}
</script>
