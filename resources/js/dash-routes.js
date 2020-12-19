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
                    path: '/hospitals/all',
                    components: {
                        default: require('./dashboard/hospitals/all').default,
                        helper: require('./dashboard/hospitals/all').default
                    },
                    meta: {
                        requiresAuth: true
                    },
                },
                {
                    path: '/hospitals/add',
                    components: {
                        default: require('./dashboard/hospitals/add').default,
                        helper: require('./dashboard/hospitals/add').default
                    },
                },
                {
                    path: '/hospitals/show/:id',
                    components: {
                        default: require('./dashboard/hospitals/show').default,
                        helper: require('./dashboard/hospitals/show').default
                    },
                },
                {
                    path: '/hospitals/edit/:id',
                    components: {
                        default: require('./dashboard/hospitals/edit').default,
                        helper: require('./dashboard/hospitals/edit').default
                    },
                },
                {
                    path: '/users/all',
                    components: {
                        default: require('./dashboard/users/all').default,
                        helper: require('./dashboard/users/all').default
                    },
                    meta: {
                        requiresAuth: true
                    },
                },
                {
                    path: '/users/show/:id',
                    components: {
                        default: require('./dashboard/users/show').default,
                        helper: require('./dashboard/users/show').default
                    },
                },
                {
                    path: '/users/add',
                    components: {
                        default: require('./dashboard/users/add').default,
                        helper: require('./dashboard/users/add').default
                    },
                },
                {
                    path: '/users/edit/:id',
                    components: {
                        default: require('./dashboard/users/edit').default,
                        helper: require('./dashboard/users/edit').default
                    },
                },
                {
                    path: '/pharmcy/all',
                    components: {
                        default: require('./dashboard/pharmcy/all').default,
                        helper: require('./dashboard/pharmcy/all').default
                    },
                    meta: {
                        requiresAuth: true
                    },
                },
                {
                    path: '/pharmcy/edit/:id',
                    components: {
                        default: require('./dashboard/pharmcy/edit').default,
                        helper: require('./dashboard/pharmcy/edit').default
                    },
                },
                {
                    path: '/pharmcy/add',
                    components: {
                        default: require('./dashboard/pharmcy/add').default,
                        helper: require('./dashboard/pharmcy/add').default
                    },
                },
                {
                    path: '/pharmcy/show/:id',
                    components: {
                        default: require('./dashboard/pharmcy/show').default,
                        helper: require('./dashboard/pharmcy/show').default
                    },
                },
                {
                    path: '/laps/all',
                    components: {
                        default: require('./dashboard/laps/all').default,
                        helper: require('./dashboard/laps/all').default
                    },
                    meta: {
                        requiresAuth: true
                    },
                },
                {
                    path: '/laps/add',
                    components: {
                        default: require('./dashboard/laps/add').default,
                        helper: require('./dashboard/laps/add').default
                    },
                },
                {
                    path: '/laps/edit/:id',
                    components: {
                        default: require('./dashboard/laps/edit').default,
                        helper: require('./dashboard/laps/edit').default
                    },
                },
                {
                    path: '/laps/show/:id',
                    components: {
                        default: require('./dashboard/laps/show').default,
                        helper: require('./dashboard/laps/show').default
                    },
                },
                {
                    path: '/support/all',
                    components: {
                        default: require('./dashboard/support/all').default,
                        helper: require('./dashboard/support/all').default
                    },
                    meta: {
                        requiresAuth: true
                    },
                },
                {
                    path: '/xray/all',
                    components: {
                        default: require('./dashboard/xray/all').default,
                        helper: require('./dashboard/xray/all').default
                    },
                    meta: {
                        requiresAuth: true
                    },
                },
                {
                    path: '/xray/add',
                    components: {
                        default: require('./dashboard/xray/add').default,
                        helper: require('./dashboard/xray/add').default
                    },
                },
                {
                    path: '/xray/edit/:id',
                    components: {
                        default: require('./dashboard/xray/edit').default,
                        helper: require('./dashboard/xray/edit').default
                    },
                },

                {
                    path: '/xray/show/:id',
                    components: {
                        default: require('./dashboard/xray/show').default,
                        helper: require('./dashboard/xray/show').default
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
