

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
            path: '/doctors',
            component: require('./components/doctors').default,
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
            path: '/aboutus',
            component: require('./components/aboutus').default,
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
            path: '/blog',
            component: require('./components/blog').default,
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
            path: '/contactus',
            component: require('./components/contactus').default,
        },
        {
            path: '/',
            component: require('./components/landingpage').default,
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
            path: '/news',
            component: require('./components/news').default,
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
    ],

};
