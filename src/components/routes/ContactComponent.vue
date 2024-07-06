<template>
    <div class="cst-container bg-plus">
        <div class="w-100 p-4 p-lg-5 position-relative">
            <div class="p-0 p-lg-5">
                <div class="p-0 p-lg-5 py-3 py-lg-5">
                    <Breadcrumbs :breadcrumbs="breadcrumbs" />
                    <h1 class="no-top-margin display-1 border-0">Contact</h1>
                    <div class="row row-cols-1 row-cols-xl-2 border-top">
                        <div class="col bg-white p-2 p-sm-3 p-lg-4">
                            <p>Neem via het contactformulier contact met mij op.</p>

                            <div class="row mb-2">
                                <div class="col-12 col-md-2">
                                    <strong>Naam</strong>
                                </div>
                                <div class="col">
                                    <input type="text" name="name" class="form-control rounded-0">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-md-2">
                                    <strong>E-mailadres</strong>
                                </div>
                                <div class="col">
                                    <input type="email" name="email" class="form-control rounded-0">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-md-2">
                                    <strong>Telefoon</strong>
                                </div>
                                <div class="col">
                                    <input type="phone" name="phone" class="form-control rounded-0">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-md-2">
                                    <strong>Bericht</strong>
                                </div>
                                <div class="col">
                                    <textarea class="form-control rounded-0" rows="6"></textarea>
                                </div>
                            </div>

                            <button class="site-button-square mt-2 float-end">VERSTUREN</button>
                        </div>

                        <div class="col mt-4 mt-lg-0 p-2 p-sm-3 p-lg-4">
                            <p>...of neem direct contact op.</p>
                            <div class="row row-cols-2">
                                <p class="col-5 col-xl-4 fw-bold">
                                    Telefoonnummer
                                </p>
                                <p class="col">0612345678</p>
                            </div>
                            <div class="row row-cols-2">
                                <p class="col-5 col-xl-4 fw-bold">
                                    E-mailadres
                                </p>
                                <p class="col">info@lashroomdeventer.nl</p>
                            </div>
                            <div class="row row-cols-2">
                                <p class="col-5 col-xl-4 fw-bold">
                                    Instagram
                                </p>
                                <p class="col"><a href="https://www.instagram.com/lashroomdeventerr/">@lashroomdeventerr</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.cst-container {
    box-sizing: border-box;
    text-align: left;
    background-color: var(--color-tint4);
    color: var(--color-dark-tint4);
    width: 100%;
}

.form-control {
    font-family: var(--main-font);
    resize: none;
}
</style>

<script type="text/javascript">
import Breadcrumbs from '../shared/Breadcrumbs.vue';
export default {
    name: "contact-view",
    components: {
        Breadcrumbs
    },
    data() {
        return {
            breadcrumbs: [
                {
                    title: "Home",
                    route: "/"
                },
                {
                    title: "Contact",
                    route: "/contact"
                }
            ]
        }
    }
}
</script>