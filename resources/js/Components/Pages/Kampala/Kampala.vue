<template>
<div>
    <div class="navbar bg-primary">
        <router-link to="/" class="nav-link text-white">Home</router-link>
        <h4 class="lead">{{user.firstname}}</h4>
    </div>
    <h1>Bright</h1>
    <div v-for="kampala in kampalas" :key="kampala.id">
        <div class="card col-lg-4 justify-around">
            <!--<img :src="assets.images{{'image.image') }}" class="card-img-top" height="250;" width="300px;">-->
            <img :src="'images/' + kampala.photo" alt="some photo" style="max-height:100px;">
            <!--<img :src="asset('/images/'.image.image)" alt="some photo" style="max-height:100px;">-->
            <div class="card-body">
                <h5 class="card-title">{{kampala.name}}</h5>
            </div>
            <div class="card-footer">
                <h6 class="lead">{{kampala.location}}</h6>
                <button>Rent</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {

    computed: {
        kampalas() {
            return this.$store.getters.kampalas
        },
        user() {
            return this.$store.getters.user
        },
    },
    mounted() {
        this.$store.dispatch('getKampala')
        this.$store.dispatch('getUser')
    }
}
</script>

<style scoped>

</style>
