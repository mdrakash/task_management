import Index from '@/view/Index.vue';
import NotFoundPage from '@/view/NotFoundPage.vue';

const routes = [
    { 
        path: '/', 
        component: Index,
    },
    {
        path: "/:pathMatch(.*)*",
        component: NotFoundPage,
    },
];

export default routes;