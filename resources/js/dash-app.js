/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./errors');
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './dash-routes';
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + JSON.parse(localStorage.getItem('token'));
window.axios.defaults.baseURL = '/api';

// window.Vue = require('vue');
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('side-header', require('./layouts/Header.vue').default);
Vue.component('notification', require('./layouts/Notification.vue').default);
Vue.component('search', require('./layouts/Search.vue').default);
Vue.component('header-section', require('./layouts/Header-section.vue').default);
Vue.component('footer-bottom', require('./layouts/Footer.vue').default);
Vue.component('dashboard', require('./dashboard/dashboard.vue').default);
Vue.component('dial', require('./layouts/dialog.vue').default);

Vue.use(VueRouter);

let app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
    mounted() {
    },
    data() {
        return {
            header: "show",
            search: null
        };
    },
});
