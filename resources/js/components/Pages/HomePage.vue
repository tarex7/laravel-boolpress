.
<template>
   <div id="home-page">
    <BaseCard v-for="post in posts" :key="post.id" :post="post" />
   </div>
</template>

<script>
import BaseCard from '../Posts/BaseCard.vue';
export default {
    name: "HoemPage",
    components: { BaseCard },
    data() {
        return {
            posts: [],
        };
    },
   
    methods: {
        fetchPosts() {
            axios.get("/api/posts").then((res) => {
                this.posts = res.data;
            });
        },
    },

    mounted() {
        this.fetchPosts();
    },
};
</script>

