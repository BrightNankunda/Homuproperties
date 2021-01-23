<template>
  <div>
    <div class="nav navbar bg-light">
      <a :class="{ active: filter == 'Makerere' }" @click="filter = 'Makerere'">Makerere University</a>
      <a :class="{ active: filter == 'Kyambogo' }" @click="filter = 'Kyambogo'">Kyambogo University</a>
      <a :class="{ active: filter == 'KIU' }" @click="filter = 'KIU'">KIU</a>
      <a :class="{ active: filter == 'MUST' }" @click="filter = 'MUST'">MUST</a>
      <a :class="{ active: filter == 'MUBS' }" @click="filter = 'MUBS'">MUBS</a>
    </div>

    <div v-if="loading" class="loader text-center loader my-5">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div class="row hostels my-5" v-else>
      <div v-for="image in filteredHostels" :key="image.id" class="col-md-6 col-lg-3">
        <div class="card my-4 shadow">
          <router-link :to="`/details/${image.id}`"> <img :src="'images/' + image.front" alt="some photo" class="w-100" style="height: 200px" /> </router-link>
          <div class="card-body">
            <h6 class="card-title">{{ image.name }}</h6>
            <p class="lead">{{ image.location + "," + " " + image.street }}</p>
          </div>
          <div class="card-footer">
            <h6 class="text-center text-success">Ugx:{{ " " + image.rent }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      filter: "KIU",
      loading: true
    };
  },
  computed: {
    filteredHostels() {
      if (this.filter == "kampala") {
        return this.$store.getters.hostels;
      } else if (this.filter == "Makerere") {
        return this.$store.getters.hostels.filter((hostel) => hostel.location === "Makerere");
      } else if (this.filter == "KIU") {
        return this.$store.getters.hostels.filter((hostel) => hostel.location === "Ntinda");
      } else if (this.filter == "Kyambogo") {
        return this.$store.getters.hostels.filter((hostel) => hostel.location === "Kyambogo");
      } else if (this.filter == "MUBS") {
        return this.$store.getters.hostels.filter((hostel) => hostel.location === "MUBS");
      } else if (this.filter == "MUST") {
        return this.$store.getters.hostels.filter((hostel) => hostel.location === "MUST");
      }
    },
  },
  mounted() {
    this.$store.dispatch("hostels").then(response => {
      this.loading = false
    })
  },
};
</script>

<style scoped>
.active {
  text-decoration: underline;
}
a {
  cursor: pointer;
}
</style>
