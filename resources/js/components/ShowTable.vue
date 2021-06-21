<template>
    <!--    <table class="table table-bordered">-->
    <!--        <thead>-->
    <!--        <th>Column</th>-->
    <!--        <th>Value</th>-->
    <!--        </thead>-->
    <!--        <tbody>-->
    <!--        <tr>-->
    <!--            <td>id</td>-->
    <!--            <td>Value</td>-->
    <!--        </tr>-->
    <!--        </tbody>-->
    <!--    </table>-->
    <!--    <h1>{{ tableData }}</h1>-->
</template>

<script>
import axios from "axios";

export default {
    name: "ShowTable",

    data() {
        return {
            tableData: []
        }
    },
    mounted() {
        this.getTableData();
    },

    watch: {
        '$route'(to, from) {
            this.getTableData();
        }
    },

    methods: {
        getTableData() {
            const database = this.$route.params.database;
            const table = this.$route.params.table;
            const connection = this.$route.params.connection;

            //axios.get(`/api/database/${database}/${table}`)

            axios.get(`/api/connection/${connection}/${database}/${table}`)
                //axios.get(`/api/connection/${connection}/${database}/${table}`)
                .then((response) => {
                    //this.tableData = response.data;
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    }
}
</script>
