import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/Home.vue';
import About from '../components/About.vue';
import LoginLayout from '../layouts/LoginLayout.vue';
import AdminLayout from '../layouts/AdminLayout.vue';
//import Dashboard from '../components/Dashboard.vue';


const routes = [
    { path: '/', name: 'login', component: LoginLayout },
//      {
//     path: '/admin',
//     component: AdminLayout,
//     children: [
//       { path: 'dashboard', name: 'admin.dashboard', component: Dashboard }
//     ]
//   },
    // { path: '/', name: 'login', component: LoginLayout },
     { path: '/dashboard', name: 'dashboard', component: AdminLayout },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
