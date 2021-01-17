<style scoped>
label{
      text-align: right;

}
</style>
<template>
  <!-- Content Body Start -->
  <div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
      <!-- Page Heading Start -->
      <div
        class="alert alert-solid-warning alrt animated fadeInLeft"
        v-if="success"
        role="alert"
      >
        تم تعديل هذا العنصر بنجاح
      </div>
      <div class="col-12 col-lg-auto mb-20">
        <div class="page-heading">
          <h3>
         تعديل معمل
          </h3>
        </div>
      </div>
      <!-- Page Heading End -->

      <!-- Page Button Group Start -->
      <!-- Page Button Group End -->
    </div>
    <!-- Page Headings End -->

    <!-- Add or Edit Product Start -->
    <div class="add-edit-product-wrap col-12">
      <div class="add-edit-product-form">
        <h4 class="title" style="text-align: right;">معلومات عن المعمل</h4>
        <form
          action="#"
          @submit.prevent="submit"
          @keydown="errors.clear($event.target.name)"
          @change="errors.clear($event.target.name)"
        >
          <div class="row">
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">الاسم</label>
              <input class="form-control" type="text" v-model="lab.name" placeholder="آسم المعمل " />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('name')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">رقم الهاتف</label>
              <input class="form-control" type="number" v-model="lab.phone" placeholder="رقم الهاتف" />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('phone')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">العنوان</label>
              <input class="form-control" type="text" v-model="lab.address" placeholder="العنوان" />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('address')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">الاحداثيات</label>
              <input class="form-control" type="text" v-model="lab.location" placeholder="الاحداثيات" />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('location')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">الوظيفه</label>
              <input class="form-control" type="text" v-model="lab.position" placeholder="الوظيفه" />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('position')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">التقييم</label>
              <input class="form-control" type="number" v-model="lab.rate" placeholder="التقييم" />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('rate')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">السعر الاولى</label>
              <input class="form-control" type="number" v-model="lab.basic_price" placeholder="السعر الاولى" />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('basic_price')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">سعر التعامل</label>
              <input class="form-control" type="number" v-model="lab.treat_price" placeholder="سعر التعامل" />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('treat_price')"></span>
              </div>
            </div>
            <div class="col-12 mb-30">
              <label for="name">الملاحظات</label>
              <textarea class="form-control" v-model="lab.about" placeholder=" الملاحظات"></textarea>
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('about')"></span>
              </div>
            </div>
          </div>
          <div class="head" style="text-align: right">
            <h4 class="title">صور المعمل</h4>
          </div>

          <div class="product-upload-gallery row flex-wrap">
            <div class="col-12 mb-30">
              <img :src="previewImage" class="uploading-image" />
              <label class="custom-file-upload">
                <input
                  type="file"
                  accept="image/jpeg"
                  class="uploading-image"
                  @change="sendImage"
                />
                ارفق صوره
              </label>
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('image')"></span>
              </div>
            </div>
          </div>

          <!-- Button Group Start -->
          <div class="row">
            <div class="d-flex flex-wrap justify-content-end col mbn-10">
              <button class="button button-outline button-primary mb-10 ml-10 mr-0">تعديل</button>

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
  mounted() {
    axios
      .get("/admins/labs/" + this.$route.params.id)
      .then((result) => {
        this.lab = result.data.data;
        this.previewImage = result.data.data.image.image;
        this.lab.location = result.data.data.location.coordinates[0] + ',' + result.data.data.location.coordinates[1];
        console.log(result.data.data);
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      previewImage: [],
      lab: {},
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
        this.previewImage = e.target.result;
        this.lab.image = this.previewImage;
        console.log(this.image);
        console.log("ssssssssssssssssssss");
      };
    },
    submit() {
      axios
        .put("/admins/labs/" + this.lab.id, this.lab)
        .then((result) => {
          console.log(result.data);
          //
          this.success = true
          setTimeout(() => this.$router.push("/labs/all"), 2000);
        })
        .catch(
          (err) => this.errors.record(err.response.data.errors)
          //   console.log(err.response.data.errors)
        );
    },
  },
};
</script>