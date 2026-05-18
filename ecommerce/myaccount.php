
<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        h2, h3 {
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        .box {
            margin-bottom: 20px;
        }
        .order-box {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .login-msg {
            text-align: center;
            margin-top: 100px;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

<?php
// ❌ Not logged in
if (!isset($_SESSION['user_id'])) {
?>
    <div class="login-msg">
        <h2>Please login to continue</h2>
        <a href="login.php">Login</a>
    </div>
<?php
} else {
    // ✅ Logged in
    $user_id = $_SESSION['user_id'];

    // Fetch user data
    $userQuery = "SELECT username, email FROM users WHERE id = '$user_id'";
    $userResult = mysqli_query($con, $userQuery);
    $user = mysqli_fetch_assoc($userResult);

    // Fetch customer data using email
    $email = $user['email'];
    $customerQuery = "SELECT * FROM customers WHERE email = '$email'";
    $customerResult = mysqli_query($con, $customerQuery);
    $customer = mysqli_fetch_assoc($customerResult);
?>

<div class="container">
    <h2>My Account</h2>

    <div class="box">
        <h3>Account Details</h3>
        <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    </div>

    <?php if ($customer) { ?>
    <div class="box">
        <h3>Customer Details</h3>
        <p><strong>Name:</strong> <?php echo $customer['first_name'] . ' ' . $customer['last_name']; ?></p>
        <p><strong>Phone:</strong> <?php echo $customer['phone']; ?></p>
        <p><strong>Address:</strong> <?php echo $customer['address']; ?></p>
    </div>

    <?php
        // Fetch orders
        $customer_id = $customer['id'];
        $orderQuery = "SELECT * FROM orders WHERE customer_id = '$customer_id'";
        $orderResult = mysqli_query($con, $orderQuery);
    ?>

    <div class="box">
        <h3>My Orders</h3>

        <?php
        if (mysqli_num_rows($orderResult) > 0) {
            while ($order = mysqli_fetch_assoc($orderResult)) {
        ?>
            <div class="order-box">
                <p><strong>Order ID:</strong> <?php echo $order['id']; ?></p>
                <p><strong>Grand Total:</strong> ₹<?php echo $order['grand_total']; ?></p>
            </div>
        <?php
            }
        } else {
            echo "<p>No orders found.</p>";
        }
        ?>
    </div>

    <?php } else { ?>
        <p>No customer details found.</p>
    <?php } ?>

</div>

<?php } ?>

</body>
</html>