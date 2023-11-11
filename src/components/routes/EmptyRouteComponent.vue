<template>
    <div class="container">
        <h1>Oeps... hier is nog niks</h1>
        <p>Er wordt nog aan deze pagina gewerkt. Kom binnenkort terug!</p>
    </div>
</template>

<script>
export default {
    name: "empty-route",
    created() {
        document.title = "Lash Room Deventer | 404";
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
</style>