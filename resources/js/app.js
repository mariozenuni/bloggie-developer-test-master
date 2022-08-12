/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
require('./plugins/filters');

/**
 * Global Component Registration
 */
Vue.component('featured-blogs', require('./components/blog/FeaturedBlogs.vue').default);
Vue.component('latest-blogs', require('./components/blog/LatestBlogs.vue').default);
Vue.component('blog-card-row', require('./components/blog/BlogCardRow.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
