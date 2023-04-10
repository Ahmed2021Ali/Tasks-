<?php
session_start();
include '../core/function.php';
include '../database/imgration.php';

$id=$_GET['id'];

$connect = connectdatabase();

$UES="DELETE FROM `card` WHERE `id` LIKE '$id' ";
$re = mysqli_query($connect, $UES);

$_SESSION['errors']="Favorites have been deleted successfully";

header("Location:../show_cards.php");
?>
