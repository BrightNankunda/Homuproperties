<template>
  <div>
    <input type="text" v-model.lazy="keywords" />
    <!--<ul v-if="results.length > 0">-->
    <div class="row result my-4" v-if="results.length > 0">
      <div v-for="result in results" :key="result.id" class="col-lg-3">
        <div class="card my-4 shadow">
          <router-link :to="`/details/${result.id}`">
            <img :src="'images/' + result.image" alt="some photo" style="height: 220px" class="w-100" />
          </router-link>
          <div class="card-body">
            <h5 class="card-title">{{ result.name }}</h5>

            <h5 class="lead">{{ result.location + "," + " " + result.street }}</h5>

            <h6 class="lead">{{ result.type }}</h6>
          </div>
          <div class="card-footer">
            <h4 class="lead text-center">{{ result.rent }}</h4>
          </div>
        </div>
      </div>
    </div>
    <!--<li v-for="result in results" :key="result.id" v-text="result.name"></li>
    </ul>-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      keywords: null,
      results: [],
    };
  },

  watch: {
    keywords(after, before) {
      this.fetch();
      console.log(after);
    },
  },

  methods: {
    fetch() {
      axios
        .get("/api/search", { params: { query: this.keywords } })
        .then((response) => (this.results = response.data))
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
