<?php
session_start();
include '../../core/function.php';
include '../../database/imgration.php';


$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD']=="POST"  && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['image']))
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    // validation Category name
    if (!val_data_empty($name)) {
        $errors[]= "Category name is required";
    } elseif (!min_name_va12($name,3)) {
        $errors[]= "Category name must be grader than 3chars";
    } elseif (!max_name_va13($name,500)) {
        $errors[]= "Category name must be smiler than 500 chars";
    }

    // validation Category description
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
        $_SESSION['success']= "the  Category update is successfully";
        $connect=connectdatabase();
        $mysql="UPDATE `category` SET `image`='$image',`name`='$name',`description`='$description' WHERE `id`='$id'";
        mysqli_query($connect, $mysql);
        header("Location:../read.php");
    }
    else
    {
        foreach ($errors as $error)
        {
            $_SESSION['errors']= $error;
        }
        header("Location:../read.php");
    }
}
else
{
    echo "hop hop hop";
}




