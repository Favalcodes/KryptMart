<?php
// Include config file
require_once "config.php";

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to home page
if (isset($_SESSION["id"])) {
  header("location: index.php");
  exit;
}

// Define variables and initialize with empty values
$fname = $lname = $email = $password = $confirm_password = $phone = $country = $role = $store_name = $company = $product_type = "";
$fname_err = $lname_err = $email_err = $password_err = $confirm_password_err = $phone_err = $country_err = $role_err = $store_name_err = $company_err = $product_type_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate First Name
  if (empty(trim($_POST["fname"]))) {
    $fname_err = "Please enter your First Name.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE fname = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_fname);

      // Set parameters
      $param_fname = trim($_POST["fname"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $fname = trim($_POST["fname"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate last name
  if (empty(trim($_POST["lname"]))) {
    $lname_err = "Please enter your Last Name.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE lname = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_lname);

      // Set parameters
      $param_lname = trim($_POST["lname"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $lname = trim($_POST["lname"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter a valid email.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE email = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_email);

      // Set parameters
      $param_email = trim($_POST["email"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          $email_err = "This email is already taken.";
        } else {
          $email = trim($_POST["email"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have atleast 6 characters.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Password did not match.";
    }
  }

  // Validate Phone
  if (empty(trim($_POST["phone"]))) {
    $phone_err = "Please enter your Phone Number.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE phone = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_phone);

      // Set parameters
      $param_phone = trim($_POST["phone"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $phone = trim($_POST["phone"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate Country
  if (empty(trim($_POST["country"]))) {
    $country_err = "Please enter your Country.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE country = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_country);

      // Set parameters
      $param_country = trim($_POST["country"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $country = trim($_POST["country"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate Role
  if (empty(trim($_POST["role"]))) {
    $role_err = "Please enter your Role.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE role = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_role);

      // Set parameters
      $param_role = trim($_POST["role"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $role = trim($_POST["role"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate Store Name
  if (empty(trim($_POST["store_name"]))) {
    $store_name_err = "Please enter your Store Name.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE store_name = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_store_name);

      // Set parameters
      $param_store_name = trim($_POST["store_name"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $store_name = trim($_POST["store_name"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate Company
  if (empty(trim($_POST["company"]))) {
    $company_err = "Please enter your Company Name.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE company = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_company);

      // Set parameters
      $param_company = trim($_POST["company"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $company = trim($_POST["company"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate Product Type
  if (empty(trim($_POST["product_type"]))) {
    $product_type_err = "Please enter Product Type.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE product_type = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_product_type);

      // Set parameters
      $param_product_type = trim($_POST["product_type"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $product_type = trim($_POST["product_type"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Check input errors before inserting in database
  if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($phone_err) && empty($country_err) && empty($role_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO users (fname, lname, email, password, phone, country, role, store_name, company, product_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssssssss", $param_fname, $param_lname, $param_email, $param_password, $param_phone, $param_country, $param_role, $param_store_name, $param_company, $param_product_type);

      // Set parameters
      $param_fname = $fname;
      $param_lname = $lname;
      $param_email = $email;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
      $param_phone = $phone;
      $param_country = $country;
      $param_role = $role;
      $param_store_name = $store_name;
      $param_company = $company;
      $param_product_type = $product_type;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {

        // Redirect to dashboard page
        header("location: login.php");
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

?>