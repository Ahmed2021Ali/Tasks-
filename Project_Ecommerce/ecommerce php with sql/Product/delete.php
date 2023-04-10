<?php

session_start();

include '../database/imgration.php';
require_once ('../navbar/admin.php');

$connect = connectdatabase();


    if (isset($_GET['id']))
    {
        $id =$_GET['id'];

/*        $UES="DELETE FROM `addcart` WHERE `product_id` LIKE '$id' ";
        $re = mysqli_query($connect,$UES);*/


        $sql="DELETE FROM `product` WHERE `id`='$id'";
        $result=mysqli_query($connect, $sql);

        $_SESSION['errors']= " Deleted products successfully";

        header("Location:../category/read.php");

    }
    else
    {
        echo "hop hop hop";
    }

?>

