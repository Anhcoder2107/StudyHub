const web = [
    {
        path: '/',
        component: () => import('../layouts/web.vue'),
        children: [
            {
                path: '',
                component: () => import('../pages/home/index.vue')
            },
            {
                path: '/login',
                component: () => import('../pages/auth/login.vue'),
            },
            {
                path: '/register',
                component: () => import('../pages/auth/register.vue'),
            }
        ]
    },
    {
        path: '/teacher',
        component: () => import('../layouts/web.vue'),
        children: [
            {
                path: '',
                component: () => import('../pages/home/index.vue')
            },
            {
                path: 'course',
                component: () => import('../pages/course/index.vue')
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
                component: () => import('../pages/home/index.vue')
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