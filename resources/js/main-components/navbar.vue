<template>
  <nav
    class="navbar navbar-expand-md fixed-top d-flex flex-md-row p-0 px-md-4 mb-3 bg-white shadow-sm"
  >
    <a class="navbar-brand offset-md-2" href="#"
      ><img src="/Web/treat2.png" alt=""
    /></a>
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
          <router-link class="p-2 text-blue" to="/">{{ $t('message.home') }}</router-link>
        </li>
        <li class="nav-item active">
          <router-link class="p-2 text-blue" to="news">{{ $t('message.blog') }}</router-link>
        </li>
        <li class="nav-item active">
          <router-link class="p-2 text-blue" to="aboutus">{{ $t('message.about') }}</router-link>
        </li>
        <li class="nav-item active">
          <router-link class="p-2 text-blue" to="contactus"
            >{{ $t('message.contact') }}</router-link
          >
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0 ml-md-5">
        <a class="user" href="#"><img src="/Web/globe.png" alt="" /></a>
        <a class="user" href="#" @click="setLang()">{{langIcon}}</a>

        <a class="user" href="#"><img src="/Web/user.png" alt="" /></a>

        <a class="search" href="#"><img src="/Web/search.png" alt="" /></a>
      </form>
    </div>
  </nav>
</template>

<script>
export default {
  mounted() {
    this.lang = (sessionStorage.getItem('lang')) ? sessionStorage.getItem('lang') : 'en';
    this.langIcon = (sessionStorage.getItem('lang') == 'ar') ? 'en' : 'ar';
  },
  data() {
    return {
      lang: 'en',
      langIcon: ''
    };
  },
  methods: {
    setLang(){
      window.lang = (this.lang == 'ar') ? sessionStorage.setItem('lang', 'en'): sessionStorage.setItem('lang', 'ar');
      location.reload();
    }
  }
};
</script>