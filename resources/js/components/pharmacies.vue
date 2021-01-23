<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <div class="row head">
        <h4>pharmacies</h4>
        <h5 class="head2">
          | <a class="user" href="#"><img src="Web/home.png" alt="" /></a>>>
          <span class="text-primary"> 7,618 results found in 5ms</span>
        </h5>
        <a href="#"><img src="Web/search+.png" alt="" /></a>
        <a href="#"><img src="Web/search+.png" alt="" /></a>
      </div>
      <br /><br />
      <div class="row">
        <h3 class="log mr-auto">
          <span>pharmacies</span>
        </h3>
        <a class="search" href="#"><img src="Web/gro.png" alt="" /></a>
        <a class="search" href="#"><img src="Web/gro2.png" alt="" /></a>
      </div>
      <hr />
      <div class="content">
        <div class="row">
          <div
            class="col-3 mb-5 hospital-click"
            v-for="(pharmacy, i) in resultQuery"
            @click="goTo(pharmacy.id)"
          >
            <div class="card pr-4 h-100">
              <img
                class="card-img-top card-hospital card-hospital-10"
                :src="pharmacy.images[0].image"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title parg">
                  <span class="d-inline">
                    {{ pharmacy.address }}
                  </span>
                  <div class="float-right d-inline">
                    <img src="Web/179.png" alt="" />
                    <span class="parg">{{ pharmacy.distance }}km</span>
                  </div>
                </h5>
                <p class="card-text dar">{{ pharmacy.name }}</p>
                <p class="card-title parg d-inline">
                  <span class="">{{ pharmacy.region }} </span>
                  <span class="float-right"
                    >{{ pharmacy.number_of_views }} Views</span
                  >
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
      .get("/users/pharmacy")
      .then((result) => {
        this.pharmacy = result.data.data;
        this.numOfPages = Math.ceil(result.data.meta.total / 12);
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      pharmacy: [],
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
      primary: 'btn-primary'
    };
  },
  computed: {
    resultQuery() {
      if (this.$root.search) {
        return this.pharmacy.filter((item) => {
          return this.$root.search
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
        return this.pharmacy;
      }
    },
  },
  methods: {
    deleteItem(id, index) {
      axios
        .delete("/users/pharmacy/" + id)
        .then((result) => {
          this.pharmacy.splice(index, 1);
          console.log(this.pharmacy);
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
        .get("/users/pharmacy?paginate=12&page="+ num)
        .then((result) => {
          this.pharmacy = result.data.data;
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