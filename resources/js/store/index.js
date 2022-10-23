import Vue from "vue";
import Vuex from 'vuex';
Vue.use(Vuex);

import Product from './module/Product_list.js'

const store = new Vuex.Store({
    modules:{
        Product
    },
    state:{},
    getters:{},
    actions:{},
    mutations:{}
})

export default store;