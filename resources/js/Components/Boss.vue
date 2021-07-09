<template>
  <div>
    <div class="row" v-if="length > 0">
      <div class="left col-lg-2">
        <router-link
          to="/boss/home"
          class="nav-link text-white"
          v-if="loggedIn"
          active-class="active"
          exact
          >HOME</router-link
        >
        <div class="border-top my-1"></div>

          <router-link
          to="/boss/likers"
          class="nav-link text-white"
          v-if="loggedIn"
          active-class="active">
          LIKES</router-link>

          <router-link
          to="/boss/clients"
          class="nav-link text-white"
          v-if="loggedIn"
          active-class="active"
          >CLIENTS</router-link
        >
        <router-link
          to="/boss/client"
          class="nav-link text-white"
          v-if="loggedIn"
          active-class="active"
          >ADD A CLIENT</router-link
        >
        <div class="border-top my-1"></div>
        <router-link
          to="/boss/payment"
          class="nav-link text-white"
          v-if="loggedIn"
          active-class="active"
          >PAYMENT METHODS</router-link
        >
        <router-link
          to="/boss/property"
          class="nav-link text-white"
          v-if="loggedIn"
          active-class="active"
          >DETAILS</router-link
        >
        <router-link
          to="/logout"
          class="nav-link text-white mt-auto logout"
          v-if="loggedIn"
          active-class="active"
          >LOG OUT</router-link
        >
        <!--<div class="c" v-if="length">There is!</div>-->
      </div>
      <div class="col-lg-10">
        <div class="row d-flex justify-content-center">
          <h4 class="lead text-center text-success">Get Started</h4>
        </div>
        <div class="view">
          <router-view></router-view>
        </div>
      </div>
    </div>
    <div class="row else" v-else>
      <div class="alert alert-danger col-lg-6 my-5">
        <h4 class="text-center m-4">
          <b-icon icon="calendar-plus" class="mx-auto" scale="3"></b-icon>
        </h4>
        <h3 class="lead text-center my-3">
          You currently don't have any Listed Property, Please list one!
        </h3>
        <div class="my-4 d-flex justify-content-center">
          <router-link
            to="/read"
            class="lead list-link text-center rounded border-primary px-2"
            >List a Property</router-link
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      length: 0,
    };
  },
  created() {
    this.properties();
  },
  computed: {
    loggedIn() {
      return this.$store.getters.loggedIn;
    },
    // length() {
    //   return this.$store.getters.properties.length != 0;
    // },
  },
  methods: {
    properties(context) {
      // axios.defaults.headers.common["Authorization"] = "Bearer " + context.state.token;

      axios
        .get("api/see")
        .then((response) => {
          let length = response.data.length;
          this.length = length;
        })
        .catch((err) => {
          console.log(err);
        });
    },
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
.left {
  background: rgb(49, 49, 212);
  min-height: 90%;
}
.list-link {
  background: white !important;
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
.else {
  display: flex;
  flex-direction: column;
  min-height: 200px;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
