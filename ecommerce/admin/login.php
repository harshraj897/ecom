
<?php
session_start();
include("config.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM main_admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $query);
     mysqli_num_rows($result);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location:index.php");
        exit;
    } else {
        echo "<script>alert('Invalid Credentials!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>