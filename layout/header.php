<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KryptMart</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Lightbox-->
  <link rel="stylesheet" href="vendor/lightbox2/css/lightbox.min.css">
  <!-- Range slider-->
  <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
  <!-- Bootstrap select-->
  <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
  <!-- Owl Carousel-->
  <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.theme.default.css">
  <!-- Google fonts-->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.png">
</head>

<body>
  <div class="page-holder">
    <!-- navbar-->
    <header class="header bg-white">
      <div class="container px-0 px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.html"><span
              class="font-weight-bold text-uppercase text-dark">KryptMart</span></a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <!-- Link--><a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <!-- Link--><a class="nav-link" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <!-- Link--><a class="nav-link" href="merchant.php">Deliver</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link" href="cart.php"> <i
                    class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray">(0)</small></a></li>
            <?php
// SQL query to select data from database 
$sql = "SELECT * FROM users where id = $_SESSION[id]";
$output = $link->query($sql) or die("Error: " . mysqli_error($link));

      if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)  {
        while ($tablerows = mysqli_fetch_array($output)) {
      ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $tablerows['fname'] ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="">Dashboard</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
        <?php }
      } else { ?>
              <li class="nav-item"><a class="nav-link" href="login.php"> Login</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="register.php"> Register</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="logout.php"> Logout</a>
              </li>
              <?php } ?>
            </ul>
          </div>
        </nav>
      </div>
    </header>