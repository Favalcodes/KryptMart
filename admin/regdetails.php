<?php
// Include config file
require_once "config.php";


// Check if the user is already logged in, if yes then redirect him to home page
if (isset($_SESSION["id"])) {
  header("location: home.php");
  exit;
}

// Define variables and initialize with empty values
$fname = $lname = $email = $password = $confirm_password = $phone = $country = "";
$fname_err = $lname_err = $email_err = $password_err = $confirm_password_err = $phone_err = $country_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate First Name
  if (empty(trim($_POST["fname"]))) {
    $fname_err = "Please enter your First Name.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM admin WHERE fname = ?";

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
    $sql = "SELECT id FROM admin WHERE lname = ?";

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
    $sql = "SELECT id FROM admin WHERE email = ?";

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
    $sql = "SELECT id FROM admin WHERE phone = ?";

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
    $sql = "SELECT id FROM admin WHERE country = ?";

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


  // Check input errors before inserting in database
  if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($phone_err) && empty($country_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO admin (fname, lname, email, password, phone, country) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssss", $param_fname, $param_lname, $param_email, $param_password, $param_phone, $param_country);

      // Set parameters
      $param_fname = $fname;
      $param_lname = $lname;
      $param_email = $email;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
      $param_phone = $phone;
      $param_country = $country;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {


        // Redirect to dashboard page
        header("location: index.php");
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