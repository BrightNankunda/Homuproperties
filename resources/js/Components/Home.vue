<template>
  <div class="home w-100">
    <div>
      <b-navbar toggleable="lg" type="light" variant="light" class="shadow-sm">
        <router-link class="px-3" to="/" active-class="active" exact
          ><b-icon icon="house-fill" variant="dark" scale="1.6"></b-icon
        ></router-link>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item-dropdown text="Apartments" class="nav-title text-dark mx-1" right>
              <b-dropdown-item to="/apartments/Kampala">Kampala</b-dropdown-item>
              <b-dropdown-item to="/apartments/Kira">Kira</b-dropdown-item>
              <b-dropdown-item to="/apartments/Kawempe">Kawempe</b-dropdown-item>
              <b-dropdown-item to="/apartments/Central">Central</b-dropdown-item>
            </b-nav-item-dropdown>

            <b-nav-item-dropdown text="Arcades" class="mx-1" right>
              <b-dropdown-item to="/arcades/Kampala">Kampala</b-dropdown-item>
              <b-dropdown-item to="/arcades/Kira">Kira</b-dropdown-item>
              <b-dropdown-item to="/arcades/Kawempe">Kawempe</b-dropdown-item>
              <b-dropdown-item to="/arcades/Central">Central</b-dropdown-item>
            </b-nav-item-dropdown>

            <b-nav-item-dropdown text="Estates" class="mx-1" right>
              <b-dropdown-item to="/estates/Kampala">Kampala</b-dropdown-item>
              <b-dropdown-item to="/estates/Kira">Kira</b-dropdown-item>
              <b-dropdown-item to="/estates/Kawempe">Kawempe</b-dropdown-item>
              <b-dropdown-item to="/estates/Central">Central</b-dropdown-item>
            </b-nav-item-dropdown>

            <b-nav-item-dropdown text="Rentals" class="mx-1" right>
              <b-dropdown-item to="/rentals/Kampala">Kampala</b-dropdown-item>
              <b-dropdown-item to="/rentals/Kira">Kira</b-dropdown-item>
              <b-dropdown-item to="/rentals/Kawempe">Kawempe</b-dropdown-item>
              <b-dropdown-item to="/rentals/Central">Central</b-dropdown-item>
            </b-nav-item-dropdown>

            <b-nav-item-dropdown text="Offices" class="mx-1" right>
              <b-dropdown-item to="/offices/Kampala">Kampala</b-dropdown-item>
              <b-dropdown-item to="/offices/Kira">Kira</b-dropdown-item>
              <b-dropdown-item to="/offices/Kawempe">Kawempe</b-dropdown-item>
              <b-dropdown-item to="/offices/Central">Central</b-dropdown-item>
            </b-nav-item-dropdown>

            <b-nav-item-dropdown text="Hostels" class="mx-1" right>
              <b-dropdown-item to="/hostels/kiu">KIU</b-dropdown-item>
              <b-dropdown-item to="/hostels/Makerere">MAK</b-dropdown-item>
              <b-dropdown-item to="/hostels/Kyambogo">Kyambogo</b-dropdown-item>
              <b-dropdown-item to="/hostels/must">MUST</b-dropdown-item>
            </b-nav-item-dropdown>
          </b-navbar-nav>

          <b-navbar-nav class="ml-auto">
            <router-link
              to="/read"
              class="nav-link text-dark lead px-3 d-none d-lg-block"
              active-class="active"
              >List a Property</router-link
            >
            <div
              v-if="!loggedIn"
              class="nav-item mb-xs-2 mb-md-2 mb-lg-0 login d-flex justify-content-center align-content-center py-auto mr-4"
            >
              <router-link
                to="/login"
                class="nav-link w-100 py-2 px-3 btn login-btn"
                active-class="active"
                >Login</router-link
              >
            </div>
            <!-- <div
              class="nav-item signin d-flex justify-content-center align-content-center py-auto mr-4"
            >
              <router-link
                to="/register"
                v-if="!loggedIn"
                class="nav-link w-100 py-2 px-3 btn signin-btn"
                active-class="active"
                >Sign In</router-link
              >
            </div> -->

            <b-nav-item-dropdown right v-if="loggedIn">
              <template #button-content>
                <em>{{ user.lastname }}</em>
              </template>
              <div class="loop">
                <router-link to="/profile" class="pl-2" v-if="loggedIn"
                  ><b-icon icon="person"></b-icon>Profile</router-link
                >
                <router-link to="/boss/home" class="pl-2" v-if="loggedIn"
                  ><b-icon icon="list"></b-icon>Property Details</router-link
                >
                <router-link to="/logout" class="pl-2" v-if="loggedIn"
                  ><b-icon icon="power"></b-icon>Logout</router-link
                >
              </div>
            </b-nav-item-dropdown>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
    </div>
    <!--LOADER -->
    <div class="spinner-border text-primary" hidden role="status">
      <span class="sr-only">Loading...</span>
    </div>

    <router-view></router-view>

    <!--===FOOTER==-->
    <footer class="container-fluid bg-dark border-top border-primary">
      <div class=" ">
        <div class="">
          <div class="d-flex justify-content-center p-2">
            <router-link to="/" class="text-center text-white p-2"
              >HomuProperties</router-link
            >
            <router-link to="/terms" class="text-center text-white p-2"
              >Terms of Use</router-link
            >
            <router-link to="/privacy" class="text-center text-white p-2"
              >Privacy</router-link
            >
            <router-link to="/explore" class="text-center text-white p-2"
              >Explore</router-link
            >
          </div>

          <div class="d-flex justify-content-center p-2">
            <router-link to="#" class="text-center contact text-white p-2"
              >Contacts:</router-link
            >
            <router-link to="/tel" class="text-center text-white p-2"
              >0772996606</router-link
            >
            <router-link to="/sendMail" class="text-center text-white p-2"
              >nbr@gmail.com</router-link
            >
          </div>
        </div>
      </div>

      <!-- <div class="row query pb">
            <router-link to=""><i class="fa fa-facebook mx-auto px-4 align-middle"></i></router-link>
            <router-link to=""><i class="fa fa-twitter mx-auto px-4 text-whiter"></i></router-link>
            <router-link to=""><i class="fa fa-instagram mx-auto px-4"></i></router-link>
            <router-link to=""><i class="fa fa-linked mx-auto px-4"></i></router-link>
            <router-link to=""><i class="fa fa-youtube mx-auto px-4"></i></router-link>
          </div> -->

      <p class="lead text-center text-white py-4">
        Copy Rights Reserved Designed By Nintey Seven
      </p>
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  created() {
    axios.defaults.headers.common["Authorization"] =
      "Bearer " + localStorage.getItem("token");
    if (this.loggedIn) {
      this.$store.dispatch("getUser");
    }
  },
  watch: {
    $route(to, from) {
      if (to.path === "/" && from.path === "/login") {
      } else if (this.loggedIn) {
        this.$store.dispatch("getUser");
      }
    },
    $route(to, from) {
      if (this.loggedIn) {
        this.$store.dispatch("getUser");
      }
    },
    loggedIn(newval, oldval) {
      if (newval === true) {
        this.$store.dispatch("getUser");
        console.log("Logged in");
      }
      console.log(newval);
    },
  },

  computed: {
    loggedIn() {
      return this.$store.getters.loggedIn;
    },
    user() {
      return this.$store.getters.user;
    },
  },

  methods: {},
};
</script>

