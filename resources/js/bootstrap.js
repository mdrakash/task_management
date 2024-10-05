import axios from 'axios';
window.axios = axios;

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.post['Content-Type'] = 'application/json';

// Add an interceptor to handle token updates dynamically
window.axios.interceptors.request.use(config => {
    const token = localStorage.getItem('access_token'); // Retrieve token again for each request
    if (token) {
        config.headers['Authorization'] = `Bearer ${token}`; // Update Authorization header
    }
    return config;
}, error => {
    return Promise.reject(error);
});