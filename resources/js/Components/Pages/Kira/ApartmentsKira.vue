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
      <router-link to="/apartments/ntinda" class="nav-link">Ntinda</router-link>

      <h4 class="lead">{{ user.firstname }}</h4>
    </div>
    <h1 class="lead">Apartments in Kira</h1>
    <div class="row hostels my-5">
      <div v-for="apartment in apartmentsKira" :key="apartment.id" class="col-md-6 col-lg-3">
        <div class="card">
          <img :src="'images/' + apartment.image" alt="some photo" style="max-height: 200px" />
          <div class="card-body">
            <h5 class="card-title">{{ apartment.name }}</h5>
            <h6 class="lead">{{ apartment.type }}</h6>
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
      return this.$store.getters.apartmentsKira;
    },
    user() {
      return this.$store.getters.user;
    },
  },
};
</script>

<style scoped></style>
