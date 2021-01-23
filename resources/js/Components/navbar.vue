<template>
<div class="">
    <div class="border-bottom w-100">

        <b-navbar toggleable="lg" type="dark" variant="info">
            <router-link class="text-white px-3" to="/b ">HomuProperties</router-link>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <router-link class="text-white px-3" to="/posts">Home</router-link>

                    <router-link class="text-white px-3" to="/image">Upload Image</router-link>
                    <router-link class="text-white px-3" to="/createpost">Upload A Post</router-link>
                    <router-link class="text-white px-3" to="/last">Last</router-link>
                    <router-link to="/details" class="text-white px-3">Details</router-link>
                </b-navbar-nav>

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                    <b-nav-form>
                        <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
                        <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
                    </b-nav-form>

                    <router-link to="/about" class="text-white my-2 px-2">About</router-link>

                    <b-nav-item-dropdown right>
                        <!-- Using 'button-content' slot -->
                        <template #button-content>
                            <em>User</em>
                        </template>
                        <router-link to="/user">User</router-link>
                        <router-link to="/login">Login</router-link>
                        <router-link to="/register">Register</router-link>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
    <p class="lead text-center"> Nankunda bright home page
    </p>

</div>
</template>

<style scoped>
.navbar-top {
    border-bottom: 4px solid blue;
}

.text-white {
    color: #fff;
}

.text-white:hover {
    color: green;
}

.navbar-doublerow>.navbar {
    display: block;
    padding: 0px auto;
    margin: 0px auto;
    min-height: 25px;
}

/*Down nav*/
.navbar-doublerow .navbar-down .navbar-brand {
    /*navbar brand*/
    padding: 0px auto;
    float: left;
    color: blue;
    font-size: 30px;
}

.navbar-doublerow .navbar-down ul>li>a {
    /*Menu items*/
    font-size: 15px;
    color: #000;
}

.navbar-doublerow .navbar-down ul>li>a:hover {
    /*menu hover*/
    border-bottom: 1px solid blue;
    color: blue;
}
</style>
