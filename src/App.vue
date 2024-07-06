<template>
  <div class="top-level">
    <BannerMain v-bind:scrollPosition="scrollPosition" v-on:updateScrollEvent="updateScrollEvent($event)"
      class="hide-mobile" />
    <div class="show-mobile mobile-navigation">
      <router-link to="/" class="border-0">
        <img src="./assets/tiny_logo.png" width="180" class="logo-mobile">
      </router-link>
      <img src="./assets/svg/menu-alt-1-svgrepo-com.svg" width="32" class="menu-button" @click="toggleMenu()"
        v-if="!openedSidebar">
      <img src="./assets/svg/close-svgrepo-com.svg" width="32" class="menu-button" @click="toggleMenu()"
        v-if="openedSidebar">
    </div>
  </div>
  <!-- <nav>
    <router-link to="/">Home</router-link> |
  </nav> -->
  <div class="second-level">
    <router-view />
  </div>

  <Footer />

  <a href="https://www.instagram.com/lashroomdeventerr/">
    <div class="fab hide-mobile">
      <i class="fa fa-instagram"></i>
    </div>
  </a>

  <!-- 
  <div class="fab fab-2 hide-mobile" @click="resetCookiesConsent()">
    <i class="fa-solid fa-cookie-bite"></i>
  </div> -->

  <div class="width-1920">
    <div class="cookies-consent">
      <CookiesConsent />
    </div>
  </div>

  <div :class="['mobile-menu-container show-mobile', openedSidebar ? '' : 'hide-mobile-menu-container']">
    <MobileMenu />
  </div>
</template>

<script>
import BannerMain from './components/shared/BannerMain.vue';
import Footer from './components/shared/Footer.vue';
import CookiesConsent from './components/shared/CookiesConsent.vue';
import MobileMenu from './components/shared/MobileMenu.vue';
// import { ref } from 'vue';

export default {
  name: "app-main",
  components: {
    BannerMain,
    Footer,
    CookiesConsent,
    MobileMenu
  }, data() {
    return {
      scrollPosition: 0,
      openedSidebar: false
    }
  }, methods: {
    updateScrollPosition: function () {
      this.$emit('updateScrollEvent', window.scrollY);
    }, resetCookiesConsent() {
      localStorage.removeItem("cookiesUserConsent");
    }, toggleMenu() {
      this.openedSidebar = !this.openedSidebar;
    }
  }, watch: {
    // eslint-disable-next-line
    $route(to, from) {
      this.openedSidebar = false;
    }
  }
}
</script>

<style>
:root {
  --transition-100ms: 100ms;
  --transition-150ms: 150ms;
  --transition-200ms: 200ms;
  --transition-300ms: 300ms;
  --transition-400ms: 400ms;
  --transition-500ms: 500ms;
  --transition-600ms: 600ms;
  --transition-1000ms: 1000ms;
  --transition-2000ms: 2000ms;

  /* Colors */
  --color-tint0: #A7A7A7;
  --color-tint1: #B7B7B7;
  --color-tint2: #C7C7C7;
  --color-tint3: #D7D7D7;
  --color-tint4: #E7E7E7;
  --color-tint5: #F7F7F7;

  --color-dark-tint0: #070707;
  --color-dark-tint1: #171717;
  --color-dark-tint2: #272727;
  --color-dark-tint3: #373737;
  --color-dark-tint4: #474747;
  --color-dark-tint5: #575757;

  --color-accent1: #8685EF;
  --color-accent2: #009063;
  --color-accent3: #D19F9C;

  --color-unavailable: #d45365;

  /* Fonts */
  --header-font: "Libre Bodoni", serif;
  --content-font: "Nunito", sans-serif;
}

::placeholder {
  color: var(--color-tint4);
  opacity: 1;
  /* Firefox */
}

::-ms-input-placeholder {
  /* Edge 12 -18 */
  color: var(--color-tint4);
}

* {
  box-sizing: border-box;
}

.d-block {
  display: block;
}

.d-inline-block {
  display: inline-block;
}

a {
  text-decoration: none;
  border-bottom: 1px solid var(--color-tint2);
  color: var(--color-dark-tint1);
  transition: color var(--transition-200ms) ease, border-color var(--transition-200ms) ease;
}

a:hover {
  color: var(--color-unavailable);
  border-color: var(--color-unavailable);
}

