<template>
  <div class="w-100 bg-light">
    <h5 class="p-2 bg-white text-primary text-center">LIKES</h5>
    <div class="container">
      <!-- <div v-for="likedProperty in likedProperties" :key="likedProperty.id"> -->
        <div class="shadow-sm d-flex mx-2 bg-white">
          <button class="my-3 btn btn-primary" @click="getUserLikedProperties">
            GET ALL PROPERTIES LIKED BY THE USER
          </button>
          <!-- <router-link to="/details/" + likedProperty.id>
            <span>{{ likedProperty.name + " " + propertyLiker.location }}</span>
          </router-link> -->
        </div>
      <!-- </div> -->
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
    this.$store.dispatch("getUploads");
    //
  },

  computed: {
    //  GET THE SPECIFIC LOGGED IN USER
    user() {
      return this.$store.getters.user;
    },

    // GET ALL PROPERTIES
    allProperties() {
      return this.$store.getters.uploads;
    },
  },

  methods: {
    //   RETURN ALL LIKED PROPERTIES SUCH THAT WE CAN EXTRACT THE NAMES AND THE ID
    getUserLikedProperties() {
      // we should have access to user id
      console.log(this.allProperties());
      //  console.log((this.likedProperties = this.allProperties.filter((property) =>
      //     property.likes.contains(this.user.id)
      //   )));
      // Get user likes
      // split them
    },
  },
};
</script>
