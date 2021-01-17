<template>
  <div class="row">
    <div class="col-md-4 pl-5 pt-5">
      <h2 class="logi">HELP!</h2>
      <br />
      <h4>Forgot Password!</h4>
      <br />
      <p class="text-muted font-b">
        There are many variations of passages of Lorem Ipsum available, some
        form .
      </p>
      <form
        action="#"
        @submit.prevent="submit"
        @keydown="error.clear($event.target.name)"
        @change="error.clear($event.target.name)"
      >
        <input
          type="text"
          v-model="email"
          id="email"
          name="email"
          class="form-control-lg input font-b"
          placeholder="Email Address"
        />
        <button type="submit" class="submit text-white font-weight-bold">
          NEXT
        </button>
      </form>
      <br />
      <p class="text-muted text-center font-b">
        i will try again ! <a href="#">Sign in</a>
      </p>
    </div>
    <div class="col-md-8">
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
      email: "",
      error: window.obj,
    };
  },
  methods: {
    submit() {
      //this.products = JSON.parse(localStorage.getItem('products'));
      let all = {
        email: this.email,
      };
      console.log(all);
      axios
        .post("/forget-password", all)
        .then((result) => {
          console.log(result.data);
          sessionStorage.setItem("code-email", this.email);

          this.$router.push("/code");
        })
        .catch((err) => {
          // this.error = "خطأ فى الباسورد او الايميل"
          console.log(err.error);
        });
    },
  },
};
</script>