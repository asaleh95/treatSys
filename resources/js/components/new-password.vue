
<template>
  <div class="row">
    <div class="col-md-4 pl-5 pt-5">
      <h1 class="logi">{{$t('message.help')}}!</h1>
      <br />
      <h4>{{$t('message.forget')}}!</h4>
      <br />
      <p class="text-muted font-d">
        {{$t('message.help_paragraph')}}
      </p>
      <br />
      <form
        action="#"
        @submit.prevent="submit"
        @keydown="error.clear($event.target.name)"
        @change="error.clear($event.target.name)"
      >
        <div>
          <input
            class="form-control form-control-lg mb-4"
            :type="passwordType"
            v-model="password"
            id="pass"
            name="password"
            :placeholder="$t('message.new_password')"
          />
          <span toggle="#password-field" :class="'fa fa-fw fa-eye field-icon toggle-password ' + seePassword" @click="see()"></span>
          <span style="color: red" v-text="error.get('password')"></span>
        </div>
        <div>
          <input
            class="form-control form-control-lg mb-4"
            :type="passwordType"
            v-model="password"
            id="pass"
            name="password"
            :placeholder="$t('message.re_new_password')"
          />
          <span style="color: red" v-text="error.get('password')"></span>
        </div>
       <button
          type="submit"
          class="btn btn-primary btn-lg btn-block contactus-btn"
        >
          {{$t('message.change_password')}}
        </button>
      </form>
      <br />
      <br />
      <p class="text-muted text-center font-d">
        {{$t('message.i_remember_my_password')}} !<a href="#">{{$t('message.signin')}}</a>
      </p>
    </div>
    <div class="hide-st col-md-8">
      <img
            src="/Web/5.png"
            class="back-color"
            alt="Cinque Terre"
                height="625"
                width="904"
          />
          <img
        src="/Web/55.png"
        class="topleft-help"
        style="width: 110%"
        alt="over-image"
      />
      <div>
        <h1 class="center-help">{{$t('message.trust')}}</h1>
        <h1 class="center-help text-t7t">{{$t('message.care')}}</h1>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      password: "",
      error: window.obj,
      seePassword: '',
      passwordType: 'password'
    };
  },
  methods: {
    submit() {
      //this.products = JSON.parse(localStorage.getItem('products'));
      let all = {
        password: this.password,
        email: sessionStorage.getItem("code-email"),
      };
      console.log(all);
      axios
        .post("/reset-password", all)
        .then((result) => {
          console.log(result.data);
          sessionStorage.removeItem("code-email");
          this.$router.push("/login");
        })
        .catch((err) => {
          // this.error = "خطأ فى الباسورد او الايميل"
          console.log(err.error);
        });
    },
    see(){
      if (this.seePassword == '') {
        this.seePassword = 'text-primary';
        this.passwordType = 'text';
      } else {
        this.seePassword = '';
        this.passwordType = 'password';
      }
    }
  },
};
</script>