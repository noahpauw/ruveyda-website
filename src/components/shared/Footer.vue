<template>
    <div class="cst-container shine shine-subtle">
        <p>© Lash Room Deventer {{ currentYear }}</p>
    </div>
</template>

<script>
export default {
    name: "footer-bottom",
    data() {
        return {
            currentYear: new Date().getFullYear(),
        }
    }
}
</script>

<style scoped>
.cst-container {
    background-color: var(--color-dark-tint0);
    color: var(--color-tint5);
    padding: 3em;
    display: flex;
    justify-content: center;
    box-sizing: border-box;
}
</style>