html,
body {
  padding: 0;
  margin: 0;
  background-color: var(--color-tint4);
  overflow-x: clip;
}

h1 {
  font-family: var(--header-font);
  border-bottom: 1px solid var(--color-tint3);
  font-weight: 100;
}

h2 {
  font-family: var(--header-font);
  font-weight: 100;
}

p {
  text-align: left;
  line-height: 2em;
  letter-spacing: 0.4px;
  font-weight: 100;
  white-space: pre-wrap;
  line-height: 30px !important;
}

li {
  letter-spacing: 0.28px;
  line-height: 130%;
}

.mobile-menu-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  z-index: 512;
  transition: transform var(--transition-400ms);
}

.hide-mobile-menu-container {
  transform: translateX(-100%);
}

.second-level {
  padding-top: 300px;
  box-shadow: 0 0 24px rgba(0, 0, 0, 0.1);
}

.bg-diamonds {
  background-image: url("@/assets/diamonds.png");
}
.bg-diamonds-dark {
  background-image: url("@/assets/diamonds_dark.png");
}
.bg-plus {
  background-image: url("@/assets/plus.png");
}

.subtle-shadow {
  box-shadow: 0 0 24px rgba(0, 0, 0, 0.1);
}

.shine {
  width: 100%;
  height: 100%;
  background-image: url("./assets/shine.png");
  background-size: cover;
  background-attachment: fixed;
}

.shine-subtle {
  background-image: url("./assets/shine_subtle.png");
}

#app {
  max-width: 1920px;
  font-family: var(--content-font);
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  margin: auto;
  background-color: var(--color-tint4);
}


.flex {
  display: flex;
  width: 100%;
}

.full-width {
  width: 100%;
  margin-top: auto;
  margin-bottom: auto;
}

.menu-button {
  filter: invert();
  position: absolute;
  left: 4px;
  top: 9px;
  animation-name: fade-menu-button;
  animation-duration: var(--transition-400ms);
  animation-fill-mode: forwards;
}

@keyframes fade-menu-button {
  0% {
    opacity: 0;
    transform: translateX(-8px);
  }

  100% {
    opacity: 1;
    transform: 0;
  }
}

.svg {
  width: 16px;
  height: 16px;
  transform: translateY(3px);
  margin-right: 4px;
}

.width-1920 {
  width: 100%;
  justify-content: center;
  position: fixed;
  left: 0;
  bottom: 0;
  z-index: 1024;
}

.top-level {
  width: 100%;
  z-index: 1024;
  position: fixed;
}

.mobile-navigation {
  width: 100%;
  height: 50px;
  background-color: #171717;
  position: relative;
  border-bottom: 1px solid #ffffff22;
}

.logo-mobile {
  position: relative;
  top: 10px;
  margin-left: auto;
  margin-right: auto;
}

.site-button {
  transition-duration: var(--transition-200ms);
  border-radius: 100px;
  border: 2px solid var(--color-tint5);
  background-color: var(--color-dark-tint1);
  color: var(--color-tint5);
  padding: 1.5em;
  box-sizing: border-box;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
}

.site-button:hover {
  background-color: var(--color-tint5);
  color: var(--color-dark-tint1);
  cursor: pointer;
}

.site-button-perma-active {
  background-color: var(--color-tint5) !important;
  color: var(--color-dark-tint1) !important;
  border: 2px solid var(--color-dark-tint2) !important;
}

.site-button:active {
  background-color: #fff;
}

.site-button-square {
  transition-duration: var(--transition-200ms);
  border: 2px solid var(--color-tint5);
  background-color: var(--color-dark-tint1);
  color: var(--color-tint5);
  padding: 1.5em;
  box-sizing: border-box;
  font-family: var(--content-font);
  font-size: 16px;
}

.site-button-square:hover {
  background-color: var(--color-tint5);
  color: var(--color-dark-tint1);
  cursor: pointer;
}

.site-button-square:active {
  background-color: #fff;
}

.site-button-square:disabled {
  background-color: #eee !important;
  color: #888 !important;
}

.no-top-margin {
  margin-top: 0;
}

.ignore-padding {
  padding: 0;
}

.padding-6em {
  padding: 4em;
}

.position-relative {
  position: relative;
  overflow: hidden;
}

a.router-link {
  color: white !important;
}

