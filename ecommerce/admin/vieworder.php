
<?php
include("config.php");
//$result = mysqli_query($con, "SELECT * FROM orders");

$limit=10;
if(isset($_GET['pg'])){
    $page=(int)$_GET['pg'];
}
if((int)$page<1){
    $page=1;
}

$start=($page - 1)* $limit;
$result =mysqli_query($con,"SELECT * FROM  orders LIMIT $start,$limit");
$count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Total Orders: <?php echo $count; ?></h2>
    <table border="1">
        <tr>
            <th>Order ID</th><th>Customer</th><th>Total Amount</th><th>Status</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo "#".$row['id']; ?></td>
                <td><?php echo $row['customer_id']; ?></td>
                <td><?php echo $row['grand_total']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <?php
    $total=mysqli_query($con,"SELECT * FROM orders");
    $total_rows=mysqli_num_rows($total);
    $total_pages=ceil($total_rows/$limit);
     for($i=1;$i<=$total_pages;$i++){
        echo "<a href='?page=vieworder&pg=$i'> $i </a>";
     }
    ?>
</body>
</html>