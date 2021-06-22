<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item font-weight-bold">
<!--                    <router-link class="btn nav-link"-->
<!--                                 :to="{ name: 'create-item' , params: {connection:connection, database: database, table:table}}">-->
<!--                        Insert-->
<!--                    </router-link>-->
                </li>
            </ul>
        </div>
    </nav>

</template>

<script>
export default {
    name: "Navbar",

    data() {
        return {
            connection: '',
            database: '',
            table: '',
        }
    },

    mounted() {
        console.log(this.$route.name)
        this.connection = this.$route.params.connection;
        this.database = this.$route.params.database;
        this.table = this.$route.params.table;
    }
}
</script>
