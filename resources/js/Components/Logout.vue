<template>
  <div>
    <div v-if="loading" class="loader text-center loader my-5">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
    };
  },
  created() {
    this.$store.dispatch("clearData");
    this.$store.dispatch("logout").then((response) => {
      this.$router.push("/");
      loading: false;
    });
  },
};
</script>
<style scoped>
.loader {
  min-height: calc(100vh - 80px);
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
