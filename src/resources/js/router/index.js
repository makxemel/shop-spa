import {createRouter, createWebHistory} from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'some',
            component: () => import('../components/Some.vue')
        },
        {
            path: '/else',
            name: 'else',
            component: () => import('../components/Else.vue')
        },
    ]
})

export default router
