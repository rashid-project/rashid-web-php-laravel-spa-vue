<template>
    <div>
        <ul>
            <li v-for="task in tasks">
                {{ task.name }}
                <button type="button" @click="complete(task)"> Complete{{ task.isCompleted ? 'd' : '' }} </button>
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
                        task.isCompleted = false
                        return task;
                    });
                });
            },
            complete(task) {
                task.isCompleted = true;
            },
        },
        created() {
            this.getTasks();
        }
    }
</script>