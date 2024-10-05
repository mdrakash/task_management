import { ref, reactive } from 'vue'
import router from '../router';

const loggedIn = ref(false);
let user = reactive({})
export default function useAuth() {
    const processing = ref(false)
    const validationErrors = ref({})

    const loginForm = reactive({
        email: 'test@example.com',
        password: 'password',
        remember: false
    })

    const registerForm = reactive({
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
    })

    const submitLogin = async () => {
        if (processing.value) return;
    
        processing.value = true;
        validationErrors.value = {};
    
        try {
            const { data } = await axios.post('/api/login', loginForm);
            const { user, access_token } = data.data; // Destructure directly
            setUser(user);
            setAccessToken(access_token);
            router.push('/'); // Redirect to home
        } catch (error) {
            // handleError(error); // Handle validation errors
        } finally {
            processing.value = false; // Reset processing state
        }
    };

    const submitRegister = async () => {
        if (processing.value) return;
    
        processing.value = true;
        validationErrors.value = {};
    
        try {
            const { data } = await axios.post('/api/register', registerForm);
            const { user, access_token } = data.data; // Destructure directly
            setUser(user);
            setAccessToken(access_token);
            router.push('/'); // Redirect to home
        } catch (error) {
            // handleError(error); // Handle validation errors
        } finally {
            processing.value = false; // Reset processing state
        }
    };
    
    // Function to handle errors
    const handleError = (error) => {
        if (error.response?.data) {
            validationErrors.value = error.response.data.errors;
        } else {
            push.error('An unexpected error occurred'); // Optional: handle other errors
        }
    };

    const logout = async () => {
        if (processing.value) return

        processing.value = true
        try {
            await axios.post('/api/logout');
                loggedIn.value = false;
                user = null;
                localStorage.removeItem('access_token');
                router.push('/login')
        } catch (error) {
            
        }
    }

    const setUser = (userData) => {
        user = userData;
        loggedIn.value = true;
    }

    const authCheck = async () => {
        try {
            const response = await axios.get('/api/me');
            setUser(response.data.data);
        } catch (error) {
            router.push('/login')
        }
    }

    const setAccessToken = (token) => {
        localStorage.setItem('access_token', token);
    }

    return {
        loginForm,
        registerForm,
        validationErrors,
        processing,
        submitLogin,
        submitRegister,
        user,
        logout,
        loggedIn,
        authCheck
    }
}