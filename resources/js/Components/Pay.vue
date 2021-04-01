<template>
  <div class="container my-2 shadow">
    <div v-if="loading" class="text-center loader my-5">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div v-else>
      <div v-if="len === 0">
        <div class="alert alert-danger">
          <h3 class="lead">You currently don't have any listed property!</h3>
        </div>
        <div class="my-2">
          <router-link to="/read" class="lead">List a Property</router-link>
        </div>
      </div>
      <div v-else>
        <div class="top shadow">
          <div class="row mx-auto my-4 bg-light p-3">
            Pay Amount to complete Listing: Ugx:
            <strong>
              <span class="kamount">{{ info.amount }}</span></strong
            >
          </div>
          <!--Form-->
          <!-- <div class="col-md-8 my-3">
            <form @submit.prevent="mtn">
              <div class="form-group">
                <input
                  type="text"
                  name="phone"
                  class="form-control"
                  v-model="details.phone"
                  @keyup.enter="mtn"
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  name="name"
                  hidden
                  class="form-control"
                  v-model="details.name"
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  name="amount"
                  hidden
                  class="form-control"
                  v-model="details.amount"
                />
              </div>
              <div class="name justify-content-center text-primary">
                {{ details.name }}
              </div>
              <div class="col-lg-1">
                <img
                  :src="'mtn/' + 'mtn.jpg'"
                  alt="mtn"
                  type="submit"
                  class="m-3"
                  @click="getStatus"
                  style="max-height: 30px; width: 60px"
                />
              </div>
            </form>
          </div> -->
        </div>
        <!--PAY-->
        <!-- <div class="text-center m-1" v-if="status === 'null'">
          <button class="btn btn-primary" @click="pay">Pay</button>
        </div> -->
        <!--LOADING-->
        <!-- <div v-if="status === 'PENDING'" class="loader text-center">
          <div class="spinner-border text-primary text-center" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div> -->

        <!--SUUCCESSFUL-->
        <!-- <div class="row alert alert-success m-2 px-2" v-if="status === 'SUCCESSFUL'">
          <p class="text-success text-center">
            Congrats!, Transaction Complete. <b-icon icon="cloud-check"></b-icon>
          </p>
        </div> -->
        <!--TRANSACTION-->
        <!--<div class="alert alert-success" v-if="transaction">
      {{ transaction }}
    </div>-->
        <!-- <div class="form-group">
          <input
            type="text"
            name="transaction"
            hidden
            class="form-control"
            v-model="transaction"
          /> -->
      </div>
      <!--PENDING-->
      <!-- <div class="row alert alert-success px-2" v-if="status === 'PENDING'">
          <div class="col-md-8 text-center">
            <h3 class="lead">Enter Pin To Complete Payment!</h3>
          </div>
        </div> -->

      <!--FAILURE-->
      <!-- <div class="alert alert-danger" v-if="status === 'FAILED'">
          <div class="px-2">
            <p class="text-danger text-center">Transaction Failed Please, Try again...</p>
          </div>
        </div> -->
      <div class="alert alert-success" v-if="info.length != '' && paymentstatus === 0">
        <p class="lead">
          Hi, Your payment status is <b>false</b>, your payment secret is
          <b>{{ info.secret }}</b
          >.
        </p>
        <p>
          Please pay Ugx: <b>{{ info.amount }}</b> for <b>{{ info.name }}</b> property to
          comlete listing.
        </p>
      </div>

      <div class="row my-4" v-if="!ps">
        <!-- <div class="mx-auto">
            Allow Clients to contact you:
            <input type="checkbox" name="contact" id="contact" />
          </div> -->

        <h3 class="lead text-center text-primary">
          Allow Clients to pay to your mobile accounts:
        </h3>
        <div>
          <div class="check row my-4 bg-light">
            <div class="my-1">
              MTN:
              <input type="text" name="mtn_acc" v-model="mtn_no" />
            </div>

            <div class="my-1">
              Airtel:
              <input type="text" name="airtel_acc" v-model="airtel_no" />
            </div>
          </div>
          <div class="alert alert-warning my-2" v-if="err">
            {{ err }}
          </div>
          <div class="d-flex justify-content-center my-4 p-2">
            <button class="btn btn-primary mx-auto" type="submit" @click="submit">
              Submit
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      amount: null,
      status: null,
      details: {
        phone: "46733123454",
        name: "Kare Hostel",
        amount: "200000",
      },
      len: 0,
      paymentstatus: 0,
      mtn_no: "",
      airtel_no: "",
      err: null,
      ps: false,
      info: {},
    };
  },
  mounted() {
    //this.$store.dispatch("getUserImage");

    this.getProperties();
    this.later();
    this.paymentsys();
  },
  computed: {
    transaction() {
      return this.$store.getters.transaction;
    },
  },
  watch: {
    $route(to, from) {
      console.log(from.path);
      // if (from.path == "upload") {
      //   console.log("Right");
      // } else {
      //   console.log("Wrong");
      // }
    },
    mtn_no(newval, oldval) {
      if (oldval != "") {
        if (newval.length === 10) {
          this.error();
          console.log("Noooooo err");
          console.log(this.mtn_no);
          this.mtnc();
        } else {
          this.mtnc();
          console.log("errrss");
          return;
        }
      }
    },

    airtel_no(newval, oldval) {
      if (oldval != "") {
        if (newval.length === 10) {
          this.error();
          console.log("Noooooo err");
          console.log(this.airtel_no);
          this.airtel();
        } else {
          this.airtel();
          console.log("errrss");
          return;
        }
      }
    },
  },

  methods: {
    getProperties() {
      this.$store.dispatch("properties").then((response) => {
        console.log(response.data);
        let len = response.data.length;
        this.len = len;
        console.log(len);
      });
    },
    later() {
      axios
        .get("api/later")
        .then((response) => {
          console.log(response.data);
          this.info = response.data;
          this.paymentstatus = response.data.paid;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    paymentsys() {
      axios
        .get("api/methods")
        .then((response) => {
          this.method = response.data;
          console.log(response.data);

          this.airtel_no = response.data.airtel_no;
          this.mtn_no = response.data.mtn_no;
          console.log(this.mtn_no);
          console.log(this.airtel_no);

          if (this.mtn_no == null && this.airtel_no == null) {
            console.log("Nothing");
            this.loading = false;
          } else {
            this.ps = true;
            this.loading = false;
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
    mtnc() {
      if (this.mtn_no.length === 10) {
        console.log("mtn true");
        console.log(this.mtn_no.length);
      } else {
        console.log("mtn false");
      }
    },
    airtel() {
      if (this.airtel_no.length === 10) {
        console.log("airtel true");
      } else {
        console.log("airtel false");
      }
      console.log(this.airtel_no.length);
    },

    mtn() {
      this.$store
        .dispatch("mtn")
        .then((response) => {
          this.getstatus();
        })
        .catch((err) => {
          console.log(err);
        });
    },

    submit() {
      if (this.airtel_no.length === 10 && this.mtn_no.length === 10) {
        this.error();
        this.pyt();
        this.$router.push("/");
      } else {
        return (this.err = "Please Enter Both or Valid mobile numbers!");
      }
    },
    error() {
      return (this.err = null);
    },
    pyt() {
      axios
        .post("api/methods", {
          mtn_no: this.mtn_no,
          airtel_no: this.airtel_no,
        })
        .then((response) => {
          console.log(response.data);
          this.$router.push("/boss/payment");
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getstatus(context, transaction) {
      axios
        .post("api/status", { transaction: this.transaction })
        .then((response) => {
          console.log(response.data);
          this.status = response.data;
          if (response.data === "PENDING") {
            this.getstatus();
            console.log("Transaction Pending");
          } else if (response.data === "SUCCESSFUL") {
            return;
          } else if (response.data === "FAILED") {
            return;
          } else if (response.data === "TIMEOUT") {
            this.status = "FAILED";
            return;
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 400px;
  min-height: 80vh;
  margin: 0 auto;
  padding: 20px;
  border-radius: 2px;
  overflow: hidden;
}
.loader {
  min-width: 200px;
}
.top {
  border-radius: 5px;
}
.border {
  border-radius: 10px;
}

img {
  border-radius: 5px;
}
.check {
  display: flex;
  justify-content: space-around;
}

img:hover {
  opacity: 0.9;
}

.kamount {
  text-decoration: underline;
}
</style>
