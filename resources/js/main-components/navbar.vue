<template>
    <nav class="navbar navbar-expand-md fixed-top d-flex flex-md-row p-0 px-md-4 mb-3 bg-white shadow-sm">
        <a class="navbar-brand offset-md-2" href="#"><img src="/web/treat2.png" alt="" /></a>
        <button
          class="navbar-toggler bg-dark"
          type="button"
          data-toggle="collapse"
          data-target="#navbarCollapse"
          aria-controls="navbarCollapse"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <router-link class="p-2 text-blue" to="/">home</router-link>
            </li>
            <li class="nav-item active">
              <router-link class="p-2 text-blue" to="doctors">doctors</router-link>
            </li>
            <li class="nav-item active">
              <router-link class="p-2 text-blue" to="news">blog/news</router-link>
            </li>
            <li class="nav-item active">
              <router-link class="p-2 text-blue" to="aboutus">about us</router-link>
            </li>
            <li class="nav-item active">
              <router-link class="p-2 text-blue" to="contactus">contact us</router-link>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0 ml-md-5">
            <a class="user" href="#"><img src="/web/globe.png" alt="" /></a>
            <a class="user">eng</a>

            <a class="user" href="#"><img src="/web/user.png" alt="" /></a>

            <a class="search" href="#"><img src="/web/search.png" alt="" /></a>
          </form>
        </div>
      </nav>
</template>