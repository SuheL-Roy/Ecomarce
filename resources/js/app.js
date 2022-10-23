/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
const { default: store } = require('./store/index.js');

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
    require("./components/product/SingleProductBody.vue").default
);
Vue.component(
    "product-details",
    require("./components/product/ProductDetails.vue").default
);

// Vue.component(
//     "blog-list",
//     require("./components/PropsByBlog/BlogList.vue").default
// );
// Vue.component(
//     "blog-details",
//     require("./components/PropsByBlog/BlogDetails.vue").default
// );
// Vue.component(
//     "comments",
//     require("./components/PropsByBlog/Comments.vue").default
// );
// Vue.component(
//     "comments-add",
//     require("./components/PropsByBlog/CommentsAdd.vue").default
// );

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
        store

    });
}
