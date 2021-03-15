<template>
  <div class="col-6 h-100 my-auto mx-auto alert alert-primary">
    <h3 class="text-center">Thanks for visiting Homuproperties.</h3>
    <h4 class="text-center">
      There are currently no listed properties, please
      <router-link to="/">list one</router-link>
    </h4>
  </div>
</template>
<script>
export default {
  name: "ConditionalBody",
};
</script>
