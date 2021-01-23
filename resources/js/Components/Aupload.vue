<template>
<div class="container">
    <form action="" @submit.prevent="value">
        <div class="form-group">
            <input type="number" name="rooms" v-model="pay.rooms" class="form-control" placeholder="rooms">
        </div>
        <div class="form-group">
            <input type="number" name="rent" v-model="pay.rent" class="form-control" placeholder="rent">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
</template>

<script>
export default {
    name: 'Aupload',
    data: () => ({
        pay: {
            rooms: "",
            rent: ""
        }
    }),
    computed: {

    },

    methods: {
        value() {
            this.$store.dispatch('value', this.pay)
        }
    }
}
</script>

<style scoped>

</style>
