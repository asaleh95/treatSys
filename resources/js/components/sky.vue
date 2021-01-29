<template>
  <div class="container-fluid">
    <div class="row">
      <button type="button" class="btn btn-primary col-md-4 offset-md-4 my-5" @click="loader()">
        Sky
      </button>
    </div>
    <div class="spinner-grow text-primary" role="status" v-if="active">
  <span class="sr-only">Loading...</span>
</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      active: false,
    };
  },
  methods: {
    loader() {
      this.active = true;
    },
  },
};
</script>