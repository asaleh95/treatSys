<template>
  <div class="row container align-right">
    <div class="col-1"></div>
    <div class="col-4">
      <div class="row far-from-top">
        <h2 class="font-multicolor">LOGIN</h2>
      </div>
      <br />
      <br />
      <div class="row">
        <h1 class="font-poppins">Hi there</h1>
      </div>
      <br />
      <br />
      <div class="row">
        <p class="font-p">
          There are many variations of passages of Lorem Ipsum available, some
          form .
        </p>
      </div>
      <div class="row">
        <input
          class="form-control form-control-lg text-input"
          type="text"
          placeholder="Email adress"
        />
        <input
          class="form-control form-control-lg text-input"
          id="password"
          type="text"
          placeholder="Password"
        />
        <div class="row">
          <form action="/action_page.php" method="get">
            <div class="row">
              <div class="col-8">
                <input
                  type="checkbox"
                  name="vehicle1"
                  value="remember"
                  class="checkbox"
                />
                <label for="vehicle1"> Remember me</label>
              </div>
              <div class="col-2">
                <label for="vehicle1"> forget password?</label>
              </div>
              <br />
            </div>
            <input type="submit" value="sign in" class="submit" />
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-2"></div>
        <div class="check col-10">
          <label for="vehicle1"> dont have accout? sign up</label><br />
        </div>
      </div>
    </div>
    <div class="col-7">
      <div class="contain">
        <img src="/Web/5.png" class="img" alt="image" />
        <div class="bottom-left">you trust we care </div>
        <div> 
			<img src="/web/4.png" class="centered" alt="image" />
		</div>
      </div>
    </div>
  </div>
</template>