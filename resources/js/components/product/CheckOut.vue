<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="checkout-title text-center mtb-20">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
        <div class="checkout-area">
            <div class="row">
                <!-- <div class="col-xl-12 col-lg-12 col-md-12 co-12">
                    <div class="returning-customer-area p-20 mb-20">
                        <div class="returning-customer mb-10">
                            <i class="fa fa-book"></i>
                            <span>Returning customer?</span>
                            <span class="login-form-click">Click here to login</span>
                        </div>
                        <div class="login-form account-form p-20 clear bg-fff box-shadow">
                            <p>
                                If you have shopped with us before, please enter
                                your details in the boxes below. If you are a new
                                customer please proceed to the Billing & Shipping
                                section.
                            </p>
                            <form action="#">
                                <span class="form-row-first">
                                    <b>Username or email <span>*</span></b>
                                    <input type="text" />
                                </span>
                                <span class="form-row-last">
                                    <b>password <span>*</span></b>
                                    <input type="password" />
                                </span>
                                <div class="login-button">
                                    <button>Login</button>
                                    <input type="checkbox" />
                                    <b>Remember me </b>
                                    <a href="#">Lost your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
                <div class="col-xl-12 col-lg-12 col-md-12 co-12">
                    <div class="coupon-code-area p-20 mb-20">
                        <div class="returning-customer mb-10">
                            <i class="fa fa-book"></i>
                            <span>Have a coupon?</span>
                            <span class="code">Click here to enter your code</span>
                        </div>
                        <div class="code-form account-form p-20 clear box-shadow bg-fff">
                            <form action="#">
                                <span class="form-row-first">
                                    <input type="text" placeholder="Coupon Code" />
                                </span>
                                <span class="form-row-last login-button">
                                    <button>Apply Coupon</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="customer-details-area">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                    <div class="customer-details mb-50">
                        <div class="customer-details-title mb-10">
                            <h2>Billing Details</h2>
                        </div>
                        <div class="customer-details-form account-form p-20 clear">
                            <!-- <form action="#">
                                <span class="form-row-first">
                                    <b>Name
                                        <span class="required">*</span></b>
                                    <input type="text" />
                                </span>
                                <span class="form-row-last">
                                    <b> <span class="required">*</span></b>
                                    <input type="text" />
                                </span>
                                <span>
                                    <b>Company Name </b>
                                    <input type="text" />
                                </span>
                                <span class="form-row-first">
                                    <b>Email Address
                                        <span class="required">*</span></b>
                                    <input type="email" />
                                </span>
                                <span class="form-row-last">
                                    <b>Email Address
                                        <span class="required">*</span></b>
                                    <input type="text" />
                                </span>
                                <span>
                                    <b>Address <span class="required">*</span></b>
                                    <input type="text" placeholder="Street address" />
                                </span>
                                <span>
                                    <input type="text" placeholder="Apartment, suite, unit etc. (optional)" />
                                </span>
                                <span>
                                    <b>Town/City <span class="required">*</span></b>
                                    <input type="text" placeholder="Apartment, suite, unit etc. (optional)" />
                                </span>
                                <strong class="show-password"><input type="checkbox" /> Create an
                                    account?</strong>
                                <div class="account-password">
                                    <p>
                                        Create an account by entering the
                                        information below. If you are a returning
                                        customer please login at the top of the page
                                    </p>
                                    <span>
                                        <b>Account password
                                            <span class="required">*</span></b>
                                        <input type="password" placeholder="password" />
                                    </span>
                                </div>
                            </form> -->
                            <form action="#">
                                <span class="form-row-first">
                                    <b>Name <span class="required">*</span></b>
                                    <input v-model="billing_address.name" type="text">
                                </span>
                                <span class="form-row-first">
                                    <b>Email Address <span class="required">*</span></b>
                                    <input v-model="billing_address.email" type="email">
                                </span>
                                <span>
                                    <b>Address <span class="required">*</span></b>
                                    <input v-model="billing_address.address" type="text" placeholder="Street address">
                                </span>
                                <span>
                                    <input v-model="billing_address.address2" type="text"
                                        placeholder="Apartment, suite, unit etc. (optional)">
                                </span>
                                <span>
                                    <b>Town/City <span class="required">*</span></b>
                                    <input v-model="billing_address.town" type="text"
                                        placeholder="Apartment, suite, unit etc. (optional)">
                                </span>
                                <span>
                                    <b>State <span class="required">*</span></b>
                                    <input v-model="billing_address.state" type="text" placeholder="">
                                </span>
                                <span>
                                    <b>Phone <span class="required">*</span></b>
                                    <input v-model="billing_address.phone" type="text" placeholder="">
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                    <div class="additional-information mb-50">
                        <div class="customer-details-title mb-10">
                            <h2>Additional Information</h2>
                        </div>
                        <b>Order Notes</b>
                        <textarea name="#" id="#" cols="30" rows="10"
                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                    </div>
                </div> -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                    <div class="additional-information mb-50">
                        <div class="customer-details-title mb-10">
                            <h2>Additional Information</h2>
                        </div>
                        <b>Order Notes</b>
                        <textarea v-model="billing_address.order_notes" name="#" id="#" cols="30" rows="10"
                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                    </div>
                    <button class="btn btn-success" @click.prevent="checkout_confirm">Checkout</button>
                </div>
            </div>
        </div>
        <div class="checkout-order-area mb-35">
            <div class="order-title pb-10 mb-20 text-uppercase">
                <h3>Your order</h3>
            </div>
            <div class="order_review table-responsive">
                <table>
                    <tr>
                        <th class="product-name">Product</th>
                        <th class="product-total">Total</th>
                    </tr>
                    <tbody>
                        <tr class="cart_item" v-for="(cart, index) in get_carts" :key="index">
                            <td class="product-name">
                                {{ cart.product.name }}
                                <strong class="product-quantity">x {{ cart.qty }}</strong>
                            </td>
                            <td class="product-total">
                                <span>$ {{ cart.product_price * cart.qty }}</span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td>
                                <strong><span>${{ get_sub_total }}</span></strong>
                            </td>
                        </tr>
                        <tr class="order-total">
                            <th>Total</th>
                            <td>
                                <strong><span>${{ get_sub_total }}</span></strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

import { mapGetters, mapActions, mapMutations } from "vuex";
import axios from "axios";
export default {
    data: function () {
        return {
            billing_address: {
                name: '',
                email: '',
                address: '',
                address2: '',
                town: '',
                state: '',
                phone: '',
                order_notes: ''
            }
        }
    },
    created: function () {
        this.billing_address = this.get_billing_address;
    },
    methods: {
        ...mapMutations([
            'set_billing_address'
        ]),

        checkout_confirm: function () {
            this.set_billing_address(this.billing_address);
            var stripe = Stripe('pk_test_51LyIIcSEDmb2ml087PyQgoDNjQzkKvsE7vMuQ2CUS8dLRwgiSQ11bjFHqMEMs8ehOr3UejQwD4AihXG1Scry8InS00dEMzDJbR');
            axios.post("/checkout-confirm")
                .then(function (response) {
                    return response.data;
                })
                .then(function (session) {
                    // console.log('hi');
                    return stripe.redirectToCheckout({ sessionId: session.id });
                })
                .then(function (result) {
                    // If redirectToCheckout fails due to a browser or network
                    // error, you should display the localized error message to your
                    // customer using error.message.
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function (error) {
                    console.error("Error:", error);
                });
            // console.log('hi');
        }
    },
    computed: {
        ...mapGetters([
            'get_billing_address',
            'get_carts',
            'get_sub_total'
        ])
    }
};
</script>

<style>

</style>
