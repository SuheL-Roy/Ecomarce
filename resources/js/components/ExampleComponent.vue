<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="cart-table mb-50 bg-fff">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-remove">Action</th>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart-item" v-for="(cart,index) in get_carts" :key="index">
                                    <td class="product-remove" style="width:165px;">
                                        <a href="#" @click.prevent="remove_product_form_carts(cart)" class="btn btn-danger btn-sm my-1" title="Remove this item">
                                            <i class="fa fa-trash"></i> delete item
                                        </a>
                                        <a href="#" @click.prevent="showModal(cart)" class="btn btn-warning btn-sm my-1" title="Remove this item">
                                            <i class="fa fa-pencil"></i> Edit Cart
                                        </a>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a :href="'/product-details/'+cart.product.id">
                                            <img :src="'/'+cart.product.thumb_image" alt="" />
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a :href="'/product-details/'+cart.product.id">{{cart.product.name}}</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="amounte">${{ cart.product.discount_price || cart.product.price }}</span>
                                    </td>
                                    <td class="product-quantity">
                                        <input :value="cart.qty" @change="change_product_qty($event,cart.product.id)" min="1" :max="product.stock - product.minimum_amount" type="number">
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="sub-total">${{ cart.product_price * cart.qty }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>

                <div class="modal fade"  id="cartEditModal" style="z-index: 99999999999;" tabindex="-1" aria-labelledby="cartEditModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cartEditModalLabel">Cart Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <product-details></product-details>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</template>

<script>
    export default {
        mounted() {
           console.log('Component mounted jk');
        }
    }
</script>
