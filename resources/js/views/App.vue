<template>
    <div>
        <h1> Rashid </h1>

        <p>
            <router-link :to="{ name: 'home' }"> Home </router-link> |
            <router-link :to="{ name: 'tasks' }"> Tasks </router-link>
        </p>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {}
</script>