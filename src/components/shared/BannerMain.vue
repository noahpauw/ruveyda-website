<template>
    <div class="container">
        <div id="banner"
            :class="scrollPosition < 64 ? 'flex centered banner' : 'flex centered banner banner-small-padding'">
            <router-link to="/">
                <div class="logo-class">
                    <div>
                        <img src="../../assets/lashroom_logo.png"
                            :class="scrollPosition < 64 ? 'logo' : 'logo logo-smaller'">
                    </div>
                    <div>
                        <img src="../../assets/deventer.png"
                            :class="scrollPosition < 64 ? 'sublogo' : 'sublogo sublogo-smaller'">
                    </div>
                </div>
            </router-link>
        </div>

        <div :class="scrollPosition < 64 ? 'contact-bar' : 'contact-bar show-contact-bar'">
            <small class="flex centered">
                <div class="contact-info"><img src="../../assets/svg/phone.svg" class="svg"> 0641535168</div>
                <div class="contact-info">|</div>
                <div class="contact-info"><img src="../../assets/svg/mail.svg" class="svg"> info@lashroomdeventer.nl</div>
            </small>
        </div>

        <div class="nav-bar">
            <div class="shine shine-offset shine-subtle">
                <div class="flex centered">
                    <div v-for="page in pages" :key="page.title">
                        <router-link :to="page.route" class="nav-button">
                            <div class="button">
                                {{ page.title }}
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
import { ref } from 'vue';

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
                    title: "Contact",
                    route: "/contact"
                }
            ],
            scrollPosition: window.scrollY
        }
    },
    methods: {
        handleScroll() {
            this.scrollPosition = window.scrollY;
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

.nav-bar {
    background-color: var(--color-dark-tint1);
    text-align: center;
    display: flex;
    justify-content: center;
}

.container {
    max-width: 1920px;
}

.button {
    transition-duration: var(--transition-150ms);
    box-sizing: border-box;
    background-color: transparent;
    padding: 1em 2em 1em 2em;
    color: var(--color-tint5) !important;
}

.button:hover {
    background-color: var(--color-tint5);
    color: var(--color-dark-tint1) !important;
    cursor: pointer;
}

.banner {
    transition-duration: var(--transition-300ms);
    padding: 2em;
    box-sizing: border-box;
    text-align: center;
    background-image: url("../../assets/salon.jpg");
    background-size: cover;
    background-position: center;
}

.banner-small-padding {
    padding: 8px;
}

.contact-info {
    transition-duration: var(--transition-300ms);
    padding-left: 3em;
    padding-right: 3em;
}

.contact-info-show {
    max-height: 64px;
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
</style>