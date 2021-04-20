<template>
  <div class="container">
    <div class="d-flex justify-content-center">
      <form
        method="POST"
        @submit.prevent="uploadAdvert"
        enctype="multipart/form-data"
        class="form border rounded p-3 m-4 w-100"
      >
        <div class="form-group border-bottom">
          <h5>
            <label for="advert_header">Header</label>
            <input
              type="text"
              v-model="advert_header"
              name="advert_header"
              id="advert_header"
              class="form-control"
            />
          </h5>
        </div>
        <div class="form-group border-bottom">
          <h5>
            <label for="advert_body">Body </label>
            <input
              type="text"
              v-model="advert_body"
              name="advert_body"
              id="advert_body"
              class="form-control"
            />
          </h5>
        </div>

        <div class="form-group border-bottom">
          <label for="advert_image">Advert Image</label>
          <input
            type="file"
            name="advert_image"
            id="advert_image"
            @change="advertImage"
          />
        </div>
        <div class="d-flex justify-content-center">
          <button class="btn btn-primary">Upload</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      loading: false,
      advert_header: null,
      advert_body: null,
      advert_image: null,
    };
  },
  methods: {
    advertImage(e) {
      this.advert_image = e.target.files[0];
      // console.log(this.advert_image);
    },
    uploadAdvert() {
      let data = new FormData();
      data.append("advert_header", this.advert_header);
      data.append("advert_body", this.advert_body);
      data.append("advert_image", this.advert_image);
      axios
        .post("/api/adverts", data)
        .then((res) => {
          console.log(res.data);
        })
        .then((res) => {
          this.$router.push("/adverts");
        })
        .catch((err) => {
          console.log(err.message);
        });
    },
  },
};
</script>
