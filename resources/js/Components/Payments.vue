<template>
  <div>
    <div v-if="loading" class="text-center my-5">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div v-else>
      <div class="d-flex justify-content-center">
        <h1 class="head lead text-center text-primary shadow my-1 pb-1 col-lg-3">Payment Methods</h1>
      </div>
      <div class="alert alert-primary text-center my-2" v-if="err">
        {{ err }}
      </div>

      <div class="alert alert-primary text-center my-2" v-if="nopay">You Currently have no Registered Accounts!</div>

      <div class="row d-flex justify-content-center" v-else>
        <div class="col-lg-3 m-2">
          <h3 class="lead">MTN</h3>
          <input type="checkbox" v-model="mtnEditing" title="Edit MTN no." />
          <div>
            <input type="text" v-if="mtnEditing" name="" @keyup.enter="submit(method)" v-model="method.mtn_no" placeholder="Edit or Add MTN account" />
            <h3 class="lead" v-else>{{ method.mtn_no }}</h3>
          </div>
        </div>
        <div class="col-lg-3 m-2">
          <h3 class="lead">Airtel</h3>
          <input type="checkbox" v-model="airtelEditing" title="Edit Airtel no." />
          <div>
            <input type="text" name="" @keyup.enter="submit(method)" v-if="airtelEditing" v-model="method.airtel_no" placeholder="Edit or Add Airtel account" />
            <h3 class="lead" v-else>{{ method.airtel_no }}</h3>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center align-content-center" v-if="mtnEditing || airtelEditing">
        <button class="btn btn-primary my-2" @click="submit(method)">Update Methods</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      method: [],
      loading: true,
      mtnEditing: false,
      airtelEditing: false,
      airtel_no: null,
      mtn_no: null,
      err: null,
      nopay: false,
    };
  },
  created() {
    this.loading = true;
    this.get();
    //this.$store.dispatch.get();
  },

  methods: {
    error() {
      return (this.err = null);
    },
    erro() {
      return (this.nopay = false);
    },

    get() {
      this.loading = true;
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
            return (this.nopay = true);
            //erro();
          }
          this.loading = false;
        })
        .catch((err) => {
          console.log(err);
          this.loading = false;
        });
    },
    submit(method) {
      // console.log(method);
      // console.log(method.mtn_no);
      let airtel = method.airtel_no;

      console.log(airtel);
      this.loading = true;
      this.mtnEditing = this.airtelEditing = false;

      if (method.airtel_no.length != 10 || method.mtn_no.length != 10) {
        this.err = "Enter Valid Mobile Numbers!";
        this.get();
        this.loading = false;
        setTimeout(this.error, 6000);
        return;
      } else {
        this.error();
        axios
          .patch("api/methods/" + method.id, {
            airtel_no: method.airtel_no,
            mtn_no: method.mtn_no,
          })
          .then((response) => {
            this.get();
            console.log(response.data);
            this.loading = false;
            this.err = null;
          })
          .catch((err) => {
            console.log(err);
          });
      }
    },
  },
};
</script>
<style scoped>
.head {
  display: flex;
  justify-content: center;
}
</style>
