<template>
<div>
    <div class="navbar bg-primary">
        <router-link to="/" class="nav-link text-white">Home</router-link>
        <h4 class="lead">{{user.firstname}}</h4>
    </div>
    <h1>Bright</h1>
    <div v-for="jinja in jinjas" :key="jinja.id">
        <div class="card col-lg-3 justify-around">
            <!--<img :src="assets.images{{'image.image') }}" class="card-img-top" height="250;" width="300px;">-->
            <img :src="'images/' + jinja.photo" alt="some photo" style="max-height:100px;">
            <!--<img :src="asset('/images/'.image.image)" alt="some photo" style="max-height:100px;">-->
            <div class="card-body">
                <h5 class="card-title">{{jinja.name}}</h5>
            </div>
            <div class="card-footer">
                <h6 class="lead">{{jinja.location}}</h6>
                <button>Rent</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {

    computed: {
        jinjas() {
            return this.$store.getters.jinjas
        },
        user() {
            return this.$store.getters.user
        },
    },
    mounted() {
        this.$store.dispatch('getJinja')
        this.$store.dispatch('getUser')
    }
}
</script>

<style scoped>

</style>
