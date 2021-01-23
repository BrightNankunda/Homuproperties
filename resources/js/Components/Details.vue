<template>
  <div>
    <div v-if="loadingDetails" class="text-center loader my-5">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class="row wrapper" v-else>
      <!--BEGINNING OF CAROUSEL-->

      <div class="col-lg-9 shadow my-1">
        <b-carousel id="carousel-1" v-model="slide" :interval="8000" controls indicators background="#ababab" @sliding-start="onSlideStart" @sliding-end="onSlideEnd">
          <!-- Slides with custom text -->

          <b-carousel-slide :img-src="'images/' + apartment.front" style="max-height: 480px"> </b-carousel-slide>
          <b-carousel-slide :img-src="'images/' + apartment.image" style="max-height: 480px"> </b-carousel-slide>

          <b-carousel-slide :img-src="'images/' + apartment.photo" style="max-height: 480px"> </b-carousel-slide>
          <!-- Slides with img slot -->
          <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
          <b-carousel-slide>
            <template #img>
              <img class="d-block img-fluid w-100" :src="'images/' + apartment.imageone" style="max-height: 480px" />
            </template>
          </b-carousel-slide>
          <b-carousel-slide>
            <template #img>
              <img class="d-block img-fluid w-100" :src="'images/' + apartment.imagetwo" style="max-height: 480px" />
            </template>
          </b-carousel-slide>

          <!-- Slide with blank fluid image to maintain slide aspect ratio -->
        </b-carousel>
      </div>
      <!--END OF CAROUSEL -->
      <div class="col-lg-3 bg-light shadow my-1">
        <div class="row p-2">Name: {{ apartment.name }}</div>
        <div class="row p-2">Monthly Rent: Ugx:{{ " " + apartment.rent }}</div>
        <div class="row p-2">Located: {{ apartment.location }}</div>
        <div class="row p-2">Street/Parish: {{ apartment.street }}</div>
        <div class="row p-2">Property Address: {{ apartment.address }}</div>
        <div class="row p-2">Property Manager's Contact: {{ apartment.contact }}</div>
        <div class="row p-2">Property Description: {{ apartment.description }}</div>
        <div class="row p-2">Property Status: {{ apartment.status }}</div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      id: 0,
      apartment: null,
      loadingDetails: true,
      slide: 0,
      sliding: null,
    };
  },
  created() {
    this.id = this.$route.params.id;
  },
  mounted() {
    //this.details();
    axios
      .get("api/show/" + this.id)
      .then((response) => {
        console.log(response.data);
        this.apartment = response.data;
        this.loadingDetails = false;
      })
      .catch((err) => {
        //console.log(err);
      });
  },
  methods: {
    details() {
      // axios
      //   .get("api/show/" + this.id)
      //   .then((response) => {
      //     console.log(response.data);
      //     this.apartment = response.data;
      //   })
      //   .catch((err) => {
      //     console.log(err);
      //   });
    },

    onSlideStart(slide) {
      this.sliding = true;
    },
    onSlideEnd(slide) {
      this.sliding = false;
    },
  },
};
</script>
<style scoped>
.wrapper {
  display: flex;
}
</style>
