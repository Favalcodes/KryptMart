<?php

// include login php
include 'logindetail.php';

// include header
include 'layout/head.php';
?>
    <div class="container">
      <!-- HERO SECTION-->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
              <h1 class="h2 text-uppercase mb-0">Welcome</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Login</li>
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
                <div class="col-lg-6 form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                  <label class="text-small text-uppercase" for="email">Email</label>
                  <input class="form-control form-control-lg" name="email" id="email" type="text"
                  value="<?php echo $email; ?>">
                  <span class="help-block"><?php echo $email_err; ?></span>
                </div>
                <div class="col-lg-6 form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                  <label class="text-small text-uppercase" for="password">Password</label>
                  <input class="form-control form-control-lg" name="password" id="password" type="password"
                    placeholder="Enter your Password">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="col-lg-12 form-group <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">
              <!-- <label class="text-small text-uppercase" for="role">Role</label> -->
              <select class="form-control" id="rol" name="role" hidden>
                <option hidden>Select Role</option>
                <option value="customer">Customer</option>
                <option value="seller">Vendor/Seller</option>
                <option value="manufacturer">Manufacturer</option>
                <option value="merchant">Delivery Merchant</option>
              </select>
              <span class="help-block"><?php echo $role_err; ?></span>
            </div>
                <div class="col-lg-12 form-group">
                  <button class="btn btn-dark" type="submit">Login</button>
                </div>
              </div>
            </form>
          </div>
          <!-- SUMMARY-->
          <div class="col-lg-4">
            <div class="card border-0 rounded-0 p-lg-4 bg-light">
              <div class="card-body">
                <p>Don't have an account?</p>
                <a class="btn btn-dark" href="register.php">Register</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php
    include 'layout/footer.php';
    ?>