<?php
   session_start();

  include '../core/function.php';
include '../database/imgration.php';


if(CheckRequestMethod("POST") && isset($_POST['name'])  && isset($_POST['Address'])  && isset($_POST['email']) && isset($_POST['password'])  )
{
       $name =satisfied($_POST['name']);
       $Address=satisfied($_POST['Address']);
       $email=satisfied($_POST['email']);
       $password=satisfied($_POST['password']);


    $errors=[];

        // validation name     val_data_similar     val_data_graeder
    $connect=connectdatabase();
    $sql="SELECT * FROM `user` WHERE `email` LIKE '$email' AND `status` LIKE 'user'";
    $result = mysqli_query($connect ,$sql);
    $my_sql=mysqli_fetch_assoc($result);

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

        // validation email
            if (!val_data_empty($email))
            {
                $errors[]= "email is required";
            }
            else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
               $errors[]= "email must be Correct ";
            }
            elseif($my_sql['email']==$email)
            {
                $errors[]= "Email is Existed";
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
               $_SESSION['success']= "the Register is successfully";
               $connect= connectdatabase();
               $sql="INSERT INTO `user` (`name`,`email`,`password`,`Address`) VALUES ('$name','$email','$password','$Address')";
               $Result=mysqli_query($connect,$sql);
            }
            else
            {
                $_SESSION['errors']= $errors;
            }
            header("location:../index.php");
}
    else
    {
       echo "this method not supported"; 
    }

