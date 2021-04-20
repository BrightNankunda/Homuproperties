<template>
  <div>
    <div class="row d-flex justify-content-center bg-light my-2">
      <div class="preferredproperty">
        <div v-if="loadingAdvert" class="my-5">
          <div class="spinner-border text-primary text-center" role="status">
            <span class="sr-only text-center">Loading...</span>
          </div>
        </div>
        <div class="w-100" v-else>
          <div class="card">
            <div class="card-header">
              <img
                :src="'adverts/' + advertData.advert_image"
                alt="Advert Image"
                class="w-100"
              />
            </div>
            <div class="card-footer">
              <h4 class="text-center">{{ advertData.advert_header }}</h4>
              <h5 class="text-center">{{ advertData.advert_body }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "ProfileAdvert",
  data() {
    return {
      loadingAdvert: false,
      loadingData: true,
      advertData: null,
    };
  },
  created() {
    this.advert();
  },
  methods: {
    advert() {
      this.loadingAdvert = true;
      axios
        .get("/api/oneAdvert")
        .then((res) => {
          this.advertData = res.data;
          console.log(res.data);
          this.loadingAdvert = false;
        })
        .catch((err) => {
          console.log(err.message);

          this.loadingAdvert = false;
        });
    },
  },
};
</script>
