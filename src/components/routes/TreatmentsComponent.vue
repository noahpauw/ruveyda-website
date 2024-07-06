<template>
    <div class="cst-container bg-plus">
        <div class="w-100 p-4 p-lg-5 position-relative">
            <div class="p-0 p-lg-5">
                <div class="p-0 p-lg-5 py-3 py-lg-5">
                    <Breadcrumbs :breadcrumbs="breadcrumbs" />
                    <h1 class="force-left-align display-1">Behandelingen</h1>
                </div>
            </div>
        </div>

        <template v-for="treatment in treatments" :key="treatment">
            <div :class="['w-100 px-4 px-lg-5 text-start position-relative py-0 treatment', treatment.background]">
                <div class="p-0 p-lg-5">
                    <div class="p-0 p-lg-5 py-5">
                        <h2 class="mt-lg-3">{{ treatment.title }}</h2>
                        <hr/>
                        <div v-html="treatment.description"></div>
                        <router-link to="/afspraak" class="btn btn-dark rounded-0 mt-3"><i class="fa fa-arrow-right"></i>&nbsp;INPLANNEN</router-link>
                    </div>
                </div>
            </div>
        </template>
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
            }],
            treatments: [],
        }
    }, components: {
        Breadcrumbs
    },
    methods: {
        getTreatments() {
            fetch("https://www.lashroomdeventer.nl/ruveyda-website/webcontent/treatments/get_treatments.php")
            .then((response) => response.json())
            .then((data) => {
                this.treatments = data;
                for(let i = 0; i < this.treatments.length; i++) {
                    this.treatments[i].collapsed = true;
                }
            });
        },
    },
    mounted() {
        this.getTreatments();
    }
}
</script>

<style scoped>
h1 {
    text-align: left;
    margin-top: 0;
}

.bg-dark, .bg-diamonds-dark {
    color: #fff !important;
}

.treatment {
    border-top: 1px solid #00000011;
}

.cst-container {
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