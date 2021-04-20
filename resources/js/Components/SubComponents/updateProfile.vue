<template>
  <div class="container mx-auto my-2">
    <h5 class="border-bottom my-2 text-center w-100">
      <span class="mx-1"><b-icon icon="person-fill" variant="danger"></b-icon></span
      >Update Account Information
    </h5>

    <div v-if="!loadingData" class="d-flex justify-content-center bg-light mt-2">
      <form
        action="PUT"
        @submit.prevent="updateProfileData"
        class="form border rounded w-100 p-4"
        enctype="x-www-form-urlencoded"
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
export default {
  data() {
    return {
      pic: null,
      loadingAdvert: true,
      loadingData: true,
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
