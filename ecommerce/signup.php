<?php
session_start();
include("config.php");
if(isset($_POST['signup']))
{
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	//$confirmpassword = $_POST['confirmpassword'];
	$check="SELECT * FROM users WHERE email='$email' AND username='$username'";
	$result=mysqli_query($con,$check);
	mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		$insert="INSERT INTO users(username,email,password)VALUES('$username','$email','$password')";
		if(mysqli_query($con,$insert))
		{
			$user_id=mysqli_insert_id($con);
			 $_SESSION['user_id']=$user_id;
			header("Location:index.php");
		}else{
			echo "<script>alert('Username or email already exists');</script>";
			exit;
	}
	}
}
	?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign up page</title>
</head>
<style>
	h1{
		padding: 15px;
	}
	.signup-box{
		background-color: #eee;
		color: black;
		text-align: center;
		height: 572px;
	}
	form input, form button {
    display: block;
    margin: 10px auto;
    padding: 10px;
    width: 250px;
}
</style>
<body>
	<div class="signup-box">
	<h1>SIGN UP</h1>
	<form method="POST">
		<input type="text" name="username" placeholder="username" required><br>
		<input type="email" name="email" placeholder="email" required><br>
		<input type="password" name="password" placeholder="create password" required><br>
		<!--<input type="password" name="confirmpassword" placeholder="confirm password" required><br>-->
		<button type="submit" name="signup">Sign up</button>
	</form>
	Already have an account! <a href="login.php">Login</a>
	</div>
</body>
</html>
