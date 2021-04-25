<template>
  <div class="fluid-container d-flex justify-content-center">
    <div class="alert alert-success">
      <p>{{ alertMessage }}</p>
    </div>
  </div>
</template>
<script>
export default {
  name: "SuccessAlert",
  props: {
    alertMessage: String,
  },
};
</script>
