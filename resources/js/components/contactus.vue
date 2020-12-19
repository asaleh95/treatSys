<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <treat-header name="contact us" header="Help"></treat-header>
      <div class="row">
        <div class="col-8">
          <img src="Web/main.png" alt="" class="img9" />
        </div>
        <div class="col-md-4 col-sm-4">
            <h5 class="font-weight-bold">contact us</h5>
            <p class="font-b">We’re here to help and answer any question you might have. We look forward to hearing from you</p>
          <form action="">
            <input type="text" class="input font-b" placeholder="first name" />
            <input type="text" class="input font-b" placeholder="last name" />
            <input type="text" class="input font-b" placeholder="email addres" />
            <textarea class="input font-b" placeholder="massege"></textarea>
            <input type="submit" value="SEND" class="submit text-white" />
            
          </form>
        </div>
      </div>
      <br />
    </div>
    <treat-footer></treat-footer>
  </div>
</template>