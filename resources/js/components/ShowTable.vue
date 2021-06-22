<template>
    <table class="table table-bordered">
        <template v-if="tableData.columns">
            <thead>
            <th v-for="column in tableData.columns">{{ column }}</th>
            </thead>
        </template>
        <template v-else>
            <thead>
            <th>Options</th>
            <th v-for="column in columns">{{ column }}</th>
            </thead>
            <tbody>
            <tr v-for="(values, index) in tableData">
                <td>
                    <router-link class="btn"
                                 :to="{ name: 'edit-item' , params: {connection:connection, database: database, table:table,id: values.id}}">
                        Edit
                    </router-link>
                    <button class="btn" @click="removeItem(values.id)">Delete</button>
                </td>
                <td v-for="value in values">{{ value }}</td>
            </tr>
            </tbody>
        </template>
    </table>
</template>

<script>
export default {
    name: "ShowTable",

    data() {
        return {
            tableData: [],
            columns: [],
            connection: '',
            database: '',
            table: '',
        }
    },

    mounted() {
        this.getTableData();

        this.connection = this.$route.params.connection;
        this.database = this.$route.params.database;
        this.table = this.$route.params.table;
    },

    watch: {
        '$route'(to, from) {
            this.getTableData();
        },
    },

    methods: {
        getTableData() {
            const connection = this.$route.params.connection;
            const database = this.$route.params.database;
            const table = this.$route.params.table;

            axios.get(`/api/connection/${connection}/${database}/${table}`)
                .then(response => {
                    this.tableData = response.data;

                    if (!this.tableData.columns) {
                        for (let i = 0; i < this.tableData.length; i++) {
                            this.columns = Object.keys(this.tableData[i]);
                        }
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },

        removeItem(id) {
            const connection = this.$route.params.connection;
            const database = this.$route.params.database;
            const table = this.$route.params.table;

            if (confirm("Do you really want to delete ?")) {
                axios.delete(`/api/connection/${connection}/${database}/${table}/${id}`)
                    .then(response => {
                        this.tableData = response.data;

                        if (!this.tableData.columns) {
                            for (let i = 0; i < this.tableData.length; i++) {
                                this.columns = Object.keys(this.tableData[i]);
                            }
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        },
    },
}
</script>
