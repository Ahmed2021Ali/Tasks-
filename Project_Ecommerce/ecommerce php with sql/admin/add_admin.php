
<?php
require_once ('../inc/header.php');
require_once ('../navbar/admin.php');
session_start();
?>

<div class="container">
    <div class="class">
        <div class="col-6 mx-auto">

            <h1 class=" text-center"> Create New Admin</h1>


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



            <form action="val/val_admin.php" method ="POST">


                <div class="from group p-2 my-1">
                    <label for="name" class="form-label"><h5> Name </h5></label>
                    <input type="text"  name ="name" value ="" class="form-control" id="name" aria-describedby="">
                </div>

                <div class="from group p-2 my-1">
                    <label for="Address" class="form-label"><h5> Address </h5></label>
                    <input type="text"  name ="Address" value ="" class="form-control" id="Address" aria-describedby="">
                </div>

                <div class="from group p-2 my-1">
                    <label for="Email1" class="form-label"><h5> Email address </h5></label>
                    <input type="email" name ="email" value ="" class="form-control" id="email" aria-describedby="">
                </div>

                <div class="from group p-2 my-1">
                    <label for="exampleInputPassword1" class="form-label"><h5>  Password </h5></label>
                    <input type="password" name ="password" value =""  class="form-control" id="password">
                </div>

                <div class="d-grid gap-2 col-3 mx-auto">
                    <button class="btn btn-success" value="login" type="from-control">add New Admin</button>
                </div>

            </form>
        </div>
    </div>
</div>


<?php require_once ('../inc/footer.php');?>