<template>
    <div class="cst-container">
        <div class="w-100 p-4 p-lg-5 position-relative">
            <img src="@/assets/lashroom_diamonds.png" class="position-absolute opacity-50 top-0 pe-none">
            <div class="p-0 p-lg-5">
                <div class="p-0 p-lg-5 py-3 py-lg-5">
                    <Breadcrumbs :breadcrumbs="breadcrumbs" />
                    <h1 class="no-top-margin display-1">Over mij</h1>
                    <div v-for="block in contentblocks" v-html="block.content" :key="block.id">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumbs from '../shared/Breadcrumbs.vue';

export default {
    name: 'about-me',
    components: {
        Breadcrumbs
    }, data() {
        return {
            breadcrumbs: [
                {
                    title: "Home",
                    route: "/"
                },
                {
                    title: "Over mij",
                    route: "/aboutme"
                }
            ],
            contentblocks: [],
        }
    }, created() {
        document.title = "Lash Room Deventer | Over mij";

        fetch('https://lashroomdeventer.nl/ruveyda-website/webcontent/get_webcontent.php?route=aboutme')
            .then((response) => response.json())
            .then((data) => {
                for(let i = 0; i < data.length; i++) {
                    switch(data[i].contentType) {
                        default:
                            data[i].content = `<p>${data[i].content}</p>`;
                            break;
                        case 'title':
                            data[i].content = `<h1 class='display-1'>${data[i].content}</h1>`;
                            break;
                        case 'header':
                            data[i].content = `<h3>${data[i].content}</h3>`;
                            break;
                    }
                }
                this.contentblocks = data;
            });
        
    }
}
</script>

<style scoped>
.cst-container {
    box-sizing: border-box;
    text-align: left;
    background-color: var(--color-tint4);
    color: var(--color-dark-tint4);
    width: 100%;
}
</style>