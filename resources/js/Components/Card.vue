<template>
  <div class="w-100">
    <div class="card my-4 shadow">
      <router-link :to="`/details/${id}`">
        <img
          :src="'images/' + front"
          alt="some photo"
          style="height: 200px"
          class="w-100"
        />
      </router-link>
      <div class="card-body">
        <h6 class="card-title">{{ name }}</h6>

        <p class="lead">{{ location + "," + " " + street }}</p>

        <h6 class="lead">{{ type }}</h6>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <h6 class="text-center text-success">Ugx:{{ " " + rent }}</h6>
        <div v-if="loggedIn" class="d-flex justify-content-between">
          <b-icon-heart scale="1.2" class="mr-2" title="LIKE PROPERTY" />
          <b-icon-check
            scale="2"
            class="like-property-icon"
            variant="success"
            title="APPROVE PROPERTY"
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    name: String,
    location: String,
    id: Number,
    image: String,
    rent: String,
    front: String,
    type: String,
    street: String,
  },
  name: "Card",
  mounted() {
    console.log("CARD LOGGED IN STATE", this.$store.getters.loggedIn);
  },
  computed: {
    loggedIn() {
      return this.$store.getters.loggedIn;
    },
  },
};
</script>
<style scoped>
.like-property-icon:hover {
  color: green !important;
}
</style>
