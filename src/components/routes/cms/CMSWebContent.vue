<template>
    <div class="cst-container">
        <div class="w-100 p-4 p-lg-5 position-relative">
            <div class="p-0 p-lg-5">
                <div class="p-0 p-lg-5 py-3 py-lg-5">
                    <Breadcrumbs :breadcrumbs="breadcrumbs" />
                    <h1 class="no-top-margin display-1">Website inhoud</h1>
                    <div class="row row-cols-1 row-cols-lg-2">
                        <CMSNavigation/>
                        <div class="col-12 col-lg-9 p-2 p-lg-5 mt-3 mt-lg-0">
                            <h2>Pagina's</h2>
                            <p>Klik op een pagina om de inhoud van deze pagina aan te passen.</p>
                            <table class="table table-hover border border-dashed">
                                <thead>
                                    <tr>
                                        <th>Pagina naam</th>
                                        <th>Route</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="page in pages" :key="page" @click="() => loadWebcontent(page.name, page.route)">
                                        <td class="project-title" role="button">{{ page.name }}</td>
                                        <td class="project-title" role="button">/{{ page.route }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Aanpassen contentblocks -->
                            <div id="allContentBlocks">
                                <h2 id="currentRoute"></h2>
                                <form method="POST" action="https://www.lashroomdeventer.nl/ruveyda-website/webcontent/save_contentblock.php" v-for="(block, index) in contentblocks" :key="contentblocks.indexOf(block)" class="fade-in">
                                    <h5>{{ blocks[block.contentType] }}</h5>
                                    <input type="hidden" name="id" :value="block.id">
                                    <input type="hidden" name="priority" :value="index">
                                    <input name="content" type="text" class="form-control rounded-0" :value="block.content" @input="(e) => block.content = e.target.value" v-if="block.contentType === 'header' || block.contentType === 'title'">
                                    <textarea name="content" class="form-control rounded-0" rows="4" :value="block.content" @input="(e) => block.content = e.target.value" v-if="block.contentType === 'paragraph'"></textarea>
                                    <div type="submit" class="btn btn-dark rounded-0 border border-light mt-1 mb-3" @click="() => swapContent(-1, block)"><i class="fa fa-chevron-up"></i></div>
                                    <div type="submit" class="btn btn-dark rounded-0 border border-light mt-1 mb-3" @click="() => swapContent(+1, block)"><i class="fa fa-chevron-down"></i></div>
                                    <div type="submit" class="btn btn-danger rounded-0 border border-light mt-1 mb-3" @click="() => deleteContentblock(block)"><i class="fa fa-trash"></i></div>
                                    <div type="submit" class="btn btn-dark rounded-0 border border-light mt-1 mb-3 float-end contentblock" @click="saveContentblocks"><i class="fa fa-save me-1"></i> OPSLAAN</div>
                                </form>
                                <div class="row row-cols-2 row-cols-md-4 m-0 p-0">
                                    <div class="col btn btn-dark rounded-0 border border-light" @click="() => addContentblock('title')"><i class="fa fa-plus me-1"></i>Titel</div>
                                    <div class="col btn btn-dark rounded-0 border border-light" @click="() => addContentblock('header')"><i class="fa fa-plus me-1"></i>Tussenkopje</div>
                                    <div class="col btn btn-dark rounded-0 border border-light" @click="() => addContentblock('paragraph')"><i class="fa fa-plus me-1"></i>Paragraaf</div>
                                    <div class="col btn btn-dark rounded-0 border border-light" @click="() => addContentblock('image')"><i class="fa fa-plus me-1"></i>Foto</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumbs from '@/components/shared/Breadcrumbs.vue';
import CMSNavigation from '@/components/shared/CMSNavigation.vue';
import $ from 'jquery';

export default {
    name: 'about-me',
    components: {
        Breadcrumbs,
        CMSNavigation
    }, data() {
        return {
            breadcrumbs: [
                {
                    title: "Home",
                    route: "/"
                },
                {
                    title: "Website inhoud",
                    route: "/cms/website-inhoud"
                }
            ],
            pages: [{name: "Home", route: ""},
                {name: "Over mij", route: "aboutme"},
                {name: "Afspraak maken", route: "afspraak"},
                {name: "Mijn afspraak", route: "mijn-afspraak"},
                {name: "Behandelingen", route: "behandelingen"},
                {name: "Contact", route: "contact"},
                {name: "Algemene voorwaarden", route: "algemene-voorwaarden"}
            ],
            contentblocks: [],
            blocks:[],
            currentRoute: "",
            currentRoutename: "",
        }
    }, created() {
        document.title = "Lash Room Deventer | Website inhoud";
    }, mounted() {
        let user_id = localStorage.getItem("user_id");
        
        $("#logout").on("click", (e) => {
            e.preventDefault();
            
            var settings = {
                'cache': false,
                'dataType': "json",
                "async": true,
                "url": `https://www.lashroomdeventer.nl/ruveyda-website/webcontent/auth/logout.php?user_id=${user_id}`,
                "method": "POST",
            }

            $.ajax(settings)
                .done((e) => {
                    if(e.success) {
                        localStorage.removeItem("user_id");
                        this.$router.push("/");
                    }
                });
        });

        this.blocks["paragraph"] = "Paragraaf";
        this.blocks["header"] = "Tussenkopje";
        this.blocks["title"] = "Titel";

        $("#allContentBlocks").hide();
    }, methods: {
        loadWebcontent(routeName, route) {
            fetch(`https://lashroomdeventer.nl/ruveyda-website/webcontent/get_webcontent.php?route=${route}`)
            .then((response) => response.json())
            .then((data) => {
                $("#allContentBlocks").show(400);
                $("#currentRoute").html(`Inhoud van "${routeName}"`);
                this.currentRoute = route;
                this.currentRoutename = routeName;
                this.contentblocks = data;
            });
        },
        swapContent(direction, block) {
            let index = this.contentblocks.indexOf(block);
            if(direction === -1) {
                if(index === 0)
                    return false;
                this.contentblocks = this.array_move(this.contentblocks, index, index-1);
            } else if(direction === +1) {
                if(index === this.contentblocks.length - 1)
                    return false;
                this.contentblocks = this.array_move(this.contentblocks, index, index+1);
            }

            this.savePriority();
        },
        array_move(arr, old_index, new_index) {
            if (new_index >= arr.length) {
                var k = new_index - arr.length + 1;
                while (k--) {
                    arr.push(undefined);
                }
            }
            arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);
            return arr;
        },
        async addContentblock(contentType) {
            fetch(`https://www.lashroomdeventer.nl/ruveyda-website/webcontent/add_webcontent.php?route=${this.currentRoute}&contentType=${contentType}&priority=10000`)
                .then(() => {
                    this.loadWebcontent(this.currentRoutename, this.currentRoute);
                });
        },
        deleteContentblock(block) {
            this.contentblocks.splice(this.contentblocks.indexOf(block), 1);
            var settings = {
                'cache': false,
                'dataType': "json",
                "async": true,
                "url": `https://www.lashroomdeventer.nl/ruveyda-website/webcontent/delete_webcontent.php?id=${block.id}&uuid=${localStorage.getItem("user_id") ?? "-1"}`,
                "method": "POST",
            }
            $.ajax(settings);
        },
        saveContentblocks() {
            this.contentblocks.forEach((block) => {
                console.log(block.content);
                var settings = {
                    'cache': false,
                    'dataType': "json",
                    "async": true,
                    "url": `https://www.lashroomdeventer.nl/ruveyda-website/webcontent/save_contentblock.php?id=${block.id}&content=${block.content.replace(/\n\r?/g, '<br />')}&priority=${this.contentblocks.indexOf(block)}`,
                    "method": "POST",
                }

                $.ajax(settings);
            });
        },
        savePriority() {
            // Opslaan nieuwe volgorde
            this.contentblocks.forEach((block) => {
                var settings = {
                    'cache': false,
                    'dataType': "json",
                    "async": true,
                    "url": `https://www.lashroomdeventer.nl/ruveyda-website/webcontent/update_webcontent_order.php?id=${block.id}&priority=${this.contentblocks.indexOf(block)}`,
                    "method": "POST",
                }

                $.ajax(settings);
            });
        }
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
</style>