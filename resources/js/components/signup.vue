
<template>
  <div class="row">
    <div class="col-md-4 pl-5 pt-5" style="z-index: 1">
      <h1 class="logi">{{$t('message.sign_up')}}</h1>
      <br />
      <h4>{{$t('message.register_new_account')}}</h4>
      <br />
      <p class="font-d">
        {{$t('message.help_paragraph')}}
      </p>
      <form
        action="#"
        @load.prevent="errors.clearAll()"
        @submit.prevent="submit"
        @keydown="error.clear($event.target.name)"
        @change="error.clear($event.target.name)"
      >
        <input
          type="text"
          v-model="email"
          id="email"
          name="email"
          class="form-control form-control-lg mb-4"
          :placeholder="$t('message.email')"
        />
        <span style="color: red" v-text="error.get('email')"></span>
        <div>
          <input
            :type="passwordType"
            v-model="password"
            id="pass"
            name="password"
            class="form-control form-control-lg mb-4"
            :placeholder="$t('message.password')"
          />
          <span toggle="#password-field" :class="'fa fa-fw fa-eye field-icon toggle-password ' + seePassword" @click="see()"></span>
          <span style="color: red" v-text="error.get('password')"></span>
          <!-- <span class="input-icon"><i class="fa fa-eye info"></i></span> -->
        </div>
        <div>
          <input
            class="form-control form-control-lg mb-4"
            :type="passwordType"
            name="password"
            v-model="password"
            :placeholder="$t('message.re_password')"
          />
          <span style="color: red" v-text="error.get('password')"></span>

          <!-- <span class="input-icon"><i class="fa fa-eye info"></i></span> -->
        </div>
        <div>
          <input
            type="text"
            v-model="phone"
            id="pass"
            name="phone"
            class="form-control form-control-lg mb-4"
            :placeholder="$t('message.phone_number')"
          />
          <span toggle="#password-field" class="field-icon toggle-password text-primary">|+201</span>
          <span style="color: red" v-text="error.get('phone')"></span>
          <!-- <span class="input-icon"><i>+966</i></span> -->
        </div>

        <br />
        <div class="row">
          <!-- <input type="checkbox"> -->
          <input type="checkbox" name="thing" value="valuable" id="thing" />
          <label for="thing" class="ml-3"></label>
          <Span class="ml-2 mt-n1 font-d"
            >{{$t('message.agree')}}</Span
          >
        </div>
        <br />
        <button
          type="submit"
          class="btn btn-primary btn-lg btn-block contactus-btn"
        >
          {{$t('message.sign_up')}}
        </button>
      </form>
      <br />
      <p class="text-muted text-center font-d">
        {{$t('message.have_an_account')}} <router-link to="login">{{$t('message.signin')}}</router-link>
      </p>
    </div>
    <div class="col-md-8 hide-st">
      <img
        src="/Web/5.png"
        class="img-fluid w-100 back-color"
        alt="Cinque Terre"
      />
      <img src="/Web/55.png" class="topleft" alt="over-image" />
      <div>
        <h1 class="center">{{$t('message.trust')}}</h1>
        <h1 class="center text-t7t">{{$t('message.care')}}</h1>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      email: "",
      password: "",
      phone: "",
      error: window.obj,
      seePassword: '',
      passwordType: 'password'
    };
  },
  methods: {
    submit() {
      //this.products = JSON.parse(localStorage.getItem('products'));
      let all = {
        email: this.email,
        password: this.password,
        phone: '+201' + this.phone,
      };
      console.log(all);
      axios
        .post("/signup", all)
        .then((result) => {
          console.log(result);
          this.$router.push("/login");
        })
        .catch((err) => {
          this.error.record(err.response.data.errors);
          console.log(err);
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