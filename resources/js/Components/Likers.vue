<template>
  <div class="w-100 bg-light">
    <h5 class="p-2 bg-white text-primary text-center">LIKERS</h5>
    <div class="container">
      <div v-for="propertyLiker in propertyLikers" :key="propertyLiker.id">
        <div class="shadow-sm d-flex mx-2">
          <span class="text-primary">{{
            propertyLiker.firstname + " " + propertyLiker.lastname
          }}</span>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Likers",
  // DISPLAYING ALL USERS THAT LIKE A SEPICIFIC PROPERTY PROPERTY AND USERS THAT LIKE IT

  data() {
    return {
      propertyLikers: null,
      id: this.$route.params.id,
    };
  },
  mounted() {
    this.$store
      .dispatch("getAllUsers")
      .then((res) => {
        this.getPropertyAdmirers();
      })
      .catch((err) => {
        console.log("LIKERS COMPONENT ERROR", err.message);
      });
    //   this.$store.dispatch('getSingleProperty')
  },
  computed: {
    // GET ALL USERS
    allUsers() {
      return this.$store.getters.allUsers;
    },
  },

  methods: {
    //   RETURN ALL USERS WHO LIKE THE PROPERTY
    getPropertyAdmirers() {
      // we should have access to PROPERTY ID

      return (this.propertyLikers = this.allUsers.filter((user) =>
        user.liked.includes(this.id.toString())
      ));
    },
  },
};
</script>
