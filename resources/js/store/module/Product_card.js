import axios from "axios";


const state = {
    sub_total:0,
    carts:[],
    Selected_cart:{},

}
const getters ={
   get_sub_total: state=>state.sub_total, 
   get_carts: state=>state.carts,
   get_selected_card: state=>state.Selected_cart
  
}
const actions = {
    
}
const mutations = {
   set_carts: function(state,cart){
    let temp_cart = state.carts.filter((item)=>item.product.id != cart.product.id);
    state.carts = temp_cart;
    state.carts.push(cart);
    this.commit('calculate_cart_total');
      //console.log(state.carts);
   },
   remove_carts: function(state,cart){
    let temp_cart = state.carts.filter((item)=>item.product.id != cart.product.id);
    state.carts = temp_cart;
    this.commit('calculate_cart_total');
    //console.log(cart);
   },
   set_selected_cart: function(state,cart){
    state.Selected_cart = cart;
   },
   change_products_qty: function(state,product_info){
      let product = state.carts.find((item) => {
         return item.product.id  === product_info.product_id;
     });
     product.qty = product_info.qty;
      this.commit('calculate_cart_total');
    // console.log(product_info.qty);
   },
   calculate_cart_total: function(state,cart){
    state.sub_total = state.carts.reduce((total,item)=>total += (item.product_price * item.qty),0);
   // state.sub_total = state.carts.reduce((total,item) += item.product_price,0);
   }
}

export default{
    state,
    getters,
    actions,
    mutations
}