<template>
  <div>
    <div class="dashboard w-100">
      <!-- BANNER -->
      <div class="banner">
        <div class="row search-container py-5 d-flex justify-content-center">
          <h1 class="text-primary text-center col-md-12 col-lg-8">
            <span class="d-md-inline-block d-none">Advertise with us & remove</span>
            <span class="d-md-none">Remove</span> the information gap about your property
            with
            <span class="headeroff"><b>20% OFF</b></span>
          </h1>
        </div>
        <div class="search-bars d-flex justify-content-center align-content-center">
          <!-- SEARCH -->
          <search-component
            :loadingSearches="resultStyles"
            :EmptyResults="NoResultStyles"
          ></search-component>
        </div>
        <div class="d-flex justify-content-center">
          <router-link to="read" class="btn btn-primary">Get Started</router-link>
        </div>
      </div>
      <div class="shadow second bg-light my-5 pb-2">
        <div class="icons row d-flex my-3">
          <div class="col-lg-4">
            <div class="icon text-success d-flex justify-content-center my-4">
              <b-icon icon="house" scale="2"></b-icon>
            </div>
            <div class="">
              <h3 class="lead text-center">Real Estate Online Advertising</h3>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="icon text-success d-flex justify-content-center my-4">
              <b-icon icon="phone" scale="2"></b-icon>
            </div>
            <div class="">
              <h3 class="lead text-center">Adequate Marketing on all Online platforms</h3>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="icon text-success d-flex justify-content-center my-4">
              <b-icon icon="person-check" scale="2"></b-icon>
            </div>
            <div class="">
              <h3 class="lead text-center">
                Real Estate Professional Search Support and advice.
              </h3>
            </div>
          </div>
        </div>
      </div>

      <!--APARTMENTS-->
      <div v-if="countofapartments > 1" class="text-center my-5">
        <router-link to="/apartments" class="btn btn-primary px-4 lead"
          >View all Apartments <b-icon-arrow-right></b-icon-arrow-right
        ></router-link>
      </div>
      <div v-if="loadingApartments" class="text-center loader">
        <div class="spinner-border text-primary text-center" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <div id="horzontal" class="d-flex" v-else>
        <div v-if="countofapartments > 4" class="left">
          <p id="left-button" class="btn btn-hero" @click="swipeLeft">
            <b-icon icon="chevron-left" scale="2"></b-icon>
          </p>
        </div>
        <div class="center my-5 d-flex" id="content" ref="content">
          <div v-for="image in apartments" :key="image.id" class="col-md-6 col-lg-3">
            <div class="card my-4 shadow">
              <router-link :to="`/details/${image.id}`">
                <img
                  :src="'images/' + image.front"
                  class="w-100"
                  alt="some photo"
                  style="height: 200px"
                />
              </router-link>
              <div class="card-body">
                <h6 class="card-title text-primary">{{ image.name }}, Self Contained</h6>
                <p class="lead text-primary">
                  {{ image.location + "," + " " + image.street }}
                </p>
              </div>
              <div class="card-footer d-flex flex-col">
                <h6 class="text-success">{{ image.astatus }}</h6>
                <h6 class="text-center text-success">Ugx:{{ " " + image.rent }}</h6>
              </div>
            </div>
          </div>
        </div>
        <div v-if="countofapartments > 4" class="right">
          <p id="right-button" class="btn btn-hero" @click="swipeRight">
            <b-icon icon="chevron-right" scale="2"></b-icon>
          </p>
        </div>
      </div>

      <div class="my-4 bg-light shadow py-2">
        <div class="row d-flex justify-content-center text-success my-4">
          <h1 class="lead text-center my-2">Find your Dream home, safe place to stay!</h1>
        </div>

        <div class="icons row d-flex my-2">
          <div class="col-lg-4">
            <div class="icon text-success d-flex justify-content-center my-2 py-2">
              <h1 class="lead">Apartments</h1>
            </div>
            <div class="icon text-success d-flex justify-content-center my-4 py-2">
              <b-icon icon="building" scale="2"></b-icon>
            </div>
            <div class="">
              <h3 class="lead text-center py-2">
                Are you looking for an apartment, single room. double or family apartment,
                navigate to apartments.
                <b-icon icon="arrow-up" variant="success"></b-icon>
              </h3>
              <!--<b-col md="6" class="mb-3">
              <p>Cylon animation:</p>
              <b-icon icon="three-dots" animation="cylon" variant="success" font-scale="4"></b-icon>
            </b-col>-->
            </div>
          </div>

          <div class="col-lg-4">
            <div class="icon text-success d-flex justify-content-center my-2">
              <h1 class="lead">Hostels and Rentals</h1>
            </div>
            <div class="icon text-success d-flex justify-content-center my-4">
              <b-icon icon="house-door" scale="2"></b-icon>
            </div>
            <div class="">
              <h3 class="lead text-center py-2">
                Are you a student looking for an affordable hostel or rental safe for your
                studies, navigate through the Best Hostels and rentals.
                <router-link to="hostels" class="text-success"
                  ><b-icon icon="binoculars"></b-icon
                ></router-link>
              </h3>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="icon text-success d-flex justify-content-center my-2 py-2">
              <h1 class="lead">Malls and Arcades</h1>
            </div>
            <div class="icon text-success d-flex justify-content-center my-4 py-2">
              <b-icon icon="building" scale="2"></b-icon>
            </div>
            <div class="">
              <h3 class="lead text-center py-2">
                Find the perfect place for your business entity with all the the required
                data in the palm of your hand.
              </h3>
            </div>
          </div>
        </div>
      </div>
      <!--HOSTELS-->
      <div v-if="countofhostels > 0" class="text-center my-5">
        <router-link to="/hostel" class="btn btn-primary px-4 lead"
          >View all Hostels <b-icon-arrow-right></b-icon-arrow-right
        ></router-link>
      </div>
      <div v-if="loadingHostels" class="text-center loader">
        <div class="spinner-border text-primary text-center" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <div id="horizontalhostels" class="d-flex" v-else>
        <div v-if="countofhostels > 4" class="left">
          <p class="btn btn-hero" @click="swipeLeftHostels">
            <b-icon icon="chevron-left" scale="2"></b-icon>
          </p>
        </div>

        <div class="center d-flex my-5" id="contentHostels" ref="contentHostels">
          <div v-for="image in hostels" :key="image.id" class="col-lg-3">
            <div class="card my-4 shadow">
              <router-link :to="`/details/${image.id}`">
                <img
                  :src="'images/' + image.front"
                  alt="some photo"
                  style="height: 200px"
                />
              </router-link>
              <div class="card-body">
                <h6 class="card-title">{{ image.name }}, {{ image.hstatus }}</h6>
                <p class="lead">{{ image.location + "," + " " + image.street }}</p>
              </div>
              <div class="card-footer">
                <h6 class="text-center text-success">
                  {{ image.hstatus }}, Ugx:{{ " " + image.rent }}
                </h6>
              </div>
            </div>
          </div>
        </div>
        <div v-if="countofhostels > 4" class="right">
          <p class="btn btn-hero" @click="swipeRightHostels">
            <b-icon icon="chevron-right" scale="2"></b-icon>
          </p>
        </div>
      </div>

      <!--ARCADES-->
      <div v-if="countofarcades > 0" class="text-center my-5">
        <router-link to="/arcades" class="btn btn-primary px-4 lead"
          >View all Arcades <b-icon-arrow-right></b-icon-arrow-right
        ></router-link>
      </div>
      <div v-if="loadingArcades" class="text-center loader">
        <div class="spinner-border text-primary text-center" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <div id="horizontalarcades" class="d-flex" v-else>
        <div v-if="countofarcades > 4" class="left">
          <p class="btn btn-hero" @click="swipeLeftArcades">
            <b-icon icon="chevron-left" scale="2"></b-icon>
          </p>
        </div>
        <div class="center d-flex my-5" id="contentarcades" ref="contentarcades">
          <div v-for="image in arcades" :key="image.id" class="col-lg-3">
            <div class="card my-4 shadow">
              <router-link :to="`/details/${image.id}`">
                <img
                  :src="'images/' + image.front"
                  alt="some photo"
                  class="w-100"
                  style="height: 200px"
                />
              </router-link>
              <div class="card-body">
                <h6 class="card-title">{{ image.name }}</h6>
                <p class="lead">{{ image.location + "," + " " + image.street }}</p>
              </div>
              <div class="card-footer">
                <h6 class="text-center text-success">Ugx:{{ " " + image.rent }}</h6>
              </div>
            </div>
          </div>
        </div>
        <div v-if="countofarcades > 4" class="right">
          <p class="btn btn-hero" @click="swipeRightArcades">
            <b-icon icon="chevron-right" scale="2"></b-icon>
          </p>
        </div>
      </div>
      <ThirdComponent />
      <!--MALLS-->
      <div v-if="countofmalls > 1" class="text-center my-5">
        <router-link to="/malls" class="btn btn-primary px-4 lead"
          >View all Malls <b-icon-arrow-right></b-icon-arrow-right>
        </router-link>
      </div>
      <div v-if="loadingMalls" class="text-center loader">
        <div class="spinner-border text-primary text-center" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <div id="horizontalmalls" class="d-flex" v-else>
        <div v-if="countofmalls > 4" class="left">
          <p class="btn btn-hero" @click="swipeLeftMalls">
            <b-icon icon="chevron-left" scale="2"></b-icon>
          </p>
        </div>
        <div class="center d-flex my-5" id="contentMalls" ref="contentmalls">
          <div v-for="image in malls" :key="image.id" class="col-lg-3">
            <div class="card my-4 shadow">
              <router-link :to="`/details/${image.id}`">
                <img
                  :src="'images/' + image.front"
                  alt="some photo"
                  style="height: 200px"
                  class="w-100"
                />
              </router-link>
              <div class="card-body">
                <h6 class="card-title">{{ image.name }}</h6>

                <p class="lead">{{ image.location + "," + " " + image.street }}</p>
              </div>
              <div class="card-footer">
                <h6 class="text-center text-success">Ugx:{{ " " + image.rent }}</h6>
              </div>
            </div>
          </div>
        </div>
        <div v-if="countofmalls > 4" class="right">
          <p class="btn btn-hero" @click="swipeRightMalls">
            <b-icon icon="chevron-right" scale="2"></b-icon>
          </p>
        </div>
      </div>

      <!--RENTALS-->
      <div v-if="countofrentals > 0" class="text-center my-4">
        <router-link to="/rentals" class="btn btn-primary lead px-4"
          >View all Rentals <b-icon-arrow-right></b-icon-arrow-right
        ></router-link>
      </div>
      <div v-if="loadingRentals" class="text-center loader">
        <div class="spinner-border text-primary text-center" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <div id="horizontalRentals" class="d-flex" v-else>
        <div v-if="countofrentals > 4" class="left">
          <p id="left-button-rentals" class="btn btn-hero" @click="swipeLeftRentals">
            <b-icon icon="chevron-left" scale="2"></b-icon>
          </p>
        </div>
        <div class="center my-5 d-flex" id="contentRentals" ref="contentRentals">
          <div v-for="image in rentals" :key="image.id" class="col-lg-3">
            <div class="card my-4 shadow">
              <router-link :to="`/details/${image.id}`">
                <img
                  :src="'images/' + image.front"
                  alt="some photo"
                  style="height: 200px"
                  class="w-100"
                />
              </router-link>
              <div class="card-body">
                <h6 class="card-title">{{ image.name }}</h6>

                <p class="lead">{{ image.location + "," + " " + image.street }}</p>

                <h6 class="lead">{{ image.type }}</h6>
              </div>
              <div class="card-footer">
                <h6 class="text-center text-success">Ugx:{{ " " + image.rent }}</h6>
              </div>
            </div>
          </div>
        </div>
        <div v-if="countofrentals > 4" class="right">
          <p id="right-button-rentals" class="btn btn-hero" @click="swipeRightRentals">
            <b-icon icon="chevron-right" scale="2"></b-icon>
          </p>
        </div>
      </div>

      <!--OFFICESPACE-->
      <div v-if="countofoffices > 1" class="text-center my-4">
        <router-link to="/officespace" class="btn btn-primary lead"
          >View All Office spaces <b-icon-arrow-right></b-icon-arrow-right
        ></router-link>
      </div>
      <div v-if="loadingOfficespace" class="text-center loader">
        <div class="spinner-border text-primary text-center" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <div id="horizontaloffice" class="d-flex" v-else>
        <div v-if="countofoffices > 4" class="left">
          <p class="btn btn-hero"><b-icon icon="chevron-left" scale="2"></b-icon></p>
        </div>
        <div class="center my-5 d-flex" id="contentOffice" ref="contentOffice">
          <div v-for="image in officespace" :key="image.id" class="col-lg-3">
            <div class="card my-4 shadow">
              <router-link :to="`/details/${image.id}`">
                <img
                  :src="'images/' + image.front"
                  alt="some photo"
                  style="height: 200px"
                  class="w-100"
                />
              </router-link>
              <div class="card-body">
                <h6 class="card-title">{{ image.name }}</h6>
                <p class="lead">{{ image.location + "," + " " + image.street }}</p>
              </div>
              <div class="card-footer">
                <h6 class="text-center text-success">Ugx:{{ " " + image.rent }}</h6>
              </div>
            </div>
          </div>
        </div>
        <div v-if="countofoffices > 4" class="right">
          <p class="btn btn-hero"><b-icon icon="chevron-right" scale="2"></b-icon></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SearchComponent from "./Search/SearchComponent.vue";
