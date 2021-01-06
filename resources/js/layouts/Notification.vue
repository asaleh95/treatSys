<template>
  <div class="col-auto">
    <ul class="header-notification-area">
      <!--Notification-->
      <!-- <li class="adomx-dropdown col-auto">
        <a class="toggle" href="#">
          <i class="zmdi zmdi-notifications"></i>
          <span class="badge"></span>
        </a>

        <div class="adomx-dropdown-menu dropdown-menu-notifications">
          <div class="head">
            <h5 class="title">التنبيهات</h5>
          </div>
          <div class="body custom-scroll">
            <ul>
              <li>
                <a href="#">
                  <i class="zmdi zmdi-notifications-none"></i>
                  <p>زائر أضاف حقيبة يد ماركة D&G للسلة</p>
                  <span>11.00 am اليوم</span>
                </a>
                <button class="delete">
                  <i class="zmdi zmdi-close-circle-o"></i>
                </button>
              </li>
              <li>
                <a href="#">
                  <i class="zmdi zmdi-notifications-none"></i>
                  <p>زائر أضاف استشارة قانونية للسلة</p>
                  <span>11.00 am اليوم</span>
                </a>
                <button class="delete">
                  <i class="zmdi zmdi-close-circle-o"></i>
                </button>
              </li>
              <li>
                <a href="#">
                  <i class="zmdi zmdi-notifications-none"></i>
                  <p>زائر أضاف حقيبة يد ماركة D&G للسلة</p>
                  <span>11.00 am امس</span>
                </a>
                <button class="delete">
                  <i class="zmdi zmdi-close-circle-o"></i>
                </button>
              </li>
              <li>
                <a href="#">
                  <i class="zmdi zmdi-notifications-none"></i>
                  <p>زائر أضاف حقيبة يد ماركة D&G للسلة</p>
                  <span>11.00 am اليوم</span>
                </a>
                <button class="delete">
                  <i class="zmdi zmdi-close-circle-o"></i>
                </button>
              </li>
              <li>
                <a href="#">
                  <i class="zmdi zmdi-notifications-none"></i>
                  <p>زائر أضاف استشارة قانونية للسلة</p>
                  <span>11.00 am اليوم</span>
                </a>
                <button class="delete">
                  <i class="zmdi zmdi-close-circle-o"></i>
                </button>
              </li>
              <li>
                <a href="#">
                  <i class="zmdi zmdi-notifications-none"></i>
                  <p>زائر أضاف حقيبة يد ماركة D&G للسلة</p>
                  <span>11.00 am امس</span>
                </a>
                <button class="delete">
                  <i class="zmdi zmdi-close-circle-o"></i>
                </button>
              </li>
              <li>
                <a href="#">
                  <i class="zmdi zmdi-notifications-none"></i>
                  <p>زائر أضاف حقيبة يد ماركة D&G للسلة</p>
                  <span>11.00 am اليوم</span>
                </a>
                <button class="delete">
                  <i class="zmdi zmdi-close-circle-o"></i>
                </button>
              </li>
            </ul>
          </div>
          
        </div>
      </li> -->

      <!--User-->
      <li class="adomx-dropdown col-auto" @click="toggle()">
        <a class="toggle" href="#">
          <span class="user">
            <span class="avatar">
              <img v-if="img" :src="img" alt />
              <img v-else src="/assets/images/salla/client-img.png" alt />
              <span class="status"></span>
            </span>
            <span class="name">{{ manager }}</span>
          </span>
        </a>

        <!-- Dropdown -->
        <div :class="'adomx-dropdown-menu dropdown-menu-user ' + is_toggle">
          <div class="head">
            <h5 class="name">
              <a href="#">{{ manager }}</a>
            </h5>
            <a class="mail" href="#">{{ email }}</a>
          </div>
          <div class="body">
            <ul>
              <li>
                <router-link to="/profile/admin"><i class="zmdi zmdi-account"></i>الملف الشخصي </router-link>
              </li>
              <!-- <li>
                <a href="#"> <i class="zmdi zmdi-email-open"></i>التنبيهات </a>
              </li>  -->
              <!-- <li>
                <a href="#">
                  <i class="zmdi zmdi-wallpaper"></i>تحديثات المنصة
                </a>
              </li> -->
            </ul>
            <ul>
              <li>
                <router-link to="logout">
                  <i class="zmdi zmdi-lock-open"></i> تسجيل الخروج
                </router-link>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <!-- Header Notifications Area End -->
</template>

<script>
export default {
  mounted() {
    let user = JSON.parse(localStorage.getItem("admin"));
    this.manager = user.manager;
    this.email = user.email;
    this.img = user.image;
  },

  data() {
    return {
      manager: "",
      email: "",
      is_toggle: "",
      img: ""
    };
  },
  methods: {
    toggle() {
      if (this.is_toggle == "") {
        this.is_toggle = "show";
      } else {
        this.is_toggle = "";
      }
    },
  },
};
</script>
