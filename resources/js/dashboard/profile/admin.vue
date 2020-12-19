<template>
      <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>الملف الشخصي </h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row mbn-50">

                <!--Author Top Start-->
                <div class="col-12 mb-50">
                    <div class="author-top">
                        <div class="inner">
                            <div class="author-profile">
                                    <!-- <img src="/assets/images/avatar/profile.jpg" class="d-none" alt=""> -->
                                    <img :src="auth.image" class="rounded" style="max-width: 20%;" alt="">
                                <div class="info">
                                    <h5>{{auth.manager}}</h5>
                                    <a href="#" class="edit"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Author Top End-->

         

                <!--Right Sidebar Start-->
                <div class="col-xlg-12 col-12 mb-50">
                    <div class="row mbn-30">

                        <!--Author Information Start-->
                        <div class="col-xlg-12 col-lg-12 col-12 mb-30">
                            <div class="box">
                                <div class="box-head">
                                    <h3 class="title" style="text-align: right">معلومات </h3>
                                </div>
                                <div class="box-body">
                                    <div class="form">
                                        <form action="#">
                                            <div class="row row-10 mbn-20">
                                                <div class="col-sm-6 col-12 mb-20"><input type="text" disabled class="form-control" v-model="auth.manager"></div>
                                                <div class="col-sm-6 col-12 mb-20"><input type="text" disabled class="form-control" v-model="auth.mobile" data-mask="(999) 999-9999"></div>
                                                <div class="col-12 mb-20"><input type="email" disabled class="form-control" v-model="auth.email"></div>
                                                <!-- <div class="col-12 mt-10 mb-20">
                                                    <input type="submit" class="button button-primary button-outline" value="حفظ التغيرات ">
                                                    <input type="submit" class="button button-danger button-outline" value="حذف التغيرات ">
                                                </div> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--Author Information End-->

             

                       

                    </div>
                </div>
                <!--Right Sidebar End-->

            </div>

        </div>
</template>

<script>
export default {
  mounted() {
    axios
      .get("profile")
      .then((result) => {
        this.auth = result.data.data;
        console.log(result.data.data);
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      auth: {},
    };
  },
    methods: {
    sendImage(e) {
        alert()
      const image = e.target.files[0];
      const reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = (e) => {
        this.previewImage = e.target.result;
        console.log(this.previewImage);
        this.image = this.previewImage;
        console.log(this.image);
        console.log("ssssssssssssssssssss");
      };
    },
    submit() {
      let all = {
        name: this.name,
        start_date: this.start_date,
        end_date: this.end_date,
        discount: this.discount,
        purchase: this.purchase,
        image: this.image,
      };
      console.log(all);
      axios
        .post("/offers", all)
        .then((result) => {
          console.log(result.data);
          //
          this.success = true
          setTimeout(() => this.$router.push("/offers/all"), 2000);
        })
        .catch(
          (err) => this.errors.record(err.response.data.errors)
          //   console.log(err.response.data.errors)
        );
    },
  },
};
</script>