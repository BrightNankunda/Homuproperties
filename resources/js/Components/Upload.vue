<template>
  <div class="bg-light">
    <div class="row justify-content-center">
      <div class="col-lg-5 data">
        <form method="POST" @submit.prevent="upload" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Name">Property Name:</label>
            <input
              type="text"
              name="name"
              class="form-control"
              :class="{ err: nameerr }"
              v-model="name"
              placeholder="Unique Property Name..."
            />
            <div class="" v-if="nameerr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <!--<div class="form-group">
            <label for="category">Property Category:</label>
            <input type="text" name="category" class="form-control" v-model="category" placeholder="Rent, Sale..." />
          </div>-->
          <div class="form-group">
            <label for="type">Property Type:</label>
            <select v-model="type" class="form-control" :class="{ err: typeerr }">
              <option disabled value="Pl">Please select one</option>
              <option>Apartment</option>
              <option>Hostel</option>
              <option>Arcade</option>
              <option>Mall</option>
              <option>Rental</option>
              <option>Officespace</option>
              <option>Office & Biz space</option>
            </select>
            <div class="" v-if="typeerr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group">
            <label for="status">Property Status:</label>
            <select v-model="status" class="form-control" :class="{ err: statuserr }">
              <option disabled value="">Please select one</option>
              <option>Self Contained</option>
              <option>Not Self Contained</option>
            </select>
            <div class="" v-if="statuserr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group" v-if="hostelstatus">
            <label for="hstatus">Hostel Status:</label>
            <select v-model="hstatus" class="form-control" :class="{ err: hstatuserr }">
              <option disabled value="">Please select one</option>
              <option>Single</option>
              <option>Double</option>
              <option>Single & Double Rooms</option>
            </select>
            <div class="" v-if="hstatuserr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group" v-if="apartmentstatus">
            <label for="astatus">Apartment Status:</label>
            <select v-model="astatus" class="form-control" :class="{ err: astatus }">
              <option disabled value="">Please select one</option>
              <option>1 Bed Room</option>
              <option>2 Bed Rooms</option>
              <option>3 Bed Rooms</option>
              <option>Multiple Classes</option>
            </select>
            <div class="" v-if="astatuserr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group">
            <label for="category">Property Category:</label>
            <select v-model="category" class="form-control" :class="{ err: categoryerr }">
              <option disabled value="">Please select one</option>
              <option>Rent</option>
              <option>Sale</option>
            </select>
            <div class="" v-if="categoryerr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group">
            <label for="location">Location:</label>
            <input
              type="text"
              name="location"
              class="form-control"
              :class="{ err: locationerr }"
              v-model="location"
              placeholder="District ie Kampala"
            />
            <div class="" v-if="locationerr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group">
            <label for="address">Address:</label>
            <input
              type="text"
              name="address"
              class="form-control"
              :class="{ err: addresserr }"
              v-model="address"
              placeholder="Town eg Bugolobi or Bwaise"
            />
            <div class="" v-if="addresserr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group">
            <label for="street">Street Name:</label>
            <input
              type="text"
              name="street"
              class="form-control"
              :class="{ err: streeterr }"
              v-model="street"
              placeholder="Main Street"
            />
            <div class="" v-if="streeterr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Property Description:</label>
            <textarea
              type="text"
              rows="5"
              cols="5"
              name="description"
              class="form-control"
              :class="{ err: descerr }"
              v-model="description"
              placeholder="Breifly describe your property qualities like Location, security, quality, standard...."
            ></textarea>
            <div class="" v-if="descerr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group">
            <label for="Rooms">Number of Rooms Per Floor:</label>
            <input
              type="number"
              name="rooms"
              class="form-control"
              :class="{ err: roomserr }"
              v-model="rooms"
              placeholder="Rooms per single floor..."
            />
            <div class="" v-if="roomserr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group">
            <label for="Floor">Property Floor:</label>
            <input
              type="number"
              name="floor"
              class="form-control"
              :class="{ err: floorerr }"
              v-model="floor"
              placeholder="Number of floors..."
            />
            <div class="" v-if="floorerr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group">
            <label for="rent">Monthly Rent Fee:</label>
            <input
              type="number"
              name="rent"
              class="form-control"
              :class="{ err: renterr }"
              v-model="rent"
              placeholder="Monthly Rent..."
            />
            <div class="" v-if="renterr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div class="form-group">
            <label for="contact">Property Manager's Contact:</label>
            <input
              type="text"
              name="contact"
              class="form-control"
              :class="{ err: contacterr }"
              v-model="contact"
              placeholder="Property Manager's contact..."
            />
            <div class="" v-if="contacterr">
              <p class="text-danger">This field is required!</p>
            </div>
          </div>

          <div>
            <input type="file" name="front" ref="front" hidden @change="showFront" />
            <input
              type="file"
              name="imagetwo"
              class="form-control"
              hidden
              ref="imagetwo"
              @change="showImageTwo"
            />
            <input
              type="file"
              @change="photoSelected"
              name="photo"
              ref="photo"
              hidden
              class="form-control"
            />
            <input
              type="file"
              @change="imageSelected"
              name="image"
              ref="image"
              hidden
              class="form-control"
            />
            <input
              type="file"
              name="imageone"
              class="form-control"
              hidden
              ref="imageone"
              @change="showImageOne"
            />
          </div>

          <div class="square">
            <div class="upper">
              <div class="photoPreview bg-light m-1" @click="$refs.front.click()">
                <div v-if="frontImage">
                  <img
                    :src="frontImage"
                    alt="Second Image"
                    style="height: 100px; width: 150px"
                  />
                </div>
                <div class="items" v-else>
                  <p>FACE PIC</p>
                  <p>+</p>
                </div>
              </div>

              <div class="photoPreview bg-light mt-1" @click="$refs.image.click()">
                <div v-if="imagePreview">
                  <img
                    :src="imagePreview"
                    alt="Second Image"
                    style="height: 100px; width: 150px"
                  />
                </div>
                <div class="items" v-else>
                  <p>IMAGE</p>
                  <p>+</p>
                </div>
              </div>
            </div>
            <div class="lower">
              <div class="photoPreview bg-light mt-1" @click="$refs.photo.click()">
                <div v-if="photoPreview">
                  <img
                    :src="photoPreview"
                    alt="Second Image"
                    style="height: 100px; width: 150px"
                  />
                </div>
                <div class="items" v-else>
                  <p>IMAGE</p>
                  <p>+</p>
                </div>
              </div>

              <div class="photoPreview bg-light mt-1" @click="$refs.imageone.click()">
                <div v-if="ImageOne">
                  <img
                    :src="ImageOne"
                    alt="Second Image"
                    style="height: 100px; width: 150px"
                  />
                </div>
                <div class="items" v-else>
                  <p>IMAGE</p>
                  <p>+</p>
                </div>
              </div>

              <div class="photoPreview bg-light mt-1" @click="$refs.imagetwo.click()">
                <div v-if="ImageTwo">
                  <img
                    :src="ImageTwo"
                    alt="Some Image"
                    style="height: 100px; width: 150px"
                  />
                </div>
                <div class="items" v-else>
                  <p>IMAGE</p>
                  <p>+</p>
                </div>
              </div>
            </div>
          </div>

          <div class="my-2 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">
              <b-icon icon="cloud-upload" scale="0.7"></b-icon>List
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Upload",

  data() {
    return {
      name: "",
      type: "",
      status: "",
      hstatus: "",
      astatus: "",
      category: "",
      location: "",
      address: "",
      street: "",
      description: "",
      rooms: "",
      floor: "",
      rent: "",
      contact: "",
      front: null,
      image: null,
      photo: null,
      imageone: null,
      imagetwo: null,
      frontImage: null,
      imagePreview: null,
      photoPreview: null,
      ImageOne: null,
      ImageTwo: null,
      apartmentstatus: false,
      hostelstatus: false,
      nameerr: false,
      typeerr: false,
      statuserr: false,
      hstatuserr: false,
      astatuserr: false,
      categoryerr: false,
      locationerr: false,
      addresserr: false,
      streeterr: false,
      descerr: false,
      roomserr: false,
      floorerr: false,
      renterr: false,
      contacterr: false,
    };
  },
  watch: {
    type(newval, oldval) {
      if (newval === "Hostel") {
        this.apartmentstatus = false;
        this.astatus = "Not Apartment";
        return (this.hostelstatus = true);
      } else if (newval === "Apartment") {
        this.hostelstatus = false;
        this.hstatus = "Not Hostel";

        return (this.apartmentstatus = true);
      } else if (newval != "Apartment" && "Hostel") {
        this.hstatus = "Not Hostel";
        this.astatus = "Not Apartment";
        this.hostelstatus = false;
        this.apartmentstatus = false;
      }
      console.log(newval);
    },
  },
  computed: {
    amount() {
      if (this.category === "Sale") {
        return this.rent * 0.02;
      } else if (this.type === "Rental") {
        return 120000;
      } else if (this.type === "Hostel" && this.hstatus == "Single") {
        return this.rent / 1.6;
        //return (1 + this.floor * 0.5) * (this.rooms / 3) * (this.rent / 1.75 / 3);
      } else if (this.type === "Hostel" && this.hstatus == "Double") {
        return this.rent / 2;
        //return (1 + this.floor * 0.5) * (this.rooms / 3) * (this.rent / 3.5 / 3);
      } else if (this.type === "Mall") {
        return (1 + this.floor * 0.35) * (this.rooms / 3) * (this.rent / 3);
      } else if (this.type === "Arcade") {
        return (1 + this.floor * 0.35) * (this.rooms / 3) * (this.rent / 3);
      } else if (this.type === "Officespace") {
        return (1 + this.floor * 0.4) * (this.rooms / 2) * (this.rent / 3);
      } else if (this.type === "Office & Biz space") {
        return (1 + this.floor * 0.4) * (this.rooms / 2.5) * (this.rent / 3);
      } else if (this.type === "Apartment") {
        return (1 + this.floor * 0.4) * (this.rooms / 2) * (this.rent / 3);
      }
    },
  },

  methods: {
    validatename() {
      if (this.name.trim().length === 0) {
        this.nameerr = true;
      }
      if (this.type.trim().length === 0) {
        this.typeerr = true;
      }
      if (this.status.trim().length === 0) {
        this.statuserr = true;
      }
      if (this.astatus.trim().length === 0) {
        this.astatuserr = true;
      }
      if (this.hstatus.trim().length === 0) {
        this.hstatuserr = true;
      }
      if (this.category.trim().length === 0) {
        this.categoryerr = true;
      }
      if (this.location.trim().length === 0) {
        this.locationerr = true;
      }
      if (this.street.trim().length === 0) {
        this.streeterr = true;
      }
      if (this.address.trim().length === 0) {
        this.addresserr = true;
      }
      if (this.description.trim().length === 0) {
        this.descerr = true;
      }
      if (this.rooms.trim().length === 0) {
        this.roomserr = true;
      }
      if (this.floor.trim().length === 0) {
        this.floorerr = true;
      }
      if (this.rent.trim().length === 0) {
        this.renterr = true;
      }
      if (this.contact.trim().length === 0) {
        this.contacterr = true;
      }
    },
    showFront(e) {
      this.front = e.target.files[0];
      let frontReader = new FileReader();
      frontReader.readAsDataURL(this.front);
      frontReader.onload = (e) => {
        this.frontImage = e.target.result;
      };
    },
    imageSelected(e) {
      this.image = e.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(this.image);
      reader.onload = (e) => {
        this.imagePreview = e.target.result;
      };
    },
    photoSelected(e) {
      this.photo = e.target.files[0];
      let photoReader = new FileReader();
      photoReader.readAsDataURL(this.photo);
      photoReader.onload = (e) => {
        this.photoPreview = e.target.result;
      };
    },
    showImageOne(e) {
      this.imageone = e.target.files[0];
      let OneReader = new FileReader();
      OneReader.readAsDataURL(this.imageone);
      OneReader.onload = (e) => {
        this.ImageOne = e.target.result;
      };
    },
    showImageTwo(e) {
      this.imagetwo = e.target.files[0];
      let TwoReader = new FileReader();
      TwoReader.readAsDataURL(this.imagetwo);
      TwoReader.onload = (e) => {
        this.ImageTwo = e.target.result;
      };
    },
    removeerrs() {
      this.nameerr = this.typeerr = this.statuserr = this.hstatuserr = this.astatuserr = this.categoryerr = this.descerr = this.locationerr = this.addresserr = this.streeterr = this.renterr = this.floorerr = this.roomserr = this.contacterr = false;
    },
    upload() {
      console.log(this.astatus);
      console.log(this.hstatus);
      console.log(this.amount);
      this.validatename();
      if (
        this.nameerr ||
        this.typeerr ||
        this.hstatuserr ||
        this.statuserr ||
        this.astatuserr ||
        this.descerr ||
        this.categoryerr ||
        this.locationerr ||
        this.addresserr ||
        this.streeterr ||
        this.renterr ||
        this.floorerr ||
        this.roomserr ||
        this.contacterr
      ) {
        console.log("ERRORS");
        setTimeout(this.removeerrs, 4000);
        return;
      }
      let data = new FormData();
      data.append("name", this.name);
      data.append("type", this.type);
      data.append("status", this.status);
      data.append("astatus", this.astatus);
      data.append("hstatus", this.hstatus);
      data.append("category", this.category);
      data.append("location", this.location);
      data.append("address", this.address);
      data.append("street", this.street);
      data.append("description", this.description);
      data.append("rooms", this.rooms);
      data.append("floor", this.floor);
      data.append("rent", this.rent);
      data.append("amount", this.amount);
      data.append("contact", this.contact);
      data.append("front", this.front);
      data.append("image", this.image);
      data.append("photo", this.photo);
      data.append("imageone", this.imageone);
      data.append("imagetwo", this.imagetwo);
      axios
        .post("/api/upload", data)
        .then((success) => {
          console.log(success);
          this.$router.push("/pay");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style scoped>
.data {
  background: white !important;
}
.photoPreview {
  min-height: 100px;
  width: 150px;
}
.upper {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}
.lower {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.items {
  font-size: 2em;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

.status {
  border: solid green;
  color: green;
}
.err {
  border: 2px solid red;
}
</style>
