<template>
    <div class="cst-container bg-plus">
        <div class="w-100 p-4 p-lg-5 position-relative">
            <div class="p-0 p-lg-5">
                <div class="p-0 p-lg-5 py-3 py-lg-5">
                    <Breadcrumbs :breadcrumbs="breadcrumbs" class="hide-mobile" />
                    <h1 class="no-top-margin display-1">Algemene voorwaarden</h1>
                    <ul>
                        <li>1. Opslag persoonsgegevens</li>
                        <li class="indent-1em">1.1 Automatisch verwijderen persoonsgegevens</li>
                        <li>2. Cookies</li>
                        <li>3. Annulering</li>
                    </ul>
                    <h2>1. Opslag persoonsgegevens</h2>
                    <p>Deze website slaat persoonsgegevens minimaal en maximaal tot de datum en tijd van de door de
                        gebruiker geplande
                        afspraak op. Hierbij wordt de
                        volledige naam, het e-mailadres en het telefoonnummer van de persoon opgeslagen, alsmede de tijd en
                        datum van de
                        afspraak die de persoon heeft ingepland.</p>
                    <h2>1.1 Automatisch verwijderen persoonsgegevens</h2>
                    <p>
                        Lash Room Deventer verwijdert persoonsgegevens direct na de datum en tijd van de daarbijhorende
                        afspraak.
                    </p>
                    <h2>2. Cookies</h2>
                    <p>
                        Deze website gebruikt cookies om afspraken van personen tijdelijk op te slaan in de browser van de
                        gebruiker. Op
                        deze manier zullen gebruikers gemakkelijk bij hun eigen afspraak kunnen. Hierbij wordt alleen het
                        unieke
                        identificatienummer van de afspraak opgeslagen waar verder geen persoonsgegevens lokaal opgeslagen
                        worden.
                    </p>
                    <h2>
                        3. Annulering
                    </h2>
                    <p>Gelieve bij annulering van een afspraak <u>minimaal 24 uur vantevoren</u> telefonisch contact opnemen
                        met Lash
                        Room Deventer. Ik ben tijdens werktijden beschikbaar.</p>
                    <p>Telefoonnummer: {{ phonenumber }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumbs from "../shared/Breadcrumbs.vue";

export default {
    name: "terms-of-service",
    components: {
        Breadcrumbs
    },
    created() {
        document.title = "Lash Room Deventer | Algemene voorwaarden";
    },
    data() {
        return {
            breadcrumbs: [
                {
                    title: "Home",
                    route: "/"
                }, {
                    title: "Afspraak maken",
                    route: "/afspraak"
                }, {
                    title: "Algemene voorwaarden",
                    route: "/algemene-voorwaarden"
                }
            ], phonenumber: "0612345678"
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

.container-gray {
    background-color: var(--color-tint3);
}

ul,
li {
    list-style: none;
    padding: 0;
}

li {
    padding-bottom: 1em;
}

.indent-1em {
    margin-left: 1em;
}
</style>