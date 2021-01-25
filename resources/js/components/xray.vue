<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <treat-header name="xray" :header="xray.name"></treat-header>
      <div class="row">
        <div class="col-md-8 col-sm-8">
          <img :src="xray.images[0].image" alt="" class="img0 my-2 w-100" />
          <div class="row maxWidth">
            <img
              :src="xray.images[1].image"
              alt=""
              class="col-md-2 col-sm-2"
            />
            <img
              :src="xray.images[2].image"
              alt=""
              class="col-md-2 col-sm-2"
            />
            <img
              :src="xray.images[3].image"
              alt=""
              class="col-md-2 col-sm-2"
            />
            <img
              :src="xray.images[4].image"
              alt=""
              class="col-md-2 col-sm-2"
            />
            <img
              :src="xray.images[5].image"
              alt=""
              class="col-md-2 col-sm-2"
            />
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <p class="font-d">{{ xray.address }}</p>
          <h4 class="font-weight-bold">
            <span class="">
              {{ xray.name }}
            </span>
            <span class="text-primary col-md-4">{{ xray.discount }}%</span>
            <i class="fas fa-heart" v-if="fav"  @click="favourite('dislike')"></i>
            <i class="far fa-heart" v-else  @click="favourite('like')"></i>
          </h4>
 <div class="row">
          <p class="card-title text-muted">
           <div v-for="star in 5">
                  <i class="fas fa-star text-warning" v-if="xray.rate >= star"></i>
                  <i class="far fa-star text-warning" v-else></i>
                </div>
            ({{ xray.rate }})

          </p>
          </div>          <h6 class="font-weight-bold">
            <img :src="xray.logo" alt="" class="logo0" />
            <span> {{ xray.name }}</span>
          </h6>

          <br /><br />
          <h6 class="font-weight-bold">
            <img src="/Web/gwab.png" alt="" />
            <span> {{ xray.email }}</span>
          </h6>
          <br /><br />
          <h6 class="font-weight-bold ">
            <img src="/Web/phone.png" alt="" /><span class="num"
              >+{{ xray.phone.substring(0, 3) }}</span
            >
            {{ xray.phone.substring(3, xray.phone.length) }}
          </h6>
          <br />
          <div>
            <h6 class="font-weight-bold">
              <img src="/Web/pin.png" alt="" /> {{ xray.region }}
            </h6>
            <p class="font-d">{{ xray.address }}</p>
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
      .get("/users/rays/" + this.$route.params.id)
      .then((result) => {
        this.xray = result.data.data;
        this.fav = result.data.data.like == true ? true : false;
        console.log(result.data.data);
      })

      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      xray: {},
      fav: false,
    };
  },
  methods: {
    favourite(route){
      axios
      .post("/users/"+ route+"-ray", {'ray_id': this.$route.params.id})
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