<template>
    <div class="cst-container marble mobile-padding">
        <div class="w-100 p-4 p-lg-5">
            <div class="p-0 p-lg-5">
                <div class="p-0 p-lg-5 py-3 py-lg-5 max-width-500">
                    <router-link to="/">
                        <p class="show-mobile back-button">Terug</p>
                    </router-link>
                    <h1 v-if="name" class="mb-5 display-1">Bedankt, {{ name }}!</h1>
                    <h1 v-else>Bedankt!</h1>
                    <div class="mx-auto">
                        <p>Je afspraak is succesvol bij ons aangemaakt! <span v-if="email">We hebben een bevestigingsmailtje
                                naar {{ email
                                }} verstuurd.</span></p>
                        <p>Ik zie je graag {{ date ? `op ${date} ` : "binnenkort" }}bij Lash Room Deventer! 😊</p>
                        <p>Klik <router-link to="/">hier</router-link> om terug te gaan naar de homepagina.</p>
                        <div class="full-width flex mt-5">
                            <img src="@/assets/lashroom_logo_full.png" class="logo-round mx-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "thanks-component",
    data() {
        return {
            name: undefined,
            date: undefined,
            email: undefined
        }
    }, mounted() {
        try {
            let local_appointment = JSON.parse(localStorage.getItem("local_appointment"));
            this.name = local_appointment.name;
            this.email = local_appointment.email;
            this.date = local_appointment.date;
        } catch(e) {
            console.log(e);
        }

        document.title = "Lash Room Deventer | Afspraak gepland"
    }, methods: {
        convertDateToString(date) {
            let newDate = new Date(date);
            return `${newDate.getDate()} ${newDate.getMonth()} ${newDate.getFullYear()}`;
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

.max-width-500{
    max-width:1000px;
    margin-left: auto;
    margin-right:auto;
}

.container-gray {
    background-color: var(--color-tint3);
}

.logo-round {
    width: 300px;
    border-radius: 50%;
    position: relative;
}
</style>