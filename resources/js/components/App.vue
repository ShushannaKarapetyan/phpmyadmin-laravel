<template>
    <Sidebar></Sidebar>

<!--    <p>-->
<!--        <router-link :to="{ name: 'databases' }">Home</router-link>-->
<!--        |-->
<!--    </p>-->

    <div class="container">
        <router-view></router-view>
    </div>
</template>

<script>
import Sidebar from "./Sidebar";

export default {
    name: "App",
    components: {
        Sidebar,
    }
}
</script>
