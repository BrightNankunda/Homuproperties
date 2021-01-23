<template>
  <div class="mt-2 mb-2">
    <div v-if="loading" class="text-center loader">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class="row justify-content-center" v-else>
      <div class="col-lg-5 my-5">
        <div class="card my-5">
          <div class="card-header">
            <h1 class="lead">Login</h1>
          </div>
          <div class="card-body">
            <form method="POST" @submit.prevent="login">
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="email" class="form-control" :class="{ err: emptyemail || emailerr }" v-model="user.email" />
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
                <input type="password" name="password" :class="{ err: passwordlength }" class="form-control" v-model="user.password" />
                <div class="" v-if="passwordlength">
                  <p class="text-danger">Atleast 6 Characters for the password!</p>
                </div>
                <div class="" v-if="highpassword">
                  <p class="text-danger">Password is Too long!</p>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary m-auto">Login</button>
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
      this.$store.dispatch("loginUser", this.user).then((response) => {
        this.$router.push("/");
        this.loading = false;
      });
    },
  },
};
</script>

<style scoped>
.form-group {
  margin: 20px;
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
</style>
