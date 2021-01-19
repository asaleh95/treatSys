<template>
    <div>
        <div class="row head">
        <h4>{{name}}</h4>
        <h5 class="head2">
          | <a class="user" href="#"><img src="Web/home.png" alt="" /></a>>>
          <span class="text-primary">
          {{header}}
          </span>
        </h5>
        <a href="#"><img src="Web/search+.png" alt="" /></a>
      </div>
      <hr>
    </div>
</template>

<script>
export default {
    props: ['name','header']
    
}
</script>