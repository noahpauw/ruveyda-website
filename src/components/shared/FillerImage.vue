<template>
    <div id="filler">
        <div class="shine">
            <div class="hover-darker"></div>
            <span class="site-button center">
                <router-link to="/afspraak" class="link">
                    PLAN DIRECT EEN AFSPRAAK
                </router-link>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "FillerImage"
}
</script>

<style scoped>
#filler {
    width: 100%;
    height: 400px;

    background-image: url("../../assets/salon-2.jpg");
    /* background-attachment: fixed; */
    background-position: 50% 50%;

    box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.5);
}

.hover-darker {
    transition-duration: var(--transition-300ms);
    opacity: 25%;
    width: 1920px;
    height: 400px;
    background-color: black;
    position: absolute;
}

.shine:hover>.hover-darker {
    opacity: 50%;
}

.center {
    position: relative;
    top: 50%;
}

a {
    text-decoration: none;
}

.link {
    color: var(--color-tint5);
}

.site-button:hover > .link {
    color: var(--color-dark-tint0);
}
</style>