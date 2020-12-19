

export default {
    mode: 'history',
    base: '/',

    routes: [
        {
            path: '/login',
            component: require('./components/login').default,  
        },
         {
            path: '/signup',
            component: require('./components/signup').default,
        },
        {
            path: '/help',
            component: require('./components/help').default,
        },
         {
            path: '/code',
            component: require('./components/code').default,
        },
         {
            path: '/new-password',
            component: require('./components/new-password').default,
        },
        // {
        //     path: '/hospitals',
        //     component: require('./components/hospitals').default,
        // },
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
            path: '/doctor',
            component: require('./components/doctor').default,
        },
        {
            path: '/details',
            component: require('./components/deatails').default,
        },
        {
            path: '/contactus',
            component: require('./components/contactus').default,
        },
        // {
        //     path: '/landingpage',
        //     component: require('./components/landingpage').default,
        // },
        {
            path: '/news',
            component: require('./components/news').default,
        },
    ],

};
