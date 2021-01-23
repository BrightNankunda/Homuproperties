<template>
  <div>
    <div class="nav navbar bg-light">
      <a :class="{ active: filter == 'kira' }" @click="filter = 'kira'">Kira</a>
      <a :class="{ active: filter == 'entebbe' }" @click="filter = 'entebbe'">Entebbe</a>
      <a :class="{ active: filter == 'kawempe' }" @click="filter = 'kawempe'">Kawempe</a>
      <a :class="{ active: filter == 'ntinda' }" @click="filter = 'ntinda'">Ntinda</a>
      <a :class="{ active: filter == 'makindye' }" @click="filter = 'makindye'">Makindye</a>
      <a :class="{ active: filter == 'mukono' }" @click="filter = 'mukono'">Mukono</a>
      <a :class="{ active: filter == 'kampala' }" @click="filter = 'kampala'">Kampala</a>
    </div>
    <div v-if="loading" class="loader text-center loader my-5">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div class="row hostels my-5" v-else>
      <div v-for="image in filteredArcades" :key="image.id" class="col-md-6 col-lg-3">
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
      filter: "kampala",
      loading: true,
    };
  },
  computed: {
    filteredArcades() {
      if (this.filter == "kampala") {
        return this.$store.getters.arcades;
      } else if (this.filter == "kira") {
        return this.$store.getters.arcades.filter((arcade) => arcade.location === "Kira");
      } else if (this.filter == "ntinda") {
        return this.$store.getters.arcades.filter((arcade) => arcade.location === "Ntinda");
      } else if (this.filter == "entebbe") {
        return this.$store.getters.arcades.filter((arcade) => arcade.location === "entebbe");
      } else if (this.filter == "makindye") {
        return this.$store.getters.arcades.filter((arcade) => arcade.location === "makindye");
      } else if (this.filter == "mukono") {
        return this.$store.getters.arcades.filter((arcade) => arcade.location === "Mukono");
      } else if (this.filter == "kawempe") {
        return this.$store.getters.arcades.filter((arcade) => arcade.location === "Kawempe");
      } else {
        return this.$store.getters.kampala;
      }
    },
  },
  methods: {
    entebbe() {
      alert("filter Entebbe");
    },
  },
  mounted() {
    this.$store.dispatch("arcades").then((response) => {
      this.loading = false;
    });
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
.loader {
  min-height: calc(100vh - 80px);
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
