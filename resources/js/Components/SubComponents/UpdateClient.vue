<template>
  <div class="fluid-container">
    <div class="row my-2">
      <div class="w-100 d-flex justify-content-center flex-col" v-if="client !== ''">
        <form
          @submit.prevent="submitUpdate(client)"
          action="POST"
          enctype="multipart/form-data"
          class="my-3 border rounded-lg p-3"
        >
          <div class="bg-light rounded-sm px-4 py-2">
            <div class="row border-bottom d-flex mb-2">
              <div class="col-3 m-3">
                <p>Status:</p>
              </div>
              <div class="col-8 d-flex justify-content-center my-2">
                <input
                  type="text"
                  name="clientName"
                  v-model="client.clientName"
                  class="form-control form-control-sm"
                />
              </div>
            </div>
            <div class="row border-bottom d-flex mb-2">
              <div class="col-3 m-3">
                <p class="">Gender:</p>
              </div>
              <div class="col-8 form-group">
                <input
                  type="text"
                  name="propertyName"
                  v-model="client.propertyName"
                  class="form-control form-control-sm"
                />
              </div>
            </div>
            <div class="row border-bottom d-flex mb-2">
              <div class="col-3 m-3">
                <p class="">Client Contact:</p>
              </div>
              <div class="col-8 form-group">
                <input
                  type="text"
                  name="clientContact"
                  v-model="client.clientContact"
                  class="form-control form-control-sm"
                />
              </div>
            </div>
            <div class="row border-bottom d-flex mb-2">
              <div class="col-3 m-3">
                <p class="">Months Paid:</p>
              </div>
              <div class="col-8 form-group">
                <input
                  type="text"
                  name="monthsPaid"
                  v-model="client.monthsPaid"
                  class="form-control"
                />
              </div>
            </div>
            <div class="row border-bottom d-flex mb-2">
              <div class="col-3 m-3">
                <p class="">Room Number:</p>
              </div>
              <div class="col-8 form-group">
                <input
                  type="text"
                  name="roomNumber"
                  v-model="client.roomNumber"
                  class="form-control"
                />
              </div>
            </div>
            <div class="row border-bottom d-flex mb-2">
              <div class="col-3 m-3">
                <p class="">Access Number:</p>
              </div>
              <div class="col-8 form-group">
                <input
                  type="text"
                  name="accessNumber"
                  v-model="client.accessNumber"
                  class="form-control"
                />
              </div>
            </div>
            <div class="row border-bottom d-flex mb-2">
              <div class="col-3 m-3">
                <p class="">Verified:</p>
              </div>
              <div class="col-8 form-group">
                <input type="checkbox" name="verified" v-model="client.verified" />
              </div>
            </div>
            <div class="row border-bottom d-flex mb-2">
              <div class="col-3 m-3">
                <p class="">Paid:</p>
              </div>
              <div class="col-8 form-group">
                <input type="checkbox" name="paid" v-model="client.paid" />
              </div>
            </div>
            <div class="row my-3 d-flex justify-content-center">
              <button class="btn btn-primary" type="submit">Update Client</button>
            </div>
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
      id: this.$route.params.id,
      client: {},
    };
  },
  created() {
    this.getClient();
  },
  methods: {
    getClient() {
      axios
        .get("api/clients/" + this.id)
        .then((res) => {
          return (this.client = res.data);
        })
        .catch((err) => {
          console.log(err.message);
        });
    },
    submitUpdate(client) {
      this.loading = true;
      axios
        .patch("/api/clients/" + client.id, client)
        .then((res) => {
          return this.$router.push("/boss/clients/" + this.id);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
