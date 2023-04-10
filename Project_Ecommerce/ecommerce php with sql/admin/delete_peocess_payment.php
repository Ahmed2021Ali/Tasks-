<?php

session_start();

include '../core/function.php';
include '../database/imgration.php';

$connect = connectdatabase();

if (isset($_GET['id']))
{
    $id=$_GET['id'];


    $sql="DELETE FROM `payment` WHERE `id`='$id'";
    $result=mysqli_query($connect, $sql);

    $_SESSION['errors']= " Deleted payment process successfully";

    header("Location:payment_process.php");

}
else
{
    echo "id not found";
}
