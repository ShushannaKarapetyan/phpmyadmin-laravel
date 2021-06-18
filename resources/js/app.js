require('./bootstrap');

import * as Vue from 'vue';
import * as VueRouter from 'vue-router';
import App from "./components/App";
import Databases from "./components/Databases";
import CreateDatabase from "./components/CreateDatabase";

const routes = [
    {
        path: '/',
        name: 'databases',
        component: Databases
    },
    {
        path: '/db',
        name: 'create-db',
        component: CreateDatabase
    },
];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
});

Vue.createApp(App)
    .use(router)
    .mount('#app');
