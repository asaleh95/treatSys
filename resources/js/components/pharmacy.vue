<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <treat-header name="Pharmacy" :header="pharmacy.name"></treat-header>
      <div class="row">
        <div class="col-md-8 col-sm-8">
          <img :src="pharmacy.images[0].image" alt="" class="img0 my-2 w-100" />
          <div class="row maxWidth">
            <img
              :src="pharmacy.images[1].image"
              alt=""
              class="col-md-2 col-sm-2"
            />
            <img
              :src="pharmacy.images[2].image"
              alt=""
              class="col-md-2 col-sm-2"
            />
            <img
              :src="pharmacy.images[3].image"
              alt=""
              class="col-md-2 col-sm-2"
            />
            <img
              :src="pharmacy.images[4].image"
              alt=""
              class="col-md-2 col-sm-2"
            />
            <img
              :src="pharmacy.images[5].image"
              alt=""
              class="col-md-2 col-sm-2"
            />
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <p class="font-d">{{ pharmacy.address }}</p>
          <h4 class="font-weight-bold">
            <span class="">
              {{ pharmacy.name }}
            </span>
            <span class="text-primary col-md-4">{{ pharmacy.discount }}%</span>
            <i class="fas fa-heart" v-if="fav"  @click="favourite('dislike')"></i>
            <i class="far fa-heart" v-else  @click="favourite('like')"></i>
          </h4>
 <div class="row">
          <p class="card-title text-muted">
           <div v-for="star in 5">
                  <i class="fas fa-star text-warning" v-if="pharmacy.rate >= star"></i>
                  <i class="far fa-star text-warning" v-else></i>
                </div>
            ({{ pharmacy.rate }})

          </p>
          </div>          <h6 class="font-weight-bold">
            <img :src="pharmacy.logo" alt="" class="logo0" />
            <span> {{ pharmacy.name }}</span>
          </h6>

          <br /><br />
          <h6 class="font-weight-bold">
            <img src="/Web/gwab.png" alt="" />
            <span> {{ pharmacy.email }}</span>
          </h6>
          <br /><br />
          <h6 class="font-weight-bold">
            <img src="/Web/phone.png" alt="" /><span class="num"
              >+{{ pharmacy.phone.substring(0, 3) }}</span
            >
            {{ pharmacy.phone.substring(3, pharmacy.phone.length) }}
          </h6>
          <br />
          <div>
            <h6 class="font-weight-bold">
              <img src="/Web/pin.png" alt="" /> {{ pharmacy.region }}
            </h6>
            <p class="font-d">{{ pharmacy.address }}</p>
          </div>
        </div>
      </div>
      <br />
      <div class="row">
        <h3 class="font-weight-bold">about</h3>
        <p class="font-d">
          It is a long established fact that a reader will be distracted by the
          readable content of a page when looking at its layout. The point of
          using Lorem Ipsum is that it has a more-or-less normal distribution of
          letters, as opposed to using 'Content here, content here', making it
          look like readable English. Many desktop publishing packages and web
          page editors now use Lorem Ipsum as their default model text, and a
          search for 'lorem ipsum' will uncover many web sites still in their
          infancy. Various versions have evolved over the years, sometimes by
          accident, sometimes on purpose (injected humour and the like).
        </p>
        <br />
      </div>
    </div>
    <treat-footer></treat-footer>
  </div>
</template>
<script>
export default {
  mounted() {
    axios
      .get("/users/pharmacy/" + this.$route.params.id)
      .then((result) => {
        this.pharmacy = result.data.data;
        this.fav = result.data.data.like == true ? true : false;
        console.log(result.data.data);
      })

      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      pharmacy: {},
      fav: false,
    };
  },
  methods: {
    favourite(route){
      axios
      .post("/users/"+ route+"-pharmacy", {'pharmacy_id': this.$route.params.id})
      .then((result) => {
        this.fav = !this.fav;
        console.log(result.data.data);
      })
      .catch((error) => {
        console.log(error);
      });
    }
  }
};
</script>