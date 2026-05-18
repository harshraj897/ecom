<?php if(session_status()==PHP_SESSION_NONE){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
   <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
<script>
    function toggleMenu(){
        var menu=document.getElementById("navmenu").classList.toggle("active");
    }
</script>

	<style>
        .header {
    background-color: seagreen;
    padding: 10px 0;
}
.header-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
        .menu-toggle{
            display: none;
            flex-direction: column;
            cursor: pointer;
        }
        .menu-toggle span{
            height: 3px;
            width: 25px;
            background: white;
            margin: 4px 0;
        }
        @media (max-width:768px){
            .menu-toggle{
                display: flex;
                z-index: 1001;
            }
            .nav-left{
                display: none;
                position: absolute;top: 60px;left: 0;width: 100%;background: seagreen;z-index: 1000;
            }
            .nav-left ul{
                flex-direction: column;
                align-items: center;
            }
            .nav-left ul li{
                margin: 10px 0;
            }
            .nav-right{
                display: none;
            }
            .nav-left.active{
                display: block;
            }
        }


/* LEFT MENU */
.mainnav {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.mainnav li {
    margin-right: 20px;
}

.mainnav li a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
}

.mainnav li a:hover {
    text-decoration: underline;
}

/* BRAND */
.brand {
    color: #fff;
    font-size: 22px;
    font-weight: bold;
}

/* RIGHT SIDE */
.nav-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

.cart-link {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
}

/* SEARCH */
.search-form {
    display: flex;
}

.search-form input {
    padding: 5px 10px;
    border: none;
    outline: none;
    width: 180px;
}

.search-form button {
    padding: 5px 12px;
    border: none;
    background: #fff;
    color: seagreen;
    cursor: pointer;
    font-weight: bold;
}

.search-form button:hover {
    background: #f1f1f1;
}
.icon{
    font-size: 25px;
}
	</style>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
</head>

<div class="header">
    <div class="container">
        <div class="header-row">
            <div class="menu-toggle" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="nav-left" id="navmenu">
          
<ul class="mainnav">
    <li><a href="index.php">Home</a></li>
    <li><a href="index.php?page=category">Category</a></li>
    <li><a href="index.php?page=aboutus">About Us</a></li>
    <li><a href="index.php?page=contactus">Contact Us</a></li>

    <?php
    if (isset($_SESSION['user_id'])) {
        echo '<li><a href="myaccount.php">My Account</a></li>';
        echo '<li><a href="logout.php">Logout</a></li>';
    } else {
        echo '<li><a href="login.php">Login</a></li>';
    }
    ?>
</ul>
            </div>

            <div class="brand">SmartBazaar</div>

            <div class="nav-right">
                <a href="viewCart.php" class="cart-link" style="text-decoration: none;">
                    <i class="icart"></i>
                    <div class="icon">
                    🛒
                </div>
                    <!--(<?php// echo $cart->total_items(); ?>)-->
                </a>

                <form action="search.php" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Search products..." required>
                    <button type="submit">Search</button>
                </form>
            </div>

        </div>
    </div>
</div>
