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
          >Home</router-link
        >
        <router-link
          to="/boss/client"
          class="nav-link text-white"
          v-if="loggedIn"
          active-class="active"
          >Add a Client</router-link
        >
        <router-link
          to="/boss/clients"
          class="nav-link text-white"
          v-if="loggedIn"
          active-class="active"
          >Clients</router-link
        >
        <router-link
          to="/boss/payment"
          class="nav-link text-white"
          v-if="loggedIn"
          active-class="active"
          >Payment Methods</router-link
        >
        <router-link
          to="/boss/property"
          class="nav-link text-white"
          v-if="loggedIn"
          active-class="active"
          >Details</router-link
        >
        <router-link
          to="#"
          v-if="loggedIn"
          active-class="active"
          class="nav-link text-white"
          >Notifications</router-link
        >
        <router-link
          to="/logout"
          class="nav-link text-white ml-auto"
          v-if="loggedIn"
          active-class="active"
          >Log out</router-link
        >
        <!--<div class="c" v-if="length">There is!</div>-->
      </div>
      <div class="col-lg-10">
        <div class="row d-flex justify-content-center">
          <h4 class="lead text-center text-success">Get Started</h4>
        </div>
        <router-view></router-view>
      </div>
    </div>
    <div class="row else" v-else>
      <div class="alert alert-danger col-lg-6">
        <h3 class="lead">
          You currently don't have any Listed Property, Please list one!
        </h3>
      </div>
      <div class="my-2">
        <router-link to="/read" class="lead">List a Property</router-link>
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
  color: rgb(6, 247, 6) !important;
  background: white;
  border: none;
  border-radius: 25px;
  margin-top: 10px;
  margin-bottom: 10px;
}
.left {
  background: rgb(2, 2, 70);
}
.nav-link {
  margin-right: 0;
}
.nav-link:hover {
  background: rgb(100, 194, 100);
  opacity: 0.8;
  border-radius: 25px;
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
