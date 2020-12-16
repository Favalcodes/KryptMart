<?php
include 'layout/header.php';
?>
<div class="container">
  <!-- HERO SECTION-->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
        <div class="col-lg-6">
          <h1 class="h2 text-uppercase mb-0">Valerie</h1>
        </div>
        <div class="col-lg-6 text-lg-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">My Dashboard</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5">
    <!-- Buyers Tab -->
    <div class="row">
      <div class="col-lg-8">
        <ul class="nav nav-tabs border-0" id="myTab" role="tablist" aria-orientation="vertical">
          <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Account</a></li>
          <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Orders</a></li>
          <li class="nav-item"><a class="nav-link" id="save-tab" data-toggle="tab" href="#save" role="tab" aria-controls="save" aria-selected="false">Saved Items</a></li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
          <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="p-4 p-lg-5 bg-white">
              <h6 class="text-uppercase">Account Details </h6>
              <label class="text-small text-uppercase" for="firstName">First name:</label>
              <p>Favour</p>
              <label class="text-small text-uppercase" for="firstName">Last name:</label>
              <p>Arua</p>
              <label class="text-small text-uppercase" for="firstName">Email:</label>
              <p>favour@mail.com</p>
              <label class="text-small text-uppercase" for="firstName">Phone Number:</label>
              <p>+234 999766</p>
              <label class="text-small text-uppercase" for="firstName">Country:</label>
              <p>Nigeria</p>
            </div>
          </div>
          <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <div class="p-4 p-lg-5 bg-white">
              <img src="img/nothing.svg" alt="No Order">
              <h3>No Order Yet</h3>
            </div>
          </div>
          <div class="tab-pane fade" id="save" role="tabpanel" aria-labelledby="save-tab">
            <div class="p-4 p-lg-5 bg-white">
              <img src="img/nothing.svg" alt="No Order">
              <h3>You haven't Saved Anything Yet</h3>
            </div>
          </div>
        </div>
      </div>
      <!-- settings -->
      <div class="col-lg-4">
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
          <div class="card-body">
            <h5 class="text-uppercase mb-4">settings</h5>
            <a href="#" class="btn">Change Password</a>
            <hr>
            <a href="#" class="btn">Change Email</a>
            <hr>
            <a href="#" class="btn">Change Phone Number</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
include 'layout/footer.php'
?>