
<?php require_once ('inc/header.php');?>

<?php require_once ('navbar/out_site.php');?>
<?php session_start();?>

<div class="container">
    <div class="class">
        <div class="col-6 mx-auto">

            <h1 class=" text-center"> Login</h1>

            <?php   if (isset($_SESSION['errors'])):?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['errors']."<br>"; ?>
                </div>
            <?php  unset($_SESSION['errors']); endif;  ?>


            <form action="validation/handerlers_login.php" method ="POST">

               <select name="status" id="status"  class="form-select form-select-lg mb-8 " aria-label=".form-select-lg example">
                   <option value="user" name ="user"  style="color:crimson;text-align:center;"> <h3> User <h3></option>
                   <option value="admin" name ="admin"  style="color:crimson;text-align:center;"> <h3> Admin <h3></option>
               </select>
                <div class="from group p-2 my-1">
                    <label for="Email1" class="form-label"><h5> Email address </h5></label>
                    <input type="email" name ="email" value ="" class="form-control" id="email" aria-describedby="">
                </div>

                <div class="from group p-2 my-1">
                    <label for="exampleInputPassword1" class="form-label"><h5>  Password </h5></label>
                    <input type="password" name ="password" value =""  class="form-control" id="password">
                </div>


                <div class="d-grid gap-2 col-3 mx-auto">
                    <button class="btn btn-success" value="login" type="from-control">Login</button>
                </div>

            </form>
        </div>
    </div>
</div>


<?php require_once ('inc/footer.php');?>

