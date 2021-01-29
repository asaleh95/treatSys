require('./bootstrap');
require('./errors');
require('./lang');


import Vue from 'vue';
import VueRouter from 'vue-router';
import VueI18n from 'vue-i18n'
import routes from './routes';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + JSON.parse(localStorage.getItem('token'));
window.axios.defaults.headers.common['Accept-Language'] =  sessionStorage.getItem('lang') == 'ar' ? 'ar' : 'en';

window.axios.defaults.baseURL = '/api';

Vue.use(VueRouter)
Vue.use(VueI18n)
window.lang = sessionStorage.getItem('lang');
const i18n = new VueI18n({
    locale: window.lang,
    messages
});

Vue.component('login', require('./components/login.vue').default);
Vue.component('treat-footer', require('./main-components/footer.vue').default);
Vue.component('treat-nav', require('./main-components/navbar.vue').default);
Vue.component('treat-header', require('./main-components/header.vue').default);


let app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
    i18n,
    data(){
        return {
            active: ''
        }
    }
});
