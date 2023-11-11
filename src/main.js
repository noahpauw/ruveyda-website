import { createApp, h } from 'vue'
import App from './App.vue'
import router from './router'
import VueCookies from 'vue-cookies'

const app = createApp({
    render: () => h(App),
    data() {
        return {
            pages: [
                {
                    title: "Home",
                    route: "/"
                }, {
                    title: "Over mij",
                    route: "/aboutme"
                }
            ]
        };
    }
})

app.use(router);
app.use(VueCookies);
app.mount("#app");
