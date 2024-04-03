import './bootstrap';

import vue from 'vue'
window.Vue = vue;

import App from './components/App.vue';
import * as VueRouter from 'vue-router'
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
 
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
 
const router = new VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes: routes
});
 
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});