<template>
    <div class="container mobile-padding">
        <Breadcrumbs :breadcrumbs="breadcrumbs" class="hide-mobile" />
        <router-link to="/">
            <p class="show-mobile back-button">Terug</p>
        </router-link>
        <h1 class="no-top-margin">Over mij</h1>
        <p class="force-left-align">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ultrices sem erat, eu
            dapibus sem elementum eu.
            Mauris semper massa sed turpis pulvinar commodo. Nulla facilisi. Integer in erat commodo, porta orci nec, auctor
            augue. Quisque id tortor magna. Duis hendrerit, mi vel efficitur malesuada, leo orci ullamcorper justo, in
            placerat elit nisl et ligula. In accumsan, sem a ornare fringilla, est odio egestas ex, quis tincidunt nulla
            sapien ut ligula. Sed tempor elit nibh, non sagittis ipsum tristique sed. Integer odio nulla, pretium ut
            faucibus vel, hendrerit nec quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
            turpis egestas. Suspendisse sed leo iaculis, vehicula turpis eget, bibendum nibh. Etiam congue, quam in
            condimentum ullamcorper, sem eros sodales orci, ut rutrum turpis diam ac quam.</p>
        <p class="force-left-align">Morbi aliquam sit amet ante a sollicitudin. Nam eget quam risus. Phasellus leo arcu,
            pulvinar sed pharetra id,
            pulvinar a mi. Duis condimentum libero ut ante viverra ultrices. Nunc finibus massa varius suscipit ornare.
            Mauris aliquam ex urna, nec consectetur eros elementum nec. Vivamus ullamcorper velit neque, vitae placerat quam
            bibendum sed. Maecenas non lobortis felis, ac tincidunt tellus. Praesent at porta odio. Vivamus at leo in lectus
            feugiat malesuada.</p>
        <p class="force-left-align">Fusce convallis tellus eu risus vestibulum egestas. Ut quis est rhoncus, luctus est
            dapibus, consequat nisi.
            Integer facilisis sed turpis id congue. Aenean sagittis aliquam commodo. Fusce efficitur lorem eleifend ligula
            pulvinar, a scelerisque ipsum congue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
            cubilia curae; Aliquam urna sem, tristique in ex quis, rutrum pulvinar erat. Nam ullamcorper elementum velit vel
            cursus. Cras sed scelerisque nibh. Nulla at augue eget ex dictum dictum non vel est.</p>
        <p class="force-left-align">Morbi sed libero a massa venenatis porttitor quis in dui. Morbi maximus efficitur
            semper. Donec efficitur felis
            semper libero rutrum, ac dictum ipsum dignissim. Fusce a dui dolor. Proin ullamcorper non lacus sit amet dictum.
            Suspendisse dictum id odio at molestie. Aenean vel sodales mi. Cras lectus lacus, sagittis ut lectus vel,
            pretium scelerisque est.</p>
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
            ]
        }
    }, created() {
        document.title = "Lash Room Deventer | Over mij";
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
}</style>