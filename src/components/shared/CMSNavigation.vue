<template>
    <div class="col-12 col-lg-3 bg-light border border-dashed filler">
        <router-link to="/cms/home" class="cms-link p-3 d-block border-0 home"><i class="fa fa-home me-1"></i> Administratie</router-link>
        <router-link to="/cms/website-inhoud" class="cms-link p-3 d-block border-0 web-content"><i class="fa fa-pencil me-1"></i> Website inhoud</router-link>
        <router-link to="/cms/behandelingen" class="cms-link p-3 d-block border-0 treatments"><i class="fa fa-eye me-1"></i> Behandelingen</router-link>
        <router-link to="/" class="cms-link p-3 d-block border-0"><i class="fa fa-list me-1"></i> Afspraken beheren</router-link>
        <router-link to="/" class="cms-link p-3 d-block border-0"><i class="fa fa-hourglass me-1"></i> Openingstijden</router-link>
        <router-link to="/" class="cms-link p-3 d-block border-0"><i class="fa fa-plane me-1"></i> Vrije dagen</router-link>
        <router-link to="/" class="cms-link p-3 d-block border-0"><i class="fa fa-envelope me-1"></i> Contactformulier</router-link>
        <router-link to="/" class="cms-link p-3 d-block border-0"><i class="fa fa-cog me-1"></i> Instellingen</router-link>
        <div id="logout" class="cms-link p-3 d-block border-0 bg-dark text-white" role="button"><i class="fa fa-arrow-right me-1"></i> Uitloggen</div>
    </div>
</template>

<script type="text/javascript">
import $ from 'jquery';

export default {
    name: "cms-navigation",
    data() {
        return {
            routes: [],
        }
    },
    mounted() {
        this.routes["/cms/home"] = ".home";
        this.routes["/cms/website-inhoud"] = ".web-content";
        this.routes["/cms/behandelingen"] = ".treatments";

        $(this.routes[this.$route.fullPath]).addClass("bg-primary text-white");
    }
}
</script>

<style scoped>
.cms-link {
    margin-left:-12px !important;
    margin-right:-12px !important;
}
</style>