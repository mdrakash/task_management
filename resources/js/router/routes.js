import Index from '@/view/Index.vue';
import Login from '@/view/Auth/Login.vue';
import Register from '@/view/Auth/Register.vue';
import NotFoundPage from '@/view/NotFoundPage.vue';

const routes = [
    { 
        path: '/', 
        component: Index,
        meta: {
            guest: false,
            title: 'Tasks'
        },
    },
    { 
        path: '/login', 
        component: Login,
        meta: {
            guest: true,
            title: 'Login'
        },
    },
    { 
        path: '/register', 
        component: Register,
        meta: {
            guest: true,
            title: 'Login'
        },
    },
    {
        path: "/:pathMatch(.*)*",
        component: NotFoundPage,
    },
];

export default routes;