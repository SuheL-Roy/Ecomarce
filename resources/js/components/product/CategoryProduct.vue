<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="woocommerce-breadcrumb mtb-15">
                    <div class="menu">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><a href="shop.html">Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-12">
                <!-- categories-area start -->
                <div class="categories-area box-shadow bg-fff">
                    <div class="product-title home2-bg-1 text-uppercase home2-product-title">
                        <i class="fa fa-bookmark icon bg-4"></i>
                        <h3>categories</h3>
                    </div>
                    <div class="shop-categories-menu p-20">
                        <ul>
                            <!-- <li>
                                <a href="#">Accessories</a><span> (7)</span>
                            </li>
                            <li>
                                <a href="#">Clothing</a><span> (21)</span><span
                                    class="opener-1 fa fa-plus pull-right"></span>
                                <ul class="toggle-1">
                                    <li>
                                        <a href="#">Hoodies</a><span> (20)</span>
                                    </li>
                                    <li>
                                        <a href="#">T-shirts</a><span> (3)</span>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Men's</a><span> (16)</span><span
                                    class="opener-2 fa fa-plus pull-right"></span>
                                <ul class="toggle-2">
                                    <li>
                                        <a href="#">Hats</a><span> (9)</span>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Music</a><span> (11)</span><span
                                    class="opener-3 fa fa-plus pull-right"></span>
                                <ul class="toggle-3">
                                    <li>
                                        <a href="#">Albums</a><span> (1)</span>
                                    </li>
                                    <li>
                                        <a href="#">Singles</a><span> (3)</span>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Posters</a><span> (7)</span></li>
                            <li>
                                <a href="#">Women's</a><span> (14)</span><span
                                    class="opener-4 fa fa-plus pull-right"></span>
                                <ul class="toggle-4">
                                    <li>
                                        <a href="#">Hats</a><span> (10)</span>
                                    </li>
                                </ul>
                            </li> -->
                            <li v-for="main_category in products" :key="main_category.id">
                                <a href="#"  @click.prevent="load_product(main_category)">{{ main_category.name }}</a>
                                <span>
                                    ({{
                                            main_category.related_product_count
                                    }})</span>
                                <span :class="
                                    'opener-' +
                                    main_category.id +
                                    ' fa fa-plus pull-right toggle_category'
                                "></span>
                                <ul>
                                    <li v-for="category in main_category.related_categories" :key="category.id">
                                        <a href="#">{{ category.name }}</a>
                                        <span>
                                            ({{
                                                    category.related_product_count
                                            }})</span>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- filter-by-price-area start -->
                <div class="filter-by-price-area mtb-30 bg-fff box-shadow">
                    <div class="product-title home2-bg-1 text-uppercase home2-product-title">
                        <i class="fa fa-bookmark icon bg-4"></i>
                        <h3>Filter by price</h3>
                    </div>
                    <div class="filter-by-price p-20-15">
                        <p>price: <input type="text" id="amount" /></p>
                        <div id="slider-range"></div>
                        <div class="filter">
                            <button>filter</button>
                        </div>
                    </div>
                </div>
                <!-- size-area start -->
                <div class="size-area bg-fff box-shadow">
                    <div class="product-title home2-bg-1 text-uppercase home2-product-title">
                        <i class="fa fa-bookmark icon bg-4"></i>
                        <h3>Size</h3>
                    </div>
                    <div class="size-menu shop-categories-menu p-20">
                        <ul>
                            <li><a href="#">L</a><span> (1)</span></li>
                            <li><a href="#">M</a><span> (1)</span></li>
                            <li><a href="#">S</a><span> (1)</span></li>
                            <li><a href="#">XS</a><span> (1)</span></li>
                        </ul>
                    </div>
                </div>
                <!-- color-area start -->
                <div class="color-area bg-fff box-shadow mtb-30">
                    <div class="product-title home2-bg-1 text-uppercase home2-product-title">
                        <i class="fa fa-bookmark icon bg-4"></i>
                        <h3>Color</h3>
                    </div>
                    <div class="size-menu shop-categories-menu p-20">
                        <ul>
                            <li><a href="#">Gold</a><span> (1)</span></li>
                            <li><a href="#">Green</a><span> (1)</span></li>
                            <li><a href="#">White </a><span> (1)</span></li>
                        </ul>
                    </div>
                </div>
                <!-- compare-area start -->
                <div class="compare-area bg-fff box-shadow">
                    <div class="product-title home2-bg-1 text-uppercase home2-product-title">
                        <i class="fa fa-bookmark icon bg-4"></i>
                        <h3>Compare</h3>
                    </div>
                    <div class="compare-menu p-20">
                        <p>No products to compare</p>
                        <a href="#">Clear all</a>
                        <a href="#" data-toggle="tooltip" title="Compare"
                            class="pull-right compare text-uppercase">Compare
                        </a>
                    </div>
                </div>
                <!-- product-tags-area start -->
                <div class="product-tags-area bg-fff box-shadow mtb-30">
                    <div class="product-title home2-bg-1 text-uppercase home2-product-title">
                        <i class="fa fa-bookmark icon bg-4"></i>
                        <h3>Product Tags</h3>
                    </div>
                    <div class="tags tag-menu hover-bg p-20">
                        <ul>
                            <li><a href="#">commodo</a></li>
                            <li><a href="#">enim</a></li>
                            <li><a href="#">fashion</a></li>
                            <li><a href="#">Fly</a></li>
                            <li><a href="#">Glasses</a></li>
                            <li><a href="#">Hats</a></li>
                            <li><a href="#">Hoodies</a></li>
                            <li><a href="#">libero</a></li>
                            <li><a href="#">men</a></li>
                            <li><a href="#">Men's</a></li>
                            <li><a href="#">Nam</a></li>
                            <li><a href="#">Popular</a></li>
                            <li><a href="#">Product</a></li>
                            <li><a href="#">version</a></li>
                            <li><a href="#">women</a></li>
                        </ul>
                    </div>
                </div>
                <!-- featured-area start -->
                <div class="featured-area bg-fff box-shadow mb-30">
                    <div class="product-title home2-bg-1 text-uppercase home2-product-title">
                        <i class="fa fa-bookmark icon bg-4"></i>
                        <h3>featured</h3>
                    </div>
                    <div class="featured-wrapper p-20">
                        <div class="product-wrapper single-featured bb">
                            <div class="product-img floatleft">
                                <a href="#">
                                    <img src="http://127.0.0.1:8000/contents/websites/img/product/1.jpg" alt=""
                                        class="primary" />
                                    <img src="http://127.0.0.1:8000/contents/websites/img/product/2.jpg" alt=""
                                        class="secondary" />
                                </a>
                            </div>
                            <div class="product-content floatright">
                                <h3><a href="#">Duis convallis</a></h3>
                                <span>&300.00</span>
                            </div>
                        </div>
                        <div class="product-wrapper single-featured bb">
                            <div class="product-img floatleft">
                                <a href="#">
                                    <img src="http://127.0.0.1:8000/contents/websites/img/product/3.jpg" alt=""
                                        class="primary" />
                                    <img src="http://127.0.0.1:8000/contents/websites/img/product/4.jpg" alt=""
                                        class="secondary" />
                                </a>
                            </div>
                            <div class="product-content floatright">
                                <h3><a href="#">Duis convallis</a></h3>
                                <span>&300.00</span>
                            </div>
                        </div>
                        <div class="product-wrapper single-featured bb">
                            <div class="product-img floatleft">
                                <a href="#">
                                    <img src="http://127.0.0.1:8000/contents/websites/img/product/5.jpg" alt=""
                                        class="primary" />
                                    <img src="http://127.0.0.1:8000/contents/websites/img/product/6.jpg" alt=""
                                        class="secondary" />
                                </a>
                            </div>
                            <div class="product-content floatright">
                                <h3><a href="#">Duis convallis</a></h3>
                                <span>&300.00</span>
                            </div>
                        </div>
                        <div class="product-wrapper single-featured">
                            <div class="product-img floatleft">
                                <a href="#">
                                    <img src="http://127.0.0.1:8000/contents/websites/img/product/7.jpg" alt=""
                                        class="primary" />
                                    <img src="http://127.0.0.1:8000/contents/websites/img/product/8.jpg" alt=""
                                        class="secondary" />
                                </a>
                            </div>
                            <div class="product-content floatright">
                                <h3><a href="#">Duis convallis</a></h3>
                                <span>&300.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product-vew area start -->
            <div class="col-xl-9 col-lg-9 col-md-12 col-12">
                <div class="tab-area">
                    <!-- <div class="tab-menu-area bg-fff mb-30 box-shadow">
                        <div class="row">
                            <div class="col-xl-4 col-md-4 col-md-4 col-12">
                                <div class="shop-tab-menu">
                                    <ul class="nav">
                                        <li>
                                            <a class="active" href="#"
                                                ><i class="fa fa-th-list"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i class="fa fa-th-list"></i
                                            ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-md-4 col-12">
                                <div class="shop-pra text-center">
                                    <p>Showing 1-16 of 21 results</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-md-4 col-12">
                                <div class="woocommerce-ordering text-center">
                                    <select name="orderby">
                                        <option
                                            value="menu_order"
                                            selected="selected"
                                        >
                                            Default sorting
                                        </option>
                                        <option value="popularity">
                                            Sort by popularity
                                        </option>
                                        <option value="rating">
                                            Sort by average rating
                                        </option>
                                        <option value="date">
                                            Sort by newness
                                        </option>
                                        <option value="price">
                                            Sort by price: low to high
                                        </option>
                                        <option value="price-desc">
                                            Sort by price: high to low
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="row">
                        <div class="product-wrapper bl">
                            <div class="product-img">
                                <a href="#">
                                    <img
                                        src="http://127.0.0.1:8000/contents/websites/img/product/9.jpg"
                                        alt=""
                                        class="primary"
                                    />
                                    <img
                                        src="http://127.0.0.1:8000/contents/websites/img/product/5.jpg"
                                        alt=""
                                        class="secondary"
                                    />
                                </a>
                                <div class="product-icon c-fff home3-hover-bg">
                                    <ul>
                                        <li>
                                            <a
                                                href="#"
                                                data-toggle="tooltip"
                                                title="Add to cart"
                                                ><i
                                                    class="fa fa-shopping-cart"
                                                ></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                data-toggle="tooltip"
                                                title="Wishlist"
                                                ><i class="fa fa-heart-o"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                data-toggle="tooltip"
                                                title="Compare"
                                                ><i class="fa fa-comments"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                data-toggle="tooltip"
                                                title="Accumsan eli"
                                                ><i class="fa fa-search"></i
                                            ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content home3-hover">
                                <h3><a href="#">Adipiscing cursus eu</a></h3>
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                                <span>&300.00</span>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-4" v-for="product in get_product_list.data" :key="product.id">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <div class="discount_amount">
                                        <span style="color: white">-{{
                                                product.discount_price
                                        }}%</span>
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
                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                                        class="fa fa-heart-o"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Compare"><i
                                                        class="fa fa-comments"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" @click.prevent="
                                                    showModal(product)
                                                " title="View Product Details">
                                                    <i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content home3-hover">
                                    <h3>
                                        <a :href="
                                            '/products-details/' +
                                            product.id
                                        ">{{ product.name }}</a>
                                    </h3>
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <div class="d-flex justify-content-between" style="width: 250px">
                                        <span v-if="product.discount_price > 0"><del>$ {{ product.price
                                        }}</del></span><span v-else>
                                            ${{ product.price }}</span><span v-if="product.discount_price > 0">$ {{
                                                    product.discount
                                            }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                            <div class="woocommerce-pagination-area bg-fff box-shadow ptb-10 mb-30">
                                <div class="woocommerce-pagination text-center hover-bg">
                                    <ul>
                                        <li class="active">
                                            <a href="#">1</a>
                                        </li>
                                        <li><a href="#">2</a></li>
                                        <li>
                                            <a href="#"><i class="fa fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="productViewModal" tabindex="-1" role="dialog" aria-labelledby="productViewModal"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productViewModal">
                            Details
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <product-details></product-details>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
export default {
    data: function () {
        return {
            products: {},
        };
    },
    created: function () {
        this.fetch_product_list();
        this.getAllCategory();
    },

    methods: {
        ...mapActions(["fetch_product_list"]),
        ...mapMutations(["set_product_details",'set_product_list']),

        showModal: function (products_details) {
            this.set_product_details(products_details);
            // console.log(products_details);
            $("#productViewModal").modal("show");
        },

        getAllCategory: function () {
            axios.get("/all-category").then((res) => {
                this.products = res.data;
                console.log(res.data);
                setTimeout(() => {
                    $(".toggle_category").on("click", function () {
                        // console.log('hi');
                        $(this).siblings("ul").toggleClass("toggle_display");
                        // console.log($(this).parent('li').children('ul').toggleClass('toggle_display'));
                    });
                }, 2000);
            });
        },
        load_product: function(main_category){
           // console.log(main_category.slug);
            axios.get(`/products/category/${main_category.slug}`).then((res) => {
              //  this.products = res.data.products;
              //this.commit('set_product_list',res.data.products);
              this.set_product_list(res.data.products);
                
                console.log(res.data.products.data);
            });
        }
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

.toggle_display {
    display: block !important;
}
</style>
