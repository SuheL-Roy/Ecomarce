import axios from "axios";


const state = {
    cart:[],
}
const getters ={
   get_carts: state=>state.cart,
  
}
const actions = {
    
}
const mutations = {
   set_carts: function(state,cart){
    state.cart.push(cart);
    console.log(state.cart);
   },
   remove_carts: function(state,cart){
    console.log(cart);
   }
}

export default{
    state,
    getters,
    actions,
    mutations
}