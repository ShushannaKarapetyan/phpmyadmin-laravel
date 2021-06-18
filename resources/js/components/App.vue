<template>
    <Sidebar></Sidebar>
    <Navbar></Navbar>
    <div class="container col-md-9 offset-md-3 mt-5">
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
    }
}
</script>

<style>
body {
    background: #ffffff;
}
</style>
