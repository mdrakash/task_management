<template>
    <RouterView/>
</template>

<script setup>
import { onBeforeMount } from 'vue';
import useAuth from '@/composable/Auth.js';

const {authCheck} = useAuth();

onBeforeMount(() => {
    authCheck();
})
</script>