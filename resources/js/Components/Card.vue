<template>
  <div class="w-100">
    <div class="card shadow-sm border-0 rounded">
      <div class="card-body p-0">
        <router-link :to="`/details/${id}`">
          <img :src="'images/' + front" alt="" class="w-100 card-img-top" />
        </router-link>
        <div class="p-4">
          <p class="font-italic lead small text-muted my-0 mb-0">{{ type }}</p>
          <h6 class="mb-0">{{ name }}</h6>

          <p class="lead small text-muted">{{ location + "," + " " + street }}</p>
          <h6 class="mb-0 text-success">Ush {{ " " + rent }}</h6>
        </div>
      </div>
    </div>
    
  </div>
</template>
<script>
export default {
  props: {
    name: String,
    location: String,
    id: Number,
    image: String,
    rent: String,
    front: String,
    type: String,
    street: String,
  },
  name: "Card",
  data() {
    return {
      currentProperty: null,
      newLikers: null,
      newLiked: null,
    };
  },
  mounted() {
    console.log("CARD LOGGED IN STATE", this.$store.getters.loggedIn);
  },
  computed: {
    loggedIn() {
      return this.$store.getters.loggedIn;
    },
    liked() {
      return this.$store.getters.user.liked;
    },
  },
  methods: {
    likedThisProperty(propertyId) {
      if (this.liked.trim() === "") {
        return false;
      } else if (this.liked.trim().length > 2) {
        const allUserLiked = this.liked.split(",");
        return allUserLiked.contains(propertyId) ? true : false;
      } else if (this.liked.trim().length === 1) {
        return this.liked.includes(propertyId) ? true : false;
      }
    },
    like(id) {
      console.log("PROPERTY ID", id, "USER ID", this.$store.getters.user.id);
      this.propertyLikers(id)
        .then((response) => {
          this.$store.dispatch({
            type: "like",
            payload: {
              id: id,
              userId: this.$store.getters.user.id,
              newLiked: this.newLikedProperties(id),
              newLikes: this.newLikers,
            },
          });
        })
        .catch((err) => {
          console.log(err);
        });
    },
    dislike(id) {
      console.log("PROPERTY ID", id, "USER ID", this.$store.getters.user.id);
    },
    newLikedProperties(id) {
      if (this.liked.trim() === "") {
        return this.liked.concat(id);
      } else {
        return this.liked.concat(`,${id}`);
      }
    },
    propertyLikers(id) {
      // find the property
      return new Promise((resolve, reject) => {
        axios
          .get("api/show/" + id)
          .then((response) => {
            // NEW PROPERTY LIKERS
            console.log("PROPERTY RESPONSE", response.data);
            if (response.data.likes.trim() === "") {
              this.newLikers = response.data.likes.concat(
                `${this.$store.getters.user.id}`
              );
              resolve(response);
            } else {
              this.newLikers = response.data.likes.concat(
                `,${this.$store.getters.user.id}`
              );
              resolve(response);
            }
          })
          .catch((err) => {
            console.log(err);
            reject(err);
          });
      });
    },
    approve(id) {
      console.log("PROPERTY ID", id, "USER ID", this.$store.getters.user.id);
    },
  },
};
</script>
<style scoped>
.like-property-icon:hover {
  color: green !important;
}
</style>
