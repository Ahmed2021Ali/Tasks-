<?php
  session_start();

  include '../core/function.php';
  include '../database/imgration.php';

  $connect =connectdatabase();

  if (CheckRequestMethod("POST") && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['status']))
  {


  $email =$_POST['email'];
  $password=$_POST['password'];
  $status=$_POST['status'];

  $sql="SELECT * FROM `user` WHERE `email` LIKE '$email' AND `password` LIKE '$password' AND `status` LIKE '$status' ";
  $result = mysqli_query($connect ,$sql);
  $my_sql=mysqli_fetch_assoc($result);


  if (isset($my_sql))
  {
      if ($my_sql['status']=="user")
      {
          $_SESSION['id_of_user']=$my_sql['id'];
         header("location:../profille_user.php");
      }
      elseif($my_sql['status']=="admin")
      {
          $_SESSION['id_of_user']=$my_sql['id'];
          header("location:../admin/profile_admin.php");
      }
  }
      else
      {
          $errors= " your Email is not valid or error Password ";
          $_SESSION['errors']=$errors;
          header("location:../login.php");
      }


  }
  else
  {
     echo "this method not supported"; 
  }
