<template>
  <div>
    <router-link to="/profile" class="nav-link text-white" active-class="active" exact
      >PROFILE</router-link
    >
    <div class="border-top my-1"></div>

    <!-- <router-link to="/boss/clients" class="nav-link text-white" active-class="active"
      >EDIT PROFILE</router-link
    > -->
    <router-link
      v-if="location !== '_'"
      :to="`/preferredlocation?location=${location}`"
      class="nav-link text-white"
      active-class="active"
      ><span>{{ location | toUpperCase }} PROPERTIES</span>
    </router-link>
    <router-link
      v-else
      :to="`/allProperties`"
      class="nav-link text-white"
      active-class="active"
    >
      <span> ALL PROPERTIES</span></router-link
    >
    <router-link to="/profile/likes" active-class="active" class="nav-link text-white"
      >LIKED</router-link
    >
    <!-- <router-link to="#" active-class="active" class="nav-link text-white"
      >NOTIFICATIONS</router-link
    > -->
    <div class="border-top my-1"></div>
    <router-link to="/read" class="nav-link text-white" active-class="active"
      >LIST A PROPERTY</router-link
    >

    <div class="border-top my-1"></div>
    <router-link to="/logout" class="nav-link text-white logout" active-class="active"
      >LOG OUT</router-link
    >
  </div>
</template>
<script>
export default {
  name: "ProfileLinks",
  data() {
    return {
      location: null,
    };
  },
  created() {
    this.$store
      .dispatch("getPersonalData")
      .then((res) => {
        this.location = res.data.preferredLocation;
        this.loadingData = false;
      })
      .catch((err) => {
        console.log(err.response);
      });
  },
};
</script>
<style scoped>
.active {
  font-size: 1.1em;
  padding-left: 20px;
  color: white !important;
  border: 1px solid gray;
  border-radius: 6px;
  margin-top: 10px;
  margin-bottom: 10px;
}

.view {
  min-height: 85vh;
}
.nav-link {
  margin-right: 0;
  color: gray;
  margin: 5px;
  font-size: 80%;
}
.nav-link:hover {
  border: 1px solid white;
  opacity: 0.8;
  border-radius: 6px;
}
.logout {
  color: red !important;
}
.logout:hover {
  border: 1px solid red;
  background: none;
}
</style>
