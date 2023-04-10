<?php
session_start();

include '../../core/function.php';
include '../../database/imgration.php';


if (CheckRequestMethod("POST") && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['image']))
{
    $name =$_POST['name'];
    $description =$_POST['description'];
    $image =$_POST['image'];

    $errors=[];

    // validation Category name

    if (!val_data_empty($name)) {
        $errors[]= "Category name is required";
    } elseif (!min_name_va12($name,3)) {
        $errors[]= "Category name must be grader than 3chars";
    } elseif (!max_name_va13($name,500)) {
        $errors[]= "Category name must be smiler than 500 chars";
    }

    // validation Category name

    if (!val_data_empty($description)) {
        $errors[]= "Category description is required";
    } elseif (!min_name_va12($description,3)) {
        $errors[]= "Category description must be grader than 3chars";
    } elseif (!max_name_va13($description,500)) {
        $errors[]= "Category description must be smiler than 500 chars";
    }
    // validation Category image
    if (!val_data_empty($image)) {
        $errors[]= " Category image is required";
    }


    if (empty($errors))
    {
        $_SESSION['success']= "the  Category Add is successfully";

        $connect=connectdatabase();
        $sql="INSERT INTO `Category` (`name`,`description`,`image`) VALUES ('$name','$description','$image')";
        $Result=mysqli_query($connect, $sql);
        header("Location:../create.php");
    }
    else
    {
        foreach ($errors as $error)
        {
            $_SESSION['errors']= $error;
        }
        header("Location:../create.php");
    }
}