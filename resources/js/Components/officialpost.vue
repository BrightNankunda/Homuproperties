<template>
<div>
    <h4 class="text-center lead">Posts</h4>
    <div class="container">
        {{post.official}}
    </div>
    <button class="btn btn-danger" @click="deleteOfficial(post)"><i style="color:white" class="fa fa-trash"></i>Delete Post </button>

</div>
</template>

<script>
export default {
    name: "officialpost",
    mounted() {
        this.$store.dispatch('fetchOfficial')
    },
    methods: {
        deleteOfficial(post) {
            this.$store.dispatch('deleteOfficial', post)
        }
    },
    computed: {
        post() {
            return this.$store.getters.official
        }
    }

}
</script>
