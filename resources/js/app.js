require('./bootstrap');

import '@mdi/font/css/materialdesignicons.css';
import Vuetify from 'vuetify';
import router from "./routes";
import VueRouter from "vue-router";
import Index from "./Index";

window.Vue = require('vue');


/*Vue.component(
    'users-crud', 
    require('./components/users/Crud.vue'));

Vue.component(
    'users', 
    require('./components/users/User.vue'));*/

Vue.use(VueRouter);
Vue.use(Vuetify,{
    iconfont:'mdi'
});

import 'vuetify/dist/vuetify.css';

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
        props: {
        source: String,
        },
    router,
    components:{
        "index":Index
    },
    data: () => ({
        drawer: null,
       
      }),

});