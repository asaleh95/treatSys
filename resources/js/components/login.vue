
<template>
  <div class="row">
    <div class="col-md-4 pl-5 pt-5">
      <h2 class="logi">LOGIN</h2>
      <br>
      <h4>Hi there!</h4>
      <br>
      <p class="text-paragraph-login">
        There are many variations of passages of Lorem Ipsum available, some
        form .
      </p>
      <form action="">
          <input type="text" class="form-control-lg input font-b" placeholder="Email Address">
          <div>
              <input type="password" class="form-control-lg input font-b" placeholder="Password">
          <!-- <span class="input-icon"><i class="fa fa-eye info"></i></span> -->
          </div>
          <div class="row">
          <!-- <input type="checkbox"> -->
             <input type='checkbox' name='thing' value='valuable' id="thing"/>
             <label for="thing" class="ml-3"></label>
             <Span class="ml-2 mt-n1 checkboox-label text-muted text-center">Remember Me</Span>
             <a href="#" class="mt-n1 offset-md-4 forget-password-text text-muted text-center">Forget Password</a>
          </div>
          <br>
          <button type="button" class="submit text-white font-weight-bold">Login</button>
          <br>
      </form>
      <p class="text-donthaveaccount offset-md-3 mt-5 text-muted text-center">Don't have an account ? <a href="#">Sign up</a></p>
      <div class="row">
          <div class="col-md-3 mt-5">
              <hr>
          </div>

          <div class="col-md-6 mt-5">
              <p class="text-muted text-center">Or continue with</p>
          </div>
          <div class="col-md-3 mt-5">
            <br>
              <hr>
          </div>
          <div class="row">
              <div class="col-md-4 mt-5">
              <a > <img src="Web/Google Button.png" alt=""></a>
              </div>
              <div class="col-md-4 mt-5">
              <a > <img src="Web/Facebook Button.png" alt=""></a>
              </div>
              <div class="col-md-4 mt-5">
              <a > <img src="Web/Apple Button.png" alt=""></a>
              </div>
          </div>
      </div>
    </div>
    <div class="col-md-8">
      <img
        src="/Web/511.png"
        class="img-fluid w-100 back-color"
        alt="Cinque Terre"
      />
      <img
        src="/Web/55.png"
        class="topleft"
        style="width: 115%"
        alt="over-image"
      />
      <div>
        <h1 class="center">We Trust</h1>
        <h1 class="center text-t7t">We Care</h1>
      </div>
    </div>
  </div>
</template>