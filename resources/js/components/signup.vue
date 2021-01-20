
<template>
  <div class="row">
    <div class="col-md-4 pl-5 pt-5" style="z-index: 1;">
      <h1 class="logi">SIGN up</h1>
      <br />
      <h4>Register new account</h4>
      <br />
      <p class="font-d">
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
          type="text"
          v-model="email"
          id="email"
          name="email"
          class="form-control-lg input font-d"
          placeholder="Email Address"
        />
        <span style="color: red" v-text="error.get('email')"></span>
        <div>
          <input
            type="password"
            v-model="password"
            id="pass"
            name="password"
            class="form-control-lg input font-d"
            placeholder="Password"
          />
          <span style="color: red" v-text="error.get('password')"></span>
          <!-- <span class="input-icon"><i class="fa fa-eye info"></i></span> -->
        </div>
        <div>
          <input
            type="password"
            v-model="password"
            id="pass"
            name="password"
            class="form-control-lg input font-d"
            placeholder="Re-Password"
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
            class="form-control-lg input font-d"
            placeholder="Phone"
          />
          <span style="color: red" v-text="error.get('phone')"></span>
          <!-- <span class="input-icon"><i>+966</i></span> -->
        </div>

        <br />
        <div class="row">
          <!-- <input type="checkbox"> -->
          <input type="checkbox" name="thing" value="valuable" id="thing" />
          <label for="thing" class="ml-3"></label>
          <Span class="ml-2 mt-n1 font-d"
            >i agree to the terms & conditions and privacy policy</Span
          >
        </div>
        <br />
        <button
          type="submit"
          class="submit text-white text-white font-weight-bold"
        >
          Sign up
        </button>
      </form>
      <br />
      <p class="text-muted text-center font-d">
        have an account <router-link to="login"> sign in</router-link>
      </p>
    </div>
    <div class="col-md-8">
      <img
        src="/Web/5.png"
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
    console.log("Component mounted.");
  },
  data() {
    return {
      email: "",
      password: "",
      phone: "",
      error: window.obj,
    };
  },
  methods: {
    submit() {
      //this.products = JSON.parse(localStorage.getItem('products'));
      let all = {
        email: this.email,
        password: this.password,
        phone: this.phone,
      };
      console.log(all);
      axios
        .post("/signup", all)
        .then((result) => {
          console.log(result);
          localStorage.setItem("token", JSON.stringify([]));
          this.$router.push("/login");
        })
        .catch((err) => {
          this.error.record(err.response.data.errors);
          console.log(err);
        });
    },
  },
};
</script>