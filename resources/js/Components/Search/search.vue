<template>
  <div class="container">
    <div class="row mt-2" style="min-height: 10vh">
      <div class="w-100 d-flex justify-content-center">
        <input
          type="text"
          v-model="keyword_Location"
          @keyup.enter="fetch"
          placeholder="Location"
          class="form-control col-lg-5 mx-1"
        />
        <input
          type="text"
          v-model="keyword_name"
          @keyup.enter="fetch"
          placeholder="name"
          class="form-control col-lg-5 mx-1"
        />
      </div>
    </div>
    <div class="searches" v-if="searching">
      <div class="row mb-1 d-flex justify-content-center" style="min-height: 10vh">
        <div class="w-100 col-lg-10 d-flex justify-content-center border rounded">
          <h4>SEARCHING</h4>
        </div>
      </div>
    </div>
    <div class="results" v-if="results">
      <div class="row mb-1" style="min-height: 10vh">
        <div class="w-100 d-flex justify-content-center">
          <div class="col-lg-10 border rounded">
            <div v-for="result in results" :key="result.id">
              <router-link :to="`/details/${result.id}`">
                <div
                  class="row w-100 mx-auto border-bottom d-flex justify-content-center flex-row"
                >
                  <div
                    class="mx-1 d-flex justify-content-center align-items-center col-lg-5"
                  >
                    <p class="mr-2">{{ result.name | toUpperCase }}</p>
                    <p>{{ result.location | toUpperCase }}</p>
                  </div>
                  <div
                    class="mx-1 d-flex justify-content-center align-items-center col-lg-5"
                  >
                    {{ result.rent | shillings }}
                  </div>
                  <div class="mx-1 d-flex justify-content-center col-lg-1">
                    <img
                      :src="'images/' + result.front"
                      alt="some photo"
                      style="min-height: 50px; max-width: 80px"
                    />
                  </div>
                </div>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Search",
  data() {
    return {
      keyword_Location: null,
      keyword_name: null,
      searching: null,
      results: null,
      loadingSearches: null,
    };
  },
  watch: {
    keyword_Location(after, before) {
      console.log("after" + after, "before" + before);
      this.fetch();
    },
    keyword_name(after, before) {
      console.log("after" + after, "before" + before);
      this.fetch();
    },
  },
  methods: {
    fetch() {
      if (this.keyword_name === null && this.keyword_Location === null) {
        this.results = null;
        return;
      } else {
        this.searching = true;
        let Location = this.keyword_Location || "Uganda";
        let name = this.keyword_name || "All";
        this.$router.push(`/search?location=${Location}&&name=${name}`);
        axios(
          "api/search",
          { params: { Location: Location, name: name } },
          { headers: { "Content-ype": "application/Json" } }
        )
          .then((res) => {
            this.results = res.data;
            console.log(res.data);
            this.searching = false;
          })
          .catch((err) => {
            console.log(err);
          });
      }
    },
  },
};
</script>
<style scoped>
img {
  margin: 2px;
}
</style>
