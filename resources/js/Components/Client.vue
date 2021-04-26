<template>
  <div class="container">
    <div class="row bg-light">
      <div class="col-10 bg-white my-2 rounded mx-auto">
        <h3 class="text-center">CREATE CLIENT DETAILS</h3>
      </div>
      <div class="col-lg-10 mx-auto">
        <form @submit.prevent="create(client)" class="form rounded w-100 p-2 my-3">
          <div class="row d-flex px-1 my-2">
            <div class="col-2 mx-1">
              <label for="clientName">Client Name:</label>
            </div>
            <div class="col-9">
              <input
                type="text"
                name="clientName"
                v-model="client.clientName"
                class="form-control"
                placeholder="NAME"
              />
            </div>
          </div>
          <div class="border-bottom m-1"></div>
          <div class="row d-flex px-1 my-2">
            <div class="col-2 mx-1">
              <label for="roomNumber">Property Name:</label>
            </div>
            <div class="col-9">
              <input
                type="text"
                name="propertyName"
                v-model="client.propertyName"
                class="form-control"
                placeholder="PROPERTY NAME"
              />
            </div>
          </div>
          <div class="border-bottom m-1"></div>
          <div class="row d-flex px-1 my-2">
            <div class="col-2 mx-1">
              <label for="clinetContact">Client Contact:</label>
            </div>
            <div class="col-9">
              <input
                type="text"
                name="clientContact"
                v-model="client.clientContact"
                class="form-control"
                placeholder="CLIENT CONTACT"
              />
            </div>
          </div>
          <div class="border-bottom m-1"></div>
          <div class="row d-flex px-1 my-2">
            <div class="col-2 mx-1">
              <label for="monthsPaid">Months Paid:</label>
            </div>
            <div class="col-9">
              <input
                type="text"
                name="monthsPaid"
                v-model="client.monthsPaid"
                class="form-control"
                placeholder="MONTHS PAID"
              />
            </div>
          </div>
          <div class="border-bottom m-1"></div>
          <div class="row d-flex px-1 my-2">
            <div class="col-2 mx-1">
              <label for="roomNumber">Client Room Number:</label>
            </div>
            <div class="col-9">
              <input
                type="text"
                name="roomNumber"
                v-model="client.roomNumber"
                class="form-control"
                placeholder="ROOM NUMBER"
              />
            </div>
          </div>
          <div class="border-bottom m-1"></div>
          <div class="row d-flex px-1 my-2">
            <div class="col-2 mx-1">
              <label for="accessNumber">Access Number:</label>
            </div>
            <div class="col-9">
              <input
                type="text"
                name="accessNumber"
                v-model="client.accessNumber"
                class="form-control"
                placeholder="ACCESS NUMBER"
              />
            </div>
          </div>
          <div class="border-bottom m-1"></div>
          <div class="form-group">
            <label for="paid">Paid:</label>
            <input type="checkbox" name="paid" v-model="client.paid" />
          </div>
          <div class="border-bottom m-1"></div>
          <div class="form-group">
            <label for="verified">Verify:</label>
            <input type="checkbox" name="verified" v-model="client.verified" />
          </div>
          <div class="row my-1 d-flex justify-content-center">
            <button :disabled="!isValid" class="btn btn-primary" type="submit">
              Register
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      client: {
        clientName: "",
        clientContact: "",
        propertyName: "",
        monthsPaid: "",
        roomNumber: "",
        accessNumber: "",
        paid: false,
        verified: false,
        editing: false,
      },
    };
  },
  methods: {
    create(client) {
      axios
        .post("/api/clients", client)
        .then((success) => {
          let clientName = success.data.clientName;
          console.log(success);
          this.$router.push({ path: "clients", query: { addedClient: clientName } });
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  computed: {
    isValid() {
      return (
        this.client.clientName !== "" &&
        this.client.clinetContact !== "" &&
        this.client.monthsPaid !== ""
      );
    },
  },
};
</script>
<style scoped>
.form {
  background: white !important;
}
</style>
