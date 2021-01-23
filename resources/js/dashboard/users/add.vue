<template>
  <!-- Content Body Start -->
  <div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
      <!-- Page Heading Start -->
      
      <div class="col-12 col-lg-auto mb-20">
        <div class="page-heading">
          <h3>
           انشاء مستخدم جديد
          </h3>
        </div>
      </div>
      <!-- Page Heading End -->

      <!-- Page Button Group Start -->
      <!-- Page Button Group End -->
    </div>
     <div
        class="alert alert-solid-success alrt animated slideInUp"
        v-if="success"
        role="alert"
      >
        تم اضافه هذا العنصر بنجاح
      </div>

    <!-- Page Headings End -->

    <!-- Add or Edit Product Start -->
    <div class="add-edit-product-wrap col-12">
      <div class="add-edit-product-form">
        <h4 class="title" style="text-align: right;">معلومات عن المستخدم</h4>
        <form
          action="#"
          @submit.prevent="submit"
          @keydown="errors.clear($event.target.name)"
          @change="errors.clear($event.target.name)"
        >
          <div class="row">
            <div class="col-lg-6 col-12 mb-30">
              <input class="form-control" type="text" v-model="email" placeholder="بريد المستخدم" />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('email')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <input class="form-control" type="text" v-model="password" placeholder="كلمه السر" />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('password')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <input class="form-control" type="text" v-model="phone" placeholder="رقم الهاتف" />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('phone')"></span>
              </div>
            </div>
          </div>

          <!-- Button Group Start -->
          <div class="row">
            <div class="d-flex flex-wrap justify-content-end col mbn-10">
              <button class="button button-outline button-primary mb-10 ml-10 mr-0">حفظ</button>

              <button class="button button-outline button-danger mb-10 ml-10 mr-0">حذف</button>
            </div>
          </div>
          <!-- Button Group End -->
        </form>
      </div>
    </div>
    <!-- Add or Edit Product End -->
  </div>
  <!-- Content Body End -->
</template>
 <script>
export default {
  data() {
    return {
      email: "",
      phone: "",
      password: "",
      errors: window.obj,
      success: false,
    };
  },
  methods: {
    submit() {
      let all = {
        email: this.email,
        phone: this.phone,
        password: this.password,
      };
      console.log(all);
      axios
        .post("/admins/users", all)
        .then((result) => {
          console.log(result.data);
          //
          this.success = true
          setTimeout(() => this.$router.push("/users/all"), 2000);
        })
        .catch(
          (err) => this.errors.record(err.response.data.errors)
          //   console.log(err.response.data.errors)
        );
    },
  },
};
</script>