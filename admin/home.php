<?php
// include config
include 'config.php';

// Define variables and initialize with empty values
$category = "";
$category_err = "";
 
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate Category
  if (empty(trim($_POST["category"]))) {
    $category_err = "Please enter Category.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM category WHERE category = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_category);

      // Set parameters
      $param_category = trim($_POST["category"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $category = trim($_POST["category"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Check input errors before inserting in database
  if (empty($category_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO category (category) VALUES (?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_category);

      // Set parameters
      $param_category = $category;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {

        echo "Category Successfully Added";
      } else {
        echo "Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }


  // Close connection
  mysqli_close($link);
}


// include header
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
          <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Customers</a></li>
          <li class="nav-item"><a class="nav-link" id="save-tab" data-toggle="tab" href="#save" role="tab" aria-controls="save" aria-selected="false">Sellers</a></li>
          <li class="nav-item"><a class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">Manufacturers</a></li>
          <li class="nav-item"><a class="nav-link" id="merch-tab" data-toggle="tab" href="#merch" role="tab" aria-controls="merch" aria-selected="false">Merchants</a></li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
          <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="p-4 p-lg-5 bg-white">
              <h6 class="text-uppercase">Account Details </h6>
              <div class="row">
                <div class="col-lg-6">
                  <label class="text-small text-uppercase" for="firstName">First name:</label>
                  <p>Favour</p>
                </div>
                <div class="col-lg-6">
                  <label class="text-small text-uppercase" for="lastName">Last name:</label>
                  <p>Arua</p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <label class="text-small text-uppercase" for="email">Email:</label>
                  <p>favour@mail.com</p>
                </div>
                <div class="col-lg-6">
                  <label class="text-small text-uppercase" for="company">Role:</label>
                  <p>Super Admin</p>
                </div>
              </div>
              <div class="stat mt-4">
                <img src="img/nothing.svg" alt="No Order">
                <h3>No Stat Yet</h3>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <div class="p-4 p-lg-5 bg-white">
              <img src="img/nothing.svg" alt="No Order">
              <h3>No Customer Yet</h3>
            </div>
          </div>
          <div class="tab-pane fade" id="save" role="tabpanel" aria-labelledby="save-tab">
            <div class="p-4 p-lg-5 bg-white">
              <img src="img/nothing.svg" alt="No Order">
              <h3>No Vendor Yet</h3>
            </div>
          </div>
          <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
            <div class="p-4 p-lg-5 bg-white">
              <img src="img/nothing.svg" alt="No Order">
              <h3>No Manufacturer Yet</h3>
            </div>
          </div>
          <div class="tab-pane fade" id="merch" role="tabpanel" aria-labelledby="merch-tab">
            <div class="p-4 p-lg-5 bg-white">
              <img src="img/nothing.svg" alt="No Order">
              <h3>No Merchant Yet</h3>
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
            <a href="#" class="btn">Add Admin</a>
            <hr>
            <a href="#addCategory" data-toggle="modal" class="btn">Add Category</a>
            <hr>
            <a href="#addTag" data-toggle="modal" class="btn">Add Tags</a>
            <hr>
            <a class="btn btn-link p-0 text-dark btn-sm" href="deliver.php">See Delivery Merchants <i class="fas fa-long-arrow-alt-right mr-2"> </i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!--  Category Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <div class="row align-items-stretch px-5 py-5">
          <form action="" method="POST">
            <div class="row">
              <div class="col-lg-12 form-group">
                <label class="text-small text-uppercase" for="categoryName">Category Name</label>
                <input class="form-control form-control-lg" id="categoryName" name="category" type="text" placeholder="Enter category">
              </div>
              <div class="col-lg-12 form-group">
                  <button class="btn btn-dark" type="submit">Add Category</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!--  Tag Modal -->
<div class="modal fade" id="addTag" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <div class="row align-items-stretch px-5 py-5">
          <form action="#" method="POST">
            <div class="row">
              <div class="col-lg-12 form-group">
                <label class="text-small text-uppercase" for="productName">Tag Name</label>
                <input class="form-control form-control-lg" id="productName" type="text" placeholder="Enter Product name">
              </div>
              <div class="col-lg-12 form-group">
                  <button class="btn btn-dark" type="submit">Add Tag</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include 'layout/footer.php'
?>