<template>
  <div class="container mx-auto my-3">
    <h5 class="border-bottom my-3 text-center w-100">
      <span class="mx-1"><b-icon icon="person-fill" variant="danger"></b-icon></span
      >Update Account Information
    </h5>
    <div
      class="row border d-flex justify-content-center bg-light mt-2 rounded w-100"
      style="min-height: 60vh"
      v-if="loadingData"
    >
      <div class="w-100 d-flex justify-content-center flex-col m-auto">
        <page-loader />
      </div>
    </div>
    <div class="d-flex justify-content-center bg-light mt-2" v-else>
      <form
        action="PUT"
        @submit.prevent="updateProfileData"
        class="form border rounded w-100 p-4"
        enctype="x-www-form-urlencoded"
        style="min-height: 60vh"
      >
        <div class="form-group">
          <label for="status">Status</label>
          <select
            name="status"
            v-model="personalData.status"
            class="form-control form-control-sm"
            id="status"
          >
            <option disabled>Select Your preferred status</option>
            <option value="user">User</option>
            <option value="landlord">Land Lord</option>
          </select>
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <input
            id="gender"
            type="text"
            class="form-control-sm form-control"
            v-model="personalData.gender"
          />
        </div>
        <div class="form-group">
          <label for="location">Location</label>
          <input
            type="text"
            id="location"
            class="form-control-sm form-control"
            v-model="personalData.preferredLocation"
          />
        </div>

        <div class="d-flex justify-content-center">
          <button class="btn btn-primary" type="submit">Update Profile</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import PageLoader from "../Loaders/PageLoader.vue";
export default {
  components: {
    PageLoader,
  },
  data() {
    return {
      pic: null,
      loadingData: false,
      advertData: null,
      personalData: null,
      preferredProperty: null,
      profileImage: null,
    };
  },
  created() {
    this.getPersonalData();
  },
  methods: {
    updateProfileData() {
      axios
        .patch("/api/person/" + this.personalData.id, {
          status: this.personalData.status,
          gender: this.personalData.gender,
          preferredLocation: this.personalData.preferredLocation,
        })
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    getPersonalData() {
      this.loadingData = true;
      axios
        .get("/api/person")
        .then((res) => {
          this.personalData = res.data;
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
    showProfileImage(e) {
      this.profileImage = e.target.files[0];
    },
  },
};
</script>
