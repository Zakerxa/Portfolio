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
        path: "/login",
        name: "Login",
        component: require('./admin/Login.vue').default
    },
    {
        path: "/test",
        name: "Test",
        component: '<template><h1>Hello Test</h1></template>',
        meta: {
            protect: true
        }
    }, {
        path: "/zakerxa",
        name: "Zakerxa",
        component: require('./admin/Zakerxa.vue').default,
        meta: {
            protect: true
        }
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

router.beforeEach((to, from, next) => {
    const auth = localStorage.getItem('bearer');
    if (to.name == 'Login' && auth)
        next({ path: '/zakerxa' })
    else if ((to.name == 'Register' || to.name == 'Home' || to.name == 'About' || to.name == 'Service' || to.name == 'Contact') && auth)
        next({ path: '/zakerxa' })
    else if (to.meta.protect && !auth)
        next({ path: '/login' })
    else
        next()
})

export default router;
