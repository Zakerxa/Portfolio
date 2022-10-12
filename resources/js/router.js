import { createRouter, createWebHistory } from "vue-router";

const routes = [{
        path: "/",
        name: "Home",
        component: require('./components/Home.vue').default
    },
    {
        path: "/about",
        name: "About",
        component: require('./components/About.vue').default
    },
    {
        path: "/:pathMatch(.*)*",
        name: "PageNotFound",
        component: require('./components/PageNotFound.vue').default
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASH_URL),
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
    scrollBehavior(to, from, savedPosition) {
        // always scroll to top
        return { top: 0 }
    },
})

export default router;