<template>
  <div class="container mx-auto">
    <div class="col-md-12 col-sm-12">
      <div class="row how text-center bg-light p-3 my-1">
        <b>Upload your Property on homuproperties.com</b> By taking the attractive or seductive images of your property from the appropriate angles that show the best of your property to attract the potential clients. Try to take a clear front image of your property and make sure its the first image you upload in the
        front image input field, then add other appropriate internal or external images of your property. Fill in each and every field with the correct information to avoid errors and submit this information by clicking the upload button.
      </div>
      <!--HEADING-->
      <div class="mt-2 d-flex justify-content-center">
        <h3 class="border-bottom pb-2 text-center text-primary">Why you should consider Listing your property with homuproperties.com</h3>
      </div>

      <div class="row second text-center mb-2">
        <div class="row inner d-flex justify-content-center">
          <div class="col-md-5 col-sm-12 why bg-light p-4 m-2">
            Being Election Time, and Covid-12, it should be a priority for your business to recieve appropriate advertising targeting the right clients who can find your business at an appropriate place/online website that is accessed by the right people and know your location, quality, quantity, contacts to reduce the
            know gap about your bbusiness/property.
          </div>
          <div class="col-md-5 col-sm-12-when bg-light p-4 m-2">
            This is a time of <b>Uncertainity</b> when you should consider digitizing the information about your business and reduce the information gap that your business may encouter durng such times where there is high immobility for property agents and tenants, but not for internet.
          </div>
        </div>
      </div>

      <p class="lead p-1 m-1">HomuProperties.com provides land lords with convinience to recieve on line mobile and bank payments from clients.</p>
      <p class="lead p-1 m-1">You can attach your Payment accounts on our website to make it easy for new clients to pay in advance.</p>
      <p class="lead p-1 m-1">Cheap Advertising for over a year/15 months with access to pontential clients faster all year round.</p>

      <p class="lead p-1 m-1">We offer digitized management for your clients by allowing you to register them and then monitor their payment Status them.</p>
      <p class="lead p-1 m-1">A property manager or land lord can see/register clients who have paid and when they paid, Update his clients table and delete clients.</p>

      <div class="row last my-2">
        <router-link to="/upload" class="mx-auto link">Continue</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Bupload",
};
</script>

<style scoped>
.container {
  border: 1px solid rgba(180, 182, 182, 0.3);
  max-width: 800px;
  margin: 0 auto;
}
.how {
}
.second {
  display: flex;
}

.benefits {
  display: flex;
  justify-content: space-around;
}
.link {
  font-size: 130%;
}
.bg-light {
  border: none;
  border-radius: 4px;
}
</style>
