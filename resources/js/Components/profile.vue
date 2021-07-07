<template>
  <div class="container">
    <div v-if="loading" class="text-center my-5">
      <div class="spinner-border text-primary text-center" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class="col-lg-10 mx-auto" v-else>
      <div class="my-5">
        <div class="row facer mb-4 mt-2">
          <div class="col-lg-3 facee">
            <div v-if="profilePic">
              <img :src="profilePic" class="bg-primary image photo" />
              photo
            </div>
            <div v-if="photo">
              <img
                :src="'pics/' + photo.pic"
                style="height=fit-content; width: 130px;"
                class="image"
              />
            </div>
            <div class="" v-if="!profilePic && !photo">
              <b-icon icon="person" scale="3" @click="$refs.pic.click()"></b-icon>
              <form @submit.prevent="profile" hidden enctype="multipart/form-data">
                <input type="file" ref="pic" class="pic" name="pic" @change="picture" />

                <button type="submit" ref="btn"><b-icon icon="upload"></b-icon></button>
              </form>
            </div>
          </div>

          <button type="submit" class="button" @click="$refs.btn.click()">
            <b-icon icon="upload"></b-icon>
          </button>
        </div>
        <div class="row my-4">
          <div
            class="border-top border-left border-right mt-3 col-md-10 details d-flex flex-row bg-light"
          >
            <div class="col-md-4 my-2">{{ user.firstname + " " + user.lastname }}</div>
            <div class="col-md-4 my-2">{{ user.email }}</div>
            <div class="col-md-2 my-2">{{ user.phone }}</div>
          </div>
          <div class="border col-md-10">
            <h3 class="lead">Register Property at a Discount</h3>
            <h3 class="lead">Explore Our Gallery</h3>
            <h3 class="lead">Find your Perfect Place to stay!.</h3>
          </div>
        </div>
      </div>
    </div>

    <!--<div class="cart-content">
      <p>cart-Content</p>
      <div class="">
        <h4>Queen Bed</h4>
        <h5>$9</h5>
        <span class="remove-item">Remove</span>
      </div>
      <div>
        <b-icon icon="chevron-up"></b-icon>
        <p class="item-amount">Bright</p>
        <b-icon icon="chevron-down"></b-icon>
      </div>
    </div>-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      profilePic: null,
      ProfilePic: null,
      pic: null,
      photo: "",
      loading: true,
    };
  },
  computed: {
    user() {
      return this.$store.getters.user;
    },
  },
  created() {
    this.$store.dispatch("getUser");
    this.getPic();
  },
  methods: {
    profile() {
      this.loading = true;
      let data = new FormData();
      data.append("pic", this.pic);
      axios
        .post("api/pic", data)
        .then((response) => {
          console.log(response.data);
          this.getPic();
          this.loading = false;
        })
        .catch((err) => {
          console.log(err);
          this.loading = false;
        });
    },
    getPic() {
      this.$store
        .dispatch("getPic")
        .then((response) => {
          if (response.data.pic.length === undefined) {
            console.log("nnnnnno");
            this.loading = false;
          } else {
            console.log("some");
            this.photo = response.data;
            this.loading = false;
          }
          console.log(response.data.pic);
          this.loading = false;
        })
        .catch((err) => {
          console.log(err);
          this.loading = false;
        });
    },
    // getPic() {
    //   this.loading = true;
    //   axios
    //     .get("api/pic")
    //     .then((response) => {
    //       console.log(response);

    //       //this.photo = response.data;
    //       this.loading = false;
    //     })
    //     .catch((err) => {
    //       console.log(err);
    //       this.loading = false;
    //     });
    // },
    picture(e) {
      this.pic = e.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(this.pic);
      reader.onload = (e) => {
        this.profilePic = e.target.result;
      };
    },
  },
};
</script>

<style scoped>
.container {
  box-sizing: border-box;
  font-family: "Open-serif", sans-serif;
}
.person {
  border: 0.1rem solid black;
  border-radius: 50%;
  height: 100px;
  width: 100px;
  max-width: 30%;
  display: flex;
  justify-content: center;
  align-content: center;
  align-content: center;
}
.photo {
  border: none;
  border-radius: 50%;
  width: 100%;
  height: fit-content;
}
.image {
  width: 130px;
  height: 130px;
}

.details {
  justify-content: center;
  align-items: center;
}
/*.picture {
  display: flex;
  flex-direction: column;
  justify-content: center;
}*/
.facer {
  width: 130px;
  height: 130px;
  position: relative;
  cursor: pointer;
  /*border: 1px solid black;*/
  border-radius: 50%;
  /*background: blue;*/
}
.button {
  position: absolute;
  top: -5px;
  right: -5px;
  border: none;
}
.facee {
  width: 125px;
  height: 125px;
  border: none;
  border-radius: 50%;
  /*background: green;*/
}
.face {
  position: relative;
  cursor: pointer;
  /*background: yellow;*/
}
img {
  border: none;
  border-radius: 50%;
}
.btn {
  position: absolute;
  top: -10px;
  right: -10px;
}
.upload {
  position: absolute;
  bottom: -15px;
  right: -15px;
}
.item-amount {
  letter-spacing: 2em;
}
.cart-content {
  display: grid;
  align-items: center;
  grid-template-columns: auto 1fr auto;
  grid-column-gap: 1.5rem;
}
</style>
