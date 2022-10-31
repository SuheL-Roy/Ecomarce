import axios from "axios";


const state = {
     billing_address : {
      name: '',
      email: '',
      address: '',
      address2: '',
      town: '',
      state: '',
      phone: '',
      order_notes: ''
     },
     invoice_id:'',
     invoice_date:'',
     check_success: false,
}
const getters ={
   get_billing_address: state=>state.billing_address,
   get_invoice_id: state=>state.invoice_id,
   get_invoice_date: state=>state.invoice_date,
   get_check_success: state=>state.check_success,
}
const actions = {
   save_checkout_information: function(state,checkout_information){
     // console.log(checkout_information)

      axios.post('/save_check_out_info',checkout_information)
      .then((res)=>{
         console.log(res.data);
         this.commit('set_invoice_id_and_date',{
            invoice_id:res.data.invoice_id,
            invoice_date:res.data.invoice_date,
         })
      })
   }
     
}
const mutations = {
   set_billing_address: function(state,billing_address){
    state.billing_address = billing_address;
   },
   set_invoice_id_and_date: function(state,info){
      state.invoice_id = info.invoice_id;
      state.invoice_date = info.invoice_date;
      state.check_success = true;
      this.commit('reset_cart', null, { root:true });
      this.dispatch('fetch_latest_card', null, { root:true });
   }
}

export default{
    state,
    getters,
    actions,
    mutations
}