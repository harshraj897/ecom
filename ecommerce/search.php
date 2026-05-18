<?php
include "config.php";
include_once 'Cart.class.php'; 
$cart = new Cart; 
 include 'include/header.php';
$sqlQ = "SELECT * FROM products"; 
$stmt = $con->prepare($sqlQ); 
$stmt->execute(); 
$result = $stmt->get_result(); 

$sql= "SELECT * FROM products";
if(isset($_GET['search']))
{
    $search_name=$_GET['search'];
$get="SELECT * FROM products WHERE name LIKE '%$search_name%' OR price LIKE '%$search_name%' OR category LIKE '%$search_name%' ";
$result=mysqli_query($con,$get);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Products</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
</head>

     <h2>Search Results for:<b><?php echo $search_name; ?></b></h2>
     <div class="container">
        <div class="row">
<?php
if(isset($_GET['search'])){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){ ?>
            <?php echo "<div class ='col-md-4'>"; ?>
            <?php echo "<a href='viewproduct.php?id=".$row['id']."'style='text-decoration:none;color:black;'>";?>
                <img style="height: 100px;"src="image/<?php echo $row['image']; ?>" alt="">
                <p><?php echo $row['name']; ?></p>
                <p>₹<?php echo $row['price']; ?></p>
            </a>
           <?php echo "<a href='cartAction.php?action=addToCart&id=".$row['id']."' class='btn btn-success'>Add to Cart</a>";?>
            <?php echo "</div>";}
    } else {
        echo "<p>No matching products found.</p>";
    }
}
?>
</div>
</div>
<?php include "include/footer.php"; ?>
<body>
</html>