<template>
  <div>
    <div>
      <v-row justify="space-around">
        <v-icon @click="model--">mdi-minus</v-icon>
        {{ model }}
        <v-icon @click="model++">mdi-plus</v-icon>
      </v-row>
      <v-carousel v-model="model" hide-delimiters :show-arrows-on-hover="model>0" :show-arrows="model>0">
        <v-carousel-item v-for="(color, i) in colors" :key="color">
          <v-sheet :color="color" height="100%" tile>
            <v-row class="fill-height" align="center" justify="center">
              <div class="display-3">HOLAAAAAA{{ i + 1 }}</div>
              <DynamicRestaurant></DynamicRestaurant>
            </v-row>
          </v-sheet>
        </v-carousel-item>
      </v-carousel>
    </div>
  </div>
</template>

<script>
import DynamicRestaurant from './DynamicRestaurant'
export default {
  name: "CarrouselRestaurant",
  data() {
    return {
      colors: ["primary", "secondary", "yellow darken-2", "red", "orange"],
      model: 0,
    };
  },
  components:{
    DynamicRestaurant
  }
};
</script>