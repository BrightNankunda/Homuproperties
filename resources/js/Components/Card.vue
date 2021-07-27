<template>
  <div class="w-100">
    <div class="card my-4 shadow-sm">
      <router-link :to="`/details/${id}`">
        <img
          :src="'images/' + front"
          alt="some photo"
          style="height: 200px"
          class="w-100"
        />
      </router-link>
      <div class="card-body">
        <h6 class="card-title">{{ name }}</h6>

        <p class="lead">{{ location + "," + " " + street }}</p>

        <p class="lead">{{ type }}</p>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <h6 class="text-center text-success">Ugx:{{ " " + rent }}</h6>
        <div v-if="loggedIn" class="d-flex justify-content-between">
          <b-icon-heart-fill
            @click="dislike(id)"
            v-if="likedThisProperty(id)"
            scale="1.2"
            class="mr-2"
            variant="success"
            title="DISLIKE PROPERTY"
          />
          <b-icon-heart
            @click="like(id)"
            v-else
            scale="1.2"
            class="mr-2"
            variant="success"
            title="LIKE PROPERTY"
          />
          <b-icon-check
            scale="2"
            class="like-property-icon"
            variant="success"
            title="APPROVE PROPERTY"
            @click="likedThisProperty(id)"
          />
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
