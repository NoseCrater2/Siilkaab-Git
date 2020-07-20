import axios from "axios";
const HotelModule = {
    state: {
        iditemsListOptions: 0,
        hotel: null,
        currencies: null,
        timezones: null,
        countries: null,
        configuration: null,
        contacts: null,
        conditions: null,
        regimes: null,
        contentInformation: "", //Esta es la variable que utilizara el Markdown TipTap (MarkdownCompo.vue)
        contentConditions: "" 
    },
    mutations: {
        //Se reinician los estados (principalmente por el problema del router-link)
        setReinicialized(state) {
            (state.iditemsListOptions = 0),
            (state.hotel = null),
            (state.currencies = null),
            (state.timezones = null),
            (state.countries = null),
            (state.configuration = null),
            (state.contacts = null),
            (state.conditions = null),
            (state.contentInformation = ""),
            (state.contentConditions = "")
        },
        //Metodo para mover el contador de items del MenuLateral.vue y ser usado en Hotel.vue
        countIditemsListOptions(state, index) {
            state.iditemsListOptions = index;
        },
        setHotel(state, payload) {
            state.hotel = payload;
            state.contentInformation = payload.LargeText;
        },
        setCurrencies(state, payload) {
            state.currencies = payload;
        },
        setTimezones(state, payload) {
            state.timezones = payload;
        },
        setCountries(state, payload) {
            state.countries = payload;
        },
        setConfiguration(state, payload) {
            state.configuration = payload;
        },
        setContacts(state, payload) {
            state.contacts = payload;
        },
        setConditions(state, payload) {
            state.conditions = payload;
            state.contentConditions = payload.cancelation_text;
        },
        setRegimes(state, payload) {
            state.regimes = payload;
        },
        //Metodo que guarda el estado de las variables usadas en el Markdown mientras el hotel este configurandose
        setContents(state, objContents){
            if(objContents.info === "Information"){
                state.contentInformation = objContents.fullText;
            }
            if(objContents.info === "Conditions"){
                state.contentConditions = objContents.fullText;
            }
        }
    },
    actions: {
        getHotel: async function({ commit }, id) {
            try {
                const request = await axios.get(`/api/hotels/${id}`);
                let hotel = request.data.data;
                commit("setHotel", hotel);
            } catch (error) {
                //
            }
        },
        getCurrencies: async function({ commit }) {
            try {
                const request = await axios.get("/api/currencies");
                let currencies = request.data.data;
                commit("setCurrencies", currencies);
            } catch (error) {
                //
            }
        },
        getTimezones: async function({ commit }) {
            try {
                const request = await axios.get("/api/timezones");
                let timezones = request.data;
                commit("setTimezones", timezones);
            } catch (error) {
                //
            }
        },
        getCountries: async function({ commit }) {
            try {
                const request = await axios.get("/api/countries");
                let countries = request.data.data;
                commit("setCountries", countries);
            } catch (error) {
                //
            }
        },
        getConfiguration: async function({ commit }, id) {
            try {
                const request = await axios.get(`/api/configurations/${id}`);
                let configuration = request.data.data;
                //console.log(typeof(configuration))
                commit("setConfiguration", configuration);
            } catch (error) {}
        },
        getContacts: async function({ commit }, id) {
            try {
                const request = await axios.get(`/api/contacts/${id}`);
                let contacts = request.data.data;
                //console.log(typeof(configuration))
                commit("setContacts", contacts);
            } catch (error) {}
        },
        getConditions: async function({ commit }, id) {
            try {
                const request = await axios.get(`/api/conditions/${id}`);
                let conditions = request.data.data;
                //console.log(typeof(configuration))
                commit("setConditions", conditions);
            } catch (error) {}
        },
        getRegimes: async function({ commit }, id) {
            try {
                const request = await axios.get(`/api/regimes/${id[0]}`);
                let regimes = request.data.data;
                console.log(regimes)
                //console.log(typeof(configuration))
                commit("setRegimes", regimes);
            } catch (error) {}
        }
    }
};
export default HotelModule;
