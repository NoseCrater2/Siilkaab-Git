import axios from "axios";
const HotelModule = {
    state: {
        iditemsListOptions: 0,
        hotel: null,
        currencies: null,
        timezones: null,
        configuration: null,
        content: "" //Esta es la variable que utilizara el Markdown TipTap (MarkdownCompo.vue)
    },
    mutations: {
        //Metodo para mover el contador de items del MenuLateral.vue y ser usado en Hotel.vue
        countIditemsListOptions(state, index) {
            state.iditemsListOptions = index;
        },
        setHotel(state, payload) {
            state.hotel = payload;
            state.content = payload.LargeText;
        },
        setCurrencies(state, payload) {
            state.currencies = payload;
        },
        setTimezones(state, payload) {
            state.timezones = payload;
        },
        setConfiguration(state, payload) {
            state.configuration = payload;
        }
    },
    actions: {
        getHotel: async function({ commit }, id) {
            try{
                const request = await axios.get(`/api/hotels/${id}`);
                let hotel = request.data.data;
                commit("setHotel", hotel);
            }
            catch(error){
                //
            }
        },
        getCurrencies: async function({ commit }) {
            try{
                const request = await axios.get("/api/currencies");
                let currencies = request.data.data;
                commit("setCurrencies", currencies);
            }
            catch(error){
                //
            }
        },
        getTimezones: async function({ commit }) {
            try{
                const request = await axios.get("/api/timezones");
                let timezones = request.data;
                commit("setTimezones", timezones);
            }
            catch(error){
                //
            }
        },
        getConfiguration: async function({ commit }, id) {
            try{
                const request = await axios.get(`/api/configurations/${id}`);
                let configuration = request.data.data;
                //console.log(typeof(configuration))
                commit("setConfiguration", configuration);
            }
            catch(error){

            }
        }
    }
};
export default HotelModule;
