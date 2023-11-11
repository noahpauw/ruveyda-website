<template>
    <div class="container mobile-padding">
        <nav>
            <small>
                <span v-for="breadcrumb in breadcrumbs" :key="breadcrumb.title">
                    <router-link to="{{ breadcrumb.url }}">Home</router-link>
                    »
                </span>
            </small>
        </nav>
        <div class="flex">
            <div class="full-width">
                <h1 class="no-top-margin">Welkom</h1>
                <p>Welkom op de website van Lash Room Deventer! Mijn naam is Rüveyda en in 2022 ben ik met Lash Room
                    Deventer begonnen om mensen te voorzien van prachtige wimpers.
                </p>
                <h2>Direct een afspraak maken?</h2>
                <p>
                <nav>Dat kan <router-link to="/afspraak">hier</router-link>! Voor het inplannen van een afspraak gelden onze
                    <router-link to="/algemene-voorwaarden">Algemene Voorwaarden</router-link>.
                </nav>
                </p>
            </div>
            <div>
                <img src="../../assets/vaugier.png" class="portrait hide-mobile">
            </div>
        </div>
    </div>

    <FillerImage />

    <div class="full-width filler-3em hide-mobile"></div>

    <div class="flex d-mobile-block">
        <div class="full-width overshadow">
            <div class="container container-stripes mobile-padding">
                <img src="../../assets/lashroom_logo_full.png" class="icon-smaller hide-mobile">

                <h2>Beauty, cosmetics & personal care</h2>

                <ul>
                    <li>- One By One lashes | Russian Volume lashes</li>
                    <li>- PMU brows & lips</li>
                    <li>- Lashlift | Browlift</li>
                </ul>
            </div>

            <div class="container container-dark-gray ignore-padding">
                <div class="padding-6em mobile-padding">
                    <h2>My place</h2>
                    <p class="hide-mobile">De salon in Deventer, Overijssel.</p>
                </div>

                <div class="place">

                </div>
            </div>

            <div class="container mobile-padding">
                <h2>Openingstijden</h2>
                <div class="flex mobile-center">
                    <ul>
                        <li>Maandag</li>
                        <li>Dinsdag</li>
                        <li>Woensdag</li>
                        <li>Donderdag</li>
                        <li>Vrijdag</li>
                        <li>Zaterdag</li>
                        <li>Zondag</li>
                    </ul>

                    <ul class="text-align-right-mobile">
                        <li class="closed">Gesloten</li>
                        <li>11:30 - 19:00</li>
                        <li>10:00 - 17:00</li>
                        <li>10:00 - 17:00</li>
                        <li>10:00 - 17:00</li>
                        <li class="closed">Gesloten</li>
                        <li class="closed">Gesloten</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container container-ferns ignore-padding full-width hide-mobile">
            <PictureGallery />
        </div>
    </div>

    <div class="full-width filler-3em hide-mobile"></div>
</template>

<script>
import FillerImage from "../shared/FillerImage.vue";
import PictureGallery from "../shared/PictureGallery.vue";

export default {
    name: 'home-component',
    components: {
        FillerImage,
        PictureGallery
    },
    data() {
        return {
            breadcrumbs: [],
            welcomeHeader: localStorage.getItem("welcomeHeader"),
            welcomeMessage: localStorage.getItem("welcomeMessage"),
            afspraakHeader: localStorage.getItem("afpsraakHeader"),
            afspraakContent: localStorage.getItem("afspraakContent")
        }
    },
    created() {
        document.title = "Lash Room Deventer | Home";
    }
}
</script>

<style scoped>
h2 {
    font-size: 24pt;
    margin: 0;
}

.portrait {
    width: 300px;
    height: 300px;
    object-fit: cover;
    border-radius: 50%;
    margin: 3em;
    margin-top: 0;
}

.place {
    width: 100%;
    height: 270px;
    background-image: url("../../assets/salon-3.jpg");
    background-size: cover;
}

.icon-smaller {
    width: 200px;
    border-radius: 50%;
    box-shadow: 4px 5px 10px rgba(0, 0, 0, 0.1);
    position: relative;
    float: right;
}

.container {
    padding: 4em;
    box-sizing: border-box;
    text-align: left;
    background-color: var(--color-tint4);
    color: var(--color-dark-tint4);
    width: 100%;
}

.filler-3em {
    height: 8px;
    background-color: #fff;
}

.container-gray {
    background-color: var(--color-tint3);
}

.container-dark-gray {
    background-color: var(--color-dark-tint1);
    color: var(--color-tint5);
}

.container-instagram {
    background-image: url("../../assets/instagram_colors.png");
    background-size: cover;
    background-attachment: fixed;
}

.container-ferns {
    background-image: url("../../assets/varen.jpg");
    background-size: cover;
    background-attachment: fixed;
}

.container-stripes {
    background-image: url("../../assets/stripes.png");
}

ul {
    padding-right: 4em;
}

ul,
li {
    padding-left: 0;
}

li {
    list-style-type: none;
    padding-bottom: 1em;
}

.closed {
    font-weight: bold;
    color: var(--color-accent3);
}

.ignore-padding {
    padding: 0;
}
</style>