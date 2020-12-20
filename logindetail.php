<?php

// Initialize the session
session_start();


// Check if the user is already logged in, if yes then redirect him to welcome page
// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//   header("location: dashboard.php");
//   exit;
// }

// Include config file
require_once "config.php";


// Define variables and initialize with empty values
$email = $password = $role = "";
$email_err = $password_err = $role_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter email.";
  } else {
    $email = trim($_POST["email"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Check if role is empty
  if (empty(trim($_POST["role"]))) {
    $role_err = "Please enter role.";
  } else {
    $role = trim($_POST["role"]);
  }

  // Validate credentials
  if (empty($email_err) && empty($password_err) && empty($role_err)) {
    // Prepare a select statement
    $sql = "SELECT id, email, password, role FROM users WHERE email = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_email);

      // Set parameters
      $param_email = $email;
      $param_role = $role;
      $param_password = $password;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if email exists, if yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password, $role);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashed_password)) {

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["email"] = $email;
              $_SESSION["role"] = $role;

                    if($role === "customer"){
                        // Redirect to dashboard page
                        header("location: buyer.php");
                    }elseif($role === "seller"){
                        // Redirect to dashboard page
                        header("location: vendor.php");
                    }elseif($role === "manufacturer"){
                        // Redirect to dashboard page
                        header("location: manufacturer.php");
                    }elseif($role === "merchant"){
                        // Redirect to dashboard page
                        header("location: merchant.php");
                    }else{
                      header("location: index.php");
                    }
            } else {
              // Display an error message if password is not valid
              $password_err = "The password you entered was not valid.";
            }
          }
        } else {
          // Display an error message if username doesn't exist
          $email_err = "No account found with that Email.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Close connection
  mysqli_close($link);
}
