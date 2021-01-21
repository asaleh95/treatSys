<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <div class="row head">
        <h4>Laboratories</h4>
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
          <span>Laboratories</span>
        </h3>
        <a class="search" href="#"><img src="Web/gro.png" alt="" /></a>
        <a class="search" href="#"><img src="Web/gro2.png" alt="" /></a>
      </div>
      <hr />
      <div class="content">
        <div class="row">
          <div
            class="col-3 mb-5 hospital-click"
            v-for="(labs, i) in resultQuery"
            @click="goTo(labs.id)"
          >
            <div class="card pr-4 h-100">
              <img
                class="card-img-top card-hospital card-hospital-10"
                :src="labs.images[0].image"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title parg">
                  <span class="d-inline">
                    {{ labs.address }}
                  </span>
                  <div class="float-right d-inline">
                    <img src="Web/179.png" alt="" />
                    <span class="parg">{{ labs.distance }}km</span>
                  </div>
                </h5>
                <p class="card-text dar">{{ labs.name }}</p>
                <p class="card-title parg d-inline">
                  <span class="">{{ labs.region }} </span>
                  <span class="float-right"
                    >{{ labs.number_of_views }} Views</span
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
      .get("/users/labs")
      .then((result) => {
        this.labs = result.data.data;
        this.numOfPages = Math.ceil(result.data.meta.total / 12);
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      labs: [],
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
        return this.labs.filter((item) => {
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
        return this.labs;
      }
    },
  },
  methods: {
    deleteItem(id, index) {
      axios
        .delete("/users/labs/" + id)
        .then((result) => {
          this.labs.splice(index, 1);
          console.log(this.labs);
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
          this.labs = result.data.data;
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