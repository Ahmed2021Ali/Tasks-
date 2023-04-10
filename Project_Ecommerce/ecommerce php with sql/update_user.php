<?php

require_once ('inc/header.php');
require_once ('database/imgration.php');
require_once ('navbar/user.php');

session_start();


if (isset($_GET["search"]))
{
    header("location:show_product.php");
}

 ?>

    <div class="container">
        <div class="class">
            <div class="col-6 mx-auto">

                <h1 class=" text-center"> Update profile User</h1>


                <?php   if (isset($_SESSION['errors'])): foreach ($_SESSION['errors'] as $error) :?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error."<br>"; ?>
                    </div>
                <?php  endforeach; unset($_SESSION['errors']); endif;  ?>


                    <?php   if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success']."<br>"; ?>
                    </div>
                    <?php  unset($_SESSION['success']); endif;  ?>

<?php
                if(isset($_SESSION['id_of_user'])  )
                {

                    $id =$_SESSION['id_of_user'];
                    $connect=connectdatabase();
                    $sql="SELECT * FROM `user` WHERE `id` LIKE '$id' ";
                    $result = mysqli_query($connect ,$sql);
                    $my_sql=mysqli_fetch_assoc($result);
                }
                else
                {
                echo "Not Found data of User";
                }
?>
                <form action="profille/val/val_update.php" method ="POST">


                    <div class="from group p-2 my-1">
                        <label for="name" class="form-label"><h5> Name Again </h5></label>
                        <input type="text"  name ="name" value ="<?php echo $my_sql['name']; ?>" class="form-control" id="name" aria-describedby="">
                    </div>

                    <div class="from group p-2 my-1">
                        <label for="Address" class="form-label"><h5> Address Again </h5></label>
                        <input type="text"  name ="Address" value ="<?php  echo $my_sql['address']; ?>" class="form-control" id="Address" aria-describedby="">
                    </div>

                    <div class="from group p-2 my-1">
                        <label for="Email1" class="form-label"><h5> Email address  </h5></label>
                        <?PHP echo "<br>"; ?>
                        <label for="Email1" class="form-label"><h5> <?php echo $my_sql['email']; ?></h5></label>
                    </div>

                    <div class="from group p-2 my-1">
                        <label for="exampleInputPassword1" class="form-label"><h5>  Password  Again</h5></label>
                        <input type="password" name ="password" value =""  class="form-control" id="password">
                    </div>

                    <div class="d-grid gap-2 col-3 mx-auto">
                        <button class="btn btn-success" value="login" type="from-control">Update Profile</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


<?php require_once ('inc/footer.php');?>