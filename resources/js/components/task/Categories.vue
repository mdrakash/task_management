<template>
    <div class="ms-todo-items row">
        <div v-for="(item, key, index) in taskStatus" :key="index" class="ms-todo-item col-3 d-flex align-items-center justify-content-between rounded"
            data-bs-toggle="modal" data-bs-target="#new-task">
            <p class="m-0 text-uppercase text-dark d-inline-flex gap-2 fw-semibold">{{key}} <span>{{item}}</span></p>
            <p class="add">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="18" height="18" rx="9" fill="white" fill-opacity="0.37" />
                    <path d="M8.25 8.25V3.75H9.75V8.25H14.25V9.75H9.75V14.25H8.25V9.75H3.75V8.25H8.25Z"
                        fill="#252F3F" />
                </svg>
            </p>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    taskStatus: Object
});

</script>