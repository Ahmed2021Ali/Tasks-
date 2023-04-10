<?php
session_start();
include '../core/function.php';
include '../database/imgration.php';

 $id=$_GET['id'];

$connect = connectdatabase();

$sql = "SELECT * FROM `product` WHERE `id` LIKE '$id'";
$Result=mysqli_query($connect, $sql);
$my_sql=mysqli_fetch_assoc($Result);

 $user_id= $_SESSION['id_of_user'];


 $name=$my_sql['name'];
 $description=$my_sql['description'];
 $price=$my_sql['price'];
 $image=$my_sql['image'];


$sq="INSERT INTO `card` (`name`,`description`,`price`,`image`,`user_id`) VALUES ('$name','$description','$price','$image','$user_id')";
$Re=mysqli_query($connect,$sq);
 $_SESSION['success']="The item has been successfully Add to your Favorites";
header("Location:../show_product.php");