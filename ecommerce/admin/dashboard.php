
<?php
include("config.php");

// Protect the page
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
// Fetch counts
$product_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM products"))['total'];
$order_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM orders"))['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <U> <h2>Dashboard Overview</h2></U>

    <div class="stats">
        <div class="card"> <h1>Products: <?php echo $product_count; ?></h1></div>
        <div class="card"> <h2>Orders: <?php echo $order_count; ?></h2></div>
    </div>
    <br>
</body>
</html>