<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <div class="row head">
        <h4>Doctors</h4>
        <h5 class="head2">
          | <a class="user" href="#"><img src="Web/home.png" alt="" /></a>>>
          <span class="text-primary"> 7,618 results found in 5ms</span>
        </h5>
      </div>
      <br /><br />
      <div class="row">
        <h3 class="log mr-auto"><span>Ex : Doctor Name</span></h3>
        <a class="search" href="#"><img src="Web/gro.png" alt="" /></a>
        <a class="search" href="#"><img src="Web/gro2.png" alt="" /></a>
      </div>
      <select
        class="form-select form-control font-d"
        aria-label="Default select example"
        v-model="select"
        @change="doctorsByPosition()"
      >
        <option v-for="position in positions" :value="position.id" selected>
          {{ position.position }}
        </option>
      </select>
      <br />
      <div class="content">
        <div class="row">
          <div
            class="col-md-2 hospital-click mx-3 mb-2"
            v-for="(dr, i) in resultQuery"
            @click="goTo(dr.id)"
          >
            <img :src="dr.image.image" class="doctor" alt="" />
          </div>
        </div>
      </div>
      <br /><br />
      <div class="row mb-5">
        <div class="col-md-12 d-flex justify-content-center">
          <!-- <a href="#" class="btn btn-light rounded-circle" v-show="prevUrl"><</a> -->
          <button
            type="button"
            v-for="num in numOfPages"
            :class="[btnRounded, current == num ? primary : '']"
            :disabled="current == num"
            @click="getDoctors(num)"
          >
            {{ num }}
          </button>
          <!-- <a href="#" class="btn btn-primary rounded-circle mr-2">1</a> -->
          <!-- <a href="#" class="btn btn-light rounded-circle" v-show="nextUrl">></a> -->
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
      .get("/users/doctors?paginate=15")
      .then((result) => {
        this.drs = result.data.data;
        // this.prevUrl = result.data.links.prev;
        // this.nextUrl = result.data.links.next;
        this.numOfPages = Math.ceil(result.data.meta.total / 15);
        // this.prevUrl = this.numOfPages > 4 ? result.data.links.prev : false;
        // this.nextUrl = this.numOfPages > 4 ? result.data.links.next : false;
        console.log(result.data.data);
      })
      .catch((error) => {
        console.log(error);
      });
    axios
      .get("/positions")
      .then((result) => {
        this.positions = result.data.data;
        console.log(result.data.data);
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      drs: [],
      positions: [],
      id: null,
      index: null,
      success: false,
      errors: window.obj,
      prevUrl: false,
      nextUrl: false,
      numOfPages: 0,
      sorted: 1,
      current: 1,
      btnRounded: "btn rounded-circle",
      primary: "btn-primary",
      select: ''
    };
  },
  computed: {
    resultQuery() {
      if (this.$root.search) {
        return this.drs.filter((item) => {
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
        return this.drs;
      }
    },
  },
  methods: {
    getDoctors(num) {
      axios
        .get("/users/doctors?paginate=15&page=" + num)
        .then((result) => {
          this.drs = result.data.data;
          this.current = num;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    goTo(id) {
      this.$router.push("/doctor/" + id);
    },
    doctorsByPosition(){
      alert()
      axios
      .get("/users/doctors?paginate=15&position="+ this.select)
      .then((result) => {
        this.drs = result.data.data;
        this.numOfPages = Math.ceil(result.data.meta.total / 15);
        console.log(result.data.data);
      })
      .catch((error) => {
        console.log(error);
      });
    }
  },
};
</script>