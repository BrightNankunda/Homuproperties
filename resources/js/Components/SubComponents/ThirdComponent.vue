<template>
  <div>
    <div class="my-4 bg-light shadow py-2">
      <div class="row d-flex justify-content-center text-success my-4">
        <h1 class="lead text-center my-2">Why we are the best?</h1>
      </div>
      <div class="icons row d-flex my-2">
        <div class="col-lg-4">
          <div class="icon text-success d-flex justify-content-center my-4 py-2">
            <b-icon icon="building" scale="2"></b-icon>
          </div>
          <div class="">
            <h3 class="lead text-center py-2">
              Professional Expertise and advice<b-icon
                icon="arrow-up"
                variant="success"
              ></b-icon>
            </h3>
            <!--<b-col md="6" class="mb-3">
              <p>Cylon animation:</p>
              <b-icon icon="three-dots" animation="cylon" variant="success" font-scale="4"></b-icon>
            </b-col>-->
          </div>
        </div>

        <div class="col-lg-4">
          <div class="icon text-success d-flex justify-content-center my-4">
            <b-icon icon="house-door" scale="2"></b-icon>
          </div>
          <div class="">
            <h3 class="lead text-center py-2">
              Adequate Marketing on all Online platforms
              <router-link to="hostels" class="text-success"
                ><b-icon icon="binoculars"></b-icon
              ></router-link>
            </h3>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="icon text-success d-flex justify-content-center my-4 py-2">
            <b-icon icon="building" scale="2"></b-icon>
          </div>
          <div class="">
            <h3 class="lead text-center py-2">Organized and Online Booking and tours</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "ThirdComponent",
  data() {},
};
</script>
