<template>
  <div class="rower bg-primary">
  <router-link class="text-white lead" to="/" v-if="loggedIn" active-class="active" exact>HP</router-link>
  <b-input-group size="sm" class="mb-2">
                <b-form-input type="search"  placeholder="Search By Location"></b-form-input>
                    <b-input-group-append is-text>
                      <b-icon icon="search"></b-icon>
                    </b-input-group-append>
                    
                  </b-input-group>
                  
  </div>
</template>
<style scoped>
.rower {
  max-height: 20px;
  width: 100%;
}
</style>
