import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App'
import Home from './views/Home'
import Tasks from './views/Tasks'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/tasks',
            name: 'tasks',
            component: Tasks,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});