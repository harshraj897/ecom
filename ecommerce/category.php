<!-- category.php -->
<?php
global $con;

// STEP 1: Fetch all categories
$cat_query = mysqli_query($con, "SELECT DISTINCT category FROM products");

echo "<h2 style='text-align:center;'>Browse by Category</h2><hr>";

echo "<div style='text-align:center; margin-bottom:20px;'>";

// STEP 2: Display category buttons
while ($cat = mysqli_fetch_assoc($cat_query)) {
    $cat_name = htmlspecialchars($cat['category']);
    echo "<a href='index.php?page=category&cat=$cat_name' 
          style='margin:5px; padding:10px 20px; border:1px solid #007BFF; color:#007BFF; text-decoration:none; border-radius:5px;'>
          $cat_name
          </a>";
}
echo "</div>";

// STEP 3: Show products of selected category
if (isset($_GET['cat'])) {
    $category = $_GET['cat'];

    echo "<h3 style='text-align:center;'>Category: " . htmlspecialchars($category) . "</h3><hr>";

    $getdata = mysqli_query($con, "SELECT * FROM products WHERE category='$category'");

    if (mysqli_num_rows($getdata) > 0) {
        echo "<div style='display:flex; flex-wrap:wrap; justify-content:center; gap:20px;'>";

        while ($fetch_data = mysqli_fetch_assoc($getdata)) {
             echo "<a href='viewproduct.php?id=".$fetch_data['id']."'style='text-decoration:none;color:black;'>";
            echo "<div style='border:1px solid #ccc; padding:10px; text-align:center; width:200px;'>";
            echo "<img src='image/" . $fetch_data['image'] . "' width='150' height='150'><br>";
            echo "<p><strong>" . $fetch_data['name'] . "</strong></p>";
            echo "<p>₹" . $fetch_data['price'] . "</p>";
            echo "</div>";
            echo "</a>";
        }

        echo "</div>";
    } else {
        echo "<p style='text-align:center;'>No products found in this category.</p>";
    }
} else {
    echo "<p style='text-align:center;'>Select a category above to view products.</p>";
}
?>
