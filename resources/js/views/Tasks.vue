<template>
    <div>
        <ul>
            <li v-for="task in tasks">
                {{ task.name }}
                <button type="button" @click="toggleCompletion(task)"> {{ task.isComplete ? 'Uncomplete' : 'Complete' }} </button>
            </li>
        </ul>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                tasks: [],
            };
        },
        methods: {
            getTasks() {
                axios.get('api/task').then(response => {
                    this.tasks = response.data.data.map(task => {
                        task.isComplete = task.is_complete == 1;
                        return task;
                    });
                });
            },
            toggleCompletion(task) {
                axios.post(`api/task/${task.id}/${task.isComplete ? 'uncomplete' : 'complete'}`)
                    .then(response => {
                        task.isComplete = response.data.data.is_complete == 1;
                    });

            },
        },
        created() {
            this.getTasks();
        }
    }
</script>