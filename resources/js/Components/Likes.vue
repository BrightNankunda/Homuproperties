<template>
  <div class="w-100 bg-light">
    <h5 class="p-2 bg-white text-primary text-center">LIKES</h5>
    <div class="container" v-if="thereIsLikedProperty">
      <div v-for="likedProperty in likedProperties" :key="likedProperty.id">
        <div class="shadow-sm d-flex mx-2 bg-white">
          <router-link :to="`/details/${likedProperty.id}`">
            <span>{{ likedProperty.name + " " + likedProperty.location }}</span>
          </router-link>
        </div>
      </div>
    </div>
    <div class="container" v-else>
      <div class="alert danger w-100">
        <p class="text-danger m-4">THERE ARE NO LIKED PROPERTIES!</p>
        <router-link to="/">Like A Property</router-link>
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
      thereIsLikedProperty: true,
    };
  },
  mounted() {
    // GET ALL PROPERTITIES
    this.$store
      .dispatch("getUploads")
      .then((res) => {
        this.getUserLikedProperties();
      })
      .catch((err) => {
        console.log("LIKERS COMPONENT", err);
      });
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
      if(this.user.liked.trim() === '') {
        return this.thereIsLikedProperty = false
      } else if((this.user.liked.trim() !== '') && this.user.liked.length === 1) {
        return (this.likedProperties = this.allProperties.filter((property) =>
          property.likes.includes(this.user.id.toString())
        ));
      } else if(this.user.liked.trim().length >= 2) {
        
        return (this.likedProperties = this.allProperties.filter((property) =>
          property.likes.includes(this.user.id.toString())
        ));
      }
      // ONELIKE
      // if(this.user.liked.trim().length === 1) return this.getUserLikedProperties()
      // NO LIKE PROPERTIES
      // if(this.user.liked.trim() === '') return this.thereIsLikedProperty === false
      // MORE THAN ONE PROPERTIES
      // if(this.user.liked.includes(',') {
          // for (let i = 0; i < this.allProperties.length; i++) {
          //   const likeProperties = this.user.liked.split(',')
          //   const element = array[i];
          //   return this.allProperties.filter(property => property.likes.includes(this.user.id))
            
          // }
      // })
      // Get user likes
      // split them
    },
  },
};
</script>
