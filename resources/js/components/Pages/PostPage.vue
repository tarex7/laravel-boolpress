.
<template>
    <div class="card w-75 mx-auto my-5">
        <div class="card-body">
            <h3 class="card-title">{{ post.title }}</h3>
            <h6 class="card-subtitle mb-2 text-muted">
                <strong>Autore:</strong> {{ post.user.name }}
            </h6>
            <p class="card-title">Pubblicato il: {{ published }}</p>
            <figure>
                <img :src="post.image" :alt="post.title" class="img-fluid" />
            </figure>
            <p class="card-text">
                {{ post.text }}
            </p>

            <div class="mt-4 d-flex justify-content-between">
                <span
                    class="badge px-2 align-items-center d-flex"
                    :class="`badge-${post.category.color}`"
                    >{{ post.category.label }}</span
                >
                <router-link :to="{ name: 'home' }" class="btn btn-primary"
                    >Indietro</router-link
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostPage",
    data() {
        return {
            post: [],
        };
    },

    methods: {
        fetchPosts() {
            axios.get("/api/posts/" + this.$route.params.id).then((res) => {
                this.post = res.data;
            });
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
    },

    created() {
        this.fetchPosts();
    },
};
</script>

<style></style>
