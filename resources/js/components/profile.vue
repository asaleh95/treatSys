<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <treat-header name="profile" header="profile"></treat-header>
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <h5 class="font-weight-bold">profile</h5>
          <div class="row">
            <div class="col-md-4">
              <div class="profile-img">
                <img
                  :src="image"
                  alt=""
                />
                <div class="file btn btn-lg btn-primary">
                  Change Photo
                  
                  <input type="file" @change="sendImage"  name="file" />
                </div>
              </div>
            </div>
          </div>
          <form
            action="#"
            @load.prevent="errors.clearAll()"
            @submit.prevent="submit"
            @keydown="errors.clear($event.target.name)"
            @change="errors.clear($event.target.name)"
          >
            <input
              class="form-control form-control-lg mb-4"
              type="text"
              name="email"
              v-model="user.email"
              placeholder="email"
            />
            <span style="color: red" v-text="errors.get('email')"></span>

            <input
              class="form-control form-control-lg mb-4"
              type="text"
              name="phone"
              v-model="user.phone"
              placeholder="phone"
            />
            <span style="color: red" v-text="errors.get('phone')"></span>

            <input
              class="form-control form-control-lg mb-4"
              type="text"
              name="password"
              v-model="password"
              placeholder="password"
            />
            <span style="color: red" v-text="errors.get('password')"></span>

            <button
              type="submit"
              class="btn btn-primary btn-lg btn-block contactus-btn"
            >
              Save
            </button>
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
    axios
      .get("/user/" + JSON.parse(localStorage.getItem("user")).id)
      .then((result) => {
        this.user = result.data.data;
        this.image = this.user.image ? this.user.image.image : "/Web/b53.png";
        console.log(result.data.data);
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      user: {},
      image: '',
      password: "",
      errors: window.obj,
      success: false,
    };
  },
  methods: {
      sendImage(e) {
      const image = e.target.files[0];
      const reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = (e) => {
        this.user.image = this.image = e.target.result;
        console.log("ssssssssssssssssssss");
      };
    },
    submit() {
      this.user.password = this.password;
      axios
        .put("/user/" + JSON.parse(localStorage.getItem("user")).id, this.user)
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