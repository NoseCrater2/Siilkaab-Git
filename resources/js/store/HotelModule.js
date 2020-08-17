import axios from "axios";
const HotelModule = {
    state: {
        hotels: null,
        assignHotels: null,
        iditemsListOptions: 0,
        hotel: null,
        currencies: null,
        timezones: null,
        countries: null,
        configuration: null,
        contacts: null,
        conditions: null,
        regimes: null,
        restaurants: null,
        pools: null,
        aditionalInfo: null,
        contentInformation: "", //Esta es la variable que utilizara el Markdown TipTap (MarkdownCompo.vue)
        contentConditions: ""
    },
    getters: {
        getAssignHotels(state) {
            return state.assignHotels;
        }
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
                (state.regimes = null),
                (state.restaurants = null),
                (state.pools = null),
                (state.aditionalInfo = null),
                (state.contentInformation = ""),
                (state.contentConditions = "");
        },
        //Metodo para mover el contador de items del MenuLateral.vue y ser usado en Hotel.vue
        countIditemsListOptions(state, index) {
            state.iditemsListOptions = index;
        },
        setHotel(state, payload) {
            state.hotel = payload;
            state.contentInformation = payload.LargeText;
        },
        setHotels(state, payload) {
            state.hotels = payload;
        },

        setAssignHotels(state, payload) {
            state.assignHotels = payload;
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
        setRestaurants(state, payload) {
            state.restaurants = payload;
        },
        setPools(state, payload) {
            state.pools = payload;
        },
        setAditionalInfo(state, payload) {
            state.aditionalInfo = payload;
        },
        //Metodo que guarda el estado de las variables usadas en el Markdown mientras el hotel este configurandose
        setContents(state, objContents) {
            if (objContents.info === "Information") {
                state.contentInformation = objContents.fullText;
            }
            if (objContents.info === "Conditions") {
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
            } catch (error) {
                
            }
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
                let arrayRegimes = [];
                id.forEach(async elID => {
                    const request = await axios.get(`/api/regimes/${elID}`);
                    arrayRegimes.push(request.data.data);
                });
                //console.log(typeof(configuration))
                commit("setRegimes", arrayRegimes);
            } catch (error) {}
        },
        getRestaurants: async function({ commit }, idHotel) {
            try {
                const request = await axios.get("/api/restaurants");
                let restaurants = request.data.data.filter(element=> element.hotel_id === idHotel );
                //console.log(typeof(configuration))
                commit("setRestaurants", restaurants);
            } catch (error) {}
        },
        getPools: async function({ commit }, idHotel) {
            try {
                const request = await axios.get("/api/pools");
                let pools = request.data.data.filter(element=> element.hotel_id === idHotel );
                //console.log(typeof(configuration))
                commit("setPools", pools);
            } catch (error) {}
        },
        getAditionalInfo: async function({ commit }, id) {
            try {
                const request = await axios.get(`/api/amenities/${id}`);
                let aditionalInfo = request.data.data;
                //console.log(typeof(configuration))
                commit("setAditionalInfo", aditionalInfo);
            } catch (error) {}
        },

        getHotelsForAdmin: async function({ commit }) {
            try {
                const request = await axios.get(`/api/adminhotels/`);
                let hotels = request.data.data;

                //console.log(typeof(configuration))
                commit("setHotels", hotels);
            } catch (error) {}
        },

        getAssignHotels: async function({ commit }, id) {
            try {
                const request = await axios.get(`/api/hotels_users/${id}`);
                let assignHotels = request.data.data;

                //console.log(typeof(configuration))
                commit("setAssignHotels", assignHotels);
            } catch (error) {}
        },

        setHotelsToUsers: async function({ commit }, hotels) {
            try {
                if (hotels[1].hotels !== null) {
                    const request = await axios.post(
                        "/api/hotels_users/" + hotels[0].id,
                        hotels[1]
                    );
                }

                //let assignHotels= request.data.data;

                // commit("setAssignHotels", assignHotels);
            } catch (error) {
                console.log("An error has ocurred");
            }
        }
    }
};
export default HotelModule;
