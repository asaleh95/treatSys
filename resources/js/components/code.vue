
<template>
  <div class="row">
    <div class="col-md-4 pl-5 pt-5">
      <h1 class="logi">{{ $t("message.help") }}!</h1>
      <br />
      <h4>{{ $t("message.forget") }}!</h4>
      <br />
      <p class="text-muted font-d">
        {{ $t("message.help_paragraph") }}
      </p>
      <br />
      <br />
      <form
        action="#"
        @submit.prevent="submit"
        @keydown="error.clear($event.target.name)"
        @change="error.clear($event.target.name)"
      >
        <div class="row">
          <input
            type="text"
            v-model="code1"
            id="code"
            name="code"
            class="form-control text-center input-number ml-2 font-d"
            placeholder="0"
          />
          <input
            type="text"
            v-model="code2"
            class="form-control text-center input-number ml-2 font-d"
            placeholder="0"
            name="code"
            id="code"
          />
          <input
            type="text"
            v-model="code3"
            class="form-control text-center input-number ml-2 font-d"
            placeholder="0"
            name="code"
            id="code"
          />
          <input
            type="text"
            v-model="code4"
            class="form-control text-center input-number ml-2 font-d"
            placeholder="0"
            name="code"
            id="code"
          />
          <input
            type="text"
            v-model="code5"
            class="form-control text-center input-number ml-2 font-d"
            placeholder="0"
            name="code"
            id="code"
          />
        </div>
        <span style="color: red" v-text="error.get('code')"></span>
        <br />
        <br />
        <button
          type="submit"
          class="btn btn-primary btn-lg btn-block contactus-btn"
        >
          {{ $t("message.done") }}
        </button>
      </form>
      <br />
      <br />
      <p class="text-muted text-center">
        {{ $t("message.i_dont_recieve_emails") }} !
        <a href="#" @click="resend()"> {{ $t("message.resend") }}</a>
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
        <h1 class="center-help">{{ $t("message.trust") }}</h1>
        <h1 class="center-help text-t7t">{{ $t("message.care") }}</h1>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      code1: "",
      code2: "",
      code3: "",
      code4: "",
      code5: "",

      error: window.obj,
    };
  },
  methods: {
    submit() {
      //this.products = JSON.parse(localStorage.getItem('products'));
      let all = {
        code: this.code1 + this.code2 + this.code3 + this.code4 + this.code5,
      };
      console.log(all);
      axios
        .post("/code", all)
        .then((result) => {
          console.log(result.data);
          this.$router.push("/new-password");
        })
        .catch((err) => {
          // this.error = "خطأ فى الباسورد او الايميل"
          console.log(err.error);
        });
    },
    resend() {
      let all = {
        email: sessionStorage.getItem("code-email"),
      };
      console.log(all);
      axios
        .post("/forget-password", all)
        .then((result) => {
          console.log(result.data);
          this.$router.push("/code");
        })
        .catch((err) => {
          console.log(err.error);
        });
    },
  },
};
</script>