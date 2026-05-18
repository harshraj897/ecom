<?php
// index.php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; // default page
?>

<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
    <style>
        ul{
            list-style: none;
        }
        ul li{
            padding: 12px;
        }
        ul li a{
            text-decoration: none;color: #fff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="background-color:#333333; color:#fff;"><h1 style="color:#fff;height:80px;padding: 12px;">WELCOME TO ADMIN PANEL</h1></div>
        <div class="row">
            <div class="col-md-3" style="background-color:lightslategrey; height: 1000px;">
	 <h1>Welcome, <?php echo $_SESSION['admin']; ?> </h1>
        <ul>
        <li><a href="index.php?page=dashboard">Dashboard</a></li>
        <li><a href="index.php?page=insertproducts">Insert product</a></li>
        <li><a href="index.php?page=viewproduct">View product</a></li>
        <li><a href="index.php?page=vieworder">View order</a></li>
        <li><a href="index.php?page=logout">Logout</a></li>
    </ul>
    
</div>
<div class="col-md-9">
 <?php
      $file = $page . '.php';
      if (file_exists($file)) {
        include($file);
      } else {
        echo "<h3>Page not found!</h3>";
      }
      ?>
</div>
</div>
</div>
</body>
</html>
