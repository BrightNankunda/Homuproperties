<template>
  <div class="container">
    <div class="row my-2">
      <div class="w-100 d-flex justify-content-center flex-col">
        <div class="">
          <h5 class="text-center">{{ client.clientName }}</h5>
          <h5 class="text-center">{{ client.clientContact }}</h5>
          <h5 class="text-center">{{ client.monthsPaid }}</h5>
          <h5 class="text-center">{{ client.roomNumber }}</h5>
          <h5 class="text-center">{{ client.accessNumber }}</h5>
          <h5 class="text-center">{{ client.propertyName }}</h5>

          <h5 class="text-center">{{ client.verified }}</h5>
          <h5 class="text-center">{{ client.paid }}</h5>
        </div>
      </div>
    </div>
    <div class="row my-2">
      <div class="w-100 d-flex justify-content-between align-content-center bg-light">
        <button class="btn btn-primary">Update Client</button>
        <button class="btn btn-danger">Delete Client</button>
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
  },
};
</script>
