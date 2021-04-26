<template>
  <div class="fluid-container">
    <div class="my-5" v-if="loadingProperties">
      <page-loader />
    </div>
    <div class="container">
      <div class="mx-auto w-100" v-for="property in properties" :key="property.id">
        <h4>{{ property.name }}</h4>
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
        })
        .catch((err) => {
          console.log(err.response);
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
