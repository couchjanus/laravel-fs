
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// var VueResource = require('vue-resource');

// Vue.use(VueResource);

Vue.http.options.emulateJSON = true;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

window.Vue.component('comments',require('./components/comments.vue'));

const app = new Vue({
    el: '#app'

});