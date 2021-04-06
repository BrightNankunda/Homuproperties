<template>
  <div class="container">
    <form
      action="POST"
      @submit.prevent="uploadData"
      enctype="multipart/form-data"
      class="my-3"
    >
      <div class="form-group">
        <label for="status">Status</label>
        <select name="status" v-model="status" class="form-control" id="status">
          <option disabled value="">Select Your preferred status</option>
          <option value="user">User</option>
          <option value="landlord">Land Lord</option>
        </select>
      </div>
      <div class="form-group">
        <label for="gender">Gender: </label>
        <select name="gender" v-model="gender" class="form-control" id="gender">
          <option disabled value="Gender">Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div class="form-group">
        <label for="location">Preferred Location</label>
        <input
          type="text"
          class="form-control"
          v-model="preferredLocation"
          placeholder="Preferred Location"
        />
      </div>
      <div class="form-group">
        <label for="pic">Add a Profile Image</label>
        <input type="file" @change="picImage" id="pic" name="pic" />
      </div>
      <div class="buttons d-flex justify-content-between">
        <button class="btn btn-default">Skip</button
        ><button class="btn btn-primary">Finish</button>
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
