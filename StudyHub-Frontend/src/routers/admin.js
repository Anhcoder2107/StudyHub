const admin = [
    {
        path: '/admin',
        component: () => import('../layouts/admin.vue'),
        children: [
            {
                path: '',
                name: 'admin-home',
                component: () => import('../pages/admin/user/index.vue')
            }
        ]
    }
];

export default admin