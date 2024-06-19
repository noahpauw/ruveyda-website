<template>
    <div class="cst-container bg-light">
        <div class="p-4 p-lg-5">
            <div class="p-0 p-lg-5">
                <div class="p-0 p-lg-5 py-3 py-lg-5 position-relative">
                    <img src="@/assets/lashroom_diamonds.png" class="position-absolute opacity-25 top-0 pe-none">
                    <Breadcrumbs :breadcrumbs="breadcrumbs" />

                    <h1 class="no-top-margin display-1">Jouw afspraak</h1>
                    <div v-if="showAsyncData">
                        <div v-if="firstname">
                            <h2 class="force-left-align">Welkom, {{ firstname }}</h2>
                            <p class="force-left-align">Je hebt een afspraak bij ons gepland. Bekijk de gegevens hiervan
                                hieronder.
                            </p>
                            <table>
                                <tr>
                                    <th>Datum</th>
                                    <td>{{ date }}</td>
                                </tr>
                                <tr>
                                    <th>E-mailadres</th>
                                    <td>{{ email }}</td>
                                </tr>
                                <tr>
                                    <th>Telefoonnummer</th>
                                    <td>{{ phone }}</td>
                                </tr>
                                <tr v-if="comments">
                                    <th>Opmerkingen</th>
                                    <td>{{ comments }}</td>
                                </tr>
                            </table>
                            <h2 class="force-left-align">Annulering</h2>
                            <p class="force-left-align">Mocht je onverhoopt toch niet kunnen op deze datum en tijd, neem dan
                                contact
                                met
                                mij
                                op.</p>
                            <table>
                                <tr>
                                    <th>Telefoonnummer</th>
                                    <td>0612345678</td>
                                </tr>
                                <tr>
                                    <th>E-mailadres</th>
                                    <td>info@lashroomdeventer.nl</td>
                                </tr>
                            </table>
                        </div>
                        <div v-else>
                            <p>Op dit moment heb je nog geen afspraak bij ons staan óf deze is niet opgeslagen als een
                                cookie.
                            </p>
                            <p>Klopt dit niet? Gebruik dan de link die je in je bevestigingsmailtje hebt ontvangen!</p>
                            <p>Of <router-link to="/afspraak">maak een afspraak</router-link>!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second half of screen -->
        <ul class="hide-mobile">
            <li v-for="(carouselImage, index) in carouselImages" :key="carouselImage">
                <img :src="require(`../../assets/${carouselImage}`)"
                    :class="currentImage === index ? 'carousel-image' : 'carousel-image-disappear'"
                    alt="Foto voor bewegende carousel">
            </li>
        </ul>
    </div>
</template>

<script>
import Breadcrumbs from '../shared/Breadcrumbs.vue';

export default {
    name: "my-appointment",
    components: {
        Breadcrumbs
    },
    methods: {
        convertDateToString(date) {
            return `${date.getDate()} ${date.getMonth()} ${date.getFullYear()} om ${date.getHours()}:${date.getMinutes()}`;
        }, convertMonth(month) {
            switch (month) {
                case 0:
                    return "januari";
                case 1:
                    return "februari";
                case 2:
                    return "maart";
                case 3:
                    return "april";
                case 4:
                    return "mei";
                case 5:
                    return "juni";
                case 6:
                    return "juli";
                case 7:
                    return "augustus";
                case 8:
                    return "september";
                case 9:
                    return "oktober";
                case 10:
                    return "november";
                default:
                    return "december";
            }
        }
    },
    mounted() {
        // let d = this.$cookies.get("appDate");
        document.title = "Lash Room Deventer | Mijn afspraak";

        // Get appointment
        if (this.$shouldFetch) {
            fetch(`https://lashroomdeventer.nl/php/appointment_scripts/get_single_appointment.php?id=${this.$route.query.id}`)
                .then((response) => response.json())
                .then((data) => {
                    if (data.length > 0) {
                        this.firstname = data[0].firstname;
                        this.lastname = data[0].lastname;
                        this.date = this.convertDateToString(new Date(data[0].date_time * 1000));
                        this.email = data[0].email;
                        this.phone = data[0].phonenumber;
                        this.comments = data[0].comments;
                    }
                });
        }

        this.showAsyncData = true;

        // Create an interval where carousel image switches
        setInterval(() => {
            this.currentImage++;
            if (this.currentImage > this.carouselImages.length - 1)
                this.currentImage = 0;
        }, 5000);
    }, data() {
        return {
            firstname: undefined,
            lastname: undefined,
            date: undefined,
            email: undefined,
            phone: undefined,
            comments: undefined,
            showAsyncData: false,
            currentImage: 0,
            carouselImages: ["salon-2.jpg", "salon-3.jpg"],
            breadcrumbs: [{
                title: "Home",
                route: "/"
            }, {
                title: "Mijn afspraak",
                route: "/mijn-afspraak"
            }]
        }
    }
}
</script>

<style scoped>
.cst-container {
    box-sizing: border-box;
    text-align: left;
    background-color: var(--color-tint4);
    color: var(--color-dark-tint4);
}

.container-gray {
    background-color: var(--color-tint3);
}

@keyframes move-image {
    0% {
        transform: scale(102%);
    }

    100% {
        transform: 0;
    }
}

th,
td {
    padding: 1em;
    box-sizing: border-box;
    ;
}

table {
    border: 1px solid var(--color-tint1);
}

ul {
    position: relative;
}

ul,
li {
    width: 100%;
    position: relative;
    float: right;
    height: 850px;
    list-style: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

li {
    position: absolute;
    top: 0;
    right: 0;
}

.screen-size {
    width: 70%;
}

@media only screen and (max-width: 868px) {
    .screen-size {
        width: 100%;
    }
}
</style>