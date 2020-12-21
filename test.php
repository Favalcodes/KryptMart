<div class="card mt-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3">
                      <h6>Product Images</h6>
                    </div>
                    <div class="col-lg-3">
                      <h6>Name</h6>
                    </div>
                    <div class="col-lg-3">
                      <h6>Price</h6>
                    </div>
                    <div class="col-lg-3">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
              <?php
                        while ($row = mysqli_fetch_array($productresult)) {
                          ?>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3">
                   <img src="productimages/<?php echo $row["id"]; ?>/<?php echo $row["image_1"]; ?>" alt="" style="height: 100px; width: 80px"> 
                    </div>
                    <div class="col-lg-3">
                    <?php echo $row["p_name"]; ?>
                    </div>
                    <div class="col-lg-3">
                    Eth <?php echo $row["amount"]; ?>
                    </div>
                    <div class="col-lg-3">
                      <div class="btn">Edit</div>
                      <div class="btn text-danger">Delete</div>
                    </div>
                    <?php
                        } ?>
                  </div>
                </div>
              </div>






include 'm_img.php';

$productSaved = FALSE;

if (isset($_POST['submit'])) {
    /*
     * Read posted values.
     */
    $productName = isset($_POST['p_name']) ? $_POST['p_name'] : '';
    $productCategory = isset($_POST['category']) ? $_POST['category'] : '';
    $productAmount = isset($_POST['amount']) ? $_POST['amount'] : '';
    $productDiscount = isset($_POST['discount']) ? $_POST['discount'] : '';
    $productTag = isset($_POST['tags']) ? $_POST['tags'] : '';
    $productMoq = isset($_POST['moq']) ? $_POST['moq'] : '';
    $prod = isset($_POST['product']) ? $_POST['product'] : '';
    $productDownload = isset($_POST['download']) ? $_POST['download'] : '';
    $productDescription = isset($_POST['description']) ? $_POST['description'] : '';

    /*
     * Validate posted values.
     */
    
    if (empty($productName)) {
        $errors[] = 'Please provide a product name.';
    }

    if (empty($productCategory)) {
        $errors[] = 'Please provide a product name.';
    }

    if (empty($productAmount)) {
        $errors[] = 'Please provide a product name.';
    }

    if (empty($productDiscount)) {
        $errors[] = 'Please provide a product name.';
    }

    if (empty($productTag)) {
        $errors[] = 'Please provide a product name.';
    }

    if (empty($productMoq)) {
        $errors[] = 'Please provide a product name.';
    }

    if (empty($prod)) {
        $errors[] = 'Please provide a product name.';
    }

    if (empty($productDownload)) {
        $errors[] = 'Please provide a product name.';
    }

    if (empty($productDescription)) {
        $errors[] = 'Please provide a description.';
    }

    /*
     * Create "uploads" directory if it doesn't exist.
     */
    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0777, true);
    }

    /*
     * List of file names to be filled in by the upload script 
     * below and to be saved in the db table "products_images" afterwards.
     */
    $filenamesToSave = [];

    $allowedMimeTypes = explode(',', UPLOAD_ALLOWED_MIME_TYPES);

    /*
     * Upload files.
     */
    if (!empty($_FILES)) {
        if (isset($_FILES['file']['error'])) {
            foreach ($_FILES['file']['error'] as $uploadedFileKey => $uploadedFileError) {
                if ($uploadedFileError === UPLOAD_ERR_NO_FILE) {
                    $errors[] = 'You did not provide any files.';
                } elseif ($uploadedFileError === UPLOAD_ERR_OK) {
                    $uploadedFileName = basename($_FILES['file']['name'][$uploadedFileKey]);

                    if ($_FILES['file']['size'][$uploadedFileKey] <= UPLOAD_MAX_FILE_SIZE) {
                        $uploadedFileType = $_FILES['file']['type'][$uploadedFileKey];
                        $uploadedFileTempName = $_FILES['file']['tmp_name'][$uploadedFileKey];

                        $uploadedFilePath = rtrim(UPLOAD_DIR, '/') . '/' . $uploadedFileName;

                        if (in_array($uploadedFileType, $allowedMimeTypes)) {
                            if (!move_uploaded_file($uploadedFileTempName, $uploadedFilePath)) {
                                $errors[] = 'The file "' . $uploadedFileName . '" could not be uploaded.';
                            } else {
                                $filenamesToSave[] = $uploadedFilePath;
                            }
                        } else {
                            $errors[] = 'The extension of the file "' . $uploadedFileName . '" is not valid. Allowed extensions: JPG, JPEG, PNG, or GIF.';
                        }
                    } else {
                        $errors[] = 'The size of the file "' . $uploadedFileName . '" must be of max. ' . (UPLOAD_MAX_FILE_SIZE / 1024) . ' KB';
                    }
                }
            }
        }
    }

    /*
     * Save product and images.
     */
    if (!isset($errors)) {
        /*
         * The SQL statement to be prepared. Notice the so-called markers, 
         * e.g. the "?" signs. They will be replaced later with the 
         * corresponding values when using mysqli_stmt::bind_param.
         * 
         * @link http://php.net/manual/en/mysqli.prepare.php
         */
        $sql = 'INSERT INTO products (
                    p_name, category, amount, discount, tags, description, moq, product, download
                ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?
                )';

        /*
         * Prepare the SQL statement for execution - ONLY ONCE.
         * 
         * @link http://php.net/manual/en/mysqli.prepare.php
         */
        $statement = $connection->prepare($sql);

        /*
         * Bind variables for the parameter markers (?) in the 
         * SQL statement that was passed to prepare(). The first 
         * argument of bind_param() is a string that contains one 
         * or more characters which specify the types for the 
         * corresponding bind variables.
         * 
         * @link http://php.net/manual/en/mysqli-stmt.bind-param.php
         */
        $statement->bind_param('sssssssss', $productName, $productCategory, $productAmount, $productDiscount, $productTag, $productMoq, $productDescription, $prod, $productDownload);

        /*
         * Execute the prepared SQL statement.
         * When executed any parameter markers which exist will 
         * automatically be replaced with the appropriate data.
         * 
         * @link http://php.net/manual/en/mysqli-stmt.execute.php
         */
        $statement->execute();

        // Read the id of the inserted product.
        $lastInsertId = $connection->insert_id;

        /*
         * Close the prepared statement. It also deallocates the statement handle.
         * If the statement has pending or unread results, it cancels them 
         * so that the next query can be executed.
         * 
         * @link http://php.net/manual/en/mysqli-stmt.close.php
         */
        $statement->close();

        /*
         * Save a record for each uploaded file.
         */
        foreach ($filenamesToSave as $filename) {
            $sql = 'INSERT INTO products_images (
                        product_id,
                        filename
                    ) VALUES (
                        ?, ?
                    )';

            $statement = $connection->prepare($sql);

            $statement->bind_param('is', $lastInsertId, $filename);

            $statement->execute();

            $statement->close();
        }

        /*
         * Close the previously opened database connection.
         * 
         * @link http://php.net/manual/en/mysqli.close.php
         */
        $connection->close();

        $productSaved = TRUE;

        /*
         * Reset the posted values, so that the default ones are now showed in the form.
         * See the "value" attribute of each html input.
         */
        $productName = $productCategory = $productAmount = $productDiscount = $productTag = $productMoq = $productDescription = $prod = $productDownload = NULL;
    }
}








