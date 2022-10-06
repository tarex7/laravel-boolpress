import Vue from "vue";
import VueRouter from "vue-router";

import HomePage from "./components/Pages/HomePage.vue";
import AboutPage from "./components/Pages/AboutPage.vue";
import ContactsPage from "./components/Pages/ContactsPage.vue";
import NotFoundPage from "./components/Pages/NotFoundPage.vue";
import PostPage from "./components/Pages/PostPage.vue";

Vue.use(VueRouter);

const routes = new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: HomePage, name:'home' },
        { path: "/about", component: AboutPage, name:'about' },
        { path: "/contacts", component: ContactsPage, name:'contacts' },
        { path: "/posts/:id", component: PostPage, name:'post-show' },
        { path: "*", component: NotFoundPage, name:'404' },
    ],
});

export default routes;
