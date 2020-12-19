
<template>
  <div dir="rtl">
    <div class="main-wrapper">
      <!-- Content Body Start -->
      <div class="content-body m-0 p-0">
        <div class="login-register-wrap">
          <div class="row">
            <div
              class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12"
            >
              <div class="login-register-form-wrap">
                <div class="content">
                  <h1>تسجيل الدخول</h1>
                  <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                </div>

                <div class="login-register-form">
                  <form
                    action="#"
                    @submit.prevent="submit"
                    @keydown="errors.clear($event.target.name)"
                    @change="errors.clear($event.target.name)"
                  >
                    <div class="row">
                      <div class="col-12 mb-20">
                        <input
                          class="form-control"
                          v-model="email"
                          type="text"
                          placeholder="البريد الاليكتروني"
                        />
                        <span
                          style="color: red"
                          v-text="errors.get('email')"
                        ></span>
                        <div class="alert alert-solid-danger" v-if="errors.get('email')" role="alert" v-text="errors.get('email')">
                          
                        </div>
                      </div>
                      <div class="col-12 mb-20">
                        <input
                          class="form-control"
                          v-model="password"
                          type="password"
                          placeholder="كلمه المرور"
                        />
                        <span
                          style="color: red"
                          v-text="errors.get('password')"
                        ></span>
                      </div>
                      <div class="col-12 mb-20">
                        <label for="remember" class="adomx-checkbox-2">
                          <input id="remember" type="checkbox" />
                          <i class="icon"></i>تذكرني.
                        </label>
                      </div>
                      <div class="col-12">
                        <div class="row justify-content-between">
                          <div class="col-auto mb-15">
                            <a href="#">نسيت كلمه المرور ؟</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mt-10">
                        <button
                          style="width: 100%"
                          type="submit"
                          class="button button-primary button-outline"
                        >
                          الدخول
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="login-register-bg order-1 order-lg-2 col-lg-7 col-12">
              <div class="content">
                <h1>تسجيل الدخول</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Content Body End -->
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
      errors: window.obj,
    };
  },
  methods: {
    submit() {
      let all = {
        email: this.email,
        password: this.password,
      };
      console.log(all);
      // console.log("sky");

      axios
        .post("/admin/login", all)
        .then((result) => {
          console.log(result.data);
          //
          window.axios.defaults.headers.common["Authorization"] =
            "Bearer " + result.data.token.access_token;
          console.log("login");
          //
          localStorage.setItem(
            "token",
            JSON.stringify(result.data.token.access_token)
          );
          localStorage.setItem("admin", JSON.stringify(result.data.user));
          this.$router.push("/doctors/all");
        })
        .catch(
          (err) => this.errors.record(err.response.data.errors),
          setTimeout(function(scope) {
            scope.errors = null;
        }, 5000, this)
          //   console.log(err.response.data.errors)
        );
    },
  },
};
</script>
