<template>
  <div>
    <div class="container">
      <treat-nav></treat-nav>
      <treat-header name="Doctors" header="Ruby Garcia"></treat-header>
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <img src="Web/80.png" alt="" />
        </div>
        <div class="col-md-8 col-sm-8">
          <p class="doc">Dentist-Specialist</p>
          <h3 class="font-weight-bold">Ruby Garcia</h3>
          <br /><br />
          <h3 class="number">
            <img src="Web/phone.png" alt="" /><span class="num">+20</span>
            1019917043
          </h3>
          <br />
          <div>
            <h6 class="font-weight-bold">
              <img src="Web/pin.png" alt="" /> Mozia Art Space and Cafe
            </h6>
            <p class="font-b">14 Phan huy ich, Bo Durh, Hanai</p>

            <div class="row">
              <h5 class="basic col-2">Basic Price</h5>
              <h5 class="black col-2">Treat Price</h5>
            </div>
            <div class="row">
              <h5 class="fon col-2">$310</h5>
              <h5 class="blue col-2">$200</h5>
            </div>
          </div>
        </div>
      </div>
      <br />
      <div class="row">
        <h3 class="font-weight-bold">about</h3>
        <p class="font-b">
          It is a long established fact that a reader will be distracted by the
          readable content of a page when looking at its layout. The point of
          using Lorem Ipsum is that it has a more-or-less normal distribution of
          letters, as opposed to using 'Content here, content here', making it
          look like readable English. Many desktop publishing packages and web
          page editors now use Lorem Ipsum as their default model text, and a
          search for 'lorem ipsum' will uncover many web sites still in their
          infancy. Various versions have evolved over the years, sometimes by
          accident, sometimes on purpose (injected humour and the like).
        </p>
        <br>
      </div>
    </div>
    <treat-footer></treat-footer>
  </div>
</template>