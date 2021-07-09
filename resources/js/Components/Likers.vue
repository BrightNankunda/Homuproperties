<template>
  <div class="w-100 bg-light">
    <h5 class="p-2 bg-white text-primary text-center">LIKERS</h5>
   <div class="container">
      <div v-for="propertyLiker in propertyLikers" :key="propertyLiker.id">
         <div class="shadow-sm d-flex mx-2">
            <router-link to="/details/" + propertyLiker.id>
               <span>{{propertyLiker.firstName + ' ' + propertyLiker.lastName}}</span>
            </router-link>
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
        propertyLikers: null
     }
  },
  mounted() {
     console.log('LIKERS MOUNTED')
   //   this.$store.dispatch('AllUsers')
   //   this.$store.dispatch('getSingleProperty')
  },
  computed: {
   //  GET THE SPECIFIC LOGGED IN USER
   // property() {
   //    return this.$store.getters.property
   // },

   // GET ALL USERS
   // allUsers() {
   //    return this.$store.getters.allUsers
   // }
  },

  methods: {
   //   RETURN ALL USERS WHO LIKE THE PROPERTY
   PropertyAdmirers() {
      // we should have access to PROPERTY ID
      return this.propertyLikers = this.allUsers.filter(user => user.liked.split(',').contains(this.property.id))
   }
  }
};
</script>
