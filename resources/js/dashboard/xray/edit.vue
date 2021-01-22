<style scoped>
label {
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
          <h3>تعديل الاشاعه</h3>
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
        <h4 class="title" style="text-align: right">معلومات عن الاشاعه</h4>
        <form
          action="#"
          @submit.prevent="submit"
          @keydown="errors.clear($event.target.name)"
          @change="errors.clear($event.target.name)"
        >
          <div class="row">
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">الاسم</label>
              <input
                class="form-control"
                type="text"
                v-model="xray.name"
                placeholder="آسم الاشاعه "
              />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('name')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">البريد الابكترونى</label>
              <input
                class="form-control"
                type="text"
                v-model="xray.email"
                placeholder="آسم الاشاعه "
              />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('email')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">رقم الهاتف</label>
              <input
                class="form-control"
                type="text"
                v-model="xray.phone"
                placeholder="رقم الهاتف"
              />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('phone')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">العنوان</label>
              <input
                class="form-control"
                type="text"
                v-model="xray.address"
                placeholder="العنوان"
              />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('address')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">المنطقه</label>
              <input
                class="form-control"
                type="text"
                v-model="xray.region"
                placeholder="العنوان"
              />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('region')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">الاحداثيات</label>
              <input
                class="form-control"
                type="text"
                v-model="xray.location"
                placeholder="الاحداثيات"
              />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('location')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">المسافه</label>
              <input
                class="form-control"
                type="text"
                v-model="xray.distance"
                placeholder="الوظيفه"
              />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('distance')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">التخفيض</label>
              <input
                class="form-control"
                type="text"
                v-model="xray.discount"
                placeholder="الوظيفه"
              />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('discount')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">التقييم</label>
              <input
                class="form-control"
                type="number"
                v-model="xray.rate"
                placeholder="التقييم"
              />
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('rate')"></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">عدد المصوتين</label>
              <input
                class="form-control"
                type="number"
                v-model="xray.number_of_raters"
                placeholder="عدد المصوتين"
              />
              <div class="animated bounce infinite rtl">
                <span
                  style="color: red"
                  v-text="errors.get('number_of_raters')"
                ></span>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-30">
              <label for="name">عدد المشاهدين</label>
              <input
                class="form-control"
                type="number"
                v-model="xray.number_of_views"
                placeholder="عدد المشاهدين"
              />
              <div class="animated bounce infinite rtl">
                <span
                  style="color: red"
                  v-text="errors.get('number_of_views')"
                ></span>
              </div>
            </div>
            <div class="col-12 mb-30">
              <label for="name">الملاحظات</label>
              <textarea
                class="form-control"
                v-model="xray.about"
                placeholder=" الملاحظات"
              ></textarea>
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('about')"></span>
              </div>
            </div>
          </div>
          <div class="head" style="text-align: right">
            <h4 class="title">صور الاشاعه</h4>
          </div>

          <div class="product-upload-gallery row flex-wrap">
            <div class="col-12 mb-30">
              <img :src="previewLogo" class="w-25 img-thumbnail" />
              <label class="custom-file-upload">
                <input
                  type="file"
                  accept="image/jpeg"
                  class="uploading-image"
                  @change="sendLogo"
                />
                ارفق شعار
              </label>
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('logo')"></span>
              </div>
            </div>
          </div>
          <div class="product-upload-gallery row flex-wrap">
            <div class="col-12 mb-30">
              <div class="row">
                <div class="col-md-2" v-for="previewImage in previewImages">
                  <img :src="previewImage" class="w-100 img-thumbnail" />
                </div>
              </div>

              <label class="custom-file-upload">
                <input
                  type="file"
                  accept="image/jpeg"
                  class="uploading-image"
                  @change="sendImage"
                  multiple
                />
                ارفق صوره
              </label>
              <div class="animated bounce infinite rtl">
                <span style="color: red" v-text="errors.get('images')"></span>
              </div>
            </div>
          </div>
          <!-- Button Group Start -->
          <div class="row">
            <div class="d-flex flex-wrap justify-content-end col mbn-10">
              <button
                class="button button-outline button-primary mb-10 ml-10 mr-0"
              >
                تعديل
              </button>

              <button
                class="button button-outline button-danger mb-10 ml-10 mr-0"
              >
                حذف
              </button>
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
      .get("/admins/rays/" + this.$route.params.id)
      .then((result) => {
        this.xray = result.data.data;
        this.previewLogo = result.data.data.logo;
        this.previewImages = result.data.data.images.map(({ image }) => ({ image })).map(({ image }) => image);
        console.log(this.previewImages);
        console.log(result.data.data.images);
        this.xray.location =
          result.data.data.location.coordinates[0] +
          "," +
          result.data.data.location.coordinates[1];
          this.xray.images = [];
          this.xray.logo = "";
        console.log(result.data.data);
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      previewLogo: "",
      previewImages: [],
      xray: {},
      errors: window.obj,
      success: false,
    };
  },
  methods: {
    sendImage(e) {
      this.xray.images = [];
      this.previewImages = [];
      let images = e.target.files;
      for (let index = 0; index < images.length; index++) {
        const reader = new FileReader();
        reader.readAsDataURL(images[index]);
        reader.onload = (e) => {
          this.previewImages.push(e.target.result);
          this.xray.images.push(e.target.result);
        };
      }
    },
    sendLogo(e) {
      const image = e.target.files[0];
      const reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = (e) => {
        this.previewLogo = e.target.result;
        this.xray.logo = this.previewLogo;
        console.log(this.logo);
        console.log("ssssssssssssssssssss");
      };
    },
    submit() {
      axios
        .put("/admins/rays/" + this.xray.id, this.xray)
        .then((result) => {
          console.log(result.data);
          //
          this.success = true;
          setTimeout(() => this.$router.push("/xray/all"), 2000);
        })
        .catch(
          (err) => this.errors.record(err.response.data.errors)
          //   console.log(err.response.data.errors)
        );
    },
  },
};
</script>