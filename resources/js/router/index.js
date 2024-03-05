import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('../views/Home.vue')
        },
        {
            path: '/create',
            name: 'create',
            component: () => import('../views/Create.vue')
        },
        {
            path: '/edit/:id',
            name: 'edit',
            component: () => import('../views/Edit.vue'),
            props: true
        },

    ]
})

export default router
