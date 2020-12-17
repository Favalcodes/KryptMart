<?php

// include registration php
include 'regdetail.php';

// include header
include 'layout/header.php'
?>
    <div class="container">
      <!-- HERO SECTION-->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
              <h1 class="h2 text-uppercase mb-0">Add Admin</h1>
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
            <form action="#">
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label class="text-small text-uppercase" for="firstName">First name</label>
                  <input class="form-control form-control-lg" id="firstName" type="text"
                    placeholder="Enter your first name">
                </div>
                <div class="col-lg-6 form-group">
                  <label class="text-small text-uppercase" for="lastName">Last name</label>
                  <input class="form-control form-control-lg" id="lastName" type="text"
                    placeholder="Enter your last name">
                </div>
                <div class="col-lg-6 form-group">
                  <label class="text-small text-uppercase" for="email">Email address</label>
                  <input class="form-control form-control-lg" id="email" type="email"
                    placeholder="e.g. Jason@example.com">
                </div>
                <div class="col-lg-6 form-group">
                  <label class="text-small text-uppercase" for="phone">Phone number</label>
                  <input class="form-control form-control-lg" id="phone" type="tel" placeholder="e.g. +02 245354745">
                </div>
                <div class="col-lg-6 form-group">
                  <label class="text-small text-uppercase" for="password">Password</label>
                  <input class="form-control form-control-lg" name="password" id="password" type="password"
                    placeholder="Your Password">
                </div>
                <div class="col-lg-6 form-group">
                  <label class="text-small text-uppercase" for="password">Confirm Password</label>
                  <input class="form-control form-control-lg" name="password" id="password" type="password"
                    placeholder="Your Password">
                </div>
                <div class="col-lg-12 form-group">
                  <label class="text-small text-uppercase" for="country">Country</label>
                  <select class="selectpicker country" id="country" data-width="fit"
                    data-style="form-control form-control-lg" data-title="Select your country"></select>
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
                <h5 class="text-uppercase mb-4">Note</h5>
                <p>This section is only for KryptMart Administrators, only go through if you are an admin or go back to <a href="index.html">Home</a> if you are not.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php
    include 'layout/footer.php';
    ?>