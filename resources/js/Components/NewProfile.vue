<template>
  <div class="fluid-container">
    <div class="row">
      <!-- USER CONTAINER -->
      <div class="col-lg-3 mx-3 my-2">
        <div class="w-80 mx-auto">
          <div class="row mx-auto user-profile bg-light rounded-circle">
            <div v-if="loadingData" class="my-5">
              <div class="spinner-border text-primary text-center" role="status">
                <span class="sr-only text-center">Loading...</span>
              </div>
            </div>
            <div v-else class="image">
              <img :src="'PersonalData/' + personalData.profileImage" alt="" />
            </div>
          </div>
          <!-- USER NAME -->
          <div class="d-flex justify-content-center my-2">
            <h5 class="mr-1">Nankunda</h5>
            <h5 class="">Bright</h5>
          </div>
          <div class="w-80">
            <div class="row border rounded p-2">
              <h5 class="user-link w-100">
                <span class="mx-1"
                  ><b-icon icon="person-fill" variant="danger"></b-icon></span
                >Update Profile
              </h5>
              <h5 class="user-link w-100">
                <span class="mx-1"
                  ><b-icon icon="person-fill" variant="danger"></b-icon></span
                >List a property
              </h5>
              <h5 class="user-link w-100">
                <span class="mx-1"
                  ><b-icon icon="person-fill" variant="danger"></b-icon></span
                >Messages
              </h5>
              <h5 class="user-link w-100">
                <span class="mx-1"
                  ><b-icon icon="person-fill" variant="danger"></b-icon></span
                >Notifications
              </h5>
              <h5 class="user-link w-100">
                <span class="mx-1"
                  ><b-icon icon="person-fill" variant="danger"></b-icon></span
                >Gayaza Properties
              </h5>
              <h5 class="user-link w-100">
                <span class="mx-1"
                  ><b-icon icon="person-fill" variant="danger"></b-icon></span
                >Payment Details
              </h5>
            </div>
          </div>
        </div>
        <div class="space"></div>
        <div class="row border my-1">
          <h5 class="w-100">
            <span class="mx-1"><b-icon icon="person-fill" variant="danger"></b-icon></span
            >Log out
          </h5>
        </div>
      </div>
      <!-- USER INFORMATION -->
      <div class="col-lg-5 mx-4">
        <h5 class="border-bottom my-2 text-center w-100">
          <span class="mx-1"><b-icon icon="person-fill" variant="danger"></b-icon></span
          >Account Information
        </h5>
        <div class="my-4">
          <div class="d-flex">
            <div class="form-group col-30 mr-1">
              <label for="firstname">First Name</label>
              <input
                type="text"
                id="firstname"
                class="w-100 form-control"
                value="Nankunda"
              />
            </div>
            <div class="form-group col-30 mr-1">
              <label for="lastname">Last Name</label>
              <input
                type="text"
                id="lastname"
                class="w-100 form-control"
                value="Nankunda"
              />
            </div>
            <div class="form-group col-30 mr-1">
              <label for="email">Email</label>
              <input
                type="email"
                id="email"
                class="w-100 form-control"
                value="Nankunda"
              />
            </div>
          </div>
          <div class="my-2">
            <h4 class="text-center text-success">Profile data</h4>
            <div v-if="!loadingData" class="d-flex">
              <input
                type="text"
                class="col-30 form-control mr-1"
                v-model="personalData.status"
              />
              <input
                type="text"
                class="col-30 form-control mr-1"
                v-model="personalData.gender"
              />
              <input
                type="text"
                class="col-30 form-control mr-1"
                v-model="personalData.preferredLocation"
              />
            </div>
            <div class="d-flex justify-content-end ml-auto my-2">
              <span class="px-2 bg-success border border-success text-white rounded">
                +
              </span>
            </div>
          </div>
        </div>
        <div v-if="!loadingData" class="row">
          <form @submit.prevent="uploadProfileImage" enctype="multipart/form-data">
            <input type="file" name="pic" @change="showProfileImage" />
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="row border">
          <h5>RECCOMMENDED</h5>
          <h3 class="">PROPERTY DETAILS</h3>
        </div>
      </div>
      <div class="col-lg-3 mx-3">
        <div class="row">
          <div class="advert">
            <h5>COMPANY BIO</h5>
          </div>
        </div>
        <div class="row">
          <div class="propertyoftheweek">
            <h5>RECOMMENDED PROPERTY</h5>
          </div>
        </div>
        <div class="row d-flex justify-content-center bg-light">
          <div class="preferredproperty">
            <div v-if="loadingAdvert" class="my-5">
              <div class="spinner-border text-primary text-center" role="status">
                <span class="sr-only text-center">Loading...</span>
              </div>
            </div>
            <div class="w-100" v-else>
              <div class="card">
                <div class="card-header">
                  <img
                    :src="'images/' + advertData.advert_image"
                    alt="Advert Image"
                    class="w-100"
                  />
                </div>
                <div class="card-footer">
                  <h4 class="text-center">{{ advertData.advert_header }}</h4>
                  <h5 class="text-center">{{ advertData.advert_body }}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
    };
  },
  created() {
    this.advert();
    this.getPersonalData();
  },
  methods: {
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
    advert() {
      this.loadingAdvert = true;
      axios
        .get("/api/oneAdvert")
        .then((res) => {
          this.advertData = res.data;
          console.log(res.data);
          this.loadingAdvert = false;
        })
        .catch((err) => {
          console.log(err.message);

          this.loadingAdvert = false;
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
        .catch((err) => {
          console.log(err.message);

          this.loadingData = false;
        });
    },
    showProfileImage(e) {
      this.pic = e.target.files[0];
      // let profileReader = new FileReader();
      // profileReader.readAsDataURL(this.pic);
      // profileReader.onload = (e) => {
      //   this.pic = e.target.result;
      // };
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
.space {
  height: 20vh;
  width: 100%;
}
.user-link {
  cursor: pointer;
}
.user-link:hover {
  background: rgb(218, 216, 216);
}
.advert {
  height: 30vh;
}
.preferredlocation,
.propertyoftheweek {
  height: 35vh;
}
</style>
