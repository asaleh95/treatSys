<template>
  <div>
    <div
      style="margin-top: 10%"
      class="modal fade"
      id="basicExampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">حذف {{type}}</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">هل انت متأكد انك تريد مسح هذا ؟</div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
              style="margin-left: 1%"
            >
              الغاء
            </button>
            <button type="button" class="btn btn-primary" @click="$emit('del', id, index)" data-dismiss="modal">حذف</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props: ['type', 'id', 'index'],
}
</script>