<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <treat-header name="Doctors" :header="dr.name"></treat-header>
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <img  class="w-100" :src="dr.image.image" alt="" />
        </div>
        <div class="col-md-8 col-sm-8">
          <p class="font-d"> {{ dr.position }}</p>
          <h3 class="font-weight-bold ">
            {{ dr.name }}
            <i class="fas fa-heart text-danger float-right" v-if="fav"  @click="favourite('dislike')"></i>
            <i class="far fa-heart text-danger float-right" v-else  @click="favourite('like')"></i>
          </h3>
          <br /><br />
          <h3 class="number">
            <img src="/Web/phone.png" alt="" /><span class="num">+{{dr.phone.substring(0, 3)}}</span>
            {{ dr.phone.substring(3, dr.phone.length) }}
          </h3>
          <br />
          <div>
            <h5 class="font-weight-bold ">
              <img src="/Web/pin.png" alt="" /> {{ dr.address }}
            </h5>
            <p class="font-d">{{ dr.address }}</p>

            <div class="row">
              <h5 class="basic col-2">Basic Price</h5>
              <h5 class="black col-2">Treat Price</h5>
            </div>
            <div class="row">
              <h5 class="fon col-2">${{dr.basic_price}}</h5>
              <h5 class="blue col-2">${{dr.treat_price}}</h5>
            </div>
          </div>
        </div>
      </div>
      <br />
      <div class="row">
        <h3 class="font-weight-bold">About</h3>
      </div>
      <div class="row">
        <p class="font-d">
        {{dr.about}}
        </p>
        <br>
      </div>
    </div>
    <treat-footer></treat-footer>
  </div>
</template>

<script>
export default {
  mounted() {
    axios
      .get("/users/doctors/" + this.$route.params.id)
      .then((result) => {
        this.dr = result.data.data;
        this.fav = result.data.data.like == true ? true : false;
        console.log(result.data.data);
      })

      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      dr: {},
      fav: false,
    };
  },
  methods: {
    favourite(route){
      axios
      .post("/users/"+ route+"-doctor", {'doctor_id': this.$route.params.id})
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