import Vue from "vue";
import Vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";
Vue.use(Vuex);

import Product from './module/Product_list.js'
import Product_card from "./module/Product_card.js";

const store = new Vuex.Store({
    modules:{
        Product,
        Product_card
    },
    state:{},
    getters:{},
    actions:{},
    mutations:{},
    plugins: [createPersistedState()],
})

export default store;