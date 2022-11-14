<template>
    <div class="row">
        <div class="col-md-4" v-for="product in get_product_list.data" :key="product.id">
            <div class="product-wrapper">
                <div class="product-img">
                    <div class="discount_amount">
                        <span style="color: white">-{{ product.discount_price }}%</span>
                    </div>
                    <a href="#">
                        <img :src="'/' + product.thumb_image" alt="" class="primary" />
                        <img :src="'/' + product.image[0].name" alt="" class="secondary" />
                    </a>
                    <div class="product-icon c-fff home3-hover-bg">
                        <ul>
                            <li>
                                <a href="#" data-toggle="tooltip" title="Add to cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-comments"></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" @click.prevent="showModal(product)"
                                    title="View Product Details"><i class="fa fa-search"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="product-content home3-hover">
                    <h3>
                        <a :href="'/products-details/' + product.id">{{
                                product.name
                        }}</a>
                    </h3>
                    <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <div class="d-flex justify-content-between" style="width: 250px">
                        <span v-if="product.discount_price > 0"><del>$ {{ product.price }}</del></span><span v-else> ${{
                                product.price
                        }}</span><span v-if="product.discount_price > 0">$ {{ product.discount
}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
export default {
    created: function () {
        this.fetch_product_list();
    },

    methods: {
        ...mapActions(["fetch_product_list"]),
        ...mapMutations(["set_product_details"]),

        showModal: function (products_details) {
            this.set_product_details(products_details);
            $("#productViewModal").modal("show");
        },
    },
    computed: {
        ...mapGetters(["get_product_list"]),
    },
};
</script>

<style scoped>
.product-wrapper {
    box-shadow: 0px opx 5px #1077d140;
    height: 92%;
    margin: 15px 0px;
}

.product-content h3 a {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    padding: 10px 0px;
}

.discount_amount {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: rgb(30, 65, 112);
    border-radius: 50%;
    height: 40px;
    width: 40px;
    text-align: center;
    line-height: 40px;
    z-index: 9;
}
</style>
