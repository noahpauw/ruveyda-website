<template>
    <div class="container padding-6em mobile-padding">
        <Breadcrumbs :breadcrumbs="breadcrumbs" class="hide-mobile" />
        <router-link to="/">
            <p class="show-mobile back-button">Terug</p>
        </router-link>

        <h1 class="force-left-align">Behandelingen</h1>
        <p class="force-left-align">Bij ons kunt u terecht voor verschillende behandelingen!</p>
    </div>
    <div class="container container-stripes flex mobile-padding">
        <div class="full-width padding-4em no-mobile-padding">
            <h2 class="force-left-align">BROW LAMINATION</h2>
            <p class="force-left-align">
                Fuller brows in one session 🧚🏻
            </p>
            <p class="force-left-align">
                Brow lamination is een behandeling waarbij de natuurlijkewenkbrauwhaartjes in de juiste richting geplaats
                worden.
                Na de behandeling lijken de wenkbrauwen direct een stuk voller.
            <ul>
                <li>Het resultaat zal 4 tot 6 weken zichtbaar zijn</li>
                <li>De behandeling is niet schadelijk voor de wenkbrauwen</li>
            </ul>
            </p>
        </div>

        <div class="img-holder hide-mobile">
            <img src="../../assets/instagram/ombre.jpg">
        </div>
    </div>

    <div class="container container-gray flex mobile-padding">
        <div class="img-holder hide-mobile">
            <img src="../../assets/instagram/ombre.jpg">
        </div>
        <div class="full-width padding-4em no-mobile-padding">
            <h2 class="force-left-align">LASH VOLUME LIFT</h2>
            <p class="force-left-align">
                <b>Lash volume lifting is a form of magic!</b>
            </p>
            <p class="force-left-align">
                Lash volume lift: Tijdens de behandeling worden de natuurlijke wimpers vanaf de wortel gelift.
            <ul>
                <li>Het resultaat zal 6 tot 8 weken zichtbaar blijven</li>
                <li>De behandeling is niet schadelijk voor de natuurlijke wimpers</li>
                <li>Tijdsduur behandeling: 45 minuten</li>
            </ul>
            </p>
        </div>
    </div>
</template>

<script>
import Breadcrumbs from '../shared/Breadcrumbs.vue';

export default {
    name: "treatments-component",
    data() {
        return {
            breadcrumbs: [{
                title: "Home",
                route: "/"
            }, {
                title: "Behandelingen",
                route: "/behandelingen"
            }]
        }
    }, components: {
        Breadcrumbs
    }
}
</script>

<style scoped>
h1 {
    font-size: 42pt;
    text-align: left;
    margin-top: 0;
}

.container {
    width: 100%;
    box-sizing: border-box;
    overflow: clip;
}

.container-gray {
    background-color: var(--color-tint3);
}

.container-stripes {
    background-image: url("../../assets/stripes_light.png");
}

.padding-4em {
    display: flex;
    justify-content: center;
    align-content: center;
    flex-direction: column;
    padding: 1em 3em 1em 3em;
    position: relative;
    vertical-align: middle;
}

.img-holder {
    width: 500px;
    height: 500px;
    overflow: hidden;
    margin: 0;
    padding: 0;
    text-align: right;
}

img {
    height: 100%;
    object-fit: cover;
}

ul,
li {
    text-align: left;
}
</style>