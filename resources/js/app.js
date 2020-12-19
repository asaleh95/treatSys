require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';

Vue.use(VueRouter)

Vue.component('login', require('./components/login.vue').default);
Vue.component('treat-footer', require('./main-components/footer.vue').default);
Vue.component('treat-nav', require('./main-components/navbar.vue').default);
Vue.component('treat-header', require('./main-components/header.vue').default);


let app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
