require("./bootstrap");

import "@mdi/font/css/materialdesignicons.css";
import Vuetify from "vuetify/lib";
import router from "./routes";
import VueRouter from "vue-router";
import Vuex from "vuex";
import Index from "./Index";
import storeDefinition from "./store/store";

window.Vue = require("vue");

/*Vue.component(
    'users-crud', 
    require('./components/users/Crud.vue'));

Vue.component(
    'users', 
    require('./components/users/User.vue'));*/

Vue.use(VueRouter);
Vue.use(Vuetify, {
    iconfont: "mdi"
});

// Translation provided by Vuetify (typescript)
import es from "../../node_modules/vuetify/src/locale/es.ts";

Vue.use(Vuex);

import "vuetify/dist/vuetify.css";

const store = new Vuex.Store(storeDefinition);

const app = new Vue({
    el: "#app",
    vuetify: new Vuetify({
        lang: {
            locales: { es },
            current: "es"
        }
    }),
    props: {
        source: String
    },
    router,
    store,
    components: {
        index: Index
    },
    data: () => ({
        drawer: null
    })
});
