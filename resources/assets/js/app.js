
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery');
require('jquery.finger');
require('./modernizr');
require('./flickerplate.min');
require('./scripts');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('product-list', require('./components/ProductList.vue'));
Vue.component('case-cate', require('./components/CaseCate.vue'));
Vue.component('case-list', require('./components/CaseList.vue'));
Vue.component('news-list', require('./components/NewsList.vue'));

const app = new Vue({
    el: '#app'
});
