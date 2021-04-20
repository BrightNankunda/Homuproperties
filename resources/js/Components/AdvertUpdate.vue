<template>
  <div class="container">
    <div v-if="loading" class="text-center loader">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div v-else class="d-flex justify-content-center m-2">
      <form @submit.prevent="updateAdvert" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="advert_header">Header</label>
          <input
            type="text"
            name="advert_header"
            class="form-control"
            id="advert_header"
            v-model="advertUpdate.advert_header"
          />
        </div>
        <div class="form-group">
          <label for="advert_body">Body</label>
          <input
            type="text"
            v-model="advertUpdate.advert_body"
            name="advert_body"
            class="form-control"
            id="advert_body"
          />
        </div>
        <div class="form-group">
          <label for="advert_image">Image</label>
          <img :src="'adverts' / +advertUpdate.advert_image" alt="advert_body" />
          <input
            type="file"
            @change="updateImage"
            name="advert_image"
            id="advert_image"
          />
        </div>
        <div class="d-flex justify-content-center">
          <button class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      id: this.$route.params.id,
      advertUpdate: null,
      advert_image: null,
      loading: false,
    };
  },
  created() {
    this.advertToUpdate();
  },
  methods: {
    advertToUpdate() {
      this.loading = true;
      axios
        .get("/api/adverts/" + this.id)
        .then((res) => {
          console.log(res.data);
          this.advertUpdate = res.data;
          this.loading = false;
        })
        .catch((err) => {
          console.log(err.message);
          this.loading = false;
        });
    },
    updateAdvert() {
      let data = new FormData();
      data.append("advert_header", this.advertUpdate.advert_header);
      data.append("advert_body", this.advertUpdate.advert_body);
      data.append("advert_image", this.advert_image);
      axios
        .patch("api/adverts/" + this.id, data)
        .then((res) => console.log(res.data))
        .catch((err) => {
          console.log(err.message);
        });
    },
    updateImage(e) {
      this.advert_image = e.target.files[0];
    },
  },
};
</script>
