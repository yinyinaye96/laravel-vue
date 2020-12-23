<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Laravel Vue CRUD</span>
        </div>
 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/post/create" class="nav-item nav-link">Add Post</router-link>
                    <router-link to="/users" class="nav-item nav-link">Users</router-link>
                    <router-link to="/user/create" class="nav-item nav-link">Add User</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view></router-view>
    </div>
</template>
<script>
    export default {}
</script>