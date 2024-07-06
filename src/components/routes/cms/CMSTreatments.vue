<template>
    <div class="cst-container">
        <div class="w-100 p-4 p-lg-5 position-relative">
            <div class="p-0 p-lg-5">
                <div class="p-0 p-lg-5 py-3 py-lg-5">
                    <Breadcrumbs :breadcrumbs="breadcrumbs" />
                    <h1 class="no-top-margin display-1">Behandelingen</h1>
                    <div class="row row-cols-1 row-cols-lg-2">
                        <CMSNavigation />
                        <div class="col-12 col-lg-9 p-0 p-lg-5 mt-3 mt-lg-0">
                            <router-link class="btn btn-xs btn-secondary rounded-0 mb-2" to="/behandelingen"><i class="fa fa-eye me-1"></i>Bekijken op website</router-link>
                            <p>Hier vind je alle behandelingen die je uitvoert bij klanten. Je kunt hier ook nieuwe
                                behandelingen toevoegen of bestaande behandelingen wijzigen/verwijderen.</p>
                            <p>Deze behandelingen komen op de <b class="fw-bold">Behandelingen</b> pagina, maar ook op de <b
                                    class="fw-bold">Afspraak maken</b> pagina.</p>
                            <div class="btn btn-dark rounded-0 p-3" @click="createNew"><i class="fa fa-plus me-1"></i>
                                Behandeling toevoegen</div>
                            <template v-for="(t, index) in treatments" :key="index">
                                <div class="my-4 fade-in">
                                    <template v-if="!t.collapsed">
                                        <h5 class="click-to-open m-0 p-2" @click="() => openTreatment(-1)">
                                            {{ t.title.length > 0 ? t.title : '&nbsp;' }}
                                            <i class="fa fa-chevron-up float-end"></i>
                                        </h5>
                                        <hr class="m-0 mb-3" />
                                        <h5>Titel</h5>
                                        <input type="text" class="form-control rounded-0" :value="t.title"
                                            placeholder="Bijv. Lash Lift" @input="(e) => t.title = e.target.value">
                                        <h5 class="mt-2">Inhoud</h5>
                                        <textarea class="form-control rounded-0" rows="5" :value="t.description"
                                            @input="(e) => t.description = e.target.value" style="resize: none"
                                            placeholder="Een beschrijving van de behandeling"></textarea>
                                        <h5 class="mt-2">Prijs</h5>
                                        <div class="row m-0">
                                            <div class="col-1 bg-dark text-white p-0">
                                                <h5 class="mt-2 mb-0 ms-2">&euro;</h5>
                                            </div>
                                            <div class="col p-0">
                                                <input type="number" :value="t.price" min="0" step="0.01"
                                                    class="form-control rounded-0" placeholder="0,00"
                                                    @input="(e) => t.price = e.target.value">
                                            </div>
                                        </div>
                                        <div class="form-check my-4 h5">
                                            <input class="form-check-input" type="checkbox" value="1" :checked="t.show_on_website"
                                                id="flexCheckDefault" @input="(e) => t.show_on_website = e.target.value">
                                            <label class="form-check-label mt-1" for="flexCheckDefault">
                                                Prijs tonen op website
                                            </label>
                                        </div>
                                        <h5 class="mt-2">Duur behandeling (in minuten)</h5>
                                        <div class="row m-0">
                                            <div class="col-1 bg-dark text-white p-0">
                                                <h5 class="mt-2 mb-0 ms-2"><i class="fa fa-hourglass-o"></i> </h5>
                                            </div>
                                            <div class="col p-0">
                                                <input type="number" :value="t.duration_minutes" min="0" step="1"
                                                    class="form-control rounded-0" placeholder="Minuten"
                                                    @input="(e) => t.duration_minutes = e.target.value">
                                            </div>
                                        </div>
                                        <h5 class="mt-2">Achtergrond</h5>
                                        <div class="row">
                                            <div class="col" v-for="(b, index) in backgrounds" :key="index"
                                                @click="() => t.background = b">
                                                <div
                                                    :class="['rounded-1 block p-3', b, t.background === b ? 'border-chosen' : '']">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn btn-dark rounded-0 mt-3 p-3 py-2" @click="saveTreatments"><i
                                                class="fa fa-save me-1"></i>
                                            Opslaan</div>
                                        <div class="ms-2 btn btn-danger rounded-0 mt-3 p-3 py-2"
                                            @click="() => removeTreatment(t)"><i class="fa fa-trash"></i>
                                        </div>
                                        <hr />
                                    </template>
                                    <template v-else>
                                        <h5 class="click-to-open m-0 p-2" @click="() => openTreatment(t)">
                                            {{ t.title.length > 0 ? t.title : '&nbsp;' }}
                                            <i class="fa fa-chevron-down float-end"></i>
                                        </h5>
                                        <hr class="m-0" />
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
/*eslint-disable*/
import $ from 'jquery';
import CMSNavigation from '@/components/shared/CMSNavigation.vue';

