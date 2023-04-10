<?php
session_start();
include '../core/function.php';
include '../database/imgration.php';
if (isset($_GET["id"]))
{
   $id=$_GET["id"];
    $connect=connectdatabase();
    $sql="SELECT * FROM `card` WHERE `id` LIKE '$id' ";
    $result = mysqli_query($connect ,$sql);
    $sql=mysqli_fetch_assoc($result);
    $name = $sql['name'];
    $price= $sql['price'];
    $image= $sql['image'];
    $user_id= $sql['user_id'];

    $sql="SELECT * FROM `user` WHERE `id` LIKE '$user_id' ";
    $result = mysqli_query($connect ,$sql);
    $my_sql=mysqli_fetch_assoc($result);
    $user_name = $my_sql['name'];
    $address= $my_sql['address'];


    $sql="INSERT INTO `payment` (`product_name`,`product_image`,`product_price`,`username`,`adrress_user`,`user_id`) VALUES ('$name','$image','$price','$user_name','$address','$user_id')";
    $Result=mysqli_query($connect,$sql);

    $_SESSION['success']= "It has been added to the cart successfully";
    header("location:../show_cards.php");

}
else
{
    echo "error";
}


