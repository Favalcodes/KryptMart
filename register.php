<?php

// include php for registration
include 'regdetails.php';

// include header
include 'layout/header.php';
?>
<div class="container">
  <!-- HERO SECTION-->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
        <div class="col-lg-6">
          <h1 class="h2 text-uppercase mb-0">Register</h1>
        </div>
        <div class="col-lg-6 text-lg-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5">
    <!-- Details-->
    <div class="row">
      <div class="col-lg-8">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="row">
            <div class="col-lg-6 form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
              <label class="text-small text-uppercase" for="firstName">First name</label>
              <input class="form-control form-control-lg" name="fname" id="firstName" type="text" placeholder="Enter your first name">
              <span class="help-block"><?php echo $fname_err; ?></span>
            </div>
            <div class="col-lg-6 form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
              <label class="text-small text-uppercase" for="lastName">Last name</label>
              <input class="form-control form-control-lg" name="lname" id="lastName" type="text" placeholder="Enter your last name">
              <span class="help-block"><?php echo $lname_err; ?></span>
            </div>
            <div class="col-lg-6 form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
              <label class="text-small text-uppercase" for="email">Email address</label>
              <input class="form-control form-control-lg" name="email" id="email" type="email" placeholder="e.g. Jason@example.com">
              <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="col-lg-6 form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
              <label class="text-small text-uppercase" for="phone">Phone number</label>
              <input class="form-control form-control-lg" name="phone" id="phone" type="tel" placeholder="e.g. +02 245354745">
              <span class="help-block"><?php echo $phone_err; ?></span>
            </div>
            <div class="col-lg-6 form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label class="text-small text-uppercase" for="password">Password</label>
              <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Your Password">
              <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="col-lg-6 form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
              <label class="text-small text-uppercase" for="password">Confirm Password</label>
              <input class="form-control form-control-lg" name="confirm_password" id="confirm_password" type="password" placeholder="Your Password">
              <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="col-lg-12 form-group <?php echo (!empty($country_err)) ? 'has-error' : ''; ?>">
              <label class="text-small text-uppercase" for="country">Country</label>
              <select class="selectpicker country" name="country" id="country" data-width="fit" data-style="form-control form-control-lg" data-title="Select your country"></select>
              <span class="help-block"><?php echo $country_err; ?></span>
            </div>
            <div class="col-lg-12 form-group <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">
              <label class="text-small text-uppercase" for="role">Role</label>
              <select class="form-control" id="role" name="role">
                <option hidden>Select Role</option>
                <option value="customer">Customer</option>
                <option value="seller">Vendor/Seller</option>
                <option value="manufacturer">Manufacturer</option>
                <option value="merchant">Delivery Merchant</option>
              </select>
              <span class="help-block"><?php echo $role_err; ?></span>
            </div>

            <div class="col-lg-12 form-group" id="seller">
              <div class="row">
                <div class="col-lg-12 <?php echo (!empty($store_name_err)) ? 'has-error' : ''; ?>">
                  <label for="store">Store Name</label>
                  <input type="text" class="form-control w-100" id="store" name="store_name">
                  <span class="help-block"><?php echo $store_name_err; ?></span>
                </div>
              </div>
            </div>
            <div class="col-lg-12 form-group" id="manufacturer">
              <div class="row">
                <div class="col-6 <?php echo (!empty($company_err)) ? 'has-error' : ''; ?>">
                  <label for="company">Company Name</label>
                  <input type="text" class="form-control w-100" name="company" id="company">
                  <span class="help-block"><?php echo $company_err; ?></span>
                </div>
                <div class="col-6 <?php echo (!empty($product_type_err)) ? 'has-error' : ''; ?>">
                  <label for="product">Product Type</label>
                  <input type="text" class="form-control w-100" name="product_type" id="product" placeholder="e.g Shoes, Bags, Hair">
                  <span class="help-block"><?php echo $product_type_err; ?></span>
                </div>
              </div>
            </div>
            <div class="col-lg-12 form-group" id="merchant">
              <div class="row">
                <div class="col-lg-12 <?php echo (!empty($company_err)) ? 'has-error' : ''; ?>">
                  <label for="company">Company Name</label>
                  <input type="text" class="form-control w-100" name="company" id="company">
                  <span class="help-block"><?php echo $company_err; ?></span>
                </div>
              </div>
            </div>
            <div class="col-lg-12 form-group">
              <button class="btn btn-dark" type="submit">Register</button>
            </div>
          </div>
        </form>
      </div>
      <!-- SUMMARY-->
      <div class="col-lg-4">
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
          <div class="card-body">
            <p>Already Having an account?</p>
            <a class="btn btn-dark" href="login.php">Login</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
include 'layout/footer.php';
?>