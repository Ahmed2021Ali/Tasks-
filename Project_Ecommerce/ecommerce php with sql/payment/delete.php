<?php

session_start();
require_once ('../navbar/admin.php');
require_once ('../database/imgration.php');

$connect = connectdatabase();

if (isset($_GET['id']))
{
    $id =$_GET['id'];
    $sql="DELETE FROM `payment` WHERE `id` LIKE '$id'";
    $result=mysqli_query($connect, $sql);
    $_SESSION['errors']= " The item has been deleted successfully";
    header("Location:../show_payment_user_id.php");
}
else
{
    echo "hop hop hop";
}



