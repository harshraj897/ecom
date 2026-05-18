
<?php
include("config.php");
$getid=isset($_GET['edit'])?
$_GET['edit']:'';
$select="SELECT * FROM products WHERE id='$getid'";

$qry=mysqli_query($con,$select);
$old=mysqli_fetch_assoc($qry);
if(isset($_POST['update']))
{
	$productname=(isset($_POST['productname']) && $_POST['productname'] !== "")?  $_POST['productname']:$old['name'];
	$productprice=(isset($_POST['productprice'])&& $_POST['productprice'] !== "")?  $_POST['productprice']:$old['price'];
	$productcategory=(isset($_POST['productcategory'])&& $_POST['productcategory'] !== "")?  $_POST['productcategory']:$old['category'];
	$productdescription=(isset($_POST['productdescription'])&& $_POST['productdescription'] !== "")?  $_POST['productdescription']:$old['description'];

	$newimage=$_FILES['productimage']['name'];
	$tmp_image=$_FILES['productimage']['tmp_name'];
	if($newimage != ""){
		$image_path="../image/".$newimage;
		move_uploaded_file($tmp_image, $image_path);
	}else{
		$newimage=$old['image'];
	}
	$update="UPDATE products SET name='$productname',price='$productprice',category='$productcategory',description='$productdescription' ,image ='$newimage' WHERE id='$getid'";
	$query=mysqli_query($con,$update);
	if($query)
	{
		echo "<script>alert('Product updated successfully');</script>";
		header("location:index.php?page=viewproduct");
	}else{
		echo "<script>alert('Error updating product');</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>edit product page</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="update-table">
		<h1>Update Product Information</h1>
	<form method="POST" enctype="multipart/form-data">
		<input type="text" name="productname" placeholder="update productname"><br>
		<input type="text" name="productprice" placeholder="update productprice"><br>
		<input type="text" name="productcategory" placeholder="update productcategory"><br>
		<textarea name="productdescription" placeholder="update productdescription"></textarea><br>
		<input type="file" name="productimage"><br>
		<button type="submit" name="update">Update</button>
	</form>
</div>
</body>
</html>