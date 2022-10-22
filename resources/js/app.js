/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "single-product-body",
    require("./components/SingleProductBody").default
);

Vue.component(
    "blog-list",
    require("./components/PropsByBlog/BlogList.vue").default
);
Vue.component(
    "blog-details",
    require("./components/PropsByBlog/BlogDetails.vue").default
);
Vue.component(
    "comments",
    require("./components/PropsByBlog/Comments.vue").default
);
Vue.component(
    "comments-add",
    require("./components/PropsByBlog/CommentsAdd.vue").default
);

//Vue.component('pagination', require('shetabit-laravel-vue-pagination'));
//Vue.component('pagination', require('laravel-vue-pagination'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
if (document.getElementById("app")) {
    const app = new Vue({
        el: "#app",

        created: function () {
           this.latest_product();
          // this.search_product()
        },
        data: function () {
            return {
                products: [],
                products_list: [],
                //pos_total_price: 0,
            };
        },
        methods: {
            latest_product: function() {
                $.get("/json/latest-products-json/6", (res) => {
                    // console.log(res);
                       this.products = res.data;
                   });
            },
            search_product: _.debounce(function(key) {
                if(key.length > 0){
                $.get("/json/search-products-json/6/"+key, (res) => {
                    // console.log(res);
                       this.products = res.data;
                   });
                }else{
                    this.latest_product();
                }
                
            },500),
            add_product_to_pos_list: function (product) {
                let product_check = this.products_list.find(
                    (item) => item.id === product.id
                );
                if (product_check) {
                    product_check.qty++;
                } else {
                    let Pos_products = {
                        id: product.id,
                        name: product.name,
                        image: product.thumb_image,
                        price: product.price,
                        qty: 1,
                    };
                    this.products_list.unshift(Pos_products);
                }
               
            },
            delete_product_cart: function (product) {
              this.products_list = this.products_list.filter((item)=>item.id !== product.id)
             
            },
            update_pos_qty: function (product, qty) {
                let product_check = this.products_list.find(
                    (item) => item.id === product.id
                );
                product_check.qty = qty;
              
               
            },
           
        },
        computed:{
          update_product_price:function(){
            this.pos_total_price = this.products_list.reduce(
              (total, product) => {
                  return total + product.price * product.qty;
              },
              0
          );
          return this.pos_total_price;
          }
        }
    });
}