<style scoped>
.home {
  box-sizing: border-box;
  overflow: hidden;
}
.inp {
  position: relative;
}
.lead {
  font-size: 95%;
}
.icon {
  position: absolute;
  right: 5px;
  top: 3px;
  z-index: 10;
  border: none;
}
.login {
  color: blue !important;
  border: 1px solid blue;
  border-radius: 10px;
  background: white;
  display: flex;
  justify-content: center;
  align-content: center;
}
.login:hover {
  background: blue !important;
  color: white;
  cursor: pointer;
}
.signin {
  color: green !important;
  border: 1px solid green;
  border-radius: 10px;
  background: white;
  display: flex;
  justify-content: center;
  align-content: center;
}
.signin:hover {
  background: green !important;
  cursor: pointer;
  color: white !important;
}
.signin-btn {
  color: green !important;
  border-radius: 10px !important;
}
.signin-btn:hover {
  color: white !important;
}
.login-btn {
  color: blue !important;
  border-radius: 10px !important;
}
.login-btn:hover {
  color: white !important;
}
.header {
  max-height: 45px;
  display: flex;
  text-align: center;
}
.loop {
  display: flex;
  flex-direction: column;
}

.search {
  border: none !important;
  border-radius: 10px;
  -webkit-box-shadow: 2px 2px 5px 1px #7d84e7;
  -moz-box-shadow: 2px 2px 5px 1px #7d84e7;
  box-shadow: 2px 2px 5px 1px #7d84e7;
}

.tree {
  line-height: 90%;
  display: flex;
  text-align: center;
}
.active {
  text-decoration: underline;
}
.nav-link {
  font-family: sans-serif;
  transition: all 0.2s linear;
  font-size: auto;
  color: black;
}
/* .nav-title,
.nav-text {
  font-size: auto !important;
  color: black !important;
}

.nav-text:hover {
  color: blue !important;
} */
.nav-link:hover {
  text-decoration: underline;
}
/*@media screen and (max-width : 900px) {
        .cat {
          display: none;
        }
        .nav-link:hover {
          text-decoration: underline;
          letter-spacing: 5px;

        }
      }*/
.conatct {
  text-decoration: none;
}
ul > li {
  list-style-type: none;
}
footer {
  background: black !important;
}
@media screen and (max-width: 768px) {
  .cat {
    display: none;
  }
}
</style>
