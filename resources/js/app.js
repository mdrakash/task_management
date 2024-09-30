import './bootstrap'; 
// Importing the bootstrap.js file, which typically initializes libraries like Axios, Laravel Echo, etc.

import {createApp} from 'vue'; 

import App from './App.vue'; 
// Importing the root component (App.vue), which serves as the main component for the application.

import router from './router/index'; 
// Importing the router configuration, which handles routing (navigating between pages) within the app.

const app = createApp(App); 
// Creating a new Vue app instance with the root component (App.vue).

app.use(router); 
// Telling the Vue instance to use the router, enabling Vue Router for page navigation.

app.mount('#app'); 
// Mounting the Vue app to the DOM element with the ID 'app'. This is where the Vue app gets attached to the HTML page.
