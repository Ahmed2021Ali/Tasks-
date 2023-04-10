<?php
session_start();

include '../../core/function.php';
include '../../database/imgration.php';

if (CheckRequestMethod("POST") && $_POST['categories_id'] && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['image1']))
{
      $name =$_POST['name'];
       $description =$_POST['description'];
       $price =$_POST['price'];
       $image =$_POST['image1'];
       $categories_id =$_POST['categories_id'];

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

    // validation  image



    if (empty($errors))
    {

        $_SESSION['success']= "the product Add is successfully";

        $connect=connectdatabase();
        $sql="INSERT INTO `product` (`name`,`description`,`price`,`image`,`category_id`) VALUES ('$name','$description','$price','$image','$categories_id')";
        $Result=mysqli_query($connect, $sql);

        header("Location:../Create.php");
    }
    else
    {
        foreach ($errors as $error)
        {
            $_SESSION['errors'] = $error;
        }
        header("Location:../Create.php");
    }
}
else
{
    echo "enta ragel msh gatah";
}
