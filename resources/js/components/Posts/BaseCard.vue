.
<template>
    <div  class="card w-75 mx-auto my-5">
        <div class="card-body">
            <h3 class="card-title">{{ post.title }}</h3>
            <h6 class="card-subtitle mb-2 text-muted">
                <strong>Autore:</strong> {{ post.user.name }}
            </h6>
            <p class="card-title">Pubblicato il: {{ published }}</p>

            <p v-if="!showPost" class="card-text">
                {{ preview }}
            </p>
            <p v-else>
                {{post.text}}
            </p>
            <a href="#" @click="showMore" class="card-link">Leggi</a>
            <div class="mt-4 d-flex justify-content-between">
                <span  class="badge  px-2 align-items-center d-flex" :class="`badge-${post.category.color}`">{{post.category.label}}</span>
                <router-link :to="`/posts/${post.id}`" class="btn btn-primary">vedi</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BaseCard",
    data() {
        return {
            showPost: false,
        };
    },
    props: {
        post: Object,
    },
    methods: {
        showMore(e) {
            e.preventDefault();
            
            this.showPost= !this.showPost
        },
    },
    computed: {
        published() {
            const postDate = new Date(this.post.created_at);
            let day = postDate.getDate();
            let month = postDate.getMonth();
            let year = postDate.getFullYear();

            let hours = postDate.getHours();
            let minutes = postDate.getMinutes();

            if (day < 10) day = "0" + day;
            if (month < 10) month = "0" + month;

            return `${day}-${month}-${year}  ${hours}:${minutes}`;
        },

        preview() {
            const postPreview = this.post.text.slice(0, 500);

            return `${postPreview}...`;
        },
    },
    
};
</script>

<style></style>
