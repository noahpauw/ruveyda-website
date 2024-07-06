<template>
    <div class="my-4 fade-in">
        <h5>Titel</h5>
        <input type="text" class="form-control rounded-0" :value="title" placeholder="Bijv. Lash Lift">
        <h5 class="mt-2">Inhoud</h5>
        <textarea class="form-control rounded-0" rows="5" :value="description" style="resize: none"
            placeholder="Een beschrijving van de behandeling"></textarea>
        <h5 class="mt-2">Prijs</h5>
        <div class="row m-0">
            <div class="col-1 bg-dark text-white p-0">
                <h5 class="mt-2 mb-0 ms-2">&euro;</h5>
            </div>
            <div class="col p-0">
                <input type="number" :value="price" min="0" step="0.01" class="form-control rounded-0" placeholder="0,00">
            </div>
        </div>
        <div class="form-check my-4 h5">
            <input class="form-check-input" type="checkbox" value="1" checked id="flexCheckDefault">
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
                <input type="number" :value="duration_minutes" min="0" step="1" class="form-control rounded-0" placeholder="Minuten">
            </div>
        </div>
        <h5 class="mt-2">Achtergrond</h5>
        <div class="row">
            <div class="col" v-for="(b, index) in backgrounds" :key="b" @click="() => chosenBackground = index">
                <div :class="['rounded-1 block p-3', b, index === chosenBackground ? 'border-chosen' : '']"></div>
            </div>
        </div>
        <div class="btn btn-dark rounded-0 mt-3 p-3 py-2"><i class="fa fa-save me-1"></i> Opslaan</div>
        <div class="ms-2 btn btn-danger rounded-0 mt-3 p-3 py-2"><i class="fa fa-trash"></i></div>
        <hr/>
    </div>
</template>

<script type="text/javascript">
export default {
    name: 'treatment-component',
    props: ['id', 'title', 'description', 'background', 'price', 'show_on_website', 'duration_minutes'],
    data() {
        return {
            backgrounds: ['bg-light', 'bg-diamonds', 'bg-dark', 'bg-diamonds-dark', 'bg-stripes'],
            chosenBackground: 0,
        }
    }
}
</script>

<style scoped>
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