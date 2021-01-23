<template>
  <div>
    <div class="nav navbar bg-light">
      <router-link to="/" class="nav-link">Home</router-link>
      <router-link to="/apartments/kampala" class="nav-link">Kampala</router-link>
      <router-link to="/apartments/kira" class="nav-link">Kira</router-link>
      <router-link to="/apartments/kampala" class="nav-link">Entebbe</router-link>
      <router-link to="/apartments/mukono" class="nav-link">Mukono</router-link>
      <router-link to="/apartments/Makindye" class="nav-link">Makindye</router-link>
      <router-link to="/apartments/kawempe" class="nav-link">Kawempe</router-link>
      <!--<router-link to="/apartments/ntinda" class="nav-link">Ntinda</router-link>-->

      <h4 class="lead">{{ user.firstname }}</h4>
    </div>
    <h1 class="lead">Apartments in Kampala</h1>
    <div class="row hostels my-5">
      <div v-for="image in apartmentsKampala" :key="image.id" class="col-md-6 col-lg-3">
        <div class="card">
          <img :src="'images/' + image.image" alt="some photo" style="max-height: 200px" />
          <div class="card-body">
            <h5 class="card-title">{{ image.name }}</h5>
            <h6 class="lead">{{ image.type }}</h6>
          </div>
          <div class="card-footer">
            <button>Rent</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    apartmentsKampala() {
      return this.$store.getters.apartmentsKampala;
    },
    user() {
      return this.$store.getters.user;
    },
  },
};
</script>

<style scoped></style>
