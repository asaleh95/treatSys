<template>
  <div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
      <!-- Page Heading Start -->
      <div class="col-12 col-lg-auto mb-20">
        <div class="page-heading">
          <h3>المعامل <span>/ تفاصيل المعمل </span></h3>
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
            <h4 class="mb-25" style="text-align: right">تفاصيل المعمل</h4>

            <ul>
              <li>
                <span>اسم المعمل</span> <span> {{ lab.name }} </span>
              </li>
              <li>
                <span>العنوان</span> <span>{{ lab.address }}</span>
              </li>
              <li>
                <span>رقم الموبايل</span> <span>{{ lab.phone }} </span>
              </li>
              <li>
                <span>التخصص</span> <span>{{ lab.position }}</span>
              </li>
              <li>
                <span>الملاحظات</span> <span>{{ lab.about }}</span>
              </li>
              <li>
                <span>التقييم</span> <span class="btn badge-success">{{lab.rate}}</span>
              </li>
              <li>
                <span>السعر الاولى</span> <span class="btn badge-warning">{{lab.basic_price}}</span>
              </li>
              <li>
                <span>سعر التعامل</span> <span class="btn badge-warning">{{lab.treat_price}}</span>
              </li>
            </ul>
          </div>
          <!--Billing Info End-->
        </div>
      </div>
      <div class="col-8">
        <img
          :src="lab.images[0].image"
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
      .get("/admins/labs/" + this.$route.params.id)
      .then((result) => {
        this.lab = result.data.data;
        console.log(result.data.data);
      })

      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      lab: {},
    };
  },
};
</script>