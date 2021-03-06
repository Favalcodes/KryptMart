<?php

session_start();

// include config file
include 'config.php';

// check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}

// Check role of user to restrict page visit
if(!isset($_SESSION["role"]) || $_SESSION["role"] !== "merchant") {
  header("location: index.php");
  exit;
}

// SQL query to select data from database 
$sql = "SELECT * FROM users where id = $_SESSION[id]";
$result = $link->query($sql) or die("Error: " . mysqli_error($link));

// SQL query for the logo
$sq = "SELECT * FROM logo";
$output = $link->query($sq) or die("Error: " . mysqli_error($link));

// include header
include 'layout/header.php';
?>
<div class="container">
  <!-- HERO SECTION-->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
        <div class="col-lg-6">
        <?php
                        while ($rows = mysqli_fetch_array($result)) {
                        ?>
          <h1 class="h2 text-uppercase mb-0"><?php echo $rows["comp"]; ?></h1>
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
    <!-- Merchant Tab -->
    <div class="row">
      <div class="col-lg-8">
        <ul class="nav nav-tabs border-0" id="myTab" role="tablist" aria-orientation="vertical">
          <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Account</a></li>
          <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Orders</a></li>
          <li class="nav-item"><a class="nav-link" id="save-tab" data-toggle="tab" href="#save" role="tab" aria-controls="save" aria-selected="false">Saved Items</a></li>
          <li class="nav-item"><a class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">Statistics</a></li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
          <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="p-4 p-lg-5 bg-white">
              <h6 class="text-uppercase">Account Details </h6>
              <label class="text-small text-uppercase" for="logo">Logo</label>
              <?php
                if(mysqli_num_rows($output)===0){ ?>
              <img src="img/nothing.svg" height="100px" width="100px" alt="No Order">
              <h3>No Logo</h3><br>
              <input type="file" name="image" id="image" class="form-control">
              <a class="btn btn-dark">
                Add Logo
              </a>
              <?php } ?>
              <label class="text-small text-uppercase" for="firstName">First name:</label>
              <p><?php echo $rows["fname"]; ?></p>
              <label class="text-small text-uppercase" for="lastName">Last name:</label>
              <p><?php echo $rows["lname"]; ?></p>
              <label class="text-small text-uppercase" for="email">Email:</label>
              <p><?php echo $rows["email"]; ?></p>
              <label class="text-small text-uppercase" for="phone">Phone Number:</label>
              <p><?php echo $rows["phone"]; ?></p>
              <label class="text-small text-uppercase" for="country">Country:</label>
              <p><?php echo $rows["country"]; ?></p>
              <label class="text-small text-uppercase" for="company">Company Name:</label>
              <p><?php echo $rows["comp"]; ?></p>
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
          <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
            <div class="p-4 p-lg-5 bg-white">
              <img src="img/nothing.svg" alt="No Order">
              <h3>No Delivery done yet, Advertise Yourself.</h3>
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
            <hr>
            <a class="btn btn-link p-0 text-dark btn-sm" href="deliver.php">See Delivery Merchants <i class="fas fa-long-arrow-alt-right mr-2"> </i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
                        }
include 'layout/footer.php'
?>