<template>
  <div class="fluid-container">
    <div class="row">
      <div class="left col-lg-2">
        <ProfileLinks />
      </div>

      <div class="col-lg-6 mx-4">
        <!-- <div class="my-5">
          <ProfilePicture />
        </div> -->
        <div class="my-3">
          <h5 class="border-bottom d-flex justify-content-center">
            <span class="mx-1"><b-icon icon="person-fill" variant="danger"></b-icon></span
            >Account Information
          </h5>
        </div>
        <div class="my-2">
          <ProfileData />
        </div>
      </div>
      <div class="col-lg-3 mx-3">
        <ProfileAdvert />
      </div>
    </div>
  </div>
</template>
<script>
import ProfileLinks from "./ProfileComponents/ProfileLinks";
import ProfileAdvert from "./ProfileComponents/ProfileAdvert";
import ProfilePicture from "./ProfileComponents/ProfilePicture";
import ProfileData from "./ProfileComponents/ProfileData";
export default {
  components: {
    ProfileLinks,
    ProfileAdvert,
    ProfilePicture,
    ProfileData,
  },
  data() {
    return {
      pic: null,

      preferredProperty: null,
      container: false,
    };
  },

  methods: {
    toggleTransition() {
      return (this.container = !this.container);
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
<style scoped>
.user-link {
  cursor: pointer;
}
.fluid-container {
  color: #141414;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: 300;
}
.user-link:hover {
  background: rgb(218, 216, 216);
  padding: 4px;
}

.profileLink {
  text-decoration: none;
}
.profileLink:hover {
  background: rgb(218, 216, 216);
  padding: 4px;
}

.left {
  background: rgb(49, 49, 212);
}
</style>
