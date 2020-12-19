import Logout from './dashboard/logout';
import admin from './dashboard/profile/admin';
import Dashboard from './dashboard/dashboard';


export default {
    mode: 'history',
    base: '/dash',

    routes: [
        {
            path: '/login',
            component: require('./dashboard/YLogin').default,
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token') != null) {
                    next('/doctors/all');
                } else {
                    next()
                }
            },
        },
        {
            path: '/dashboard',
            component: Dashboard,
            meta: {
                requiresAuth: true
            },
            beforeEnter: (to, from, next) => {
                if (to.matched.some(record => record.meta.requiresAuth)) {
                    if (localStorage.getItem('token') == null) {
                        next('/login');
                    } else {
                        next()
                    }

                } else {
                    console.log("aa");
                    next() // make sure to always call next()!
                }
            },
            children: [
                {
                    path: '/doctors/all',
                    components: {
                        default: require('./dashboard/doctors/all').default,
                        helper: require('./dashboard/doctors/all').default
                    },
                    meta: {
                        requiresAuth: true
                    },
                },
                {
                    path: '/doctors/add',
                    components: {
                        default: require('./dashboard/doctors/add').default,
                        helper: require('./dashboard/doctors/add').default
                    },
                },
                {
                    path: '/doctors/show/:id',
                    components: {
                        default: require('./dashboard/doctors/show').default,
                        helper: require('./dashboard/doctors/show').default
                    },
                },
                {
                    path: '/doctors/edit/:id',
                    components: {
                        default: require('./dashboard/doctors/edit').default,
                        helper: require('./dashboard/doctors/edit').default
                    },
                },
                {
                    path: '/profile/admin',
                    components: {
                        default: admin,
                        helper: admin
                    },
                },
            ],

        },
        {
            path: '/logout',
            component: Logout,
        },
    ],

};
