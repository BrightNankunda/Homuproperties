<template>
  <div class="container">
    <div v-if="loadingDetails" class="text-center loader my-5">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class="row" v-for="property in properties" :key="property.id" v-else>
      <div class="col-lg-8 col-xl-9 my-2">
        <h5 class="lead" v-if="property.paid === 0">
          Payment Status: <b-badge variant="danger">{{ property.paid }} </b-badge> Secret: <b-badge variant="warning">{{ property.secret }} </b-badge> Amount: {{ property.amount }}
        </h5>
        <b-carousel id="carousel-1" v-model="slide" :interval="8000" controls indicators background="#ababab" @sliding-start="onSlideStart" @sliding-end="onSlideEnd">
          <!-- Slides with custom text -->

          <b-carousel-slide :img-src="'images/' + property.front" style="max-height: 480px"> </b-carousel-slide>
          <b-carousel-slide :img-src="'images/' + property.image" style="max-height: 480px"> </b-carousel-slide>

          <b-carousel-slide :img-src="'images/' + property.photo" style="max-height: 480px"> </b-carousel-slide>
          <!-- Slides with img slot -->
          <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
          <b-carousel-slide>
            <template #img>
              <img class="d-block img-fluid w-100" :src="'images/' + property.imageone" style="max-height: 480px" />
            </template>
          </b-carousel-slide>
          <b-carousel-slide>
            <template #img>
              <img class="d-block img-fluid w-100" :src="'images/' + property.imagetwo" style="max-height: 480px" />
            </template>
          </b-carousel-slide>

          <!-- Slide with blank fluid image to maintain slide aspect ratio -->
        </b-carousel>
      </div>
      <!--END OF CAROUSEL -->
      <div class="col-lg-3 col-xl-3 bg-light my-2 shadow">
        <div class="property-details row pt-1">
          <p>Name:</p>
          <p class="text-primary">{{ property.name }}</p>
        </div>

        <div class="property-details row">
          <p>Monthly Rent: Ugx:</p>
          <p class="text-primary">{{ " " + property.rent }}</p>
        </div>

        <div class="property-details row">
          <p class="">Located:</p>
          <p class="text-primary">{{ property.location }}</p>
        </div>

        <div class="property-details row">
          <p class="">Street/Parish:</p>
          <p class="text-primary">{{ property.street }}</p>
        </div>

        <div class="property-details row">
          <p>Property Address:</p>
          <p class="text-primary">{{ property.address }}</p>
        </div>
        <div class="property-details row">
          <p class="">Property Manager's Contact:</p>
          <p class="text-primary">{{ property.contact }}</p>
        </div>
        <div class="property-details row">
          <p class="">Property Description:</p>
          <p class="text-primary">{{ property.description }}</p>
        </div>
        <div class="property-details row">
          <p class="">Amount Paid:</p>
          <p class="text-primary">{{ property.amount }}</p>
        </div>
        <div class="property-details row">
          <p class="">Property Floor Space:</p>
          <p class="text-primary">{{ property.floor }}</p>
        </div>

        <div class="property-details row pb-1">
          <p class="">Number of rooms/Apartments</p>
          <p class="text-primary">{{ property.rooms }} Rooms</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      slide: 0,
      sliding: null,
      loadingDetails: true,
    };
  },
  created() {
    this.getProperties();
    // this.$store.dispatch("properties")
    // .then (response => {
    //   this.loadingDetails: false
    // })
  },
  computed: {
    properties() {
      return this.$store.getters.properties;
    },
  },
  methods: {
    getProperties() {
      this.$store.dispatch("properties").then((response) => {
        this.loadingDetails = false;
      });
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
.container {
  /*overflow: scroll;*/
}
.property-details {
  display: grid;
  align-items: center;
  grid-template-columns: 1fr 1fr;
  grid-column-gap: 1.5rem;
}
</style>
