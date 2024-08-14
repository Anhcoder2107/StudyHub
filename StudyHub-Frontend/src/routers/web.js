const web = [
    {
        path: '/',
        component: () => import('../layouts/web.vue'),
        children: [
            {
                path: '',
                component: () => import('../pages/home/index.vue'),
                name: 'home',
                meta:{
                    auth: true
                }
            },
            {
                path: '/login',
                component: () => import('../pages/auth/login.vue'),
                name: 'login',
                meta: {
                    auth: false
                }
            },
            {
                path: '/register',
                component: () => import('../pages/auth/register.vue'),
                name: 'register',
                meta: {
                    auth: false
                }
            }
        ]
    },
    {
        path: '/teacher',
        component: () => import('../layouts/web.vue'),
        children: [
            {
                path: '',
                component: () => import('../pages/home/index.vue'),
                name: 'home-teacher',
                meta: {
                    auth: true,
                    
                }
            },
            {
                path: 'course',
                component: () => import('../pages/course/index.vue'),
                meta: {
                    auth: true
                }
            },
            { 
                path: '/:pathMatch(.*)*', 
                name: 'NotFound',
                component: () => import('../components/TheNotFound.vue')
            },
        ]
    },
    {
        path: '/student',
        component: () => import('../layouts/web.vue'),
        children: [
            {
                path: '',
                component: () => import('../pages/home/index.vue'),
                meta: {
                    auth: true
                }
            },
            { 
                path: '/:pathMatch(.*)*', 
                name: 'NotFound',
                component: () => import('../components/TheNotFound.vue')
            },
        ]
    },
    { 
        path: '/:pathMatch(.*)*', 
        name: 'NotFound',
        component: () => import('../components/TheNotFound.vue')
    },

]

export default web