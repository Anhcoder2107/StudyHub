const admin = [
    {
        path: '/admin',
        component: () => import('../layouts/admin.vue'),
        children: [
            {
                path: 'home',
                name: 'admin-home',
                component: () => import('../pages/admin/user/index.vue'),
                meta: {
                    auth: true
                }
            }
        ]
    }
];

export default admin