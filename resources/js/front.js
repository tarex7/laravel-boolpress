require("./bootstrap");

window.Vue = require("vue");

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import router from "./router.js";
import App from "./components/App.vue";
const root = new Vue({
    router,
    el: "#root",
    render: (h) => h(App),
});
