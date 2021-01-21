
<template>
  <div class="row">
    <div class="col-md-4 pl-5 pt-5">
      <h1 class="logi">HELP!</h1>
      <br />
      <h4>Forgot Password!</h4>
      <br />
      <p class="text-muted font-d">
        There are many variations of passages of Lorem Ipsum available, some
        form .
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
            type="password"
            v-model="password"
            id="pass"
            name="password"
            class="form-control-lg input font-d"
            placeholder="Password"
          />
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
          <!-- <span class="input-icon"><i class="fa fa-eye info"></i></span> -->
        </div>
       <button
          type="submit"
          class="btn btn-primary btn-lg btn-block contactus-btn"
        >
          change password
        </button>
      </form>
      <br />
      <br />
      <p class="text-muted text-center font-d">
        i remember my password !<a href="#">Sing in</a>
      </p>
    </div>
    <div class="col-md-8 hide-st">
      <img
        src="/Web/5.png"
        class="img-fluid w-100 back-color"
        alt="Cinque Terre"
      />
      <img
        src="/Web/55.png"
        class="topleft"
        style="width: 110%"
        alt="over-image"
      />
      <div>
        <h1 class="center">We Trust</h1>
        <h1 class="center text-t7t">We Care</h1>
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
  },
};
</script>