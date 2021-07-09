<template>
  <div class="w-100">
    <div class="card my-4 shadow">
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

        <h6 class="lead">{{ type }}</h6>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <h6 class="text-center text-success">Ugx:{{ " " + rent }}</h6>
        <div v-if="loggedIn" class="d-flex justify-content-between">
          <b-icon-heart
            @click="like(id)"
            scale="1.2"
            class="mr-2"
            title="LIKE PROPERTY"
          />
          <b-icon-check
            scale="2"
            class="like-property-icon"
            variant="success"
            title="APPROVE PROPERTY"
            @click="approve(id)"
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
    like(id) {
      console.log("PROPERTY ID", id, "USER ID", this.$store.getters.user.id);
      console.log("PROPERTY LIKES", this.propertyLikers(id));
      // if (liked().trim !== "") {
      //   const userLiked = this.liked().split(",");
      //   const newLiked = userLiked.push(`, ${id}`);

      //   this.$store.dispatch({
      //     type: "like",
      //     payload: {
      //       id: id,
      //       userId: this.$store.getters.user.id,
      //       likedByUser: newLiked,
      //       propertyLikes: this.propertyLikers(id),
      //     },
      //   });
      // } else {
      this.$store.dispatch({
        type: "like",
        payload: {
          id: id,
          userId: this.$store.getters.user.id,
          // likedByUser: newLiked,
          // propertyLikes: this.propertyLikers(id),
        },
      });
      // }
    },
    propertyLikers(id) {
      // find the property
      axios
        .get("api/show/" + id)
        .then((response) => {
          console.log(response.data);
          // get the people that liked this property,
          const PropertyLikes = response.data.likes;
          if (this.PropertyLikes.trim !== "") {
            if (PropertyLikes.search(",")) {
              const AllPropertyLikes = PropertyLikes.split(",");

              // append new like and send to the backend
              const newPropertyLikes = AllPropertyLikes.push(
                `, ${this.$store.getters.user.id}`
              ).join(",");
              return newPropertyLikes;
            } else {
              const newPropertyLikes = [
                propertyLikes,
                concat(",", this.$store.getters.user.id),
              ];
              return newPropertyLikes.join(",");
            }
          } else {
            return `${this.$store.getters.user.id}, `;
          }
        })
        .catch((err) => {
          console.log(err);
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
