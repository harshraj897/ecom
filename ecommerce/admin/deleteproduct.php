<?php
include("config.php");

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="DELETE FROM products WHERE id='$id'";
    $result=mysqli_query($con,$sql);
    if($result){
       echo "<script>alert('Product deleted successfully');</script>";
       header("location:index.php?page=viewproduct");
        exit();
    }else{
        echo "<script>alert('Failed to delete the product');</script>";
    }
    }
?>