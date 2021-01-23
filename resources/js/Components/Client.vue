<template>
  <div class="container bg-light">
    <div class="form col-lg-6 col-md-8">
      <form @submit.prevent="create(client)">
        <div class="form-group">
          <label for="clientName">Client Name:</label>
          <input type="text" name="clientName" v-model="client.clientName" class="form-control" />
        </div>
        <div class="form-group">
          <label for="roomNumber">Property Name:</label>
          <input type="text" name="propertyName" v-model="client.propertyName" class="form-control" />
        </div>

        <div class="form-group">
          <label for="clinetContact">Client Contact:</label>
          <input type="text" name="clientContact" v-model="client.clientContact" class="form-control" />
        </div>

        <div class="form-group">
          <label for="monthsPaid">Months Paid:</label>
          <input type="text" name="monthsPaid" v-model="client.monthsPaid" class="form-control" />
        </div>

        <div class="form-group">
          <label for="roomNumber">Client Room Number:</label>
          <input type="text" name="roomNumber" v-model="client.roomNumber" class="form-control" />
        </div>

        <div class="form-group">
          <label for="accessNumber">Access Number:</label>
          <input type="text" name="accessNumber" v-model="client.accessNumber" class="form-control" />
        </div>

        <div class="form-group">
          <label for="paid">Paid:</label>
          <input type="checkbox" name="paid" v-model="client.paid" />
        </div>

        <div class="form-group">
          <label for="verified">Client Name:</label>
          <input type="checkbox" name="verified" v-model="client.verified" />
        </div>
        <div class="row my-3 d-flex justify-content-center">
          <button :disabled="!isValid" class="btn btn-primary" type="submit">Register</button>
        </div>
      </form>
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
          console.log(success);
          this.$router.push("clients");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  computed: {
    isValid() {
      return this.client.clientName !== "" && this.client.clinetContact !== "" && this.client.monthsPaid !== "";
    },
  },
};
</script>
<style scoped>
.form {
  background: white !important;
}
</style>
