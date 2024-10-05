import { createRouter, createWebHistory } from "vue-router"; 
// Importing necessary functions from Vue Router. `createRouter` initializes the router, and `createWebHistory` enables history mode for navigation (removes the hash from URLs).

import routes from './routes.js'; 
// Importing the routes configuration from a separate file for a cleaner, modular structure.

import useAuth from '@/composable/Auth';

const router = createRouter({
    history: createWebHistory(), 
    // Using HTML5 history mode, which enables cleaner URLs without the `#` symbol.
    routes, 
    // Using the imported routes for the application's navigation.
});

const appName = import.meta.env.VITE_APP_NAME || "Task Management System"; 
// Defining the application name, which can be pulled from environment variables. If not available, it defaults to "Task Management System".

router.beforeEach((to, from, next) => {
    // A global navigation guard that runs before every route change. If the route has a meta field for `title`, it sets the document's title dynamically.
    
    const {loggedIn} = useAuth();
    
    if(to.meta.auth && !loggedIn.value) {
        next('/login')
    }else if(to.meta.guest && loggedIn.value){
        next('/');
    }
    else {
        if(to.meta.title) document.title = `${appName} - ${to.meta.title}`; 
        next();
    }
});

export default router; 
