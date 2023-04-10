<?php
session_start();

include("../fun/fun.php");

include("../database/database.php");
$connection = connectdatabase();

$errors=[];


    if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['title']))
    {
        $id=$_GET['id'];
        $task=check_input($_POST['title']);

        //echo $_POST['title'];

        if (!val_data_empty($task))
        {
            $errors[] = "this task is empty";
        }
        elseif(!val_data_smiler($task))
        {
            $errors[]="task is smiler , must be grader than 3 chars";
        }
        elseif(!val_data_grader($task))
        {
            $errors[]="task is grader , must be smiler than 200 chars";
        }
        else
        {
            $result="UPDATE `tasks` SET `content`='$task'  WHERE `id`='$id'";
            mysqli_query($connection, $result);

            if (mysqli_affected_rows($connection)==1)
            {
                $_SESSION['successful'] = " Update task successfully";
            }
            header("location:../Create.php");
        }
        if (!empty($errors))
        {
            foreach ($errors as $errors)
            {
                $_SESSION['errors'] = $errors ;
                header("location:../update.php");

            }
        }



}
