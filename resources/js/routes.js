

export default {
    mode: 'history',
    base: '/',

    routes: [
        {
            path: '/login',
            component: require('./components/login').default,  
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token') != null) {
                    next('/');
                } else {
                    next()
                }
            },
        },
         {
            path: '/signup',
            component: require('./components/signup').default,
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token') != null) {
                    next('/');
                } else {
                    next()
                }
            },
        },
        {
            path: '/help',
            component: require('./components/help').default,
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token') != null) {
                    next('/');
                } else {
                    next()
                }
            },
        },
         {
            path: '/code',
            component: require('./components/code').default,
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token') != null) {
                    next('/');
                } else {
                    next()
                }
            },
        },
         {
            path: '/new-password',
            component: require('./components/new-password').default,
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token') != null) {
                    next('/');
                } else {
                    next()
                }
            },
        },
        {
            path: '/hospitals',
            component: require('./components/hospitals').default,
        },
        {
            path: '/xrays',
            component: require('./components/xrays').default,
        },
        {
            path: '/pharmacies',
            component: require('./components/pharmacies').default,
        },
        {
            path: '/Laboratories',
            component: require('./components/Laboratories').default,
        },
        {
            path: '/doctors',
            component: require('./components/doctors').default,
        },
        {
            path: '/aboutus',
            component: require('./components/aboutus').default,
        },
        {
            path: '/blog',
            component: require('./components/blog').default,
        },
        {
            path: '/doctor/:id',
            component: require('./components/doctor').default,
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

                }
            }
        },
        {
            path: '/details/:id',
            component: require('./components/deatails').default,
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

                }
            }
        },
        {
            path: '/xray/:id',
            component: require('./components/xray').default,
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

                }
            }
        },
        {
            path: '/pharmacy/:id',
            component: require('./components/pharmacy').default,
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

                }
            }
        },
        {
            path: '/lab/:id',
            component: require('./components/lab').default,
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

                }
            }
        },
        {
            path: '/contactus',
            component: require('./components/contactus').default,
        },
        {
            path: '/',
            component: require('./components/landingpage').default,
        },
        {
            path: '/news',
            component: require('./components/news').default,
        },
    ],
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
      }
};
