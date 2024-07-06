<template>
    <div class="mobile-menu d-block">
        <div class="mobile-nav">
            <router-link v-for="route in routes" :to="route.to" :key="route.title" style="text-decoration: none !important">
                <div :class="currentUrl.path === route.to ? 'link-nav-mobile active-route' : 'link-nav-mobile'">
                    {{ route.title }}
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "mobile-menu",
    data() {
        return {
            currentUrl: this.$router.currentRoute,
            routes: [{
                to: "/",
                title: "Home"
            }, {
                to: "/aboutme",
                title: "Over mij"
            }, {
                to: '/afspraak',
                title: "Afspraak maken"
            }, {
                to: '/mijn-afspraak',
                title: "Mijn afspraak"
            }, {
                to: '/behandelingen',
                title: "Behandelingen"
            }, {
                to: '/contact',
                title: 'Contact'
            }]
        }
    }
}
</script>

<style scoped>
.mobile-menu {
    position: relative;
    width: calc(100% - 2em);
    height: 100%;
    background-color: #171717;
    padding-top: 50px;
    overflow: hidden;
}

.mobile-nav {
    position: relative;
    left: 0;
}

.active-route {
    background-color: var(--color-tint4) !important;
    color: var(--color-dark-tint2) !important;
}

.d-block {
    display: block !important;
}

.link-nav-mobile {
    width: 100%;
    padding: 1.5em;
    color: white;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    max-height: calc(13vh);
    text-decoration: none !important;
    transition: background-color var(--transition-500ms) ease;
}
</style>