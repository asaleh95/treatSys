<style scoped>
.row {
  margin-bottom: 5%;
}
</style>
<template>
  <!-- Content Body Start -->
  <div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
      <router-link
        to="/users/add"
        style="position: absolute; left: 31px"
        class="button button-primary"
      >
        <span>آضافه مستخدم جديد</span>
      </router-link>
      <!-- Page Heading Start -->
      <div class="col-12 col-lg-auto mb-20">
        <div class="page-heading">
          <h3>المستخدمين </h3>
        </div>
      </div>
      <!-- Page Heading End -->
    </div>
    <!-- Page Headings End -->
    <div
      class="alert alert-solid-danger alrt animated slideInUp"
      v-if="success"
      role="alert"
    >
      تم حذف هذا العنصر بنجاح
    </div>

    <div class="row mbn-50">
      <!--Timeline / Activities Start-->
      <div class="col-xlg-12 col-12 mb-50">
        <div class="box box-border-less p-0">
          <div class="table-responsive" style="margin-bottom: 2%">
            <table
              style="text-align: center"
              class="table table-vertical-middle table-selectable"
            >
              <!-- Table Head Start -->
              <thead>
                <tr>
                  <!-- <th class="selector"><label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label></th> -->
                  <!--<th class="selector h5"><button class="button-check"></button></th>-->
                  <th>
                    <span>#</span>
                  </th>
                  <th>
                    <span>بريد المستخدم</span>
                  </th>
                  <th>
                    <span>رقم الهاتف</span>
                  </th>
                  <th>
                    <span>التفاصيل</span>
                  </th>
                  <th></th>
                </tr>
              </thead>
              <!-- Table Head End -->

              <!-- Table Body Start -->
              <tbody>
                <tr v-for="(user, i) in resultQuery">
                  <!-- <td class="selector"><label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label></td> -->
                  <td style="font-family: sans-serif">#{{ user.id }}</td>
                  <td>
                    <a href="#">{{ dr.email }}</a>
                  </td>

                  <td style="font-family: sans-serif">{{ dr.phone }}</td>
                  <td>
                    <div class="table-action-buttons">
                      <router-link
                        class="view button button-box button-xs button-primary"
                        :to="'/users/show/' + user.id"
                      >
                        <i class="zmdi zmdi-more"></i>
                      </router-link>
                      <router-link
                        class="edit button button-box button-xs button-info"
                        :to="'/users/edit/' + user.id"
                      >
                        <i class="zmdi zmdi-edit"></i>
                      </router-link>
                      <a
                        class="delete button button-box button-xs button-danger"
                        data-toggle="modal"
                        data-target="#basicExampleModal"
                        @click="setDel(user.id, i)"
                      >
                        <i class="zmdi zmdi-delete"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
              <!-- Table Body End -->
            </table>
          </div>
          <ul style="margin-bottom: 2%" class="pagination justify-content-center">
            <li class="page-item" v-show="nextUrl">
              <a class="page-link" href="#" @click.prevent="getDoctors(nextUrl)">Next</a>
            </li>
            <li class="page-item" v-show="prevUrl">
              <a class="page-link" href="#" @click.prevent="getDoctors(prevUrl)">Previous</a
              >
            </li>
          </ul>
        </div>
      </div>
      <dial @del="deleteItem" type="مستخدم" :id="id" :index="index"></dial>

      <!--Timeline / Activities End-->
    </div>
  </div>
  <!-- Content Body End -->
</template>
<script>
export default {
  mounted() {
    axios
      .get("/admins/users")
      .then((result) => {
        this.users = result.data.data;
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
      users: [],
      id: null,
      index: null,
      success: false,
      errors: window.obj,
      prevUrl: false,
      nextUrl: false
    };
  },
  computed: {
    resultQuery() {
      if (this.$root.search) {
        return this.users.filter((item) => {
          return this.$root.search
            .toLowerCase()
            .split(" ")
            .every(
              (v) =>
                item.name.toLowerCase().includes(v) ||
                item.phone.toLowerCase().includes(v)||
                item.address.toLowerCase().includes(v)
            );
        });
      } else {
        return this.users;
      }
    },
  },
  methods: {
    deleteItem(id, index) {
      axios
        .delete("/admins/users/" + id)
        .then((result) => {
          this.users.splice(index, 1);
          console.log(this.users);
          // console.log(result.data);
          console.log("users");
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
    getDoctors(url){
      axios
      .get(url)
      .then((result) => {
        this.users = result.data.data;
        this.prevUrl = result.data.links.prev;
        this.nextUrl = result.data.links.next;
        console.log(result.data.data);
      })
      .catch((error) => {
        console.log(error);
      });
    }
  },
};
</script>