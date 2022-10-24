import { createRouter, createWebHistory } from "vue-router";

const routes = [{
        path: "/",
        name: "Home",
        component: require('./Home.vue').default
    },
    {
        path: "/about",
        name: "About",
        component: require('./routeComponents/about.vue').default
    },
    {
        path: "/service",
        name: "Service",
        component: require('./components/Service.vue').default
    },
    {
        path: "/contact",
        name: "Contact",
        component: require('./components/ContactMe.vue').default
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