<template>
  <div class="w-100 bg-light">
    <h5 class="p-2 bg-white text-primary text-center">LIKERS</h5>
    <div class="container" v-if="propertyLikers !== null">
      <div v-for="propertyLiker in propertyLikers" :key="propertyLiker.id">
        <div class="mx-2 py-2">
          <span class="text-primary bg-white my-2 col-lg-3 p-2">{{
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
        this.details().then(res => {
          this.getPropertyAdmirers(res);

        }).catch(err => {
          console.log(err)
        })

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
    getPropertyAdmirers(likers) {
      // we should have access to PROPERTY ID

      // return (this.propertyLikers = this.allUsers.filter((user) =>
      //   user.liked.includes(this.id.toString())
      // ));
      // const users = []
      // for (let i = 0; i < likers.length; i++) {
      //   // const user = allUsers[i];
      //   // return  this.propertyLikers =
        // const likedProperty = this.allUsers[i].liked
        // if(user)
        // return user
          return this.propertyLikers = this.allUsers.filter(user => user.liked.includes(this.id))
        
      // }
    },
    details() {
      return new  Promise((resolve, reject) => {

      axios
        .get("api/show/" + this.id)
        .then((response) => {
          resolve(response.data.likes.split(','))
        })
        .catch((err) => {
          console.log(err);
          reject(err)
        });
      })
    },
  },
};
</script>
