<template>
  <div class="top-level">
    <BannerMain v-bind:scrollPosition="scrollPosition" v-on:updateScrollEvent="updateScrollEvent($event)"
      class="hide-mobile" />
    <div class="show-mobile mobile-navigation">
      <img src="./assets/tiny_logo.png" width="180" class="logo-mobile">
      <img src="./assets/svg/menu-alt-1-svgrepo-com.svg" width="32" class="menu-button" @click="toggleMenu()" v-if="!openedSidebar">
      <img src="./assets/svg/close-svgrepo-com.svg" width="32" class="menu-button" @click="toggleMenu()" v-if="openedSidebar">
    </div>
  </div>
  <!-- <nav>
    <router-link to="/">Home</router-link> |
  </nav> -->
  <div class="second-level">
    <router-view />
  </div>

  <Footer />

  <div class="fab hide-mobile">
    <img src="./assets/svg/insta.svg">
  </div>

  <div class="fab fab-2 hide-mobile">
    <img src="./assets/svg/cookie.svg" @click="resetCookiesConsent()">
  </div>

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
  --content-font: "Montserrat", sans-serif;
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

html,
body {
  padding: 0;
  margin: 0;
  background-color: var(--color-tint4);
  overflow-x: clip;
}

h1 {
  font-family: var(--header-font);
  font-size: 44pt;
  border-bottom: 1px solid var(--color-tint3);
}

h2 {
  font-family: var(--header-font);
}

p {
  text-align: left;
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
  background-color: var(--color-dark-tint2);
  position: relative;
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
  background-color: var(--color-tint5);
  color: var(--color-dark-tint1);
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
}

.site-button-square:hover {
  background-color: var(--color-tint5);
  color: var(--color-dark-tint1);
  cursor: pointer;
}

.site-button-square:active {
  background-color: #fff;
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


a.router-link {
  color: white !important;
}

.fab {
  transition-duration: var(--transition-100ms);
  background-color: var(--color-tint5);
  border-radius: 50%;
  width: 90px;
  height: 90px;
  padding: 1em;
  position: fixed;
  bottom: 24px;
  right: 24px;
  border: 1px solid var(--color-dark-tint2);
  color: var(--color-dark-tint2);
  box-shadow: 2px 3px 11px rgba(0, 0, 0, 0.2);
}

.fab>img {
  transform: translate3d(-1px, -1px, 0);
}

.fab-2 {
  bottom: 128px;
}

.cookies-consent {
  margin: auto;
  z-index: 512;
  width: 800px
}

.fab:hover {
  cursor: pointer;
  background-color: var(--color-dark-tint1);
  color: var(--color-dark-)
}

.fab:active {
  background-color: var(--color-tint5);
  border-color: var(--color-tint5);
}

.fab>img {
  -webkit-filter: none;
  filter: none;
  transition-duration: var(--transition-100ms);
  width: 60px;
  height: 60px;
}

.fab:hover>img {
  -webkit-filter: invert();
  filter: invert();
}

.fab:active>img {
  -webkit-filter: none;
  filter: none;
}

.overshadow {
  /* box-shadow: 0 0 40px rgba(0, 0, 0, 0.4); */
  z-index: 16;
  position: relative;
  border-right: 8px solid var(--color-tint5);
}

.container {
  animation: fade-content;
  animation-duration: var(--transition-1000ms);
  animation-fill-mode: forwards;
}

.marble {
  background-image: url("./assets/stringy_marble_albedo.png");
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
    padding-top: 60px !important;
  }

  p,
  span {
    font-size: 14px;
    line-height: 24px;
    /* text-align: center; */
  }

  h1 {
    font-size: 30pt !important;
    border: 0;
    font-weight: 100;
    margin-bottom: 0;
    /* text-align: center; */
  }

  h2 {
    font-size: 20px !important;
    /* text-align: center; */
    font-weight: 100;
    margin-top: 8px !important;
    margin-bottom: 8px !important;
  }

  h3 {
    font-size: 16px !important;
    font-weight: 100 !important;
  }

  ul,
  li {
    font-size: 14px;
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

  .input {
    font-size: 14px !important;
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

  tr,
  th,
  td {
    font-size: 12px !important;
  }

  table {
    width: 100%;
  }

  .no-mobile-padding {
    padding: 0 !important;
  }

  .date-available {
    padding: 12px;
    font-size: 12px;
    width: 40% !important;
  }

  .current-date {
    font-size: 20px !important;
    width: auto !important;
    margin-top: 4px;
  }

  .date-box-outline {
    padding-bottom: 1em !important;
  }

  .icon-increment {
    width: 24px !important;
  }

  .date-box {
    justify-content: space-around;
  }
}

.no-underline {
  text-decoration: none;
}

.back-button {
  text-align: left !important;
  text-decoration: none !important;
}

.force-left-align {
  text-align: left !important;
}
</style>
