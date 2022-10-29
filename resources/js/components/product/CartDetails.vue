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
                                        <a href="#" class="btn btn-danger btn-sm my-1" title="Remove this item"
                                            @click.prevent="remove_from_cart(cart)"><i class="fa fa-trash"></i></a>

                                        <a href="#" class="btn btn-success btn-sm my-1" title="Remove this item"
                                            @click.prevent="showModal(cart)"><i class="fa fa-edit"></i> </a>


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
                <div class="modal fade" id="cartEditModal" style="z-index: 99999999999;" tabindex="-1"
                    aria-labelledby="cartEditModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cartEditModalLabel">Cart Details</h5>
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- <product-details></product-details> -->
                                <product-details></product-details>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>


<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
import ProductDetails from './ProductDetails.vue';
export default {
    components: { ProductDetails },
    // data: function (){
    //    return{
    //     product:[]
    //    }
    // },
    //   created: function () {
    //         this.$watch("get_product_details", (newVal, oldVal) => {
    //             this.product = this.get_product_details;
    //             this.product_show_image = this.product.thumb_image;
    //         });
    //     },
    methods: {
        ...mapMutations([
            'remove_carts',
            'change_products_qty',
            'set_product_details',
            'set_selected_cart'

        ]),
        remove_from_cart: function (cart) {
            this.remove_carts(cart);
        },
        showModal: function (cart_details) {
            this.set_selected_cart(cart_details);
            this.set_product_details(cart_details.product);
            // console.log(cart_details);
            $('#cartEditModal').modal('show');
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
            "get_sub_total",
        ]),
    },
};
</script>

<style>

</style>
