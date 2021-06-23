require('./bootstrap');

import * as Vue from 'vue';
import * as VueRouter from 'vue-router';
import App from "./components/App";
import Databases from "./components/Databases";
import CreateDatabase from "./components/CreateDatabase";
import ShowTable from "./components/ShowTable";
import EditItem from "./components/EditItem";
import CreateItem from "./components/CreateItem";

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
    {
        path: '/connection/:connection/:database/:table',
        name: 'show-table',
        component: ShowTable
    },
    {
        path: '/connection/:connection/:database/:table/:id/edit',
        name: 'edit-item',
        component: EditItem,
    },
    {
        path: '/connection/:connection/:database/:table/create',
        name: 'create-item',
        component: CreateItem,
    },
];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
});

Vue.createApp(App)
    .use(router)
    .mount('#app');
