<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <treat-header name="Hospitals" :header="hospital.name"></treat-header>
      <div class="row">
        <div class="col-md-8 col-sm-8">
          <img :src="hospital.images[0].image" alt="" class="img0 my-2 w-100" />
          <div class="row">
               <img
               v-for="(image, i) in hospital.images"
               v-if="i"
              :src="image.image"
              alt=""
              class="col-md-2 col-sm-2"
            />
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <p class="font-d">{{ hospital.address }}</p>
          <h4 class="font-weight-bold">
            <span class="">
              {{ hospital.name }}
            </span>
            <span class="text-primary col-md-4">{{ hospital.discount }}%</span>
            <i class="fas fa-heart" v-if="fav"  @click="favourite('dislike')"></i>
            <i class="far fa-heart" v-else  @click="favourite('like')"></i>
          </h4>
          <div class="row">
          <p class="card-title text-muted">
           <div v-for="star in 5">
                  <i class="fas fa-star text-warning" v-if="hospital.rate >= star"></i>
                  <i class="far fa-star text-warning" v-else></i>
                </div>
            ({{ hospital.rate }})

          </p>
          </div>
          <br>
          <h6 class="font-weight-bold">
            <img :src="hospital.logo" alt="" class="logo0" />
            <span> {{ hospital.name }}</span>
          </h6>

          <br /><br />
          <h6 class="font-weight-bold">
            <img src="/Web/gwab.png" alt="" />
            <span> {{ hospital.email }}</span>
          </h6>
          <br /><br />
          <h6 class="font-weight-bold">
            <img src="/Web/phone.png" alt="" /><span class="num"
              >+{{ hospital.phone.substring(0, 3) }}</span
            >
            {{ hospital.phone.substring(3, hospital.phone.length) }}
          </h6>
          <br />
          <div>
            <h6 class="font-weight-bold">
              <img src="/Web/pin.png" alt="" /> {{ hospital.region }}
            </h6>
            <p class="font-d">{{ hospital.address }}</p>
          </div>
        </div>
      </div>
      <br />
        <h3 class="font-weight-bold">about</h3>
      <div class="row">
        <p class="font-d">
          {{hospital.about}}
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
      .get("/users/hospitals/" + this.$route.params.id)
      .then((result) => {
        this.hospital = result.data.data;
        this.fav = result.data.data.like == true ? true : false;
        console.log(result.data.data);
      })

      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      hospital: {},
      fav: false,
    };
  },
  methods: {
    favourite(route) {
      axios
        .post("/users/" + route + "-hospital", {
          hospital_id: this.$route.params.id,
        })
        .then((result) => {
          this.fav = !this.fav;
          console.log(result.data.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>