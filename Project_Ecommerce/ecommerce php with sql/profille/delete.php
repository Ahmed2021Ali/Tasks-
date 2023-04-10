<?php

session_start();

include '../core/function.php';
include '../database/imgration.php';

$connect = connectdatabase();

if (isset($_GET['id']))
{
    $id=$_GET['id'];

    $sq="DELETE FROM `card` WHERE `user_id`='$id'";
    $re=mysqli_query($connect, $sq);

    $sql="DELETE FROM `user` WHERE `id`='$id'";
    $result=mysqli_query($connect, $sql);

    $_SESSION['errors']= " Deleted Account successfully";

    header("Location:../login.php");

}
else
{
    echo "id not found";
}
