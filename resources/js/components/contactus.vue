<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <treat-header name="contact us" header="Help"></treat-header>
      <div class="row">
        <div class="col-8">
          <img src="Web/main.png" alt="" class="img9" />
        </div>
        <div class="col-md-4 col-sm-4">
          <h5 class="font-weight-bold">contact us</h5>
          <p class="font-d">
            We’re here to help and answer any question you might have. We look
            forward to hearing from you
          </p>
          <form
            action="#"
            @load.prevent="errors.clearAll()"
            @submit.prevent="submit"
            @keydown="errors.clear($event.target.name)"
            @change="errors.clear($event.target.name)"
          >
            <input type="text" v-model="first_name" name="first_name" class="input log" placeholder="first name" />
                <span style="color: red" v-text="errors.get('first_name')"></span>

            <input type="text"  v-model="last_name" name="last_name" class="input log" placeholder="last name" />
                <span style="color: red" v-text="errors.get('last_name')"></span>

            <input type="text" v-model="email" name="email" class="input log" placeholder="email addres" />
                <span style="color: red" v-text="errors.get('email')"></span>

            <textarea  v-model="message" name="message" class="input log" placeholder="massege"></textarea>
                <span style="color: red" v-text="errors.get('message')"></span>

            <input type="submit" value="SEND" class="submit text-white" />
          </form>
        </div>
      </div>
      <br />
    </div>
    <treat-footer></treat-footer>
  </div>
</template>
<script>
export default {
  mounted() {
    this.errors.clearAll();
  },
  data() {
    return {
      first_name: "",
      last_name: "",
      email: "",
      message: "",
      errors: window.obj,
      success: false,
    };
  },
  methods: {
    submit() {
      let all = {
        first_name: this.first_name,
        last_name: this.last_name,
        email: this.email,
        message: this.message,
      };
      console.log(all);
      axios
        .post("/contact-us", all)
        .then((result) => {
          console.log(result.data);
          //
          this.success = true;
          setTimeout(() => this.$router.push("/"), 2000);
        })
        .catch(
          (err) => this.errors.record(err.response.data.errors)
          //   console.log(err.response.data.errors)
        );
    },
  },
};
</script>