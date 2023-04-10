<?php
session_start();

include '../../core/function.php';
include '../../database/imgration.php';

 $id = $_GET['id'];

if (CheckRequestMethod("POST") && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['image1'])&& isset($_POST['price']))
{
       $name = $_POST['name'];
       $description = $_POST['description'];
       $price = $_POST['price'];
       $image = $_POST['image1'];

    $errors=[];
    // validation  name
    if (!val_data_empty($name)) {
        $errors[]= "products name is required";
    } elseif (!min_name_va12($name,3)) {
        $errors[]= "products name must be grader than 3chars";
    } elseif (!max_name_va13($name,500)) {
        $errors[]= "products name must be smiler than 500 chars";
    }

    // validation Category name

    if (!val_data_empty($description)) {
        $errors[]= "products description is required";
    } elseif (!min_name_va12($description,3)) {
        $errors[]= "products description must be grader than 3chars";
    } elseif (!max_name_va13($description,500)) {
        $errors[]= "products description must be smiler than 500 chars";
    }

    // validation Category image
    if (!val_data_empty($image)) {
        $errors[]= " products image is required";
    }

    // validation  price
    if (!val_data_empty($price))
    {
        $errors[]= " products price is required";
    }
    elseif (!min_name_va12($price,1))
    {
        $errors[]= " Enter the correct price ";
    }


    if (empty($errors))
    {
        $_SESSION['success']= " updated product successfully";
        $connect=connectdatabase();

        $mysql="UPDATE `product` SET `image`='$image',`name`='$name',`description`='$description',`price`='$price' WHERE `id`='$id'";
       mysqli_query($connect, $mysql);
        header("Location:../../category/read.php");
    }
    else
    {
        foreach ($errors as $error)
        {
            $_SESSION['errors']= $errors;
        }

        header("Location:../../category/read.php");
    }
} else {
    echo "hop hop hop";
}




