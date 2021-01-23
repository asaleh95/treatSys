<template>
  <div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
      <!-- Page Heading Start -->
      <div class="col-12 col-lg-auto mb-20">
        <div class="page-heading">
          <h3>المستخدمين <span>/ تفاصيل المستخدمين </span></h3>
        </div>
      </div>
      <!-- Page Heading End -->
    </div>
    <!-- Page Headings End -->

    <div class="row mbn-30">
      <!--Order Details Head End-->

      <!--Order Details Customer Information Start-->
      <div class="col-4 mb-100">
        <div class="order-details-customer-info row mbn-20">
          <!--Billing Info Start-->
          <div class="col-lg-12 col-md-12 col-12 mb-20">
            <h4 class="mb-25" style="text-align: right">تفاصيل المستخدم</h4>

            <ul>
              <li>
                <span>رقم الموبايل</span> <span>{{ user.phone }} </span>
              </li>
              <li>
                <span> البريد الابكترونى</span> <span>{{ user.email }} </span>
              </li>
            </ul>
          </div>
          <!--Billing Info End-->
        </div>
      </div>
      <div class="col-8" v-if="user.image">
        <img
          :src="user.image.image"
          style="
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            max-width: 50%;
            height: auto;
          "
        />
      </div>
    </div>
  </div>
</template>
<script>
export default {
  mounted() {
    axios
      .get("/admins/users/" + this.$route.params.id)
      .then((result) => {
        this.user = result.data.data;
        console.log(result.data.data);
      })

      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      user: {},
    };
  },
};
</script>