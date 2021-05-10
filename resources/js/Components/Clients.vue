<template>
  <div>
    <h4 class="text-center lead">Your Clients</h4>

    <success-alert :alertMessage="alertMessage" v-if="alertMessage !== null" />

    <div v-if="loading" class="text-center my-5">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div class="row" v-else>
      <div v-if="count === 0" class="text-center my-5">
        <div class="alert alert-primary">
          <h3 class="lead">You currently have no Registered Client!s</h3>
        </div>
      </div>
      <div class="w-100 table-wrapper bg-light rounded-sm py-2 px-4 mr-1" v-else>
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

              <td class="mx-4">
                <router-link :to="`/boss/clients/${client.id}`">
                  {{ client.clientName | capitalize }}
                </router-link>
              </td>
              <td>
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
            <tr></tr>
          </tbody>
        </table>
        <div
          v-if="clients.length >= 1"
          class="rounded bg-light my-1 d-flex justify-content-center"
        >
          <pagination :data="laravelData" @pagination-change-page="fetchClients">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
          </pagination>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SuccessAlert from "./Alerts/SuccessAlert";

export default {
  name: "Clients",
  components: {
    SuccessAlert,
  },
  data() {
    return {
      loading: true,
      alertMessage: null,
      count: 0,
      addedClient: this.$route.query.addedClient || null,
      updatedClient: this.$route.query.updatedClient || null,
      deletedClient: this.$route.query.deletedClient || null,
    };
  },
  created() {
    this.loading = true;
    this.fetchClients();
    this.addClientAlert();
    this.updatedClientAlert();
  },

  mounted() {
    this.$store.dispatch("fetchClients");
    if (
      this.addedClient != null ||
      this.updatedClient != null ||
      this.deletedClient != null
    ) {
      setTimeout(this.removeAlertMessage, 2000);
      console.log(this.addedClient);
    }
    if (
      (this.addedClient != null || this.updatedClient != null, this.deletedClient != null)
    ) {
      this.removeAlertMessage();
      console.log("THERE ALERT MESSAGE");
    }
  },

  methods: {
    addClientAlert() {
      if (this.addedClient !== null)
        this.alertMessage = `Client ${this.addedClient} Has Been Added Successfully!`;
      else console.log("NO ADDED CLIENT QUERY");
    },
    updatedClientAlert() {
      if (this.updatedClient !== null) {
        this.alertMessage = `Client ${this.updatedClient} Has Been Updated Successfully`;
      } else {
        console.log("No UPDATED CLIENT");
      }
    },
    removeAlertMessage() {
      return (
        this.addedClient == null &&
        this.updatedClient == null &&
        this.deletedClient == null
      );
    },
    deleteClient(client) {
      this.loading = true;
      this.$store
        .dispatch("deleteClient", client)
        .then((res) => {
          this.$store.dispatch("fetchClients");
          this.fetchClients();
          this.alertMessage = "Client Deleted Successfully";
          this.loading = false;
        })
        .then((res) => {
          setTimeout(this.removeAlertMessage, 5000);
          return;
        })
        .catch((err) => {
          console.log(err.response);
        });
    },

    addClient() {
      this.$router.push("/boss/client");
    },

    // showClient(client) {
    //   this.$router.push("/boss/clients/" + client.id);
    // },
    fetchClients(page = 1) {
      this.loading = true;
      this.$store
        .dispatch("fetchClients", page)
        .then((response) => {
          console.log(response);
          let pc = response.data.data.length;
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
    laravelData() {
      return this.$store.getters.laravelData;
    },
    clients() {
      return this.$store.getters.clients;
    },
    tableProperties() {
      return true ? this.count > 10 : "";
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
  flex-direction: column;
  justify-content: center;
}
.rounded-sm {
  border-radius: 20px !important;
}
</style>
