<template>
    <div class="container mobile-padding">
        <Breadcrumbs :breadcrumbs="breadcrumbs" class="hide-mobile" />
        <router-link to="/">
            <p class="show-mobile back-button">Terug</p>
        </router-link>
        <h1 class="no-top-margin">Jouw afspraak</h1>
        <div v-if="firstname">
            <h2 class="force-left-align">Welkom, {{ firstname }}</h2>
            <p class="force-left-align">Je hebt een afpsraak bij ons gepland. Bekijk de gegevens hiervan hieronder.</p>
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
                <tr>
                    <th>Opmerkingen</th>
                    <td>{{ comments }}</td>
                </tr>
            </table>
            <h2 class="force-left-align">Annulering</h2>
            <p class="force-left-align">Mocht je onverhoopt toch niet kunnen op deze datum en tijd, neem dan contact met mij
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
            <p>Op dit moment heb je nog geen afspraak bij ons staan óf deze is niet opgeslagen als een cookie.</p>
            <p>Klopt dit niet? Gebruik dan de link die je in je bevestigingsmailtje hebt ontvangen!</p>
            <p>Of <router-link to="/afspraak">maak een afspraak</router-link>!</p>
        </div>
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
            console.log(date);
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
        let d = this.$cookies.get("appDate");
        console.log(d);

        console.log("--------------------------------------");
        const d2 = new Date(parseInt(d) * 1000);
        console.log(d2);

        this.firstname = this.$cookies.get("appFirstname");
        this.lastname = this.$cookies.get("appLastname");
        this.email = this.$cookies.get("appEmail");
        this.date = `${d2.getDate()} ${this.convertMonth(d2.getMonth())} ${d2.getFullYear()} om ${d2.getHours()}:${d2.getMinutes() < 10 ? "0" + d2.getMinutes() : d2.getMinutes()}`;
        this.phone = this.$cookies.get("appPhone");
        this.comments = this.$cookies.get("appComments");
        document.title = "Lash Room Deventer | Mijn afspraak";
    }, data() {
        return {
            firstname: undefined,
            lastname: undefined,
            date: undefined,
            email: undefined,
            phone: undefined,
            comments: undefined,
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

th,
td {
    padding: 1em;
    box-sizing: border-box;
    ;
}

table {
    border: 1px solid var(--color-tint1);
}
</style>