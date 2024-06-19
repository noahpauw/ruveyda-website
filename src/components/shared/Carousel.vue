<template>
    <div class="carousel">
        <ul>
            <li v-for="(image, index) of imageList" :key="index">
                <img :src="require(`../../assets/${image}`)"
                    :class="currentIndex === index ? 'carousel-image' : 'carousel-image-disappear'"
                    alt="Foto voor bewegende carousel">
            </li>
        </ul>
        <i class="fa fa-chevron-right icon-right" @click="() => changeImage(1)"></i>
        <i class="fa fa-chevron-left icon-left" @click="() => changeImage(-1)"></i>
    </div>
</template>

<script>
export default {
    name: 'carousel-component',
    props: ["imageList"],
    data() {
        return {
            currentIndex: 0
        }
    },
    mounted() {

    }, methods: {
        changeImage(incrementation) {
            const len = this.imageList.length;
            this.currentIndex += incrementation;

            if (this.currentIndex > len - 1)
                this.currentIndex = 0;

            if (this.currentIndex < 0)
                this.currentIndex = len - 1;
        }
    }
}
</script>

<style scoped>
.carousel {
    width: 100%;
    height: 100vh;
    max-height: 960px;
    position: relative;
    display: inline-block;
    margin: 0;
    background-color: #fff;
}

.icon-right {
    position: absolute;
    right: 64px;
    top: 50%;
    font-size: 64px;
    color: white;
}

.icon-left {
    position: absolute;
    left: 64px;
    top: 50%;
    font-size: 64px;
    color: white;
}

@media only screen and (max-width: 868px) {
    .icon-left {
        font-size: 24px;
        left: 16px;
    }

    .icon-right {
        font-size: 24px;
        right: 16px;
    }
}

.fa {
    transition: transform var(--transition-150ms);
    cursor: pointer;
    filter: drop-shadow(2px 3px 16px #000);
}

.fa-chevron-right:hover {
    transform: translateX(6px);
}

.fa-chevron-right:active {
    transform: translateX(12px);
}

.fa-chevron-left:hover {
    transform: translateX(-6px);
}

.fa-chevron-left:active {
    transform: translateX(-12px);
}

ul,
li {
    margin: 0;
    padding: 0;
    list-style: none;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
}
</style>