<template>
    <div class="cst-container">
        <div class="w-100 p-4 p-lg-5 position-relative">
            <div class="p-0 p-lg-5">
                <div class="p-0 p-lg-5 py-3 py-lg-5">
                    <Breadcrumbs :breadcrumbs="breadcrumbs" />
                    <h1 class="no-top-margin display-1">Administratie</h1>
                    <div class="row row-cols-1 row-cols-lg-2">
                        <CMSNavigation/>
                        <div class="col-12 col-lg-9 p-2 p-lg-5 mt-3 mt-lg-0">
                            <h2>Het administratiepaneel gebruiken</h2>
                            <p>Nu je bent ingelogd, kun je je website en je bedrijf makkelijk beheren. Deze omgeving heet ook wel een <strong>CMS</strong>, oftewel een Customer Management System.</p>
                            <h2>Website inhoud</h2>
                            <p>Op deze pagina kun je verschillende onderdelen van je website aanpassen.</p>
                            <ul>
                                <li>De titel en stukken tekst op de pagina aanpassen</li>
                                <li>Afbeeldingen aanpassen</li>
                                <li>Je telefoonnummer, adres en e-mailadres wijzigen</li>
                            </ul>
                            <h2>Behandelingen</h2>
                            <p>Voeg hier alle behandelingen toe die je uitvoert. Je kunt hierbij aangeven hoe lang deze duren en hoeveel deze kosten.</p>
                            <h2>Openingstijden</h2>
                            <p>Pas hier je openingstijden aan. Vrije dagen kun je op een andere pagina toevoegen.</p>
                            <h2>Vrije dagen</h2>
                            <p>Geef hier al vantevoren aan op welke dagen je gesloten bent.</p>
                            <h2>Contactformulier</h2>
                            <p>Beheer hier alle antwoorden die via het contactformulier worden ingezonden. Je kunt hier ook direct reageren op de verzender. E-mails worden verzonden via info@lashroomdeventer.nl</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumbs from '@/components/shared/Breadcrumbs.vue';
import CMSNavigation from '@/components/shared/CMSNavigation.vue';
import $ from 'jquery';

export default {
    name: 'about-me',
    components: {
        Breadcrumbs,
        CMSNavigation,
    }, data() {
        return {
            breadcrumbs: [
                {
                    title: "Home",
                    route: "/"
                },
                {
                    title: "Administratie",
                    route: "/cms/home"
                }
            ],
            contentblocks: [],
        }
    }, created() {
        document.title = "Lash Room Deventer | Administratie";
    }, mounted() {
        let user_id = localStorage.getItem("user_id");
        
        $("#logout").on("click", (e) => {
            console.log("CLICK!");
            e.preventDefault();
            
            var settings = {
                'cache': false,
                'dataType': "json",
                "async": true,
                "url": `https://www.lashroomdeventer.nl/ruveyda-website/webcontent/auth/logout.php?user_id=${user_id}`,
                "method": "POST",
            }

            $.ajax(settings)
                .done((e) => {
                    if(e.success) {
                        localStorage.removeItem("user_id");
                        this.$router.push("/");
                    }
                });
        });
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