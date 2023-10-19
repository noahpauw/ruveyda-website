<template>
    <div class="container">
        <nav>
            <small>
                <span v-for="breadcrumb in breadcrumbs" :key="breadcrumb.title">
                    <router-link to="{{ breadcrumb.url }}">Home</router-link>
                    »
                </span>
            </small>
        </nav>
        <div class="flex">
            <div>
                <h1 class="no-top-margin">Welkom</h1>
                <p>Welkom op de website van Lash Room Deventer! Mijn naam is Rüveyda en ik ben in 2022 begonnen met Lash
                    Room
                    Deventer om mensen te voorzien van prachtige wimpers!</p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lacinia at mauris eu dapibus.
                    Suspendisse ut
                    feugiat diam, quis euismod purus. Nulla consequat mattis turpis vel bibendum. Aenean in nisl nisi. Nam
                    diam
                    purus, imperdiet non semper in, euismod a ante. Sed auctor leo vitae massa pharetra, a auctor metus
                    viverra.
                    Donec non dui eget lacus hendrerit elementum. Cras non nunc id sapien tincidunt blandit eget a ante.
                    Aenean
                    pretium orci sit amet enim pretium dignissim. Cras convallis arcu in massa sollicitudin, ut fringilla
                    augue
                    bibendum.
                </p>
                <h2>Direct een afspraak maken?</h2>
                <p>
                <nav>Dat kan <router-link to="/afspraak">hier</router-link>!</nav>
                </p>
            </div>
            <div>
                <img src="../../assets/vaugier.png" class="portrait">
            </div>
        </div>
    </div>

    <FillerImage />

    <div class="flex">
        <div class="full-width">
            <div class="container">
                <img src="../../assets/lashroom_logo_full.png" class="icon-smaller">

                <h2>Beauty, cosmetics & personal care</h2>

                <ul>
                    <li>🗸 One By One lashes | Russian Volume lashes</li>
                    <li>🗸 PMU brows & lips</li>
                    <li>🗸 Lashlift | Browlift</li>
                </ul>
            </div>

            <div class="container container-dark-gray ignore-padding">
                <div class="padding-6em">
                    <h2>My place</h2>
                    <p>De salon in Deventer, Overijssel.</p>
                </div>

                <div class="place">

                </div>
            </div>

            <div class="container">
                <h2>Openingstijden</h2>
                <div class="flex">
                    <ul>
                        <li>Maandag</li>
                        <li>Dinsdag</li>
                        <li>Woensdag</li>
                        <li>Donderdag</li>
                        <li>Vrijdag</li>
                        <li>Zaterdag</li>
                        <li>Zondag</li>
                    </ul>

                    <ul>
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

        <div class="container container-gray">
            <PictureGallery />
        </div>
    </div>
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
            breadcrumbs: []
        }
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
    height: 400px;
    background-image: url("../../assets/salon-3.jpg");
    background-size: cover;
}

.no-top-margin {
    margin-top: 0;
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

.ignore-padding {
    padding: 0;
}

.padding-6em {
    padding: 4em;
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
</style>