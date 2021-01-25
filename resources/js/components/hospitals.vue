<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <div class="row head">
        <h4>Hospital</h4>
        <h5 class="head2">
          | <a class="user" href="#"><img src="Web/home.png" alt="" /></a>>>
          <span class="text-primary"> 7,618 results found in 5ms</span>
        </h5>
      </div>
      <br /><br />
      <div class="row">
        <h3 class="log mr-auto">
          <span>hospitals</span>
        </h3>
        <a class="search" href="#"><img src="Web/gro.png" alt="" /></a>
        <a class="search" href="#"><img src="Web/gro2.png" alt="" /></a>
      </div>
      <!-- <hr /> -->
      <div class="row">
        <input type="text" v-model="search" class="col-md-12 form-control border-top-0 border-left-0 border-right-0" name="" id="">
      </div>
      <br>

      <div class="row">
      <div class="card-deck col-md-4 my-2" v-for="(hospital, i) in resultQuery">
        <div class="card">
          <div @click="goTo(hospital.id )">
          <div class="overlay">
            <div class="text">Preview Hospital</div>
          </div>
          <img
            class="card-img-top"
            :src="hospital.images[0].image"
            alt="Card image cap"
          />
          </div>
          <div class="card-body ">
            <div class="row">
              <p class="card-title text-muted">
                {{ hospital.address }}
              </p>
              <p class="card-title text-muted ml-auto">
                <img src="Web/179.png" alt="" />
                 {{ hospital.distance }}km
              </p>
            </div>
            <div class="row">
            <h5 class="card-title">{{ hospital.name }}</h5>
            </div>
            <div class="row">
              <p class="card-title text-muted">
                <div v-for="star in 5">
                  <i class="fas fa-star text-warning" v-if="hospital.rate >= star"></i>
                  <i class="far fa-star text-warning" v-else></i>
                </div>
                ({{ hospital.rate }})
              </p>
              <p class="card-title text-muted ml-auto">
                 {{ hospital.number_of_views }} views
              </p>
            </div>
          </div>
        </div>
      </div>
      </div>
      <br /><br />
      <div class="row mb-5">
        <div class="col-md-12 d-flex justify-content-center">
          <button type="button" v-for="num in numOfPages" :class="[btnRounded, current == num ? primary : '']" :disabled="current == num" @click="getDoctors(num)">
            {{ num }}
          </button>
        </div>
      </div>
    </div>
    <treat-footer></treat-footer>
  </div>
</template>
<script>
export default {
  mounted() {
    axios
      .get("/users/hospitals")
      .then((result) => {
        this.hosp = result.data.data;
        this.numOfPages = Math.ceil(result.data.meta.total / 12);
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      hosp: [],
      id: null,
      index: null,
      success: false,
      errors: window.obj,
      prevUrl: false,
      nextUrl: false,
      numOfPages: 0,
      sorted: 1,
      current: 1,
      btnRounded: 'btn rounded-circle',
      primary: 'btn-primary',
      search: ''
    };
  },
  computed: {
    resultQuery() {
      if (this.search) {
        return this.hosp.filter((item) => {
          return this.search
            .toLowerCase()
            .split(" ")
            .every(
              (v) =>
                item.name.toLowerCase().includes(v) ||
                item.phone.toLowerCase().includes(v) ||
                item.address.toLowerCase().includes(v)
            );
        });
      } else {
        return this.hosp;
      }
    },
  },
  methods: {
    deleteItem(id, index) {
      axios
        .delete("/users/hospitals/" + id)
        .then((result) => {
          this.hosp.splice(index, 1);
          console.log(this.hosp);
          // console.log(result.data);
          console.log("clients");
          //
          this.success = true;
          setTimeout(() => (this.success = false), 2000);
        })
        .catch((err) => this.errors.record(err.response.data.errors));
    },
    setDel(id, index) {
      this.id = id;
      this.index = index;
    },
    getDoctors(num) {
      axios
        .get("/users/hospitals?paginate=12&page="+ num)
        .then((result) => {
          this.hosp = result.data.data;
          this.current = num;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    goTo(id) {
      this.$router.push("/details/" + id);
    },
  },
};
</script>