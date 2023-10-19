<template>
    <div class="gallery">
        <div v-for="picture in pictures" :key="picture" class="pic-third">
            <img :src="picture" class="picture">
        </div>
    </div>
</template>

<script setup>
const pictures = [
    "https://www.juviasplace.com/cdn/shop/products/B0007292-1copy_1080x.jpg?v=1653779095",
    "https://assets.teenvogue.com/photos/5e3c642acffc940008b611f2/16:9/w_2560%2Cc_limit/GettyImages-1051788430.jpg",
    "https://www.xxllashes.com/media/images/org/EyelashExtensionKitblack.jpg",
    "https://m.media-amazon.com/images/I/71t+VBFYnbL.jpg",
    "https://dependcosmetic.com/wp-content/uploads/2022/04/PE-Brow-Lift-Illusion.jpg",
    "https://waxandbrowhouse.nl/wp-content/uploads/2023/05/Image-5.jpeg"
]
</script>

<script>
export default {
    name: "picture-gallery"
}
</script>

<style scoped>
.absolute {
    position: absolute;
}

.gallery {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    flex-shrink: 0;
    gap: 4px;
    position: relative;
    /* filter: saturate(60%); */
    overflow: hidden;
    box-shadow: 2px 4px 40px rgba(0, 0, 0, 0.1);
}

.picture {
    width: 100%;
    height: 420px;
    object-fit: cover;
    display: block;
}

.pic-third {
    width: 49.7%;
}
</style>