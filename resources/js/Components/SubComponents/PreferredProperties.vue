<template>
  <div class="fluid-container">
    <div class="my-5" v-if="loadingProperties">
      <page-loader />
    </div>
    <div class="container" v-else>
      <div class="col-lg-4 mx-auto" v-for="property in properties" :key="property.id">
        <div class="card w-100 my-2 shadow">
          <router-link :to="`/details/${property.id}`">
            <img
              :src="'images/' + property.front"
              alt="some photo"
              style="height: 200px"
              class="w-100"
            />
          </router-link>
          <div class="card-body">
            <h6 class="card-title">{{ property.name }}</h6>
            <p class="lead">{{ property.location + "," + " " + property.street }}</p>
          </div>
          <div class="card-footer">
            <h6 class="text-center text-success">Ugx:{{ " " + property.rent }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import PageLoader from "../Loaders/PageLoader.vue";
export default {
  components: { PageLoader },
  data() {
    return {
      properties: null,
      loadingProperties: true,
      location: this.$route.query.location,
    };
  },
  created() {
    this.fetchPreferredProperties();
  },
  methods: {
    fetchPreferredProperties() {
      axios
        .get("/api/preferredlocation/" + this.location)
        .then((res) => {
          if (res.data.uploads) {
            this.properties = res.data.uploads;
          } else if (res.data) {
            this.properties = res.data;
          }
          console.log(res.data);
          this.loadingProperties = false;
        })
        .catch((err) => {
          console.log(err.response);
          this.loadingProperties = false;
        });
    },
  },
};
</script>
<style scoped>
.fluid-container {
  min-height: 70vh;
}
</style>
