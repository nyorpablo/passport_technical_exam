<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link to="/" class="navbar-brand" href="#">Passport Technical Exam</router-link>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <router-link to="/" exact-active-class="active" class="nav-item nav-item-link">Home</router-link>
                    <router-link to="/contact" exact-active-class="active" class="nav-item nav-item-link">Contact</router-link>
                </div>
            </div>
        </nav>
    </main>
</template>

<script>
    export default {}
</script>