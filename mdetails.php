<?php
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$productname=$_POST['p_name'];
	$productamount=$_POST['amount'];
	$discount=$_POST['discount'];
    $moq=$_POST['moq'];
	$download=$_POST['download'];
	$productdescription=$_POST['description'];
	$tags=$_POST['tags'];
	$prod=$_FILES["product"]["name"];
	// $product=$_POST['product'];
	$productimage1=$_FILES["image_1"]["name"];
	$productimage2=$_FILES["image_2"]["name"];
	$productimage3=$_FILES["image_3"]["name"];
	$productimage4=$_FILES["image_4"]["name"];
//for getting product id
$query=mysqli_query($link,"select max(id) as pid from manufacture");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="productimages/$productid";
	$path="manuproduct/$productid";
	mkdir($dir);// directory creation for product images
	mkdir($path);// directory creation for product
	move_uploaded_file($_FILES["image_1"]["tmp_name"],"productimages/$productid/".$_FILES["image_1"]["name"]);
	move_uploaded_file($_FILES["image_2"]["tmp_name"],"productimages/$productid/".$_FILES["image_2"]["name"]);
	move_uploaded_file($_FILES["image_3"]["tmp_name"],"productimages/$productid/".$_FILES["image_3"]["name"]);
	move_uploaded_file($_FILES["image_4"]["tmp_name"],"productimages/$productid/".$_FILES["image_4"]["name"]);
	move_uploaded_file($_FILES["product"]["tmp_name"],"manuproduct/$productid/".$_FILES["product"]["name"]);
$sql=mysqli_query($link,"insert into manufacture (user_id,category,amount,discount,moq,description,tags,p_name,image_1,image_2,image_3,image_4,download, product) values('$_SESSION[id]','$category','$productamount','$discount','$moq','$productdescription','$tags','$productname','$productimage1','$productimage2','$productimage3', '$productimage4', '$download', '$prod')");
echo "<script>alert('Product Inserted Successfully!')</script>";

}
?>