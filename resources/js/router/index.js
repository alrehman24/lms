import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/Home.vue';
import About from '../components/About.vue';
import LoginLayout from '../layouts/LoginLayout.vue';

const routes = [
    { path: '/', name: 'login', component: LoginLayout },
    { path: '/about', name: 'about', component: About },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
