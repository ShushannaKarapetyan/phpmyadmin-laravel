<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item font-weight-bold">
                    <a class="btn nav-link">
                        Options
                    </a>
                </li>
                <li class="nav-item font-weight-bold">
                    <router-link
                        v-if="$route.name === 'edit-item' || $route.name === 'create-item' || $route.name === 'show-table'"
                        class="btn nav-link"
                        :to="{ name: 'create-item' , params: {connection:$route.params.connection, database: $route.params.database, table:$route.params.table}}">
                        Insert
                    </router-link>
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
            // connection: '',
            // database: '',
            // table: '',
        }
    },
    created() {
        //this.$nextTick(() => console.log(this.$route));
    },
    mounted() {
        // this.connection = this.$route.params.connection;
        // this.database = this.$route.params.database;
        // this.table = this.$route.params.table;
    },

    methods: {
        checkRoute() {
            return this.$route.name === 'edit-item' || this.$route.name === 'create-item' || this.$route.name === 'show-table';
        }
    },
}
</script>
