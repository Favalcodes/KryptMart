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
          <li class="nav-item"><a class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">Products</a></li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
          <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="p-4 p-lg-5 bg-white">
              <h6 class="text-uppercase">Account Details </h6>
              <label class="text-small text-uppercase" for="firstName">First name:</label>
              <p>Favour</p>
              <label class="text-small text-uppercase" for="lastName">Last name:</label>
              <p>Arua</p>
              <label class="text-small text-uppercase" for="email">Email:</label>
              <p>favour@mail.com</p>
              <label class="text-small text-uppercase" for="phone">Phone Number:</label>
              <p>+234 999766</p>
              <label class="text-small text-uppercase" for="country">Country:</label>
              <p>Nigeria</p>
              <label class="text-small text-uppercase" for="company">Company Name:</label>
              <p>Gucci</p>
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
              <a class="btn btn-primary" href="#addProduct" data-toggle="modal">Add Product</a>
              <img src="img/nothing.svg" alt="No Order">
              <h3>No Product Yet, Start Selling</h3>
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

<!-- Modals -->
<!--  Product Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <div class="row align-items-stretch px-5 py-5">
          <form action="">
            <div class="row">
              <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="productName">Product Name</label>
                <input class="form-control form-control-lg" id="productName" type="text" placeholder="Enter Product name">
              </div>
              <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="category">Category</label>
                <select class="selectpicker category form-control" id="category"></select>
              </div>
              <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="amount">Amount</label>
                <input class="form-control form-control-lg" id="amount" type="text" value="$">
              </div>
              <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="discount">Discount</label>
                <input class="form-control form-control-lg" id="discount" type="text" placeholder="%">
              </div>
              <div class="col-lg-12 form-group">
                <label class="text-small text-uppercase" for="tag">Tags</label>
                <input class="form-control form-control-lg" id="tag" type="text" placeholder="e.g book, bag,laptop">
              </div>
              <div class="col-lg-12 form-group">
                <label class="text-small text-uppercase" for="description">Description</label>
                <textarea name="desc" id="desc" cols="30" class="form-control" rows="10" placeholder="More info on Product"></textarea>
              </div>
              <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="image1">Image</label>
                <input class="form-control form-control-lg" id="image1" type="file">
              </div>
              <div class="reveal col-lg-6 form-group">
                <label class="text-small text-uppercase" for="image2">Image 2</label>
                <input class="form-control form-control-lg" id="image2" type="file">
              </div>
              <div class="reveal col-lg-6 form-group">
                <label class="text-small text-uppercase" for="image3">Image 3</label>
                <input class="form-control form-control-lg" id="image3" type="file">
              </div>
              <div class="reveal col-lg-6 form-group">
                <label class="text-small text-uppercase" for="image4">Image 4</label>
                <input class="form-control form-control-lg" id="image4" type="file">
              </div>
              <div class="col-lg-6 form-group">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" id="alternateAddressCheckbox" type="checkbox">
                  <label class="custom-control-label text-small" for="alternateAddressCheckbox">Digital Product</label>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row d-none" id="alternateAddress">
                  <div class="col-12 mt-4">
                    <h2 class="h4 text-uppercase mb-4">Digital Product</h2>
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="uploadProduct">Upload Product</label>
                    <input class="form-control form-control-lg" id="uploadProduct" type="file">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="download">Number of Downloads After Purchase</label>
                    <input class="form-control form-control-lg" id="download" type="number" placeholder="Number of Downloads">
                  </div>
                </div>
              </div>
              <div class="col-lg-12 form-group">
                  <button class="btn btn-dark" type="submit">Add Product</button>
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