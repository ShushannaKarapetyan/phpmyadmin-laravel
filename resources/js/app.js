import Databases from "./components/Databases";

require('./bootstrap');

import * as Vue from 'vue';
import * as VueRouter from 'vue-router';
import App from "./components/App";
import VueSidebarMenu from 'vue-sidebar-menu'

import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'databases',
        component: Databases
    },
];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
});

Vue.createApp(App).use(router).mount('#app');
Vue.createApp(App).use(VueSidebarMenu)
