<template>
    <div class="sidenav w-100 col-md-3 float-left">
        <img src="storage/images/phpmyadmin.png" alt="">
        <div class="">
            <router-link class="btn create-db" :to="{ name: 'create-db' }">+ New</router-link>
        </div>
        <div class="database" v-for="(database, index) in databases" :key="index">
            <button class="btn btn-sm db float-left" @click="toggleDB(index)">
                <span v-if="!openDB" class="open-db">+</span>
                <span v-if="openDB" class="close-db">-</span>

                <span v-html="content"></span>
            </button>
            <div class="table tables-1 hide">
                <span data-dbName="" data-tableName="">{{ database['name'] }}</span>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Sidebar",
    data() {
        return {
            databases: [],
            openDB: false,
            content: '',
        }
    },

    mounted() {
        this.getDatabases();
    },

    methods: {
        getDatabases() {
            axios.get('/api')
                .then((response) => {
                    this.databases = response.data;
                    console.log(response)
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        toggleDB(index) {
            this.openDB = !this.openDB;
            console.log(index)
        }
    }
}
</script>

<style>
.sidenav {
    background: #f3f3f3;
}

.btn:focus, .btn.focus {
    box-shadow: none;
}
</style>
