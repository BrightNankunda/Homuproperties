<template>
  <div>
    <div class="">
    <div class="row mx-auto bg-light rounded-circle">
      <div v-if="loadingData" class="my-5">
        <div class="spinner-border text-primary text-center" role="status">
          <span class="sr-only text-center">Loading...</span>
        </div>
      </div>
      <div v-else class="image">
        <img :src="'PersonalData/' + personalData.profileImage" alt="" />
      </div>
      <div class="d-flex justify-content-center my-2">
        <h5 class="mr-1">Nankunda</h5>
        <h5 class="">Bright</h5>
      </div>
    </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "ProfilePicture",
  data() {
    return {
      loadingData: true,
      personalData: null,
    };
  },
  methods: {
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
};
</script>
