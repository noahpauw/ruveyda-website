<template>
    <small>
        <div class="flex gap-2em">
            <div v-for="(breadcrumb, index) of breadcrumbs" :key="breadcrumb.title">
                <router-link :to="breadcrumb.route">
                    <span>{{ breadcrumb.title }}</span>
                </router-link>
                <span v-if="index < breadcrumbs.length - 1">&nbsp;»&nbsp;</span>
            </div>
        </div>
    </small>
</template>

<script>
export default {
    name: "bread-crumbs",
    props: ["breadcrumbs"]
}
</script>

<style scoped></style>