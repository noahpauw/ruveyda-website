<template>
    <small>
        <div class="flex gap-2em mb-16px">
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

<style scoped>
.mb-16px {
    margin-bottom: 16px;
}
</style>