<template>
    <div class="cst-container backlight" style="letter-spacing: 0.28px">
        <div id="banner" class="flex centered banner hide-overflow">
            <router-link to="/" class="border-0">
                <div class="logo-class border-0">
                    <div>
                        <img src="../../assets/lashroom_logo.png" class="logo border-0">
                    </div>
                    <div>
                        <img src="../../assets/deventer.png" class="sublogo border-0">
                    </div>
                </div>
            </router-link>
        </div>

        <div :class="'contact-bar show-contact-bar hide-mobile'">
            <small class="flex centered">
                <div class="contact-info"><img src="../../assets/svg/phone.svg" class="svg"> 0612345678</div>
                <div class="contact-info-divider">|</div>
                <div class="contact-info"><img src="../../assets/svg/mail.svg" class="svg"> info@lashroomdeventer.nl</div>
            </small>
        </div>

        <div class="nav-bar">
            <div class="shine shine-offset shine-subtle">
                <div class="flex centered hide-mobile">
                    <router-link to="/" class="border-0">
                        <img src="../../assets/tiny_logo.png"
                            :class="scrollPosition < 240 ? 'tiny-logo hide-logo' : 'tiny-logo'">
                    </router-link>
                    <div v-for="page in pages" :key="page.title">
                        <router-link :to="page.route" class="nav-button border-0">
                            <div class="button">
                                <i class="fa fa-home m-0" v-if="page.route === '/'"></i>
                                {{ page.title }}
                            </div>
                            <div :class="currentUrl.path === page.route ? 'current-route display-route' : 'current-route'">
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
/* eslint-disable */
export default {
    name: 'banner-main',
    data() {
        return {
            pages: [
                {
                    title: "Home",
                    route: "/"
                }, {
                    title: "Over mij",
                    route: "/aboutme"
                }, {
                    title: "Afspraak maken",
                    route: "/afspraak"
                }, {
                    title: "Mijn afspraak",
                    route: "/mijn-afspraak"
                }, {
                    title: "Behandelingen",
                    route: "/behandelingen"
                }, {
                    title: "Contact",
                    route: "/contact"
                }
            ],
            currentUrl: this.$router.currentRoute,
            scrollPosition: window.scrollY
        }
    },
    methods: {
        handleScroll() {
            this.scrollPosition = window.scrollY;
            const banner = document.getElementById("banner");
            const MAX_SIZE = 240;

            let val = this.clamp(MAX_SIZE - window.scrollY, 0, MAX_SIZE);
            banner.style.maxHeight = `${val}px`;
            banner.style.padding = `${val / MAX_SIZE * 2}em`;
        }, clamp(val, min, max) {
            return Math.min(Math.max(val, min), max);
        }
    },
    created() {
        document.addEventListener("scroll", this.handleScroll);
    }
}
</script>

<style scoped>
small {
    color: var(--color-dark-tint4);
}

a {
    border: 0 !important;
    border-color: transparent !important;
}
.backlight {
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
}

.nav-bar {
    background-color: var(--color-dark-tint1);
    text-align: center;
    display: flex;
    justify-content: space-evenly;
    overflow: hidden;
}

.hide-overflow {
    overflow: hidden;
}

.cst-container {
    max-width: 1920px;
}

.button {
    transition-duration: var(--transition-150ms);
    box-sizing: border-box;
    background-color: transparent;
    padding: 1em 2em 1em 2em;
    color: var(--color-tint5) !important;
    width: 200px;
}

.button:hover {
    background-color: var(--color-tint5);
    color: var(--color-dark-tint1) !important;
    cursor: pointer;
}

.button:hover~.current-route {
    max-width: 200px;
}

.banner {
    /* transition-duration: var(--transition-400ms); */
    box-sizing: border-box;
    text-align: center;
    background-image: url("../../assets/salon.jpg");
    background-size: cover;
    background-position: center;
    overflow: hidden;
    height: 240px;
    max-height: 240px;
    padding: 2em;
    /* max-height: 400px; */
}

.banner-small-padding {
    padding: 0;
    max-height: 0;
}

.contact-info {
    transition-duration: var(--transition-300ms);
    padding-left: 3em;
    padding-right: 3em;
    width: 300px;
}

.contact-info-divider {
    padding-left: 3em;
    padding-right: 3em;
}

.contact-info-show {
    max-height: 64px;
}

.tiny-logo {
    transition-duration: var(--transition-500ms);
    height: 28px;
    position: absolute;
    left: 12px;
    float: left;
    transform: translateY(13px) scale(1);
}

.hide-logo {
    opacity: 0;
    transform: translateY(-60px);
}

.logo-class {
    transition-duration: var(--transition-300ms);
    padding: 2em;
    box-sizing: border-box;
    border: 2px solid transparent;
}

.logo-class:hover {
    cursor: pointer;
    border-color: black;
}

.logo {
    transition-duration: var(--transition-200ms);
    width: 500px;
    animation-name: fade-in;
    animation-duration: var(--transition-1000ms);
    animation-fill-mode: forwards;
}

.sublogo {
    transition-duration: var(--transition-200ms);
    opacity: 0;
    width: 144px;
    animation-name: fade-in;
    animation-duration: var(--transition-1000ms);
    animation-delay: var(--transition-200ms);
    animation-fill-mode: forwards;
}

.contact-bar {
    transition-duration: var(--transition-400ms);
    transition-delay: var(--transition-150ms);
    background-color: var(--color-tint5);
    padding: 0.5em;
    padding-top: 0;
    padding-bottom: 0;
    max-height: 0;
    overflow: hidden;
}

.show-contact-bar {
    padding-top: 0.5em;
    padding-bottom: 0.5em;
    max-height: 40px;
}

.logo-smaller {
    width: 200px;
}

.sublogo-smaller {
    width: 80px;
}

.centered {
    text-align: center;
    justify-content: center;
}

.shine-offset {
    background-position: 50% 5%;
}

.nav-button {
    text-decoration: none;
}

.current-route {
    transition-duration: var(--transition-200ms);
    max-width: 0;
    width: 100%;
    height: 2px;
    background-color: var(--color-tint5);
}

.display-route {
    max-width: 200px;
    background-color: var(--color-accent3);
}

@keyframes fade-in {
    0% {
        opacity: 0;
        transform: translateX(-16px);
    }

    100% {
        opacity: 100%;
        transform: 0;
    }
}

@media only screen and (max-width: 868px) {
    .logo {
        width: 80vw;
        max-width: 400px;
    }

    .sublogo {
        width: 30vw;
        max-width: 100px;
    }

    .banner {
        height: 180px !important;
    }
}
</style>