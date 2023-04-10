<?php

session_start();
require_once ('../navbar/admin.php');
require_once ('../database/imgration.php');

$connect = connectdatabase();


    if (isset($_GET['id']))
    {

        $id =$_GET['id'];

/*        $UES="DELETE FROM `addcart` WHERE `categories_id` LIKE '$id' ";
        $re = mysqli_query($connect,$UES);

        $sq="DELETE FROM `products` WHERE `categories_id`='$id'";
        $result=mysqli_query($connect, $sq);*/


        $sql="DELETE FROM `category` WHERE `id` LIKE '$id'";
        $result=mysqli_query($connect, $sql);

        $_SESSION['success']= " Delete all products in the category and also delete the category";

        header("Location:read.php");

    }
    else
    {
        echo "hop hop hop";
    }



