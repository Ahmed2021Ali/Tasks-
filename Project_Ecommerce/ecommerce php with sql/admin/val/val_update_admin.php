<?php
session_start();
include '../../core/function.php';
include '../../database/imgration.php';


if(CheckRequestMethod("POST") && isset($_POST['name'])  && isset($_POST['Address'])  && isset($_POST['password'])  )
{
    $name =satisfied($_POST['name']);
    $Address=satisfied($_POST['Address']);
    $password=satisfied($_POST['password']);
    $id=$_SESSION['id_of_user'];


    $errors=[];

    if (!val_data_empty($name))
    {
        $errors[] = "this name is empty";
    }
    else if (!min_name_va12($name,3))
    {
        $errors[]= "Name must be grader than 3 chars";
    }
    else if (!max_name_va13($name,75))
    {
        $errors[]= "Name must be smiler than 75 chars";
    }

    // validation Address

    if (!val_data_empty($Address))
    {
        $errors[]= "Address is required";
    }
    else if (!min_name_va12($Address,3))
    {
        $errors[]= "Address must be grader than 2 chars";
    }
    else if (!max_name_va13($Address,75))
    {
        $errors[]= "Address must be smiler than 75 chars";
    }

    //password
    if (!val_data_empty($password))
    {
        $errors[]= "Password is required";
    }
    else if (!min_name_va12($password,6))
    {
        $errors[]= "Password must be grader than 6 chars";
    }
    else if (!max_name_va13($password,25))
    {
        $errors[]= "Password  must be smiler than 25 chars";
    }

    if (empty($errors))
    {
        $_SESSION['success']= "The update was completed successfully";
        $connect=connectdatabase();
        $mysql="UPDATE `user` SET `name`='$name',`address`='$Address',`password`='$password'  WHERE `id`='$id'";
        $Result=mysqli_query($connect,$mysql);
    }
    else
    {
        ECHO  $_SESSION['errors']= $errors;
    }
    header("location:../update_admin.php");
}
else
{
    echo "this method not supported";
}




