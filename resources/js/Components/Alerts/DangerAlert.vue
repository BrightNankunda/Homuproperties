<template>
  <div class="fluid-container d-flex justify-content-center">
    <div class="alert alert-danger">
      <p>{{ alertMessage }}</p>
    </div>
  </div>
</template>
<script>
export default {
  name: "DangerAlert",
  props: {
    alertMessage: String,
  },
};
</script>
