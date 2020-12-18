<?php

// Define variables and initialize with empty values
$p_name = $category = $amount = $discount = $tags = $moq = $description = $image_1 = $image_2 = $image_3 = $image_4 = $product = $download = "";
$p_name_err = $category_err = $amount_err = $discount_err = $tags_err = $moq_err = $description_err = $image_1_err = $image_2_err = $image_3_err = $image_4_err = $product_err = $download_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate Product Name
  if (empty(trim($_POST["p_name"]))) {
    $p_name_err = "Please enter the Product Name.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM products WHERE p_name = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_p_name);

      // Set parameters
      $param_p_name = trim($_POST["p_name"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $p_name = trim($_POST["p_name"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate category
  if (empty(trim($_POST["category"]))) {
    $category_err = "Please enter Category.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM products WHERE category = ?";

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

  // Validate amount
  if (empty(trim($_POST["amount"]))) {
    $amount_err = "Please enter a valid amount.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM products WHERE amount = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_amount);

      // Set parameters
      $param_amount = trim($_POST["amount"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
          $amount = trim($_POST["amount"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate tags
  if (empty(trim($_POST["tags"]))) {
    $tags_err = "Please enter Tags.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM products WHERE tags = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_tags);

      // Set parameters
      $param_tags = trim($_POST["tags"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $tags = trim($_POST["tags"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate moq
  if (empty(trim($_POST["moq"]))) {
    $moq_err = "Please enter your moq.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM products WHERE moq = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_moq);

      // Set parameters
      $param_moq = trim($_POST["moq"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $moq = trim($_POST["moq"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate description
  if (empty(trim($_POST["description"]))) {
    $description_err = "Please enter Description.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM products WHERE description = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_description);

      // Set parameters
      $param_description = trim($_POST["description"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        $description = trim($_POST["description"]);
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

//   // Validate image_1
//   if (empty(trim($_POST["image_1"]))) {
//     $image_1_err = "Please Upload Image.";
//   } else {
//     // Prepare a select statement
//     $sql = "SELECT id FROM products WHERE image_1 = ?";

//     if ($stmt = mysqli_prepare($link, $sql)) {
//       // Bind variables to the prepared statement as parameters
//       mysqli_stmt_bind_param($stmt, "s", $param_image_1);

//       // Set parameters
//       $param_image_1 = trim($_POST["image_1"]);

//       // Attempt to execute the prepared statement
//       if (mysqli_stmt_execute($stmt)) {
//         /* store result */
//         mysqli_stmt_store_result($stmt);
//         $image_1 = trim($_POST["image_1"]);
//       } else {
//         echo "Oops! Something went wrong. Please try again later.";
//       }

//       // Close statement
//       mysqli_stmt_close($stmt);
//     }
//   }
  
  // Validate Product
//   if (empty(trim($_POST["product"]))) {
//     $product_err = "Please Upload Product.";
//   } else {
//     // Prepare a select statement
//     $sql = "SELECT id FROM products WHERE product = ?";

//     if ($stmt = mysqli_prepare($link, $sql)) {
//       // Bind variables to the prepared statement as parameters
//       mysqli_stmt_bind_param($stmt, "s", $param_product);

//       // Set parameters
//       $param_product = trim($_POST["product"]);

//       // Attempt to execute the prepared statement
//       if (mysqli_stmt_execute($stmt)) {
//         /* store result */
//         mysqli_stmt_store_result($stmt);
//         $product = trim($_POST["product"]);
//       } else {
//         echo "Oops! Something went wrong. Please try again later.";
//       }

//       // Close statement
//       mysqli_stmt_close($stmt);
//     }
//   }

//   // Validate Product Type
//   if (empty(trim($_POST["download"]))) {
//     $download_err = "Please enter Number of downloads.";
//   } else {
//     // Prepare a select statement
//     $sql = "SELECT id FROM products WHERE download = ?";

//     if ($stmt = mysqli_prepare($link, $sql)) {
//       // Bind variables to the prepared statement as parameters
//       mysqli_stmt_bind_param($stmt, "s", $param_download);

//       // Set parameters
//       $param_download = trim($_POST["download"]);

//       // Attempt to execute the prepared statement
//       if (mysqli_stmt_execute($stmt)) {
//         /* store result */
//         mysqli_stmt_store_result($stmt);
//         $download = trim($_POST["download"]);
//       } else {
//         echo "Oops! Something went wrong. Please try again later.";
//       }

//       // Close statement
//       mysqli_stmt_close($stmt);
//     }
//   }

  // Check input errors before inserting in database
  if (empty($p_name_err) && empty($category_err) && empty($amount_err) && empty($image_1_err) && empty($tags_err) && empty($moq_err) && empty($description_err) && empty($download_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO products (p_name, category, amount, discount, tags, moq, description, image_1, image_2, image_3, image_4, product, download) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssssssssssss", $param_p_name, $param_category, $param_amount, $param_discount, $param_tags, $param_moq, $param_description, $param_image_1, $param_image_2, $param_image_3, $param_image_4, $param_product, $param_download);

      // Set parameters
      $param_p_name = $p_name;
      $param_category = $category;
      $param_amount = $amount;
      $param_discount = $discount;
      $param_tags = $tags;
      $param_moq = $moq;
      $param_description = $description;
      $param_download = $download;
      $param_product = $product;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {

        echo "<script>window.alert('Product Uploaded Successfully')</script>";
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