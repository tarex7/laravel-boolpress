.
<template>
    <div class="content">
        <AppHeader/>
        <div class="title m-b-md">
           <router-view></router-view>
        </div>
    </div>
</template>

<script>

import AppHeader from "./AppHeader.vue";

export default {
    name: "App",
    components: { AppHeader },
    

   
};
</script>

<style></style>
