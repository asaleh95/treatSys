
<template>
  <div class="row">
    <div class="col-md-4 pl-5 pt-5" style="z-index: 1">
      <h2 class="logi">LOGIN</h2>
      <br />
      <h4>Hi there!</h4>
      <br />
      <p class="text-paragraph-login">
        There are many variations of passages of Lorem Ipsum available, some
        form .
      </p>
      <form
        action="#"
        @load.prevent="errors.clearAll()"
        @submit.prevent="submit"
        @keydown="error.clear($event.target.name)"
        @change="error.clear($event.target.name)"
      >
        <input
          class="form-control form-control-lg mb-4"
          type="text"
          name="email"
          v-model="email"
          placeholder="email addres"
        />

        <span style="color: red" v-text="error.get('email')"></span>
        <br />
        <div>
          <input
            class="form-control form-control-lg mb-4"
            :type="passwordType"
            name="password"
            v-model="password"
            placeholder="password"
          />
          <span toggle="#password-field" :class="'fa fa-fw fa-eye field-icon toggle-password ' + seePassword" @click="see()"></span>
          <span style="color: red" v-text="error.get('password')"></span>

          <!-- <span class="input-icon"><i class="fa fa-eye info"></i></span> -->
        </div>
        <div class="row">
          <!-- <input type="checkbox"> -->
          <input type="checkbox" name="thing" value="valuable" id="thing" />
          <label for="thing" class="ml-3"></label>
          <Span class="ml-2 mt-n1 checkboox-label text-muted text-center"
            >Remember Me</Span
          >
          <router-link
            to="help"
            class="mt-n1 offset-md-4 forget-password-text text-center"
            >Forget Password</router-link
          >
        </div>
        <br />
        <span style="color: red" v-text="error.get('error')"></span>

        <button
          type="submit"
          class="btn btn-primary btn-lg btn-block contactus-btn"
        >
          login
        </button>

        <br />
      </form>
      <p class="text-donthaveaccount offset-md-3 mt-5 text-muted text-center">
        Don't have an account ? <router-link to="signup">Sign up</router-link>
      </p>
      <div class="row">
        <div class="col-md-3 mt-5">
          <hr />
        </div>

        <div class="col-md-6 mt-5">
          <p class="text-muted text-center">Or continue with</p>
        </div>
        <div class="col-md-3 mt-5">
          <br />
          <hr />
        </div>
        <div class="row">
          <div class="col-md-4 mt-5">
            <a> <img src="Web/Google Button.png" alt="" /></a>
          </div>
          <div class="col-md-4 mt-5">
            <a> <img src="Web/Facebook Button.png" alt="" /></a>
          </div>
          <div class="col-md-4 mt-5">
            <a> <img src="Web/Apple Button.png" alt="" /></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 hidd">
      <img
        src="/Web/511.png"
        class="img-fluid w-100 back-color"
        alt="Cinque Terre"
      />
      <img src="/Web/55.png" class="topleft" alt="over-image" />
      <div>
        <h1 class="center">We Trust</h1>
        <h1 class="center text-t7t">We Care</h1>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.errors.clearAll();
  },
  data() {
    return {
      email: "",
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
        email: this.email,
        password: this.password,
      };
      console.log(all);
      axios
        .post("/login", all)
        .then((result) => {
          console.log(result.data);
          window.axios.defaults.headers.common["Authorization"] =
            "Bearer " + result.data.token.access_token;
          localStorage.setItem(
            "token",
            JSON.stringify(result.data.token.access_token)
          );
          localStorage.setItem("user", JSON.stringify(result.data.user));

          this.$router.push("/");
        })
        .catch(
          (err) => this.error.record(err.response.data.errors)
          // this.error = "خطأ فى الباسورد او الايميل"
        );
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