<template>
  <div class="container bg-light rounded">
    <div class="row my-2">
      <div class="row w-100">
        <div class="col-12 d-flex justify-content-between m-2">
          <div class="mt-1">
            <h4>Client Details</h4>
          </div>
          <div class="d-flex">
            <div class="bg-white rounded p-2 m-1">
              <router-link :to="`/boss/updateClient/${client.id}`" class="mx-1 text-dark"
                ><b-icon
                  icon="pencil-square"
                  scale="2"
                  title="Update"
                  class="m-1"
                ></b-icon
              ></router-link>
            </div>
            <div class="bg-danger rounded p-2 m-1">
              <span class="text-dark mx-1">
                <b-icon
                  icon="trash"
                  title="Delete"
                  @click="deleteClient(client)"
                  scale="2"
                  class="m-1 text-white delete"
                ></b-icon>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- style="width: 100%; min-height: 50vh" -->
      <!-- class="d-flex justify-content-center" -->
      <div v-if="loading">
        <page-loader />
      </div>
      <div v-else class="col-12">
        <danger-alert :alertMessage="errorText" v-if="isError" class="w-100" />
        <div class="col-12 d-flex justify-content-center flex-col mb-1" v-else>
          <div class="w-100 bg-white rounded px-2">
            <div class="row d-flex my-1 row">
              <div class="col-3">
                <p>Client Name:</p>
              </div>
              <div class="col-9">
                <p class="">{{ client.clientName }}</p>
              </div>
            </div>
            <div class="border-top px-5 mb-1"></div>
            <div class="row d-flex my-1 row">
              <div class="col-3">
                <p>Client Contact:</p>
              </div>
              <div class="col-9">
                <p class="">{{ client.clientContact }}</p>
              </div>
            </div>
            <div class="border-top px-5 mb-1"></div>

            <div class="row d-flex my-1 row">
              <div class="col-3">
                <p>Months Paid:</p>
              </div>
              <div class="col-9">
                <p class="">{{ client.monthsPaid }}</p>
              </div>
            </div>
            <div class="border-top px-5 mb-1"></div>

            <div class="row d-flex my-1 row">
              <div class="col-3">
                <p>Room Number:</p>
              </div>
              <div class="col-9">
                <p class="">{{ client.roomNumber }}</p>
              </div>
            </div>
            <div class="border-top px-5 mb-1"></div>

            <div class="row d-flex my-1 row">
              <div class="col-3">
                <p>Access Number:</p>
              </div>
              <div class="col-9">
                <p class="">{{ client.accessNumber }}</p>
              </div>
            </div>
            <div class="border-top px-5 mb-1"></div>

            <div class="row d-flex my-1 row">
              <div class="col-3">
                <p>Property Name:</p>
              </div>
              <div class="col-9">
                <p class="">{{ client.propertyName }}</p>
              </div>
            </div>
            <div class="border-top px-5 mb-1"></div>

            <div class="row d-flex my-1 row">
              <div class="col-3">
                <p>Verify Client:</p>
              </div>
              <div class="col-9">
                <p class="">{{ client.verified }}</p>
              </div>
            </div>
            <div class="border-top px-5 mb-1"></div>
            <div class="row d-flex my-1 row">
              <div class="col-3">
                <p>Client Paid:</p>
              </div>
              <div class="col-9">
                <p class="">{{ client.paid }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import PageLoader from "../Loaders/PageLoader";
import DangerAlert from "../Alerts/DangerAlert";
export default {
  components: {
    PageLoader,
    DangerAlert,
  },
  data() {
    return {
      id: this.$route.params.id,
      loading: true,
      errorText: null,
      errorStatus: null,
      isError: false,
      client: {},
    };
  },
  created() {
    this.getClient();
  },
  watch: {
    $route() {
      let id = this.$route.params.id;
      this.loading = true;
      this.isError = false;
      this.client = {};
      axios
        .get("api/clients/" + id)
        .then((res) => {
          return (this.client = res.data);
        })
        .catch((err) => {
          this.isError = true;
          let status = err.response.status;
          let errorText = err.response.statusText;
          this.errorStatus = status;
          this.errorText = errorText;
          console.log(this.errorText, this.errorStatus);
          console.log(err.response.status, err.response.statusText);
          return;
        });
      this.loading = false;
    },
  },
  methods: {
    getClient() {
      this.loading = true;
      this.isError = false;
      this.client = {};
      axios
        .get("api/clients/" + this.id)
        .then((res) => {
          return (this.client = res.data);
        })
        .catch((err) => {
          this.isError = true;
          let status = err.response.status;
          let errorText = err.response.statusText;
          this.errorStatus = status;
          this.errorText = errorText;
          console.log(this.errorText, this.errorStatus);
          console.log(err.response.status, err.response.statusText);
          return;
        });
      this.loading = false;
    },
    deleteClient(client) {
      this.loading = true;
      this.$store.dispatch("deleteClient", client).then((res) => {
        this.$router.push("/boss/clients");
      });
      this.loading = false;
    },
  },
};
</script>
<style scoped>
.delete {
  cursor: pointer;
}
</style>
