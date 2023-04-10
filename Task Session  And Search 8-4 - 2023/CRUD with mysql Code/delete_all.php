<?php

include("database/database.php");
$connection = connectdatabase();

$sql = "DELETE FROM `tasks`" ;

$result= mysqli_query($connection,$sql);

$_SESSION['errors']= " Deleted All Task successfully";

header("Location:Create.php");