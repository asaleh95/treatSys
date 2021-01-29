<template>
  <div :class="'side-header ' + this.$root.header">
    <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
    <!-- Side Header Inner Start -->
    <div class="side-header-inner custom-scroll ps ps--active-y">
      <nav class="side-header-menu" id="side-header-menu">
        <ul>
          <li>
            <img
              style="margin-bottom: 41px; border-radius: 2.25rem !important"
              src="/Web/treat2.png"
              class="mx-auto d-block"
              alt="treat"
              width="80"
              height="70"
            />
          </li>
          <li class="has-sub-menu">
            <router-link to="/doctors/all"><i class="ti-home"></i> <span>الاطباء</span></router-link>
          </li>
          <li>
            <router-link to="/hospitals/all"
              ><i class="ti-palette"></i> <span>المستشفيات</span></router-link
            >
          </li>
          <li class="has-sub-menu">
            <router-link to="/users/all"
              ><i class="ti-package"></i> <span>المستخدمين </span></router-link
            >
          </li>
          <li class="has-sub-menu">
            <router-link to="/xray/all"
              ><i class="ti-crown"></i> <span>الاشعه </span></router-link
            >
          </li>
          <li class="has-sub-menu">
            <router-link to="/laps/all"
              ><i class="ti-stamp"></i> <span>المعامل</span></router-link
            >
          </li>
          <li>
            <router-link to="/pharmcy/all"
              ><i class="ti-layout"></i>
              <span>الصيدليات</span>
            </router-link>
          </li>
          <li class="has-sub-menu">
            <router-link to="/support/all"
              ><i class="ti-stamp"></i> <span>الدعم</span></router-link
            >
          </li>
        </ul>
      </nav>
      <div class="ps__rail-x" style="left: 0px; bottom: 3px">
        <div
          class="ps__thumb-x"
          tabindex="0"
          style="left: 0px; width: 0px"
        ></div>
      </div>
    </div>
    <!-- Side Header Inner End -->
  </div>
  <!-- Side Header End -->
</template>

