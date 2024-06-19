<template>
    <div class="cst-container">
        <div class="w-100 d-block d-lg-none overflow-hidden mobile-banner">
            <img src="@/assets/deventer_skyline.jpg" class="w-100">
        </div>
        <div class="position-relative">
            <img src="@/assets/lashroom_diamonds.png" class="position-absolute opacity-25 top-0 pe-none">
            <div class="w-100 p-4 p-lg-5">
                <div class="p-0 p-lg-5">
                    <div class="p-0 p-lg-5 py-3 py-lg-5">
                        <Breadcrumbs :breadcrumbs="breadcrumbs" class="hide-mobile" />
                        <h1 class="no-top-margin mb-3 display-1">Welkom</h1>
                        <p>Welkom op de website van Lash Room Deventer! Mijn naam is Rüveyda en in 2022 ben ik met Lash Room
                            Deventer begonnen om mensen te voorzien van prachtige wimpers.
                        </p>
                        <h2 class="mt-4 mt-lg-5">Direct een afspraak maken?</h2>
                        <p>
                        <nav>Dat kan <router-link to="/afspraak">hier</router-link>!&nbsp;Voor het inplannen van een
                            afspraak
                            gelden
                            onze
                            <router-link to="/algemene-voorwaarden">Algemene Voorwaarden</router-link>.
                        </nav>
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-4 me-5">
                <img src="@/assets/vaugier.png" class="portrait d-none d-lg-block">
            </div>
        </div>
    </div>

    <FillerImage />

    <!-- <div class="full-width filler-3em hide-mobile"></div> -->

    <div class="flex d-mobile-block">
        <div class="full-width overshadow">
            <div class="cst-container cst-container-stripes p-auto mobile-padding position-relative">
                <div class="d-inline-block p-0 p-lg-5">
                    <div class="p-0 p-lg-5 py-3 py-lg-4">
                        <div class="p-0 p-lg-5">
                            <h2 class="display-4 mb-lg-4">Beauty, cosmetics & personal care</h2>
                            <ul>
                                <li>❖ One By One lashes | Russian Volume lashes</li>
                                <li>❖ PMU brows & lips</li>
                                <li>❖ Lashlift | Browlift</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cst-container cst-container-dark-gray p-auto mobile-padding position-relative">
                <div class="d-inline-block p-0 p-lg-5">
                    <div class="p-0 p-lg-5 py-3 py-lg-4">
                        <div class="p-0 p-lg-5">
                            <h2 class="display-4 mb-lg-4">My place</h2>

                            <p class="m-0">Mijn salon bevindt zich in Deventer.</p>
                        </div>
                    </div>
                </div>
            </div>

            <Carousel :imageList="salonList" />

            <div class="cst-container cst-container-skew mobile-padding position-relative d-inline-block inverted-margin position-relative">
                <img src="@/assets/lashroom_diamonds.png" class="position-absolute opacity-25 top-0">
                <div class="p-0 p-lg-5">
                    <div class="p-0 p-lg-5 py-3 py-lg-3">
                        <div class="p-0 p-lg-5">
                            <h2 class="display-4 mb-lg-5">Openingstijden</h2>
                            <div class="flex mobile-center">
                                <ul>
                                    <li class="fw-bold">Maandag</li>
                                    <li class="fw-bold">Dinsdag</li>
                                    <li class="fw-bold">Woensdag</li>
                                    <li class="fw-bold">Donderdag</li>
                                    <li class="fw-bold">Vrijdag</li>
                                    <li class="fw-bold">Zaterdag</li>
                                    <li class="fw-bold">Zondag</li>
                                </ul>

                                <ul class="text-align-right-mobile">
                                    <li class="text-dark fw-bold">Gesloten</li>
                                    <li>11:30 - 19:00</li>
                                    <li>10:00 - 17:00</li>
                                    <li>10:00 - 17:00</li>
                                    <li>10:00 - 17:00</li>
                                    <li class="text-dark fw-bold">Gesloten</li>
                                    <li class="text-dark fw-bold">Gesloten</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <img src="../../assets/lashroom_logo_full.png" class="portrait float-right hide-mobile">
            </div>
        </div>

        <!-- <div class="cst-container cst-container-ferns ignore-padding full-width hide-mobile">
            <PictureGallery />
        </div> -->
    </div>

    <!-- <div class="full-width filler-3em hide-mobile"></div> -->
</template>

<script>
import FillerImage from "../shared/FillerImage.vue";
import Carousel from "../shared/Carousel.vue";
import Breadcrumbs from "@/components/shared/Breadcrumbs.vue";

export default {
    name: 'home-component',
    components: {
        FillerImage,
        Carousel,
        Breadcrumbs,
    },
    data() {
        return {
            welcomeHeader: localStorage.getItem("welcomeHeader"),
            welcomeMessage: localStorage.getItem("welcomeMessage"),
            afspraakHeader: localStorage.getItem("afspraakHeader"),
            afspraakContent: localStorage.getItem("afspraakContent"),
            salonList: ['salon-2.jpg', 'salon-3.jpg', 'deventer_skyline.jpg'],
            breadcrumbs: [
                {
                    title: "Home",
                    route: "/",
                }
            ],
        }
    },
    created() {
        document.title = "Lash Room Deventer | Home";
    }
}
</script>

<style scoped>
.portrait {
    width: 300px;
    height: 300px;
    object-fit: cover;
    border-radius: 50%;
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 3em;
    position: absolute;
    right: 3em;
    top: calc(50% - 150px);
}

.place {
    width: 100%;
    height: 270px;
    background-image: url("../../assets/salon-3.jpg");
    background-size: cover;
}

.max-height-400 {
    height: 300px;
}

.max-height-200 {
    height: 220px;
}

.icon-smaller {
    width: 200px;
    border-radius: 50%;
    box-shadow: 4px 5px 10px rgba(0, 0, 0, 0.1);
    float: right;
    margin-top: 50%;
    margin-bottom: 50%;
    padding: 0;
}

.float-right {
    float: right;
}

.cst-container {
    box-sizing: border-box;
    text-align: left;
    background-color: var(--color-tint4);
    color: var(--color-dark-tint4);
    width: 100%;
}

.filler-3em {
    height: 16px;
    background-color: #fff;
}

.cst-container-gray {
    background-color: var(--color-tint3);
}

.cst-container-dark-gray {
    background-color: var(--color-dark-tint1);
    color: var(--color-tint5);
}

.cst-container-instagram {
    background-image: url("../../assets/instagram_colors.png");
    background-size: cover;
    background-attachment: fixed;
}

.cst-container-ferns {
    background-color: #fff;
    background-size: contain;
    background-attachment: fixed;
    box-shadow: inset 0 0 64px rgba(0, 0, 0, 0.5);
}

.cst-container-stripes {
    background-image: url("../../assets/stripes.png");
    /* justify-content: center; */
}

.p-auto {
    padding-left: auto;
    padding-right: auto;
    display: flex !important;
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

.cst-container-skew {
    background-image: url("../../assets/bg_skew.png");
    background-position: 50% 50%;
}

.inverted-margin {
    margin-top: -10px;
    margin-bottom: -10px;
}

@media only screen and (max-width: 868px) {
    .max-height-400 {
        height: auto;
    }

    .max-height-200 {
        height: auto;
    }
}
</style>
