<template>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Column</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(column, index) in columns">
            <td>{{ column }}</td>
            <td>
                <input v-model="form[column]" type="text" class="form-control">
            </td>
        </tr>
        </tbody>
    </table>
    <button type='button' class='btn btn-secondary rounded-pill float-right update-item' @click="saveItem">Go</button>
</template>

<script>
export default {
    name: "CreateItem",

    data() {
        return {
            columns: [],
            form: {},
        }
    },

    mounted() {
        this.getColumns();
    },

    methods: {
        getColumns() {
            const connection = this.$route.params.connection;
            const database = this.$route.params.database;
            const table = this.$route.params.table;

            axios.get(`/api/connection/${connection}/${database}/${table}/create`)
                .then(response => {
                    this.columns = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        saveItem() {
            const connection = this.$route.params.connection;
            const database = this.$route.params.database;
            const table = this.$route.params.table;

            axios.post(`/api/connection/${connection}/${database}/${table}`, {
                data: this.form,
            }).then(response => {
                this.$router.push({name: 'show-table'});
            })
                .catch(error => {
                    console.log(error);
                });
        },
    },
}
</script>
