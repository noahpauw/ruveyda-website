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
            <div :class="['w-100 px-4 px-lg-5 text-start position-relative py-0 border-bottom border-subtle', treatment.text, treatment.background]">
                <div class="p-0 p-lg-5">
                    <div class="p-0 p-lg-5 py-3 py-lg-5">
                        <h2 class="mt-3">{{ treatment.title }}</h2>
                        <div v-html="treatment.description"></div>
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
            treatments: [
                {
                    title: "One By One lashes",
                    description: "<p>De One by One methode zorgt voor een elegante en natuurlijke look! Per natuurlijke wimperhaar wordt één enkele wimperextension geplaatst.</p><p>Deze behandelmethode is het meest geschikt voor mensen die veel wimpers van zichzelf hebben, maar meer lengte willen creëren of voor mensen die een natuurlijke en volle uitstraling willen.</p>",
                    background: 'bg-dark',
                    text: 'text-light',
                },
                {
                    title: "Lashlift | Browlift",
                    description: "<p>De One by One methode zorgt voor een elegante en natuurlijke look! Per natuurlijke wimperhaar wordt één enkele wimperextension geplaatst.</p><p>Deze behandelmethode is het meest geschikt voor mensen die veel wimpers van zichzelf hebben, maar meer lengte willen creëren of voor mensen die een natuurlijke en volle uitstraling willen.</p>",
                    background: 'bg-light',
                    text: 'text-dark',
                }
            ]
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