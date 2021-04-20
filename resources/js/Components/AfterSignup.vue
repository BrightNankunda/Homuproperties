<template>
  <div class="container">
    <div class="d-flex justify-content-center">
      <h4 class="my-2">Finish Sign up!</h4>
    </div>
    <form
      action="POST"
      @submit.prevent="uploadData"
      enctype="multipart/form-data"
      class="my-3 border rounded-lg p-3"
    >
      <div class="bg-light rounded-sm px-4 py-2">
        <div class="row border-bottom d-flex mb-2">
          <div class="col-3 m-3">
            <p>Status:</p>
          </div>
          <div class="col-8 d-flex justify-content-center my-2">
            <select
              name="status"
              v-model="status"
              class="form-control form-control-sm"
              id="status"
            >
              <option disabled>Select Status</option>
              <option value="user">User</option>
              <option value="landlord">Land Lord</option>
            </select>
          </div>
        </div>
        <div class="row border-bottom d-flex mb-2">
          <div class="col-3 m-3">
            <p class="">Gender:</p>
          </div>
          <div class="col-8 form-group">
            <select
              class="custom-select form-control form-control-sm"
              name="gender"
              v-model="gender"
              id="gender"
            >
              <option disabled>Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-3 m-3">
            <p class="">Preferred Location:</p>
          </div>
          <div class="col-8 form-group">
            <input
              type="text"
              class="form-control form-control-sm"
              v-model="preferredLocation"
              placeholder="Preferred Location"
            />
          </div>
        </div>

        <div class="form-group my-2">
          <label for="pic">Add a Profile Image</label>
          <input type="file" @change="picImage" id="pic" name="pic" />
        </div>
        <div class="buttons d-flex justify-content-between my-2">
          <button class="btn btn-default">Skip</button
          ><button class="btn btn-primary">Finish</button>
        </div>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      status: null,
      gender: null,
      preferredLocation: null,
      pic: null,
    };
  },
  methods: {
    uploadData() {
      let data = new FormData();
      data.append("status", this.status);
      data.append("gender", this.gender);
      data.append("preferredLocation", this.preferredLocation);
      data.append("profileImage", this.pic);
      axios
        .post("/api/person", data)
        .then((response) => {
          console.log(response.data);
        })
        .catch((err) => {
          console.log(err.message);
        });
    },
    picImage(e) {
      this.pic = e.target.files[0];
    },
  },
};
</script>
<style scoped>
.container {
  color: rgb(27, 24, 24);
}
</style>
