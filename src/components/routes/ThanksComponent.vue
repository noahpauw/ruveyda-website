<template>
    <div class="container marble">
        <h1 v-if="name">Bedankt, {{ name }}!</h1>
        <h1 v-else>Bedankt!</h1>
        <p>Je afspraak is succesvol bij ons aangemaakt! <span v-if="email">We hebben een bevestigingsmailtje naar {{ email }} verstuurd.</span></p>
        <p>Ik zie je graag {{ date ? `op ${date} ` : "binnenkort" }} bij Lash Room Deventer! 😊</p>
        <p>Klik <router-link to="/">hier</router-link> om terug te gaan naar de homepagina.</p>
        <div>
            <img src="../../assets/lashroom_logo_full.png" class="logo-round">
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
        this.name = this.$cookies.get("appFirstname");
        this.email = this.$cookies.get("appEmail");
        this.date = this.$cookies.get("appDate");
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

.logo-round {
    width: 300px;
    border-radius: 50%;
    position: relative;
}
</style>