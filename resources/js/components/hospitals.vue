<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <div class="row head">
        <h4>Hospital</h4>
        <h5 class="head2">
          | <a class="user" href="#"><img src="Web/home.png" alt="" /></a>>>
      <span class="text-primary">    7,618 results found in 5ms</span>
        </h5>
        <a href="#"><img src="Web/search+.png" alt="" /></a>
        <a href="#"><img src="Web/search+.png" alt="" /></a>
      </div>
      <br /><br />
      <div class="row">
        <h3 class="log mr-auto">
          <span>hospitals</span>
        </h3>
        <a class="search" href="#"><img src="Web/gro.png" alt="" /></a>
        <a class="search" href="#"><img src="Web/gro2.png" alt="" /></a>
      </div>
      <hr />
      <div class="content">
        <div class="row">
          <div class="col-3 mb-5 hospital-click" v-for="(hospital,i) in resultQuery" @click="goTo(hospital.id)">
            <div class="card pr-4 h-100">
              <img
                class="card-img-top card-hospital card-hospital-10"
                :src="hospital.images[0].image"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title parg">
                  <span class="d-inline">
                  {{hospital.address}}
                  </span>
                  <div class="float-right d-inline">
                    <img src="Web/179.png" alt="" />
                    <span class="parg">{{hospital.distance}}km</span>
                  </div>
                </h5>
                <p class="card-text dar">{{hospital.name}}</p>
                <p class="card-title parg d-inline"><span class="">{{hospital.region}} </span> <span class=" float-right ">{{hospital.number_of_views}} Views</span></p>
              </div>
            </div>
          </div>

        </div>
      </div>
      <br /><br />
      <div class="row mb-5">
        <div class="col-md-12 d-flex justify-content-center">
          <a href="#" class="btn btn-light rounded-circle"><</a>
          <a href="#" class="btn rounded-circle">4</a>
          <a href="#" class="btn rounded-circle">3</a>
          <a href="#" class="btn rounded-circle">2</a>
          <a href="#" class="btn btn-primary rounded-circle mr-2">1</a>
          <a href="#" class="btn btn-light rounded-circle">></a>
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
        this.prevUrl = result.data.links.prev;
        this.nextUrl = result.data.links.next;
        console.log(result.data.data);
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
    };
  },
  computed: {
    resultQuery() {
      if (this.$root.search) {
        return this.hosp.filter((item) => {
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
    getDoctors(url) {
      axios
        .get(url)
        .then((result) => {
          this.hosp = result.data.data;
          this.prevUrl = result.data.links.prev;
          this.nextUrl = result.data.links.next;
          console.log(result.data.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    goTo(id){
          this.$router.push("/details/" + id);
    }
  },
};
</script>