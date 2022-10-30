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
}
const getters ={
   get_billing_address: state=>state.billing_address,
   get_invoice_id: state=>state.invoice_id,
   get_invoice_date: state=>state.invoice_date
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
     // console.log(checkout_information)
     state.invoice_date = res.data.invoice_date;
     state.invoice_id = res.data.invoice_id;
   }
     
}
const mutations = {
   set_billing_address: function(state,billing_address){
    state.billing_address = billing_address;
   },
   set_invoice_id_and_date: function(state,info){
      state.invoice_id = info.invoice_id;
      state.invoice_date = info.invoice_date;
   }
}

export default{
    state,
    getters,
    actions,
    mutations
}