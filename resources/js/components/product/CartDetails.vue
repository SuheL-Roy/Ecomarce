<template>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="cart-table mb-50 bg-fff">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-remove"></th>
                                    <th class="product-thumbnail"></th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart-item" v-for="(cart, index) in get_carts" :key="index">
                                    <td class="product-remove">
                                        <a href="#" class="remove" title="Remove this item"
                                            @click.prevent="remove_from_cart(cart)">x</a>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a :href="'/products-details/' + cart.product.id">
                                            <img :src="'/' + cart.product.thumb_image" alt="" />
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a :href="'/products-details/' + cart.product.id">{{ cart.product.name }} </a>
                                    </td>
                                    <td class="product-price">
                                        <span class="amounte">${{ cart.product.discount || cart.product.price }}</span>
                                    </td>
                                    <td class="product-quantity">
                                        <input :value="cart.qty" @change="change_product_qty($event, cart.product.id)"
                                            min="1" :max="cart.product.stock - cart.product.minimum_amount"
                                            type="number" />
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="sub-total">${{ cart.product_price * cart.qty }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>


<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
export default {
    methods: {
        ...mapMutations([
            'remove_carts',
            'change_products_qty'

        ]),
        remove_from_cart: function (cart) {
            this.remove_carts(cart);
        },
        change_product_qty: function (event, product_id) {
            let product_info = {
                qty: event.target.value,
                product_id: product_id,
            }
            this.change_products_qty(product_info);
        },
    },
    computed: {
        ...mapGetters([
            "get_carts",
            "get_sub_total"
        ]),
    },
};
</script>

<style>

</style>
