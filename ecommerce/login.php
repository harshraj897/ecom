<?php
session_start();
include("config.php");

if (isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$query="SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result=mysqli_query($con,$query); 
	 mysqli_num_rows($result);
    if (mysqli_num_rows($result) == 1)
     {
     	$row=mysqli_fetch_assoc($result);
        $_SESSION['user_id']=$row['id'];
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login page</title>
</head>
<style>
	h1{
		padding: 45px;
	}
	.login-box
	{
		background-color:#eee;color:black;text-align: center;height: 572px;
	}
	form input, form button {
    display: block;
    margin: 10px auto;
    padding: 10px;
    width: 250px;
}
</style>
<body>
	<div class="login-box">
		<h1>LOGIN PAGE</h1>
	<form method="POST">
		<input type="text" name="username" placeholder="username" required><br>
		<input type="password" name="password" placeholder="password" required><br>
		<button type="text" name="login">Login</button>
	</form><br>
	Don't have an account? <a href="signup.php">Sign up</a>
</div>
</body>
</html>

