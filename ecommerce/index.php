
<?php 
// Include the database connection file 
require_once 'include/dbconnect.php'; 
 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// Fetch products from the database 
$sqlQ = "SELECT * FROM products"; 
$stmt = $con->prepare($sqlQ); 
$stmt->execute(); 
$result = $stmt->get_result(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMMERCE STORE</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
</head>
<body>
    <div style="background-color:#eee;color:black;text-align: center;" class ="container-fluid table-bordered table-responsive";>
    <?php include("include/header.php"); 
    ?>
    <div>
    <?php
        if(isset($_GET['page']))
        {
            $page=$_GET['page'];
            $file=$page . ".php";
            if(file_exists($file))
            {
                include($file);
            }
            else{
                echo "<p> page not found </p>";
            }
        }
            else{
      
        echo '<div class="row">';
        
       global $con;
       $getdata=mysqli_query($con, "SELECT * FROM products");
            if(mysqli_num_rows($getdata)>0)
               
            while($fetch_data=mysqli_fetch_assoc($getdata))
        {
            echo "<div class ='col-md-4' >";
            echo "<div style='margin-top:15px;text-align:center;'>";
            echo "<a href='viewproduct.php?id=".$fetch_data['id']."'style='text-decoration:none;color:black;'>";
            echo "<img src='image/".$fetch_data['image']." 'width='100' height='100'><br>";
            echo "<p>". $fetch_data['name'] . "</p>" ;
            echo "<p>"."₹ ". $fetch_data['price'] . "</p>" ;
           "</a>";
            
            echo "<a href='cartAction.php?action=addToCart&id=".$fetch_data['id']."' class='btn btn-success'>Add to Cart</a>";
            echo "</div>";
             echo "</div>";
            
        }
        else{
            echo "NO PRODUCTS FOUND";
        }
    }
        ?>

      
       </div>
    </div> 
      <div> <?php include("include/footer.php"); ?></div>
</body>
</html>