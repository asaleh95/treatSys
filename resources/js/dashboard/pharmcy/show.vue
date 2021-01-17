<template>
  <div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
      <!-- Page Heading Start -->
      <div class="col-12 col-lg-auto mb-20">
        <div class="page-heading">
          <h3>الصيدليات <span>/ تفاصيل الصيدليه</span></h3>
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
            <h4 class="mb-25" style="text-align: right">تفاصيل الصيدليه</h4>

            <ul>
              <li>
                <span>اسم الصيدليه</span> <span> {{ pharmacy.name }} </span>
              </li>
              <li>
                <span>البريد الالكترونى</span>
                <span> {{ pharmacy.email }} </span>
              </li>
              <li>
                <span>رقم الموبايل</span> <span>{{ pharmacy.phone }} </span>
              </li>
              <li>
                <span>العنوان</span> <span>{{ pharmacy.address }}</span>
              </li>
              <li>
                <span>المنطقه</span> <span>{{ pharmacy.region }}</span>
              </li>
              <li>
                <span>المسافه</span> <span>{{ pharmacy.distance }}</span>
              </li>
              <li>
                <span>المسافه</span> <span>{{ pharmacy.distance }}</span>
              </li>
              <li>
                <span>الملاحظات</span> <span>{{ pharmacy.about }}</span>
              </li>
              <li>
                <span>التقييم</span>
                <span class="btn badge-success">{{ pharmacy.rate }}</span>
              </li>
              <li>
                <span>عدد المصوتين</span
                ><span class="btn badge-warning">{{
                  pharmacy.number_of_raters
                }}</span>
              </li>
              <li>
                <span>عدد المشاهدين</span>
                <span class="btn badge-warning">{{
                  pharmacy.number_of_views
                }}</span>
              </li>
            </ul>
          </div>
          <!--Billing Info End-->
        </div>
      </div>
      <div class="col-8">
        <div class="row">
          <img
          class="rounded-circle"
            :src="pharmacy.logo"
            style="
              display: block;
              margin-left: auto;
              margin-right: auto;
              width: 20%;
              max-width: 50%;
              height: auto;
            "
          />
        </div>
        <div class="row">
          <div class="col-md-6 mt-2" v-for="image in pharmacy.images">
            <img :src="image.image" class="w-100 img-thumbnail" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  mounted() {
    axios
      .get("/admins/pharmacies/" + this.$route.params.id)
      .then((result) => {
        this.pharmacy = result.data.data;
        console.log(result.data.data);
      })

      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      pharmacy: {},
    };
  },
};
</script>