<template>
    <Sidebar></Sidebar>
    <Navbar></Navbar>
    <div class="container col-md-10 offset-md-2 mt-3">
        <router-view></router-view>
    </div>
</template>

<script>
import Sidebar from "./Sidebar";
import Navbar from "./Navbar";

export default {
    name: "App",
    components: {
        Sidebar,
        Navbar,
    },
}
</script>

<style>
body {
    background: #ffffff;
}
</style>
