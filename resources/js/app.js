require('./bootstrap');
require('./errors');


import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + JSON.parse(localStorage.getItem('token'));
window.axios.defaults.baseURL = '/api';

Vue.use(VueRouter)

Vue.component('login', require('./components/login.vue').default);
Vue.component('treat-footer', require('./main-components/footer.vue').default);
Vue.component('treat-nav', require('./main-components/navbar.vue').default);
Vue.component('treat-header', require('./main-components/header.vue').default);


let app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
