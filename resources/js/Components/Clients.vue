<template>
  <div>
    <h4 class="text-center lead">Your Clients</h4>
    <div v-if="loading" class="text-center my-5">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div v-else>
      <div v-if="count === 0" class="text-center my-5">
        <div class="alert alert-primary">
          <h3 class="lead">You currently have no Registered Client!s</h3>
        </div>
      </div>
      <div class="table-wrapper bg-light rounded-sm py-2 px-4 mr-1" v-else>
        <table
          class="table table-hover rounded mx-auto"
          :class="{ 'table-sm': tableProperties }"
        >
          <thead class="bg-light border-collapse">
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>CONTACT</th>
              <th class=""></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(client, index) in clients" :key="client.id">
              <td>{{ index + 1 }}</td>

              <td class="mx-4" @click="showClient(client)">
                <router-link :to="`/boss/clients/${client.id}`">
                  {{ client.clientName | capitalize }}
                </router-link>
              </td>
              <td @click="showClient(client)">
                {{ client.clientContact }}
              </td>

              <td>
                <router-link :to="`/boss/clients/${client.id}`" class="mx-1"
                  ><b-icon icon="eye" title="View"></b-icon>
                </router-link>

                <router-link
                  :to="`/boss/updateClient/${client.id}`"
                  class="mx-1 text-dark"
                  ><b-icon icon="pencil-square" title="Update"></b-icon
                ></router-link>

                <span class="text-dark mx-1">
                  <b-icon
                    icon="trash"
                    title="Delete"
                    @click="deleteClient(client)"
                  ></b-icon>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Clients",
  data() {
    return {
      loading: true,
    };
  },
  created() {
    this.loading = true;
    this.fetchClients();
    count: 0;
  },

  mounted() {
    this.$store.dispatch("fetchClients");
  },

  methods: {
    deleteClient(client) {
      this.loading = true;
      this.$store.dispatch("deleteClient", client).then((res) => {
        this.$store.dispatch("fetchClients");
        this.fetchClients();
        this.loading = false;
      });
    },

    addClient() {
      this.$router.push("/boss/client");
    },

    showClient(client) {
      this.$router.push("/boss/clients/" + client.id);
    },
    fetchClients() {
      this.loading = true;
      axios
        .get("api/clients")
        .then((response) => {
          let pc = response.data.length;
          this.count = pc;
          console.log(pc);
          if (this.count === 0) {
            console.log("CLIENTS ARE EMPTY");
          }
          this.loading = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  computed: {
    clients() {
      return this.$store.getters.clients;
    },
    tableProperties() {
      return true ? this.count > 10 : "";
    },
  },
  filters: {
    capitalize: function (value) {
      if (!value) return "";
      value = value.toString();
      return value.charAt(0).toUpperCase() + value.slice(1);
    },
  },
};
</script>
<style scoped>
.fluid-container {
  position: relative;
  z-index: 10;
}
td {
  cursor: pointer;
}
.table-wrapper {
  display: flex;
  justify-content: center;
}
.rounded-sm {
  border-radius: 20px !important;
}
</style>
