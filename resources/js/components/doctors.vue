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
        <a href="#"><img src="Web/search+.png" alt="" /></a>
        <a href="#"><img src="Web/search+.png" alt="" /></a>
      </div>
      <br /><br />
      <div class="row">
        <h3 class="log mr-auto"><span>Ex : Doctor Name</span></h3>
        <a class="search" href="#"><img src="Web/gro.png" alt="" /></a>
        <a class="search" href="#"><img src="Web/gro2.png" alt="" /></a>
      </div>
      <hr />
      <div class="content">
        <div class="row">
          <div class="col-md-2 hospital-click mr-3" v-for="(dr, i) in resultQuery"  @click="goTo(dr.id)">
            <img :src="dr.image.image" class="doctor" alt="" />
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
      .get("/users/doctors")
      .then((result) => {
        this.drs = result.data.data;
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
      drs: [],
      id: null,
      index: null,
      success: false,
      errors: window.obj,
      prevUrl: false,
      nextUrl: false,
      sorted: 1,
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
    getDoctors(url) {
      axios
        .get(url)
        .then((result) => {
          this.drs = result.data.data;
          this.prevUrl = result.data.links.prev;
          this.nextUrl = result.data.links.next;
          console.log(result.data.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
     goTo(id){
          this.$router.push("/doctor/" + id);
    }
  },
};
</script>