<template>
    <div>
        <AuthLayout>
            <h4 class="text-center px-1">Register</h4>
            <p v-if="status" class="text-success">
                {{ status }}
            </p>
            <form @submit.prevent="submit">
                <div class="form-group">
                    <label for="#">Name</label>
                    <input type="name" v-model="form.name" class="form-control" :class="{'is-invalid' : false}" placeholder="Your Name">
                    <div v-if="false" class="invalid-feedback">{{ form.errors.email }}</div>
                </div>
                <div class="form-group">
                    <label for="#">Email Address</label>
                    <input type="email" v-model="form.email" class="form-control" :class="{'is-invalid' : false}" placeholder="Your Email">
                    <div v-if="false" class="invalid-feedback">{{ form.errors.email }}</div>
                </div>
                <div class="form-group">
                    <label for="#">Password</label>
                    <input type="text" v-model="form.password" class="form-control" placeholder="Type password">
                </div>
                <div class="form-group">
                    <label for="#">Confirm Password</label>
                    <input type="text" v-model="form.password_confirmation" class="form-control" placeholder="Confirmed password">
                </div>
            
                <button type="submit" class="btn btn-danger w-100 mt-2">Create New Account</button>
            </form>
        </AuthLayout>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import AuthLayout from '@/view/Layouts/AuthLayout.vue';
    const axios = window.axios;
    const status = ref('');
    const form = reactive({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    const submit = async () => {
        const response = await axios.post('/api/register', form);
        console.log(response);
    }
</script>