<template>
  <div class="mt-2">
    <div v-if="loading" class="text-center loader">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class="row justify-content-center" v-else>
      <div class="col-lg-5">
        <div class="card">
          <div class="card-header">
            <h1 class="lead">Register</h1>
          </div>
          <div class="d-flex justify-content-center m-2" v-if="error">
            <div class="alert alert-danger">
              <p>{{ error }}</p>
            </div>
          </div>
          <div class="card-body">
            <form method="POST" @submit.prevent="register">
              <div class="form-group">
                <label for="firstname">First Name:</label>
                <input
                  type="text"
                  name="firstname"
                  class="form-control"
                  :class="{ err: fnameserr || flnameserr }"
                  v-model="user.firstname"
                  placeholder="First Name..."
                />
                <div class="" v-if="fnameserr">
                  <p class="text-danger">First Name is required!</p>
                </div>
                <div class="" v-if="flnameserr">
                  <p class="text-danger">First Name is too Long!</p>
                </div>
              </div>

              <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input
                  type="text"
                  name="lastname"
                  class="form-control"
                  :class="{ err: lnameserr || llnameserr }"
                  v-model="user.lastname"
                  placeholder="Last Name..."
                />
                <div class="" v-if="lnameserr">
                  <p class="text-danger">Last Name is required!</p>
                </div>
                <div class="" v-if="llnameserr">
                  <p class="text-danger">Last Name is too Long!</p>
                </div>
              </div>

              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input
                  type="text"
                  name="phone"
                  class="form-control"
                  :class="{ err: phoneerr }"
                  v-model="user.phone"
                  placeholder="Phone Number..."
                />
                <div class="" v-if="phoneerr">
                  <p class="text-danger">Enter a Valid Mobile Number!</p>
                </div>
              </div>

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
                <button type="submit" class="btn btn-primary m-auto">Register</button>
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
  name: "Register",

  data: () => ({
    user: {
      firstname: "",
      lastname: "",
      phone: "",
      email: "",
      password: "",
    },

    error: null,
    emailerr: false,
    emptyemail: false,
    passwordlength: false,
    highpassword: false,
    phoneerr: false,
    loading: false,
    fnameserr: false,
    lnameserr: false,
    flnameserr: false,
    llnameserr: false,
  }),
  methods: {
    removeError() {
      setTimeout(() => {
        return (this.error = null);
      }, 4000);
    },
    validatefnames() {
      if (this.user.firstname.trim().length === 0) {
        this.fnameserr = true;
      }
    },
    validatelnames() {
      if (this.user.lastname.trim().length === 0) {
        this.lnameserr = true;
      }
    },
    validateflnames() {
      if (this.user.firstname.trim().length > 15) {
        this.flnameserr = true;
      }
    },
    validatellnames() {
      if (this.user.lastname.trim().length > 15) {
        this.llnameserr = true;
      }
    },
    validatephone() {
      if (this.user.phone.trim().length != 10) {
        this.phoneerr = true;
      }
    },
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
      this.passwordlength = this.emptyemail = this.emailerr = this.phoneerr = this.lnameserr = this.fnameserr = this.llnameserr = this.flnameserr = false;
    },
    register() {
      this.validateflnames();
      this.validatellnames();
      this.validatefnames();
      this.validatelnames();
      this.validatephone();
      this.validateemail();
      this.validatemail();
      this.validatepassword();
      if (this.emailerr || this.passwordlength || this.emptyemail || this.phoneerr) {
        console.log("ERRORS");
        setTimeout(this.removeerrs, 4000);
        return;
      }
      this.loading = true;
      this.$store
        .dispatch("registerUser", this.user)
        .then((response) => {
          let id = response.data.user.id;
          this.$router.replace({ path: "/finish", query: { id: id } });
          this.loading = false;
        })
        .catch((err) => {
          const errors = err.response.data.errors;
          if (errors != "") {
            Object.values(errors).map(function (value) {
              console.log(value[0]);
            });
          }
          if ((err.status = 422)) this.error = "Phone or Email is already in use";
          this.removeError();
          this.loading = false;
        });
    },
  },
};
</script>

<style scoped>
.loader {
  min-height: calc(100vh - 60px);
  display: flex;
  justify-content: center;
  align-items: center;
}
.err {
  border: 2px solid red;
}
</style>
