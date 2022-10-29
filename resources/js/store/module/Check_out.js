import axios from "axios";


const state = {
     billing_address : {
        name:'',
        email:'',
        address1:'',
        address2:'',
        town:'',
        state:'',
        phone:'',
        order_address:''
     }
}
const getters ={
   get_billing_address: state=>state.billing_address,
}
const actions = {
   
     
}
const mutations = {
   set_billing_address: function(state,billing_address){
    state.billing_address = billing_address;
   }
}

export default{
    state,
    getters,
    actions,
    mutations
}