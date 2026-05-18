<?php
include("config.php");
//$result = mysqli_query($con, "SELECT * FROM products");
$limit=3;
if(isset($_GET['pg'])){
    $page=(int)$_GET['pg'];
}
if((int)$page<1){
    $page=1;
}

$start=($page - 1)* $limit;
$result =mysqli_query($con,"SELECT * FROM  products LIMIT $start,$limit");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>All Products</h2>
    <table border="1">
        <tr>
            <th>ID</th><th>Name</th><th>Price</th><th>Description</th><th>Image</th><th>Update</th><th>Delete</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>₹<?php echo $row['price']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><img src="../image/<?php echo $row['image']; ?>" width="80"></td>
                <td><a href="index.php?page=editproduct&edit=<?php echo $row['id'];?>"<button style="border:1px solid;background-color: #eee;padding:5px;text-decoration: none;">UPDATE</button</a></td>
                <td><a href="deleteproduct.php?id=<?php echo $row['id'];?>"onclick ="return confirm('Are you sure to delete the product?');"><button style="border:1px solid;background-color: red;padding:5px;text-decoration: none;">DELETE</button</a></td>
            </tr>
        <?php } ?>
    </table>
    <?php
    $total=mysqli_query($con,"SELECT * FROM products");
    $total_rows=mysqli_num_rows($total);
    $total_pages=ceil($total_rows/$limit);
     for($i=1;$i<=$total_pages;$i++){
        echo "<a href='?page=viewproduct&pg=$i'> $i </a>";
     }
    ?>
</button>
</body>
</html>