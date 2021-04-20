<template>
  <div>
    <div v-if="loading" class="text-center loader">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div v-else v-for="advert in adverts" :key="advert.id" class="d-flex flex-row">
      <div class="col-lg-3 m-2">
        <div class="card">
          <div class="card-header">
            <router-link :to="`/adverts/${advert.id}`">
              <h3>{{ advert.advert_header }}</h3>
              <h5 class="text-center">{{ advert.advert_body }}</h5>
            </router-link>
          </div>
          <div class="card-body">
            <img
              :src="'adverts/' + advert.advert_image"
              alt="advert_image"
              class="w-100"
            />
          </div>
          <div class="card-footer d-flex justify-content-center">
            <button @click="deleteAdvert(advert.id)" class="btn btn-danger">
              Delete
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      loading: false,
      adverts: null,
    };
  },
  created() {
    this.getAllAdverts();
  },
  methods: {
    getAllAdverts() {
      this.loading = true;
      axios
        .get("api/adverts")
        .then((res) => {
          this.adverts = res.data;
          console.log(res.data);
          this.loading = false;
        })
        .catch((err) => {
          console.log(err.message);
          this.loading = false;
        });
    },
    deleteAdvert(id) {
      axios
        .delete("api/adverts/" + id)
        .then((res) => {
          console.log(res.data);
          this.$router.push("/createAdvert");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
