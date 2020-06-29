import Hotels from "./hotels/Hotels";
import Hotel from "./hotel/Hotel";
import Users from "./users/Users";
import Binnacles from "./binnacle/Binnacles";
import Dashboard from "./panels/Dashboard";


import VueRouter from "vue-router";




const routes = [
    {
        path: "/",
        component: Dashboard, 
        name: "home"
    },

    {
        path: "/hotel/:id",
        component: Hotel, 
        name: "hotelNoParam",
       
    },
    {
        path: "/hotel/",
        component: Hotel, 
        name: "hotelParam",
        
    },
    {
        path: "/hotels/",
        component: Hotels, 
        name: "hotels"
    },
    {
        path: "/users/",
        component: Users, 
        name: "users"
    },
    {
        path: "/binnacles/",
        component: Binnacles, 
        name: "binnacles"
    },
    {
        path: "/panel/",
        component: Dashboard, 
        name: "panel"
    },
];

const router = new VueRouter({
    routes,
    mode: 'history',
});

export default router;