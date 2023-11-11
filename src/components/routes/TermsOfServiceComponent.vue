<template>
    <div class="container">
        <Breadcrumbs :breadcrumbs="breadcrumbs" />
        <h1 class="no-top-margin">Algemene voorwaarden</h1>
        <ul>
            <li>1. Opslag persoonsgegevens</li>
            <li class="indent-1em">1.1 Automatisch verwijderen persoonsgegevens</li>
            <li>2. Cookies</li>
            <li>3. Nog iets?</li>
        </ul>
        <h2>1. Opslag persoonsgegevens</h2>
        <p>Deze website slaat persoonsgegevens maximaal 2 weken op om afspraken in te plannen met personen. Hierbij wordt de
            volledige naam, het e-mailadres en het telefoonnummer van de persoon opgeslagen, alsmede de tijd en datum van de
            afspraak die de persoon heeft ingepland.</p>
        <h2>1.1 Automatisch verwijderen persoonsgegevens</h2>
        <p>
            Lash Room Deventer verwijdert persoonsgegevens twee weken na de opslag hiervan.
        </p>
        <h2>2. Cookies</h2>
        <p>
            Deze website gebruikt cookies om afspraken van personen tijdelijk op te slaan in de browser van de gebruiker. Op
            deze manier zullen gebruikers gemakkelijk bij hun eigen afspraak kunnen. Hierbij wordt alleen het unieke
            identificatienummer van de afspraak opgeslagen waar verder geen persoonsgegevens lokaal opgeslagen worden.
        </p>
        <h2>
            3. Nog iets?
        </h2>
        <p>Tot nu toe niet, maar dat kan altijd veranderen :)</p>
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
                    title: "Afpsraak maken",
                    route: "/afspraak"
                }, {
                    title: "Algemene voorwaarden",
                    route: "/algemene-voorwaarden"
                }
            ]
        }
    }
}
</script>

<style scoped>
.container {
    padding: 4em;
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