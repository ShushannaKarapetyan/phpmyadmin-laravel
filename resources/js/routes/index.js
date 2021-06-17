import VueRouter from 'vue-router';
import Databases from '../components/Databases';

const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'databases',
            component: Databases
        },
    ],
});

export default routes;
