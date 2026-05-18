
<?php

include 'config.php';
include_once 'Cart.class.php'; 
$cart = new Cart; 
 include 'include/header.php';
// Fetch products from the database 
$sqlQ = "SELECT * FROM products"; 
$stmt = $con->prepare($sqlQ); 
$stmt->execute(); 
$result = $stmt->get_result(); 
?>
<?php


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Simple, safe query (LIMIT 1)
    $getdata = mysqli_query($con, "SELECT * FROM products WHERE id = $id LIMIT 1");

    if ($getdata && mysqli_num_rows($getdata) > 0) {
        $fetch_data = mysqli_fetch_assoc($getdata);

        $image_path = 'image/' . (!empty($fetch_data['image']) ? $fetch_data['image'] : 'no-image.png');
        if (!file_exists($image_path)) {
            $image_path = 'image/no-image.png';
        }
        ?>
        <style>
            .product-wrap { width: 90%; max-width: 1000px; margin: 20px auto; }
            .product-row { display:flex; gap:20px; flex-wrap:wrap;  }
            .product-col-5 { flex:1 1 300px; min-width:260px; border:1px solid #eee; padding:12px; }
            .product-col-7 { flex:1 1 400px; min-width:300px; border:1px solid #eee; padding:12px; }
            img.prod { max-width:100%; height:380px; display:block; margin-bottom:10px; }
            table { width:100%; border-collapse:collapse; }
            th, td { text-align:left; padding:8px; border-bottom:1px solid #f4f4f4; }
            .price { font-size: 2px;font-weight: 600;margin:8px}
            .btn { display:inline-block; padding:8px 12px; text-decoration:none; background:#28a745; color:#fff; border-radius:4px; }
        </style>

        <div class="product-wrap">
            <div class="product-row">
                <div class="product-col-5 ">
                    <img class="prod" src="<?php echo $image_path; ?>" alt="<?php echo $fetch_data['name']; ?>">
                    <h2><?php echo $fetch_data['name']; ?></h2>
                    <div class="price">₹<?php echo $fetch_data['price']; ?></div>

                    <a class="btn" href="cartAction.php?action=addToCart&id=<?php echo $fetch_data['id']; ?>">Add to Cart</a>
                </div>
                <div class="product-col-7">
                    <div style="text-align: center;">
                     <h2><?php echo $fetch_data['name']; ?></h2>
                    <div class="price" style="border-bottom:1px solid #eee;padding: 10px">₹<?php echo $fetch_data['price']; ?></div></div>
                    <h1 style="padding: 20px;text-align: center;">Product Details</h1>
                    <table>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $fetch_data['name']; ?></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>₹<?php echo $fetch_data['price']; ?></td>
                        </tr>
                         <tr>
                            <th>Category</th>
                            <td><?php echo $fetch_data['category']; ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?php echo $fetch_data['description']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <?php
    } else {
        echo '<p style="text-align:center;">Product not found.</p>';
    }
} else {
    echo '<p style="text-align:center;">Invalid product ID.</p>';
}
include 'include/footer.php';
?>