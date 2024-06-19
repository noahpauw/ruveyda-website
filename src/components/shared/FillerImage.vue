<template>
    <div id="filler">
        <div class="shine position-relative">
            <!-- <video class="video-bg hide-mobile" muted autoplay loop id="videoMakeup" v-if="screenWidth >= 868">
                <source src="../../assets/videos/vid_makeup3.mp4" class="hide-mobile">
            </video> -->
            <div class="hover-darker"></div>
            <router-link to="/afspraak" class="link">
                <span class="site-button center">
                        PLAN DIRECT EEN AFSPRAAK
                </span>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "FillerImage",
    created() {
        document.addEventListener("scroll", this.updateParallax);
        window.addEventListener("resize", this.updateScreenSize);

        this.updateParallax();
        this.updateScreenSize();
    }, methods: {
        updateParallax() {
            const el = document.getElementById("filler");
            const elVideo = document.getElementById("videoMakeup");
            if (!el)
                return;

            const rect = el.getBoundingClientRect();
            const offset = rect.y / 64;

            el.style.backgroundPosition = `50% ${50 + offset}%`;

            if (!elVideo)
                return;

            if (this.screenWidth >= 868)
                elVideo.style.top = `${-50 - offset * 4}%`;
            return;
        }, updateScreenSize() {
            this.screenWidth = window.innerWidth;
        }
    }, mounted() {
        this.updateParallax();
    }, data() {
        return {
            screenWidth: 1920
        }
    }
}
</script>

<style scoped>
#filler {
    width: 100%;
    height: 600px;

    background-image: url("../../assets/salon-2.jpg");
    /* background-attachment: fixed; */
    background-position: 50% 50%;

    box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.5);
    position: relative;
}

.hover-darker {
    transition-duration: var(--transition-600ms);
    opacity: 0%;
    width: 100%;
    height: 100%;
    background-color: black;
    position: absolute;
    max-width: 1920px;
}

.video-bg {
    width: 100%;
    min-width: 1440px;
    position: absolute;
    left: 0;
    top: -50%;
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

.site-button:hover>.link {
    color: var(--color-dark-tint0);
}
</style>