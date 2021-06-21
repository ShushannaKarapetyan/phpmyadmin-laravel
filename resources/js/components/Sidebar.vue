<template>
    <div class="sidenav w-100 col-md-3 float-left">
        <img src="storage/images/phpmyadmin.png" alt="">
        <div class="">
            <router-link class="btn create-db" :to="{ name: 'create-db' }">+ New</router-link>
        </div>
        <div class="database" v-for="(database, index) in databases" :key="index">
            <button class="btn btn-sm db" @click="toggleDB(index)">
                <span class="open-db" :ref="'element' + index">+</span>
                {{ database['name'] }}
            </button>
            <div :class="`tables-` + index" class="table hide">
                <!--<span v-for="table in database.tables" @click="getTable(database['name'], table)"> {{ table }}</span>  -->
                <template v-for="table in database.tables">
                    <router-link
                        :to="{ name: 'show-table', params: {connection: database['connection'], database: database['name'], table: table}}">
                        {{ table }}
                    </router-link>
                </template>
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
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        toggleDB(index) {
            //let content = this.$refs['element' + index].innerText;

            if (this.$refs['element' + index].innerText === '+') {
                this.$refs['element' + index].innerText = '-';

                const el = document.querySelector(".tables-" + index);
                el.style = "display:block";
            } else {
                this.$refs['element' + index].innerText = '+';

                const el = document.querySelector(".tables-" + index);
                el.style = "display:none";
            }
        },
    },
}
</script>

<style>
.sidenav {
    background: #f3f3f3;
}

.btn:focus, .btn.focus {
    box-shadow: none;
}

.hide {
    display: none;
}

.table a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 13px;
    color: #818181;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
}
</style>
