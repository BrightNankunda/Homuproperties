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
      <table class="table table-responsive table-condensed table-hover table-sm table-bordered" v-else>
        <thead class="thead-dark">
          <tr>
            <th scope="col">Client Name</th>
            <th scope="col">Property Name</th>
            <th scope="col">Client Contact</th>
            <th scope="col">Months Paid</th>
            <th scope="col">Room Number</th>

            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="client in clients" :key="client.id">
            <td v-if="clientId != client.id">{{ client.clientName }}</td>
            <td v-else>
              <input
                type="text"
                class="input"
                @keyup.enter="submitUpdate(client)"
                v-model="client.clientName"
              />
            </td>

            <td v-if="clientId != client.id">{{ client.propertyName }}</td>
            <td v-else>
              <input
                type="text"
                class="input"
                @keyup.enter="submitUpdate(client)"
                v-model="client.propertyName"
              />
            </td>

            <td v-if="clientId != client.id">{{ client.clientContact }}</td>

            <td v-else>
              <input
                type="text"
                class="input"
                @keyup.enter="submitUpdate(client)"
                v-model="client.clientContact"
              />
            </td>
            <td v-if="clientId != client.id">{{ client.monthsPaid }}</td>
            <td v-else>
              <input
                type="text"
                class="input"
                @keyup.enter="submitUpdate(client)"
                v-model="client.monthsPaid"
              />
            </td>
            <td v-if="clientId != client.id">{{ client.roomNumber }}</td>
            <td v-else>
              <input
                type="text"
                class="input"
                @keyup.enter="submitUpdate(client)"
                v-model="client.roomNumber"
              />
            </td>
            <td>
              <button
                class="btn btn-info"
                @click="updateClient(client)"
                v-if="clientId != client.id"
              >
                Edit
              </button>
              <button
                class="btn btn-warning"
                @click="submitUpdate(client)"
                title="Edit"
                v-else
              >
                Update
              </button>
              <button
                class="btn btn-danger"
                @click="deleteClient(client)"
                v-if="clientId != client.id"
              >
                <b-icon icon="trash"></b-icon>
              </button>
              <button
                class="btn btn-danger"
                @click="cancelEdit(client)"
                title="Cancel"
                v-else
              >
                <b-icon icon="backspace"></b-icon>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!--<div>
      <b-button @click="toggleBusy">Toggle Busy State</b-button>
      <b-table responsive :items="clients" head-variant="primary" bordered hover dark :fields="fields">
        <template #table-colgroup="scope">
          <col v-for="field in scope.fields" :key="field.key" :style="{ width: field.key === 'roomNumber' ? '40px' : '70px' }" />
        </template>
        <template #table-busy>
          <div class="text-center text-danger my-2">
            <b-spinner class="align-middle"></b-spinner>
            <strong>Loading...</strong>
          </div>
        </template>
        <template #cell(actions)>
          <button class="btn btn-info" @click="updateClient(client)" v-if="clientId != client.id">Edit</button>
        </template>
      </b-table>
    </div>-->
  </div>
</template>

<script>
export default {
  name: "Clients",
  data() {
    return {
      beforeEditCache: "",
      count: 0,
      editing: false,
      //client.editing = false,
      //client.id = false capture and a clients id
      fields: [
        { key: "clientName", sortable: true },
        { key: "propertyName", sortable: true },
        "clientContact",
        "monthsPaid",
        { key: "roomNumber", sortable: true },
        "actions",
      ],
      clientId: 0,
      loading: true,
      isBusy: false,
      client: {
        clientName: "",
        clinetContact: "",
        monthsPaid: "",
        roomNumber: "",
        accessNumber: "",
        paid: false,
        verified: false,
      },
    };
  },
  created() {
    this.loading = true;
    this.fetchClients();
  },
  mounted() {
    this.$store.dispatch("fetchClients");

    // this.fetchClients();
  },

  methods: {
    toggleBusy() {
      this.isBusy = !this.isBusy;
    },
    deleteClient(client) {
      this.loading = true;
      this.$store.dispatch("deleteClient", client).then((res) => {
        this.$store.dispatch("fetchClients");
        this.fetchClients();
        this.loading = false;
      });
    },

    // updateClient(client) {
    //   //this.beforeEditCache = client.clientName;
    //   //this.client.editing = true
    //   //currentlyediting = 2 way selected event and capture selected id ie like the index down
    //   //currentlyediting == client.id
    //   this.editing = true;
    // },
    updateClient(client) {
      //this.beforeEditCache = client.clientName;
      this.clientId = client.id;
      console.log(client.id);
    },
    submitUpdate(client) {
      this.loading = true;
      axios
        .patch("/api/clients/" + client.id, client)
        .then((success) => {
          this.$store.dispatch("fetchClients");
          console.log(success);
          this.clientId = 0;
          this.loading = false;
        })
        .catch((err) => {
          console.log(err);
        });

      this.editing = false;
    },
    cancelEdit(client) {
      //client.clientName = this.beforeEditCache;
      this.clientId = 0;
    },
    fetchClients(context) {
      //axios.defaults.headers.common["Authorization"] = "Bearer " + context.this.$store.state.token;
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
  },
};
</script>
