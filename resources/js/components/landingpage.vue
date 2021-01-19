<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>

      <div class="row mb-5 mt-5">
        <!-- left side  => form -->
        <!-- image -->
        <div class="col-12">
          <div class="contain">
            <img
              src="/Web/5.png"
              class="img img-responsive land"
              alt="main-image"
            />
            <img src="/Web/55.png" class="centered img-g" alt="over-image" />
            <div class="border bg-treat mt-5 centered w-50">
              <h1 class="words1">Learn Something New</h1>
              <h2 class="words">Everyday Anyday Anytime</h2>
              <br />
              <p class="pargra">
                It is a long established fact that a reader will be distracted
                by the there are many cats and dog tuitorial series.
              </p>
              <br />
              <br />
              <button
                type="button"
                class="btn btn-outline-primary pargra butto"
              >
                Start 7 Days Trail
              </button>
              <!-- <p class="pargra">Start 7 Days Trail</p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-2 mt-5">
          <div class="border rounded-sm border-corner borda">
            <img src="Web/sma3a.png" class="mx-auto d-block mt-5" alt="" />
            <h6 class="offset-3 mt-3">doctors</h6>
          </div>
        </div>
        <div class="col-md-2 mt-5">
          <div class="border rounded-sm border-corner borda">
            <img src="Web/mico.png" class="mx-auto d-block mt-5" alt="" />
            <h6 class="offset-3 mt-3">Laboratories</h6>
          </div>
        </div>
        <div class="col-md-2 mt-5">
          <div class="border rounded-sm border-corner borda">
            <img src="Web/x-ray.png" class="mx-auto d-block mt-5" alt="" />
            <h6 class="offset-3 mt-3">x-ray centers</h6>
          </div>
        </div>
        <div class="col-md-2 mt-5">
          <div class="border rounded-sm border-corner borda">
            <img src="Web/hospital.png" class="mx-auto d-block mt-5" alt="" />
            <h6 class="offset-3 mt-3">Hospitals</h6>
          </div>
        </div>
        <div class="col-md-2 mt-5">
          <div class="border rounded-xl border-corner borda">
            <img src="Web/202.png" class="mx-auto d-block mt-5" alt="" />
            <h6 class="offset-3 mt-3">pharmasy</h6>
          </div>
        </div>
        <div class="col-md-2">
          <div class="">
            <img src="Web/View-other.png" class="mx-auto d-block mt-5" alt="" />
          </div>
        </div>
      </div>
      <div class="row head">
        <h3 class="font-b">Recommended <span class="head2">Hospitals</span></h3>
        <router-link
        to="hospitals"
          type="submit"
          class="offset-6 view view-mo"
        >
        Browse Hospitals
        </router-link>
      </div>
      <div class="content mb-5">
        <div class="row">
          <div class="col-4" v-for="(hospital,i) in hosp">
            <div class="card pr-4">
              <img
                class="card-img-top card-hospital"
                :src="hospital.images[0].image"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title parg">
                  {{hospital.address}}
                  <div class="float-right">
                    <img src="Web/179.png" alt="" />
                    <span class="parg">{{hospital.distance}}km</span>
                  </div>
                </h5>
                <p class="card-text dar">{{hospital.name}}</p>
                <p class="card-title parg">{{hospital.region}} <span class="float-right ">{{hospital.number_of_views}} Views</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br />
      <br />
      <br />
      <div class="row">
        <div class="col-8">
          <img src="Web/nurs.png" class="w-100" alt="" />
        </div>
        <div class="col-4">
          <p class="nur"></p>
          <h2 class="whe">Why You Should</h2>
          <h1 class="cho">Choose Us</h1>
          <br />
          <h6 class="parg">
            There are many variations of passages of Lorem Ipsum available, some
            form, by injected humour.
          </h6>
          <br /><br />
          <h6 class="prag">-24000+ Online Course</h6>
          <br />
          <h6 class="prag">-Expert Instruction</h6>
          <br />
          <h6 class="prag">-Unlimited Access</h6>
          <br />
          <h6 class="prag">-Comfortable Prices</h6>
          <br />
          <h6 class="prag">-Free 2 Month Trail</h6>
          <br />
          <h6 class="prag">-Review System</h6>
        </div>
        <div class="row head">
          <h3 class="pr-auto">
            <span class="toop">Top Rated</span>
            <span class="head2 prag">Doctors</span>
            <img
              src="Web/assest.png"
              v-show="nextUrl"
              class="arrow-right"
              alt=""
              @click.prevent="getDoctors(nextUrl)"
            />
          </h3>
        </div>
        <div class="row">
          <div class="col-md-2 hospital" v-for="(dr, i) in drs">
            <img :src="dr.image.image" class="doctor" alt="" />
          </div>
        </div>
      </div>
      <div class="row head">
        <h3 class="feedback">Enroll Student's Feedback</h3>
        <input
          type="submit"
          value="view more"
          class="offset-6 view view-more"
        />
      </div>
      <br />
      <div class="row text-center">
        <div class="col-6">
          <h6 class="parg">
            It has survived not only five centuries, but also the leap into
          </h6>
          <h6 class="parg">
            electronic typesetting, remaining essentially unchanged. It was
          </h6>
          <h6 class="offset-md-1 parg ml-1">
            popularised in the 1960s with the race.
          </h6>
          <br />
          <img src="Web/gray.png" class="offset-md-3 foto" alt="" />
          <br />
          <h6 class="offset-md-2 amanda">Amanda Jackson</h6>
          <h6 class="offset-md-2 parg amanda">CEO, NRD Group</h6>
        </div>
        <div class="col-6 text-right">
          <h6 class="parg">
            It has survived not only five centuries, but also the leap into
          </h6>
          <h6 class="parg">
            electronic typesetting, remaining essentially unchanged. It was
          </h6>
          <h6 class="offset-md-1 parg text-center">
            popularised in the 1960s with the race.
          </h6>
          <br />
          <div class="text-center">
            <img src="Web/gray.png" class="offset-md-3 fotoz" alt="" />
            <br />
            <h6 class="tex">Amanda Jackson</h6>
            <h6 class="parg tex">CEO, NRD Group</h6>
          </div>
        </div>
      </div>
      <br />
      <br />
      <br />
      <div class="paragraph-news offset-md-3">
        <h3 class="offset-md-1 get">To Get Latest News & Further Update</h3>
        <h3 class="offset-md-2">Subscribe Our Newsletter</h3>
      </div>
      <br />
      <div>
        <button type="button" class="offset-5 subscrib">Subscribe</button>
      </div>
    </div>
    <br />
    <br />
    <treat-footer></treat-footer>
  </div>
</template>
<script>
export default {
  mounted() {
    axios
      .get("/users/hospitals")
      .then((result) => {
        this.hosp[0] = result.data.data[0];
        this.hosp[1] = result.data.data[1];
        this.hosp[2] = result.data.data[2];
        this.prevUrl = result.data.links.prev;
        this.nextUrl = result.data.links.next;
        console.log(result.data.data);
      })
      .catch((error) => {
        console.log(error);
      });
    axios
      .get("/users/doctors?paginate=5")
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
      hosp: [],
      prevUrl: false,
      nextUrl: false,
    };
  },
  methods: {
    getDoctors(url) {
      axios
        .get(url+ "&paginate=5")
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
  },
};
</script>