export default {
    name: 'cms-treatments',
    data() {
        return {
            treatments: [],
            backgrounds: ['bg-light', 'bg-diamonds', 'bg-dark', 'bg-diamonds-dark', 'bg-stripes', 'marble', 'bg-sade'],
        }
    },
    components: {
        CMSNavigation,
    },
    methods: {
        createNew() {
            this.treatments.push({
                id: -1,
                title: "",
                description: "",
                price: null,
                show_on_website: 1,
                duration_minutes: null,
                background: "bg-light",
                collapsed: false,
            })
        },
        removeTreatment(treatment) {
            this.treatments.splice(this.treatments.indexOf(treatment), 1);
        },
        saveTreatments() {
            this.treatments.forEach((t) => {
                let user_id = localStorage.getItem("user_id");

                var settings = {
                    'cache': false,
                    'dataType': "json",
                    "async": true,
                    "url": `https://www.lashroomdeventer.nl/ruveyda-website/webcontent/treatments/add_treatment.php?user_id=${user_id}
                    &id=${t.id}&title=${t.title}&description=${t.description.replace(/\n\r?/g, '<br />')}&background=${t.background}&price=${t.price}&show_on_website=${t.show_on_website}&duration_minutes=${t.duration_minutes}&priority=${this.treatments.indexOf(t)}`,
                    "method": "POST",
                }

                $.ajax(settings);
            });
        },
        getTreatments() {
            fetch("https://www.lashroomdeventer.nl/ruveyda-website/webcontent/treatments/get_treatments.php")
            .then((response) => response.json())
            .then((data) => {
                this.treatments = data;
                for(let i = 0; i < this.treatments.length; i++) {
                    this.treatments[i].collapsed = true;
                }
            });
        },
        openTreatment(t) {
            for(let i = 0; i < this.treatments.length; i++) {
                this.treatments[i].collapsed = true;
                if(this.treatments.indexOf(t) === i) {
                    this.treatments[i].collapsed = false;
                }
            }
        }
    },
    mounted() {
        this.getTreatments();
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

.fade-in {
    animation: fade 500ms ease-in-out forwards;
}

@keyframes fade {
    0% {
        transform: translateX(-8px);
        opacity: 0;
    }

    100% {
        transform: 0;
        opacity: 1;
    }
}

.click-to-open {
    cursor: pointer;
}
.click-to-open:hover {
    background-color: #00000011;
}

.block {
    width: 100%;
    /* height: 80px; */
    border: 1px solid #00000033;
    aspect-ratio: 1/1;
    transition: border-color 300ms, border 150ms;
    cursor: pointer;
}

.border-chosen {
    border-color: #ff2288;
    border-width: 3px;
}

.prepend {
    width: 3em !important;
}

.block {
    width: 100%;
    /* height: 80px; */
    border: 1px solid #00000033;
    aspect-ratio: 1/1;
    transition: border-color 300ms, border 150ms;
}

.border-chosen {
    border-color: #ff2288;
    border-width: 3px;
}

.prepend {
    width: 3em !important;
}

</style>