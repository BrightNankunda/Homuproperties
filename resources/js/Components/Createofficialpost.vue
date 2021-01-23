<template>
<div class="container">
    <form @submit.prevent="upload(post)">
        <div class="form-group">
            <label for="post">Official Property Post</label>
            <textarea name="post" cols="10" rows="5" class="form-control" v-model="post.official"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
</div>
</template>

<script>
export default {
    data() {
        return {
            post: {
                official: ''
            }
        }
    },
    methods: {
        // upload(post) {
        //     this.$store.dispatch('UPLOADOFFICIAL', post)
        // }
        upload(post) {
            axios.post('/api/official', post)
                .then((success) => {
                    this.$router.push('official')
                })
                .catch((err) => {
                    console.log(err)
                })
        }
    },
    computed: {
        isValid() {
            return post.official !== ''
        }
    }
}
</script>

<style scoped>

</style>
