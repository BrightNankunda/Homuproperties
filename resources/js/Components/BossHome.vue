<template>
  <div class="m-1">
    <div class="row">
      <div class="col w-30">
        <div class="bg-success p-2 rounded" @click="clientslink">
          <h1 class="text-center text-white">{{ numberofclients }}</h1>
          <h3 class="text-center text-white">Clients</h3>
        </div>
      </div>
      <div class="col w-30">
        <div class="bg-primary p-2 rounded" @click="addClient">
          <h1 class="text-center text-white">
            <b-icon icon="person-check" scale="1.8"></b-icon>
          </h1>
          <h3 class="text-center text-white">Add Client</h3>
        </div>
      </div>
      <div class="col w-30">
        <div class="bg-warning p-2 rounded">
          <h1 class="text-center text-white">1</h1>
          <h3 class="text-center text-white">Homu Adverts</h3>
        </div>
      </div>
    </div>
    <div class="row my-2">
      <div class="col w-30">
        <div class="bg-primary p-2 rounded">
          <h1 class="text-center text-white">$0</h1>
          <h3 class="text-center text-white">Client Revenue</h3>
        </div>
      </div>
      <div class="col w-30">
        <div class="bg-danger p-2 rounded">
          <h1 class="text-center text-white">0</h1>
          <h3 class="text-center text-white">Online Payments</h3>
        </div>
      </div>
      <div class="col w-30">
        <div class="bg-secondary p-2 rounded">
          <h1 class="text-center text-white">1</h1>
          <h3 class="text-center text-white">Likes</h3>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      clients: 0,
    };
  },
  created() {
    this.$store.dispatch("fetchClients");
  },
  computed: {
    numberofclients() {
      return this.$store.getters.laravelData.total;
    },
  },
  methods: {
    clientslink() {
      this.$router.push("/boss/clients");
    },
    addClient() {
      this.$router.push("/boss/client");
    },
  },
};
</script>
<style>
.w-30 {
  cursor: pointer;
}
.w-30:hover {
  opacity: 0.8;
}
</style>
