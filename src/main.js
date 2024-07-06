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

app.config.globalProperties.$isAuthenticated = false;

app.config.globalProperties.$shouldFetch = false;
const protectedRoutes = ["/cms/home", "/cms/website-inhoud"];
router.beforeEach(async (to) => {
    if(protectedRoutes.indexOf(to.fullPath) >= 0) {
        let user_id = localStorage.getItem("user_id");
        if(!user_id) {
            return '/login';
        }
            
        await fetch(`https://www.lashroomdeventer.nl/ruveyda-website/webcontent/auth/is_authenticated.php?user_id=${user_id}`)
            .then((response) => {
                return response.json();
            }).then((res) => {
                if(!res.validate_login) {
                    return '/login';
                }                  
            });

        return true;
    }
});

app.use(router);
app.use(VueCookies);
app.mount("#app");
