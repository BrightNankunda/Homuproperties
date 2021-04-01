<template>
  <div class="container">
    <div v-if="loading" class="text-center my-5">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class="col-lg-10 mx-auto" v-else>
      <div class="my-5">
        <div class="row facer d-flex justify-content-center mb-4 mt-2">
          <!-- FORM -->
          <form @submit.prevent="uploadProfileImage" enctype="multipart/form-data">
            <input type="file" name="pic" hidden ref="pic" @change="showProfileImage" />
            <div
              class="photoPreview bg-light rounded-circle mt-1"
              @click="$refs.pic.click()"
            >
              <div v-if="pic">
                <img
                  :src="pic"
                  alt="Profile Image"
                  class="rounded-circle"
                  style="height: 100px; width: 150px"
                />
              </div>

              <div class="items" v-else>
                <p class="text-center">IMAGE</p>
                <p class="text-center">+</p>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
          </form>
          <!-- END OF FORM -->
        </div>
        <div class="uploadprofileImage d-flex justify-content-center" v-if="pic"></div>
        <div class="row d-flex justify-content-center my-4">
          <div class="mt-3 col-md-10 d-flex flex-row bg-light">
            <div class="col-md-4 my-2">{{ user.firstname + " " + user.lastname }}</div>
            <div class="col-md-4 my-2">{{ user.email }}</div>
            <div class="col-md-2 my-2">{{ user.phone }}</div>
          </div>
        </div>
        <div class="settings d-flex justify-content-center">SETTINGS</div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      loading: true,
      pic: null,
    };
  },
  computed: {
    user() {
      return this.$store.getters.user;
    },
  },
  created() {
    this.$store
      .dispatch("getUser")
      .then((response) => {
        this.loading = false;
      })
      .catch((err) => {
        console.log(err);
      });
  },
  methods: {
    showProfileImage(e) {
      this.pic = e.target.files[0];
      let profileReader = new FileReader();
      profileReader.readAsDataURL(this.pic);
      profileReader.onload = (e) => {
        this.pic = e.target.result;
      };
    },
    uploadProfileImage() {
      // this.loading = true;
      // let data = new FormData();
      // data.append("pic", this.pic);

      // this.$store
      //   .dispatch("uploadProfileImage", data)
      //   .then((response) => {
      //     console.log(response);
      //     this.loading = false;
      //   })
      //   .catch((err) => {
      //     console.log(err.message);
      //   });
      let data = new FormData();

      data.append("pic", this.pic);

      axios
        .post("/api/pic", data)
        .then((success) => {
          console.log(success);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
<style>
.rounded-circle {
  height: 120px;
  width: 120px;
  cursor: pointer;
}
</style>
