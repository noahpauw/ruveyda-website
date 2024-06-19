<template>
    <div class="cst-container">
        <div class="w-100 p-4 p-lg-5 position-relative">
            <img src="@/assets/lashroom_diamonds.png" class="position-absolute opacity-50 top-0 pe-none">
            <div class="p-0 p-lg-5">
                <div class="p-0 p-lg-5 py-3 py-lg-5">
                    <Breadcrumbs :breadcrumbs="breadcrumbs" />
                    <h1 class="no-top-margin display-1">Over mij</h1>
                    <div id="overMij">Hier kun je een korte introductie over jezelf geven.</div>
                    <h4 class="my-3">Met een kopje</h4>
                    <div id="overMij">Met contentblocks kun je dan verschillende soorten content toevoegen. Zoals afbeeldingen, tekstjes en zelfs video's!</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumbs from '../shared/Breadcrumbs.vue';
import $ from 'jquery';

export default {
    name: 'about-me',
    components: {
        Breadcrumbs
    }, data() {
        return {
            breadcrumbs: [
                {
                    title: "Home",
                    route: "/"
                },
                {
                    title: "Over mij",
                    route: "/aboutme"
                }
            ], aboutMeContent: ""
        }
    }, created() {
        document.title = "Lash Room Deventer | Over mij";

        $("#overMij").html("Dit is de over mij pagina");
        console.log($("#overMij"))

        if (this.$shouldFetch) {
            fetch('https://lashroomdeventer.nl/php/webcontent/get_webcontent.php')
                .then((response) => response.json())
                .then((data) => {
                    for (let i = 0; i < data.length; i++) {
                        let dat = data[i];
                        if (dat.heading === "over_mij")
                            document.getElementById("overMij").innerHTML = `<p>${dat.content}</p>`;
                    }
                });
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
    width: 100%;
}
</style>