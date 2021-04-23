<template>
  <div class="mt-2 mb-2">
    <div v-if="loading" class="text-center loader">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class="row form-container" v-else>
      <div v-if="loginerr" class="col-lg-6 mx-auto alert alert-danger">
        <p class="text-center text-danger">{{ loginerr }}</p>
      </div>

      <div class="col-lg-6 my-4">
        <div class="card my-2">
          <div class="card-header">
            <h1 class="lead">Welcome back, Login</h1>
          </div>
          <div class="card-body">
            <form
              method="POST"
              @submit.prevent="login"
              class="form-horizontal has-success"
            >
              <div class="form-group">
                <label for="Email">Email</label>
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  :class="{ err: emptyemail || emailerr }"
                  v-model="user.email"
                />
                <span class="icon"><b-icon icon="exaclamation"></b-icon></span>
                <div class="" v-if="emailerr">
                  <p class="text-danger">Enter Correct Email Format</p>
                </div>
                <div class="" v-if="emptyemail">
                  <p class="text-danger">Email required!</p>
                </div>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  name="password"
                  :class="{ err: passwordlength }"
                  class="form-control"
                  v-model="user.password"
                />
                <div class="" v-if="passwordlength">
                  <p class="text-danger">Atleast 6 Characters for the password!</p>
                </div>
                <div class="" v-if="highpassword">
                  <p class="text-danger">Password is Too long!</p>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary m-auto px-4">Login</button>
              </div>
              <div class="d-flex justify-content-center">
                <span>New? Create an account, </span>
                <router-link to="/register" class="mx-2"> Sign Up</router-link>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login",
  data: () => ({
    user: {
      email: "",
      password: "",
    },
    loginerr: null,
    emailerr: false,
    emptyemail: false,
    passwordlength: false,
    highpassword: false,
    loading: false,
  }),

  methods: {
    validatepassword() {
      if (this.user.password.length < 6) {
        this.passwordlength = true;
      } else if (this.user.length > 15) {
        this.highpassword = true;
      }
    },
    validateemail() {
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.user.email)) {
        console.log("email");
        // return (this.email.err = true);
      } else {
        this.emailerr = true;
      }
    },
    email() {
      return this.user.email;
    },
    validatemail() {
      if (this.user.email.length === 0) {
        this.emptyemail = true;
      }
    },
    removeerrs() {
      this.passwordlength = this.emptyemail = this.emailerr = false;
    },
    login() {
      this.validateemail();
      this.validatemail();
      this.validatepassword();
      if (this.emailerr || this.passwordlength || this.emptyemail) {
        console.log("ERRORS");
        setTimeout(this.removeerrs, 4000);
        return;
      }
      this.loading = true;
      this.$store
        .dispatch("loginUser", this.user)
        .then((response) => {
          this.$router.push("/");
          this.loading = false;
          return;
        })
        .catch((err) => {
          if ((err.response.status = 404)) {
            this.loginerr = "Invalid Password or Email!";
          }
          this.loading = false;
          return;
        });
    },
  },
};
</script>

<style scoped>
.form-group {
  margin: 20px;
}
.form-container {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-content: center;
}
.btn-primary {
  /* background: white !important;
  border: 2px solid blue !important;
  border-radius: 10px;
  color: blue !important; */
  border-radius: 12px !important;
}
.btn-primary:hover {
  opacity: 0.8 !important;
}
.err {
  border: 2px solid red;
}
.log {
  min-height: calc(100vh - 60px);
}
.loader {
  min-height: calc(100vh - 60px);
  display: flex;
  justify-content: center;
  align-items: center;
}
.center {
  display: flex;
  align-items: center;
}
.alert-danger {
  padding: 0 !important;
  margin: 0 !important;
}
</style>
