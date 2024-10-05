<template>
    <Header/>
    <Sidebar/>
    <main>
        <div class="main-content">
            <TaskOverview/>
            <!-- todo list start -->
            <div class="ms-todo-list mt-3">
                <TaskCategories :taskStatus="taskStatus"/>
                <div class="ms-todo-cards mt-2 d-flex gap-3">
                    <TaskItem :tasks="ToDoTask"/>
                    <TaskItem :tasks="InProgressTask"/>
                    <TaskItem :tasks="[]"/>
                    <TaskItem :tasks="DoneTask"/>
                </div>
            </div>
            <!-- todo list end -->
        </div>
        <!-- modal content start -->
        <NewTask :users :ToDoTask/>
        <!-- modal content end -->
    </main>
</template>

<script setup>
    import Header from '@/components/Header.vue';
    import { onMounted, ref, computed } from 'vue';
    import Sidebar from '@/components/Sidebar.vue';
    import TaskOverview from '@/components/task/Overview.vue';
    import TaskCategories from '@/components/task/Categories.vue';
    import TaskItem from '@/components/task/TaskItem.vue';
    import NewTask from '@/components/task/NewTask.vue';

    const ToDoTask = ref([]);
    const InProgressTask = ref([]);
    const DoneTask = ref([]);

    const users = ref([]);
    onMounted(() => {
        getTasks();
        getUsers();
    });

    // Computed property to return an object with task counts in the specified format
    const taskStatus = computed(() => ({
        'To Do': ToDoTask.value.length,
        'Work In Progress': InProgressTask.value.length,
        'Under Review': 0,
        'Complete': DoneTask.value.length,
    }));

    const getTasks = async () => {
        try {
            const { data } = await axios.get('api/tasks');
            ToDoTask.value = data['To Do'];
            InProgressTask.value = data['In Progress'];
            DoneTask.value = data['Done'];
        } catch (error) {
            console.log(error);
        }
    }

    const getUsers = async () => {
        try {
            const { data } = await axios.get('api/get-users');
            users.value = data.data;
        } catch (error) {
            console.log(error);
        }
    }
</script>