if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
  $phone=$_POST['phone'];
  $password_1=$_POST['password'];
  $confirm=$_POST['confirm_password'];
  $country=$_POST['country'];
	$role=$_POST['role'];
	$username=$_POST['username'];
	$store=$_POST['store_name'];
	$company=$_POST['company'];
	$type=$_POST['product_type'];
  $comp=$_POST['comp'];
  if ($password_1 != $confirm) {
		array_push($errors, "The two passwords do not match");
  }
  $password = md5($password_1);
//for getting product id
$query=mysqli_query($link,"select max(id) as pid from users");
	$result=mysqli_fetch_array($query);
	//  $productid=$result['pid']+1;
	// $dir="productimages/$productid";
	// $path="manuproduct/$productid";
	// mkdir($dir);// directory creation for product images
	// mkdir($path);// directory creation for product
	// move_uploaded_file($_FILES["image_1"]["tmp_name"],"productimages/$productid/".$_FILES["image_1"]["name"]);
	// move_uploaded_file($_FILES["image_2"]["tmp_name"],"productimages/$productid/".$_FILES["image_2"]["name"]);
	// move_uploaded_file($_FILES["image_3"]["tmp_name"],"productimages/$productid/".$_FILES["image_3"]["name"]);
	// move_uploaded_file($_FILES["image_4"]["tmp_name"],"productimages/$productid/".$_FILES["image_4"]["name"]);
	// move_uploaded_file($_FILES["product"]["tmp_name"],"manuproduct/$productid/".$_FILES["product"]["name"]);
$sql=mysqli_query($link,"insert into users (fname,lname,email,phone,password,country,role,username,store_name,company,product_type,comp) values('$fname','$lname','$email','$phone','$password','$country','$role','$username','$store','$company','$type','$comp')");
echo "<script>alert('user Inserted Successfully!')</script>";
header("location: login.php");

}