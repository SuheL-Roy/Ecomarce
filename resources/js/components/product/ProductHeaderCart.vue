<template>
   <div>
        <div class="cart">
            <i class="icofont icofont-bag"></i>
            <a href="#">
                {{ get_carts.length }} Items - <strong>$ {{get_sub_total}} </strong>
                <i class="icofont icofont-rounded-down"></i>
            </a>
        </div>
        <ul>
            <li>
                <div class="cart-items" >
                    <div class="cart-item bb mt-10" v-for="(cart,index) in get_carts" :key="index">
                        <div class="cart-img">
                            <a href="#">
                                <img :src="'/'+cart.product.thumb_image" alt="" />
                            </a>
                        </div>
                        <div class="cart-content">
                            <a href="#">{{cart.product.name}}</a>
                            <a href="#" class="pull-right cart-remove">
                                <i class="fa fa-times" @click.prevent="remove_from_cart(cart)" ></i>
                            </a>
                            <div class="d-flex justify-content-between flex-wrap">
                                <span>{{cart.qty}} x ${{ cart.product.discount || cart.product.price }}</span>
                                <span>${{ cart.product.discount * cart.qty || cart.product.price * cart.qty }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="total mt-10">
                        <span class="pull-left">Subtotal:</span>
                        <span class="pull-right">${{get_sub_total}}</span>
                    </div>
                    <div class="cart-btn mb-20">
                        <a href="/carts">view cart</a>
                        <a href="/check-out">Checkout</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
export default {
   
    methods:{
       ...mapMutations(['remove_carts']),
       remove_from_cart:function(cart){
         this.remove_carts(cart);
       }
    },
    computed: {
        ...mapGetters([
            "get_carts",
            "get_sub_total"
        ]),
    },
}
</script>

<style>

</style>