<template>
  <div>
    <b-navbar type="white" variant="white">
      <b-navbar-nav>
        <b-nav-item href="#">Home</b-nav-item>

        <!-- Navbar dropdowns -->
        <b-nav-item-dropdown text="Apartments" right>
          <b-dropdown-item href="#">Kampala</b-dropdown-item>
          <b-dropdown-item href="#">Wakiso</b-dropdown-item>
          <b-dropdown-item href="#">Kira</b-dropdown-item>
          <b-dropdown-item href="#">Najera</b-dropdown-item>
        </b-nav-item-dropdown>

        <b-nav-item-dropdown text="Land" right>
          <b-dropdown-item href="#">Wakiso</b-dropdown-item>
          <b-dropdown-item href="#">Jinja</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-navbar>
  </div>
</template>
<script>
export default {
  name: "NestedNavbar",
};
</script>
