<template>
    <div class="modal fade" id="new-task" tabindex="-1" aria-labelledby="taskLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="taskLabel">Create New Task</h1>
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1_818)">
                                <path d="M0 0H24V24H0V0Z" fill="#F4F5F7" />
                                <path
                                    d="M12 10.586L16.95 5.63599L18.364 7.04999L13.414 12L18.364 16.95L16.95 18.364L12 13.414L7.04999 18.364L5.63599 16.95L10.586 12L5.63599 7.04999L7.04999 5.63599L12 10.586Z"
                                    fill="#03053D" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1_818">
                                    <rect width="24" height="24" rx="3" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                    </button>
                </div>
                <form @submit.prevent="createNewTask">
                    <div class="modal-body">
                        <div class="new-task">
                            <div class="form-group">
                                <label for="#">
                                    Assign To
                                </label>
                                <VueMultiselect v-model="assignedUsers" :options="users" :multiple="true"
                                    :close-on-select="true" placeholder="Select users" label="name" track-by="name" />
                            </div>
                            <div class="form-group">
                                <label for="#">
                                    Task Name
                                </label>
                                <input type="text" v-model="newTaskForm.title" placeholder="Enter your task name">
                            </div>
                            <div class="form-group">
                                <label for="#">Due Date</label>
                                <input type="date" v-model="newTaskForm.due_date">
                            </div>
                            <div class="form-group">
                                <label for="#">Describe your answer</label>
                                <textarea v-model="newTaskForm.description"
                                    placeholder="Describe your answer here....."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref, reactive } from 'vue';
    import VueMultiselect from 'vue-multiselect';
    import 'vue-multiselect/dist/vue-multiselect.css';

    const props = defineProps({
        users: Array,
        ToDoTask: Array
    });

    const assignedUsers = ref([]);

    const newTaskForm = reactive({
        title: '',
        status: 'To Do',
        due_date: '',
        description: '',
        assigned_users_ids: []
    })

    const createNewTask = async () => {
        try {
            newTaskForm.assigned_users_ids = assignedUsers.value.map(user => user.id);
            const { data } = await axios.post('/api/tasks', newTaskForm);
            props.ToDoTask.push(data.data);
        } catch (error) {
            console.log(error);
        }
    }
</script>