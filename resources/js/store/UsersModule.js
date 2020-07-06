import axios from 'axios';
const UsersModule = {
    state :{
        users: [],
        timezones: [],
        currencies: [],
        errors : {
          data:[{
            currency_id:[],
            email:[],
            language:[],
            name:[],
            timezone:[],
            type:[],
          }]
        },
        status:null,
    },
    getters:{
      
      getUserById: (state) => (id) => {
        return state.users.find(user => user.id === id)
      },
  
      getErrors(state){
        return state.errors;
      },
  
      getStatus(state){
        return state.status;
      }
    },
    mutations: {
      setUsers(state,usersAction){
        state.users = usersAction;
      },
  
      setErrors(state,errors){
        state.errors = errors
      },
      setStatus(state, status){
        state.status = status
      },
      setTimezones(state,timezonesAction){
        state.timezones = timezonesAction;
      },
      setCurrencies(state,currenciesAction){
        state.currencies = currenciesAction;
      },
      editUser(state,editedUser){
        state.users.map(function(currentUser){
          if(currentUser.id === editedUser.id){
            Object.assign(currentUser,editedUser);
          }
        });
      },
      saveUser(state,newUser){
        state.users.push(newUser)
      },
      deleteUser(state, deletedUser) {
        state.users.map(function(currentUser){
          if(currentUser.id === deletedUser.id){
            state.users.splice(state.users.indexOf(currentUser), 1);
          }
        });
      },
  
    },
    actions: {
        
      getUsers: async function ({ commit, state }){
        if(state.users.length === 0){
            const request =  await axios
            .get("/api/users");
            const users = request.data.data
            commit('setUsers',users)
        }else{
            
            return state.users
        } 

      },
  
      editUser: async function ({ commit},newUser){
        try {
          const request = await axios
          .put("/api/users/"+newUser.id,newUser)
          commit('editUser',request.data.data);
          commit('setStatus',request.status);
        } catch (error) {
          commit('setErrors',error.response)
          commit('setStatus',error.response.status);
        }
      },
  
      saveUser: async function ({commit},user){
        try {
          const request = await axios
          .post("/api/users/",user)
          commit('saveUser',request.data.data);
          commit('setStatus',request.status);
        } catch (error) {
          commit('setErrors',error.response)
          commit('setStatus',error.response.status);
        }
      },
  
      deleteUser: async function ({ commit},user){
        try {
          const request = await axios
          .delete("/api/users/"+user.id)
          commit('deleteUser',request.data.data);
          commit('setStatus',request.status);
        } catch (error) {
          commit('setStatus',error.response.status);
        }
      },
  
      getCurrencies: async function({ commit }){
        const request =  await axios
            .get("/api/currencies")
        const currencies = request.data.data;
        commit('setCurrencies',currencies)
      },
      getTimeZones: async function({ commit }){
        const request = await axios
            .get("/api/timezones")
        const timezones =request.data;
        commit('setTimezones',timezones)
      },
  
  
    },
}

export default UsersModule