<template>
    <Header/>
    <Sidebar/>
    <main>
        <div class="main-content">
            <TaskOverview/>
            <!-- todo list start -->
            <div class="ms-todo-list mt-3">
                <TaskCategories/>
                <div class="ms-todo-cards mt-2 d-flex gap-3">
                    <ToDoList/>
                    <InProgressList/>
                    <ReviewList/>
                    <DoneList/>
                </div>
            </div>
            <!-- todo list end -->
        </div>
        <!-- modal content start -->
        <NewTask/>
        <TaskDetails/>
        <!-- modal content end -->
    </main>
</template>

<script setup>
    import Header from '@/components/Header.vue';
    import Sidebar from '@/components/Sidebar.vue';
    import TaskOverview from '@/components/task/Overview.vue';
    import TaskCategories from '@/components/task/Categories.vue';
    import ToDoList from '@/components/task/items/ToDo.vue';
    import InProgressList from '@/components/task/items/InProgress.vue';
    import ReviewList from '@/components/task/items/Review.vue';
    import DoneList from '@/components/task/items/Done.vue';
    import TaskDetails from '@/components/task/Details.vue';
    import NewTask from '@/components/task/NewTask.vue';
</script>