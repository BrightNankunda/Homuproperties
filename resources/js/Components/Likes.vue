<template>
  <div class="w-100 bg-light">
    <h5 class="p-2 bg-white text-primary text-center">LIKES</h5>
    <div class="container">
      <div v-for="likedProperty in likedProperties" :key="likedProperty.id">
        <div class="shadow-sm d-flex mx-2">
          <router-link to="/details/" + likedProperty.id>
            <span>{{ likedProperty.name + " " + propertyLiker.location }}</span>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Likes",
  //   DISPLAYING THE PROPERTIES LIKED BY A USER
  data() {
    return {
      likedProperties: null,
    };
  },
  mounted() {
    // GET ALL PROPERTITIES
    this.$store.dispatch("getAllProperties");
    //
  },

  computed: {
    //  GET THE SPECIFIC LOGGED IN USER
    user() {
      return this.$store.getters.user;
    },

    // GET ALL PROPERTIES
    // allProperties() {
    //    return this.$store.getters.allProperties
    // }
  },

  methods: {
    //   RETURN ALL LIKED PROPERTIES SUCH THAT WE CAN EXTRACT THE NAMES AND THE ID
    userLikedProperties() {
      // we should have access to user id

      return (this.likedProperties = this.allProperties.filter((property) =>
        property.likes.split(",").contains(this.user.id)
      ));
      // Get user likes
      // split them
    },
  },
};
</script>
