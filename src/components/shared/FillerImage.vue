<template>
    <div id="filler">
        <div class="shine position-relative">
            <video class="video-bg hide-mobile" muted autoplay loop id="videoMakeup">
                <source src="../../assets/videos/vid_makeup3.mp4">
            </video>
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
    name: "FillerImage",
    created() {
        document.addEventListener("scroll", this.updateParallax);
    }, methods: {
        updateParallax() {
            const el = document.getElementById("filler");
            const elVideo = document.getElementById("videoMakeup");
            if (!el)
                return;

            const rect = el.getBoundingClientRect();
            const offset = rect.y / 32;

            el.style.backgroundPosition = `50% ${50 + offset}%`;
            elVideo.style.top = `${-50 - offset * 4}%`;
            return;
        }
    }, mounted() {
        this.updateParallax();
    }
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
    transition-duration: var(--transition-600ms);
    opacity: 0%;
    width: 100%;
    height: 400px;
    background-color: black;
    position: absolute;
    max-width: 1920px;
}

.position-relative {
    position: relative;
    overflow: hidden;
}

.video-bg {
    width: 100%;
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