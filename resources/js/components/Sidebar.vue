<template>
    <div class="main col-md-3">
        <div class="sidenav">
            <div class="">
                <button class="btn create-db">+ New</button>
            </div>
            <div class="database">
                <button class="btn db db-dbname float-left">
                    <span class="open-close-db">+</span>
                </button>
                <div class="table tables-1 hide">
                <span data-dbName=""
                      data-tableName="">DBName</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Sidebar"
}
</script>

<style scoped>

</style>
