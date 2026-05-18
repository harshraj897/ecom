
<?php
include("config.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category=$_POST['category'];
    $desc = $_POST['description'];
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../image/$img");

    $sql = "INSERT INTO products (name, price,category, description, image)
            VALUES ('$name', '$price','$category' ,'$desc', '$img')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Product added successfully');</script>";
    } else {
        echo "<script>alert('Error adding product');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Insert New Product</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Product Name" required><br>
        <input type="text" name="price" placeholder="Price" required><br>
        <input type="text" name="category" placeholder="category" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="file" name="image" required><br>
        <button type="submit" name="submit">Add Product</button>
    </form>
</body>
</html>