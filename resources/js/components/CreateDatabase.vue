<template>
    <div class='db-creation-form col-md-6'>
        <div class='form-group mt-5'>
            <label>Create Database</label>
            <input v-model="dbName" type='text' class='form-control' placeholder='Database name'>
        </div>
        <button type='button' class='btn btn-secondary rounded-pill store-db' @click="saveDb">Create</button>
    </div>
</template>

<script>
export default {
    name: "CreateDatabase",
    data() {
        return {
            dbName: '',
        }
    },

    methods: {
        saveDb() {
            axios.post('/api/db', {
                dbName: this.dbName,
            })
                .then((response) => {
                    alert(response.data);
                    console.log(response)
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
}
</script>
