<template>
    <div>
        <AuthLayout>
            <h4 class="text-center px-1">Login</h4>
            
            <p v-if="status" class="text-success">
                {{ status }}
            </p>
            <form @submit.prevent="submitLogin">
                <div class="form-group">
                    <label for="#">Email Address</label>
                    <input type="email" v-model="loginForm.email" class="form-control" :class="{'is-invalid' : false}" placeholder="example@nexa.com">
                    <div v-if="false" class="invalid-feedback">{{ form.errors.email }}</div>
                </div>
                <div class="form-group">
                    <label for="#">Password</label>
                    <div class="position-relative">
                        <input :type="passwordFieldType" v-model="loginForm.password" class="form-control" placeholder="Type password">
                        <i class="eye-password" :class="[passwordFieldType == 'text' ? 'ri-eye-off-line' : 'ri-eye-line']" @click="switchVisibility"></i>
                    </div>
                </div>
                <div class="form-check">
                    <input v-model="loginForm.remember" class="form-check-input" type="checkbox" id="remember">
                    <label class="form-check-label" for="remember" style="cursor: pointer;">
                    Remember me
                    </label>
                </div>
            
                <button type="submit" class="btn btn-danger w-100">Login</button>
            </form>
            <p class="have-text">New user? <a>Create an account</a></p>
        </AuthLayout>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import AuthLayout from '@/view/Layouts/AuthLayout.vue';
import useAuth from '@/composable/Auth';
    const {loginForm, submitLogin} = useAuth();
    const status = ref('');
    const form = reactive({
        email: '',
        password: '',
        remember: false,
    });
    const passwordFieldType = ref('password');
</script>