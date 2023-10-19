<template>
  <div class="top-level">
    <BannerMain v-bind:scrollPosition="scrollPosition" v-on:updateScrollEvent="updateScrollEvent($event)"></BannerMain>
  </div>
  <!-- <nav>
    <router-link to="/">Home</router-link> |
  </nav> -->
  <div class="second-level">
    <router-view />
  </div>

  <Footer />

  <div class="fab">
    <img src="./assets/svg/insta.svg">
  </div>
</template>

<script>
import BannerMain from './components/shared/BannerMain.vue';
import Footer from './components/shared/Footer.vue';
// import { ref } from 'vue';

export default {
  name: "app-main",
  components: {
    BannerMain,
    Footer
  }, data() {
    return {
      scrollPosition: 0
    }
  }, methods: {
    updateScrollPosition: function () {
      this.$emit('updateScrollEvent', window.scrollY);
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
}

html,
body {
  padding: 0;
  margin: 0;
  background-color: var(--color-tint4);
  overflow-x: hidden;
}

h1 {
  font-family: "Bodoni MT";
  font-size: 44pt;
  border-bottom: 1px solid var(--color-tint3);
}

h2 {
  font-family: "Bodoni MT";
}

p {
  text-align: justify;
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
  font-family: "Nunito", sans-serif;
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

.svg {
  width: 16px;
  height: 16px;
  transform: translateY(3px);
  margin-right: 4px;
}

.top-level {
  width: 100%;
  z-index: 512;
  position: fixed;
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

a.router-link {
  color: white !important;
}

.fab {
  transition-duration: var(--transition-100ms);
  background-color: var(--color-tint5);
  border-radius: 50%;
  width: 60px;
  height: 60px;
  padding: 1em;
  position: fixed;
  bottom: 24px;
  right: 24px;
  border: 1px solid var(--color-dark-tint2);
  color: var(--color-dark-tint2);
  box-shadow: 2px 3px 11px rgba(0, 0, 0, 0.2);
}

.fab:hover {
  cursor: pointer;
  background-color: var(--color-dark-tint1);
  color: var(--color-dark-)
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
</style>
