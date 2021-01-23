<template>
  <div class="my-5">
    <!--<div>
      <input type="file" ref="file" style="display: none" />
    <button @click="$refs.file.click()">open file dialog</button>
      <input id="fileInput" type="file" style="display: none" v-on:change="yourVueMethod()" />
      <p id="fileInputButton" onclick="document.getElementById('fileInput').click()">Open File</p>
      <div class="form-group">
        <label for="front">Property Face Image:</label>
        <input type="file" name="front" hidden ref="file" class="form-control" @change="showFront" />
        <button @click="$refs.file.click()">open file dialog</button>
      </div>
      <div v-if="frontImage">
        <img :src="frontImage" alt="Front Image" style="max-height: 100px" />
      </div>
    </div>-->
    <div id="horzontal" class="d-flex">
      <button id="left-button" class="btn btn-hero" @click="swipeLeft"><b-icon icon="chevron-left" scale="2"></b-icon></button>

      <div class="center my-5" id="content" ref="content">
        <div class="internal bg-primary col-lg-3">div 1</div>
        <div class="internal bg-warning col-lg-3">div 2</div>
        <div class="internal bg-light col-lg-3">div 3</div>
        <div class="internal bg-dark col-lg-3">div 4</div>
        <div class="internal col-lg-3">div 5</div>
        <div class="internal bg-secondary col-lg-3">div 6</div>
        <div class="internal bg-info col-lg-3">div 7</div>
        <div class="internal bg-primary col-lg-3">div 8</div>
        <div class="internal bg-info col-lg-3">div 9</div>
        <div class="internal bg-light col-lg-3">div 10</div>
        <div class="internal bg-warning col-lg-3">div 11</div>
        <div class="internal bg-success col-lg-3">div 12</div>
      </div>

      <button id="right-button" class="btn btn-hero" @click="swipeRight"><b-icon icon="chevron-right" scale="2"></b-icon></button>
    </div>
    <div class="scrolling-wrapper my-5">
      <div class="card"><h2>Card</h2></div>
      <div class="card"><h2>Card</h2></div>
      <div class="card"><h2>Card</h2></div>
      <div class="card"><h2>Card</h2></div>
      <div class="card"><h2>Card</h2></div>
      <div class="card"><h2>Card</h2></div>
      <div class="card"><h2>Card</h2></div>
      <div class="card"><h2>Card</h2></div>
      <div class="card"><h2>Card</h2></div>
    </div>
    <div class="d-flex flex-row flex-nowrap overflow-auto my-5">
      <div class="card card-block mx-2" style="min-width: 300px">Card</div>
      <div class="card card-block mx-2" style="min-width: 300px">Card</div>
      <div class="card card-block mx-2" style="min-width: 300px">Card</div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      front: null,

      frontImage: null,
    };
  },

  methods: {
    showFront(e) {
      this.front = e.target.files[0];
      let frontReader = new FileReader();
      frontReader.readAsDataURL(this.front);
      frontReader.onload = (e) => {
        this.frontImage = e.target.result;
      };
    },
    scrollTo(element, scrollPixels, duration) {
      const scrollPos = element.scrollLeft;
      // Condition to check if scrolling is required
      if (!((scrollPos === 0 || scrollPixels > 0) && (element.clientWidth + scrollPos === element.scrollWidth || scrollPixels < 0))) {
        // Get the start timestamp
        const startTime = "now" in window.performance ? performance.now() : new Date().getTime();

        function scroll(timestamp) {
          //Calculate the timeelapsed
          const timeElapsed = timestamp - startTime;
          //Calculate progress
          const progress = Math.min(timeElapsed / duration, 1);
          //Set the scrolleft
          element.scrollLeft = scrollPos + scrollPixels * progress;
          //Check if elapsed time is less then duration then call the requestAnimation, otherwise exit
          if (timeElapsed < duration) {
            //Request for animation
            window.requestAnimationFrame(scroll);
          } else {
            return;
          }
        }
        //Call requestAnimationFrame on scroll function first time
        window.requestAnimationFrame(scroll);
      }
    },
    swipeLeft() {
      const content = this.$refs.content;
      this.scrollTo(content, -800, 500);
    },
    swipeRight() {
      const content = this.$refs.content;
      this.scrollTo(content, 800, 500);
    },
  },
};
</script>

<style scoped>
#horizontal {
  text-align: center;
  font-size: 20px;
}

.left {
  float: left;
  width: 5%;
  height: 200px;
  border: 1px solid red;
}

.internal {
  /*width: 31.75%;*/
  height: 100%;
  border: 1px solid red;
  display: inline-block;
}

.center {
  /*float: left;*/
  width: 100%;
  height: 250px;
  border: 1px solid red;
  margin: 1px;
  overflow: hidden;
  white-space: nowrap;
}

.right {
  float: right;
  width: 20%;
  height: 200px;
  border: 1px solid black;
}
.data {
  background: white !important;
}
.status {
  border: solid green;
  color: green;
}
.scrolling-wrapper {
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
}
.card {
  display: inline-block;
}
</style>