.fab {
  transition-duration: var(--transition-100ms);
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
  border-radius: 50%;
  width: 90px;
  height: 90px;
  padding: 2px;
  padding-left: 4px;
  position: fixed;
  bottom: 24px;
  right: 24px;
  border: 3px solid var(--color-dark-tint2);
  color: var(--color-tint4);
  box-shadow: 2px 3px 11px rgba(0, 0, 0, 0.2);
  z-index: 32;
  font-size: 60px;
  font-weight: 100;
}

.fab:hover {
  background: radial-gradient(circle at 30% 107%, #fffac3 0%, #fffabe 5%, #ff8176 45%, #d45daf 60%, #5c7fe6 90%);
  border-color: var(--color-tint4);
  cursor: pointer;
}

.fab-2 {
  bottom: 128px;
}

.cookies-consent {
  margin: auto;
  z-index: 512;
  width: 800px
}

.overshadow {
  /* box-shadow: 0 0 40px rgba(0, 0, 0, 0.4); */
  z-index: 16;
  position: relative;
}

.indent-s4 {
  margin-left: 0;
}

.carousel-image {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: opacity var(--transition-2000ms);

  animation-name: move-image;
  animation-duration: 5000ms;
  animation-fill-mode:
}

.carousel-image-disappear {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: opacity var(--transition-2000ms);
  opacity: 0;
}

.container {
  animation: fade-content;
  animation-duration: var(--transition-1000ms);
  animation-fill-mode: forwards;
}

.marble {
  background-image: url("./assets/stringy_marble_albedo.png");
}

.bg-sade {
  background-image: url("./assets/sade.png");
  background-size: cover;
  background-position: 50%;
  color: #fff !important;
}

.bg-stripes {
    background-image: url("@/assets/stripes_light.png");
}

@keyframes fade-content {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

.hide-mobile {
  display: relative;
}

.mobile-padding {}

.d-mobile-block {}

.show-mobile {
  display: none;
}

@media only screen and (max-width: 868px) {
  .hide-mobile {
    display: none;
  }

  .mobile-padding {
    padding: 16px !important;
  }

  .second-level {
    padding-top: 48px !important;
  }

  p,
  span {
    line-height: 24px;
    /* text-align: center; */
  }

  .d-mobile-block {
    display: block;
  }

  .mobile-center {
    justify-content: space-between;
  }

  .text-align-right-mobile {
    text-align: right;
  }

  ul {
    margin: 0;
    padding-left: 2vw !important;
    padding-right: 2vw !important;
    padding-top: 1em;
  }

  .overshadow {
    border: 0 !important;
  }

  .site-button-square {
    width: 100% !important;
    text-align: center !important;

  }

  .w-mobile-100 {
    width: 100% !important;
  }

  .show-mobile {
    display: block;
  }

  table {
    width: 100%;
  }

  .no-mobile-padding {
    padding: 0 !important;
  }

  .current-date {
    width: auto !important;
    margin-top: 4px;
  }

  .icon-increment {
    width: 24px !important;
  }

  .indent-s4 {
    margin-left: 0;
  }
}

.no-underline {
  text-decoration: none;
}

.mobile-banner {
  height: 150px;
}

.back-button {
  text-align: left !important;
  text-decoration: none !important;
}

.force-left-align {
  text-align: left !important;
}

/* Scrollbar */
/* width */
::-webkit-scrollbar {
  width: 12px;
}

/* Track */
::-webkit-scrollbar-track {
  border-left: 1px solid rgba(0, 0, 0, 0.1);
}

/* Handle */
::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.25);
  transition: background-color var(--transition-200ms);
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background-color: rgba(0, 0, 0, 0.4);
}

h1 {
  animation: fade-in 700ms ease-in-out forwards;
}
h2, h3, h4 {
  opacity: 0;
  animation: fade-in 700ms ease-in-out forwards;
  animation-delay: 200ms;
}
p, span, strong {
  opacity: 0;
  animation: fade-in 700ms ease-in-out forwards;
  animation-delay: 400ms;
}

.border-subtle {
  border-color: rgba(255, 255, 255, 0.1) !important;
}
@keyframes fade-in {
  0% {
    opacity: 0;
    transform: translateX(-16px);
  }

  100% {
    opacity: 1;
    transform: 0;
  }
  
}
</style>
