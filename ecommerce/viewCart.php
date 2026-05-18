<?php 
// Include the configuration file 
require_once 'config.php'; 
 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<title>View Cart - PHP Shopping Cart</title>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>

<script>
function updateCartItem(obj,id){
    $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
        if(data == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>
</head>
<body>
<div class="container">
    <h1>🛒 SHOPPING CART</h1>
    <div class="row">
        <div class="cart">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped cart">
                        <thead>
                            <tr>
                                <th width="10%"></th>
                                <th width="35%">Product</th>
                                <th width="15%">Price</th>
                                <th width="15%">Quantity</th>
                                <th width="20%">Total</th>
                                <th width="5%"> </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if($cart->total_items() > 0){ 
                            // Get cart items from session 
                            $cartItems = $cart->contents(); 
                            foreach($cartItems as $item){ 
                                $proImg = !empty($item["image"])?'image/'.$item["image"]:'image/demo-img.png'; 
                        ?>
                            <tr>
                                <td><img src="<?php echo $proImg; ?>" alt="..." style="height: 80px;"></td>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo "₹ ".$item["price"].' '?></td>
                                <td><input class="form-control" type="text" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/></td>
                                <td><?php echo "₹ ".$item["price"]*$item["qty"].' '?></td>
                                <td><button class="btn btn-md btn-danger" onclick="return confirm('Are you sure to remove cart item?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;" title="Remove Item"><i></i>Remove item </button> </td>
                            </tr>
                        <?php } }else{ ?>
                            <tr><td colspan="6"><p>Your cart is empty.....</p></td>
                        <?php } ?>
                        <?php if($cart->total_items() > 0){ ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Cart Total</strong></td>
                                <td><strong><?php echo "₹ ".$cart->total().' ' ?></strong></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="index.php" class="btn btn-block btn-secondary"><i class="ialeft"></i>Continue Shopping</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php if($cart->total_items() > 0){ ?>
                        <a href="checkout.php" class="btn btn-block btn-primary">Proceed to Checkout<i class="iaright"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>