import ThirdComponent from "./SubComponents/ThirdComponent.vue";

export default {
  components: { ThirdComponent, SearchComponent },
  name: "Dashboard",
  data() {
    return {
      loading: true,
      loadingApartments: true,
      loadingHostels: true,
      loadingArcades: true,
      loadingMalls: true,
      loadingOfficespace: true,
      loadingRentals: true,
      slide: 0,
      sliding: null,
      countofproperties: 0,
      countofapartments: 1,
      countofhostels: 1,
      countofmalls: 1,
      countofoffices: 1,
      countofarcades: 1,
      countofrentals: 1,
    };
  },
  created() {
    this.fone();
    this.ftwo();
    this.kira();
    this.$store.dispatch("countofproperties");
    this.$store.dispatch("mukono");
  },
  mounted() {
    this.apartments();
    this.hostels();
    this.malls();
    this.arcades();
    this.rentals();
    this.officespace();
  },
  computed: {
    mukono() {
      return this.$store.getters.mukono;
    },
    bigcats() {
      return this.$store.getters.bigcats;
    },
    smallcats() {
      return this.$store.getters.smallcats;
    },
    countofavailableproperties() {
      return this.$store.getters.countofproperties;
    },
    profile() {
      return this.$store.getters.profile;
    },
  },

  methods: {
    scrollTo(element, scrollPixels, duration) {
      const scrollPos = element.scrollLeft;
      // Condition to check if scrolling is required
      if (
        !(
          (scrollPos === 0 || scrollPixels > 0) &&
          (element.clientWidth + scrollPos === element.scrollWidth || scrollPixels < 0)
        )
      ) {
        // Get the start timestamp
        const startTime =
          "now" in window.performance ? performance.now() : new Date().getTime();

        function scroll(timestamp) {
          //Calculate the timeelapsed
          const timeElapsed = timestamp - startTime;
          //Calculate progress
          const progress = Math.min(timeElapsed / duration, 1);
          //Set the scrolleft
          element.scrollLeft = scrollPos + scrollPixels * progress;
          //Check if elapsed time is less then duration then call the requestAnimation, otherwise exit
          if (timeElapsed < duration) {
            //Request for animation
            window.requestAnimationFrame(scroll);
          } else {
            return;
          }
        }
        //Call requestAnimationFrame on scroll function first time
        window.requestAnimationFrame(scroll);
      }
    },
    swipeLeft() {
      const content = this.$refs.content;
      this.scrollTo(content, -800, 500);
    },
    swipeRight() {
      const content = this.$refs.content;
      this.scrollTo(content, 800, 500);
    },
    swipeLeftHostels() {
      const contentHostels = this.$refs.contentHostels;

      this.scrollTo(contentHostels, -800, 500);
    },
    swipeRightHostels() {
      const contentHostels = this.$refs.contentHostels;
      this.scrollTo(contentHostels, 800, 500);
    },
    swipeLeftRentals() {
      const contentRentals = this.$refs.contentRentals;
      this.scrollTo(contentRentals, -800, 500);
    },
    swipeRightRentals() {
      const contentRentals = this.$refs.contentRentals;
      this.scrollTo(contentRentals, 800, 500);
    },
    swipeLeftArcades() {
      const contentarcades = this.$refs.contentarcades;
      this.scrollTo(contentarcades, -800, 500);
    },
    swipeRightArcades() {
      const contentarcades = this.$refs.contentarcades;
      this.scrollTo(contentarcades, 800, 500);
    },
    swipeLeftMalls() {
      const contentmalls = this.$refs.contentmalls;
      this.scrollTo(contentmalls, -800, 500);
    },
    swipeRightMalls() {
      const contentmalls = this.$refs.contentmalls;
      this.scrollTo(contentmalls, 800, 500);
    },
    onSlideStart(slide) {
      this.sliding = true;
    },
    onSlideEnd(slide) {
      this.sliding = false;
    },
    fone() {
      axios
        .get("api/fone")
        .then((response) => {
          this.fone = response.data;
          this.loading = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },

    ftwo() {
      axios
        .get("api/ftwo")
        .then((response) => {
          this.ftwo = response.data;
          this.loading = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    resultStyles() {
      console.log("New Results");
    },
    NoResultStyles() {
      console.log("No Results");
    },
    kira() {
      axios
        .get("api/kira")
        .then((response) => {
          this.kira = response.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    apartments() {
      axios
        .get("api/apartment")
        .then((response) => {
          this.apartments = response.data;
          this.countofapartments = response.data.length;
          this.loadingApartments = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },

    arcades() {
      axios
        .get("api/arcade")
        .then((response) => {
          this.arcades = response.data;
          this.countofarcades = response.data.length;
          this.loadingArcades = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    malls(context) {
      axios
        .get("api/mall")
        .then((response) => {
          if (response.data == "") {
            console.log("MALLS ARE EMPTY");
            this.loadingMalls = false;
          } else {
            this.countofmalls = response.data;
            this.malls = response.data;
            this.loadingMalls = false;
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
    hostels(context) {
      axios
        .get("/api/hostel")
        .then((response) => {
          this.hostels = response.data;
          this.countofhostels = response.data.length;
          this.loadingHostels = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    rentals(context) {
      axios
        .get("api/rental")
        .then((response) => {
          this.rentals = response.data;
          this.countofrentals = response.data.length;
          this.loadingRentals = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    officespace(context) {
      axios
        .get("api/officespace")
        .then((response) => {
          this.officespace = response.data;
          this.countofoffices = response.data.length;
          this.loadingOfficespace = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
<style scoped>
.dashboard {
  font-family: sans-serif;
  box-sizing: border-box;
}
.banner {
  min-height: 90vh;
  background-image: url("/front/house2.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 100% 100%;
}
/* .search-container {
  margin: auto 0;
} */
#horizontal,
#horizontalhostels,
#horizontalRentals,
#horizontalmalls,
#horizontaloffice {
  text-align: center;
  font-family: sans-serif;
}

.left,
.right {
  display: flex;
  align-items: center;
  justify-content: center;
}
.image {
  background-position: center;
}
.btn {
  letter-spacing: 3px;
}
.center {
  /*float: left;*/
  width: 100%;
  overflow: hidden;
  white-space: nowrap;
}
.second {
  border: none;
  border-radius: 15px;
}
.card {
  border: none !important;
  justify-content: space-around;
  overflow: hidden;
}
.loader {
  min-width: 100px;
}

.card:hover {
  opacity: 0.8;
}
.bg-dark {
  position: relative;
  margin: 0 auto;
  background: rgba(0, 0, 0, 0.3) !important;
  color: white !important;
}
img:hover {
  opacity: 0.8;
}
.image {
  width: 100%;
  height: 100%;
  /*background-size: cover;*/
}
</style>
