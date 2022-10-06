.
<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <router-link class="navbar-brand" :to="{name: 'home'}">Boolpress</router-link>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              
                <router-link class="nav-link" :to="{name : 'about'}">About</router-link>
                <router-link class="nav-link" :to="{name: 'contacts'}">Contacts</router-link>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'AppHeader'
};
</script>

<style></style>
