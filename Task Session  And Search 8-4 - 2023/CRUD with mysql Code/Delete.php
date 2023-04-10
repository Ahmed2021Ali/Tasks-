<?php

$id=$_GET['id'];

include("database/database.php");
$connection = connectdatabase();


$sq="DELETE FROM `tasks` WHERE `id`='$id'";

$re=mysqli_query($connection, $sq);


$_SESSION['errors']= " Deleted Task successfully";

header("Location:Create.php");



?>