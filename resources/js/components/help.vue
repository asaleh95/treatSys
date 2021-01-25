<template>
  <div class="row">
    <div class="col-md-4 pl-5 pt-5" style="z-index: 1">
      <h2 class="logi">{{$t('message.help')}}!</h2>
      <br />
      <h4>{{$t('message.forget')}}!</h4>
      <br />
      <p class="text-muted font-d">
        {{$t('message.help_paragraph')}}
      </p>
      <form
        action="#"
        @submit.prevent="submit"
        @keydown="error.clear($event.target.name)"
        @change="error.clear($event.target.name)"
      >
        <input
          class="form-control form-control-lg mb-4"
          type="text"
          name="email"
          v-model="email"
          :placeholder="$t('message.email')"
        />
          <span style="color: red" v-text="error.get('email')"></span>
        <button
          type="submit"
          class="btn btn-primary btn-lg btn-block contactus-btn"
        >
          {{$t('message.next')}}
        </button>
      </form>
      <br />
      <p class="text-muted text-center font-d">
        {{$t('message.I_will_try_again')}} ! <router-link to="login">{{$t('message.signin')}}</router-link>
      </p>
    </div>
    <div class="login-register-bg col-md-8 ">
                <img
        src="/Web/55.png"
        class="topleft-help hide-st"
        style="width: 110%"
        alt="over-image"
      />
      <div>
        <h1 class="center-help">{{$t('message.trust')}}</h1>
        <h1 class="center-help text-t7t">{{$t('message.care')}}</h1>
      </div>
            </div>
    <!-- <div class="hide-st col-md-8">
          <div class="">
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
    </div> -->
    <!-- <div class="col-md-8 hide-st"> -->
      
    <!-- </div> -->
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
          console.log(err.error);
        });
    },
  },
};
</script>