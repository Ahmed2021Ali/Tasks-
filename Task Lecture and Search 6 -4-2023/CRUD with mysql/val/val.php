<?php
session_start();

include("../fun/fun.php");

include("../database/database.php");
$connection = connectdatabase();

$errors=[];

if (!$connection)
{
    echo "mysql not connection".mysqli_connect_error();
}
else
{
    if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['title']))
    {
        $task=check_input($_POST['title']);

        $sq="SELECT * from `tasks` where `content`='$task'";
        $result= mysqli_query($connection,$sq);
        $row = mysqli_fetch_assoc($result);

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
        elseif($row['content']==$task)
        {
            $errors[]="this task is existed";
        }
        else
        {
            $result =" INSERT INTO `tasks` (`content`) values('$task') ";
            mysqli_query($connection, $result);

            if (mysqli_affected_rows($connection)==1)
            {
                $_SESSION['successful'] = " insert task successfully";
            }
        }
        if (!empty($errors))
        {
            foreach ($errors as $errors)
                {
                    $_SESSION['errors'] = $errors ;
                }
        }
         header("location:../Create.php");
    }


}
