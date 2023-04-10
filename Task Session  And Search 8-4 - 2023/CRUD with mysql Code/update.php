<?php
session_start();
echo "<br>";
require_once ('inc/header.php');

$id=$_GET['id'];



$connection = mysqli_connect("localhost","root","","ToDoApp");

if (!$connection)
{
    echo " Not connection sql".mysqli_connect_error();
}

$sql="SELECT * from `tasks` where `id`='$id'";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);


?>

        <?php if(isset($_SESSION['errors'])) :  ?>
        <div class="alert alert-danger text-center" role="alert">
            <?php
            echo $_SESSION['errors'];
            ?>
        </div>
        <?php  unset($_SESSION['errors']); endif;  ?>

    <form action="val/update_val.php?id=<?php if(isset($row['id'])): echo $row['id']; endif; ?>" method="POST" class="form border p-2 my-5">
        <input type="text" name="title" value="<?php if(isset($row['content'])): echo $row['content']; endif; ?>" class="form-control my-3 border border-success" placeholder="add new todo">
        <input type="submit" value="Update" class="form-control btn btn-primary my-3 " placeholder="add new todo">
    </form>

<?php require_once ('inc/fooder.php');?>