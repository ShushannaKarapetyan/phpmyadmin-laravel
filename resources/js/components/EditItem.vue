<template>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Column</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(value, column) in item">
            <td>{{ column }}</td>
            <td>
                <input v-model="item[column]" type="text" class="form-control">
            </td>
        </tr>
        </tbody>
    </table>
    <button type='button' class='btn btn-secondary rounded-pill float-right update-item' @click="updateItem">Go</button>
</template>

<script>
export default {
    name: "EditItem",

    data() {
        return {
            item: {},
        }
    },

    mounted() {
        this.getItem();
    },

    methods: {
        getItem() {
            const connection = this.$route.params.connection;
            const database = this.$route.params.database;
            const table = this.$route.params.table;
            const id = this.$route.params.id;

            axios.get(`/api/connection/${connection}/${database}/${table}/${id}/edit`)
                .then(response => {
                    this.item = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        updateItem() {
            const connection = this.$route.params.connection;
            const database = this.$route.params.database;
            const table = this.$route.params.table;
            const id = this.$route.params.id;

            axios.put(`/api/connection/${connection}/${database}/${table}/${id}`, {
                data: this.item,
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

