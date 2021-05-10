<template>
  <div>
    <div v-if="loadingData" class=" ">
      <div
        class="w-100 d-flex justify-content-center align-content-center bg-light rounded-container-image my-5"
        style="width: 50%; height: 50vh"
      >
        <div class="spinner-border text-primary text-center" role="status">
          <span class="sr-only text-center">Loading...</span>
        </div>
      </div>
    </div>

    <div
      v-else
      style="width: 100%; min-height: 30vh"
      class="d-flex justify-content-center"
    >
      <div class="w-50">
        <img
          :src="'PersonalData/' + personalData.profileImage"
          alt=""
          class="rounded-container-image w-100 h-100"
        />
      </div>
    </div>

    <div class="d-flex justify-content-center my-2">
      <div class="d-flex">
        <h5 class="mr-1">{{ user.firstname | capitalize }}</h5>
        <h5 class="">{{ user.lastname | capitalize }}</h5>
      </div>
    </div>
    <div class="bg-light rounded-sm px-5 py-2">
      <div class="row border-bottom d-flex">
        <div class="col-5">
          <h5 class="m-3">First Name</h5>
        </div>
        <div class="col-7">
          <h5 class="m-3">{{ user.firstname | capitalize }}</h5>
        </div>
      </div>
      <div class="row border-bottom d-flex">
        <div class="col-5">
          <h5 class="m-3">Last Name</h5>
        </div>
        <div class="col-7">
          <h5 class="m-3">{{ user.lastname | capitalize }}</h5>
        </div>
      </div>
      <div class="row d-flex">
        <div class="col-5">
          <h5 class="m-3">Email</h5>
        </div>
        <div class="col-7">
          <h5 class="m-3">{{ user.email }}</h5>
        </div>
      </div>
    </div>

    <div class="my-2">
      <h4 class="my-2">Profile data</h4>
      <div class="bg-light rounded-sm px-5 py-2" v-if="!loadingData">
        <div class="row border-bottom d-flex">
          <div class="col-5">
            <h5 class="m-3">Status</h5>
          </div>
          <div class="col-7">
            <h5 class="m-3">{{ personalData.status | capitalize }}</h5>
          </div>
        </div>
        <div class="row border-bottom d-flex">
          <div class="col-5">
            <h5 class="m-3">Gender</h5>
          </div>
          <div class="col-7">
            <h5 class="m-3">{{ personalData.gender | capitalize }}</h5>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-5">
            <h5 class="m-3">Preferred Residence</h5>
          </div>
          <div class="col-7 d-flex" v-if="personalData.preferredLocation !== '_'">
            <router-link
              :to="`/preferredlocation?location=${personalData.preferredLocation}`"
              class="nav-link text-primary my-2"
              active-class="active"
              ><span
                >{{ personalData.preferredLocation | toUpperCase }}
                <b-icon icon="arrow-right" scale="1.4"></b-icon> CHECK THEM OUT</span
              >
            </router-link>
          </div>

          <div class="col-7 d-flex" v-else>
            <router-link
              :to="`/preferredlocation?location=allproperties`"
              class="nav-link text-primary my-2"
              active-class="active"
              ><span>CHECK OUT ALL PROPERTIES</span>
            </router-link>
          </div>
        </div>
      </div>

      <div class="justify-content-center" v-else>
        <data-loader />
      </div>
      <div class="d-flex justify-content-end ml-auto my-2">
        <p
          @click="updateProfile"
          class="px-2 btn bg-success border border-success text-white rounded"
        >
          <span> Update Profile Information </span>
        </p>
      </div>
    </div>
  </div>
</template>
<script>
import DataLoader from "../Loaders/DataLoader";
import PageLoader from "../Loaders/PageLoader";
export default {
  name: "ProfileData",
  components: {
    PageLoader,
    DataLoader,
  },
  data() {
    return {
      loadingData: true,
      loadingUpdate: false,
    };
  },
  created() {
    this.$store
      .dispatch("getPersonalData")
      .then((res) => {
        this.loadingData = false;
      })
      .catch((err) => {
        console.log(err.response);
      });
  },

  computed: {
    user() {
      return this.$store.getters.user;
    },
    personalData() {
      return this.$store.getters.personalData;
    },
  },
  methods: {
    // STILL NEEDED
    getPersonalData() {
      axios
        .get("/api/person")
        .then((res) => {
          // this.personalData = res.data;
          console.log(res.data);
          this.loadingData = false;
        })
        .then((res) => {
          this.getPreferredLocation();
        })
        .catch((err) => {
          console.log(err.message);

          this.loadingData = false;
        });
    },
    updateProfile() {
      this.$router.push("/updateProfile");
    },
    getPersonalData() {
      axios
        .get("/api/person")
        .then((res) => {
          this.personalData = res.data;
          console.log(res.data);
          this.loadingData = false;
        })
        .catch((err) => {
          console.log(err.message);

          this.loadingData = false;
        });
    },

    uploadProfileImage() {
      let data = new FormData();
      data.append("pic", this.pic);
      axios
        .post("/api/pic", data)
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    updateProfile() {
      return this.$router.push("/profile/update");
    },
  },
};
</script>
<style scoped>
.rounded-sm {
  border-radius: 20px !important;
}
.rounded-container-image {
  border-radius: 25px;
}
/* .rounded-sm > .border-bottom {
  width: 80%;
  justify-content: center;
} */
</style>
