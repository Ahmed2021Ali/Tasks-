<?php
 require_once('../inc/header.php');
 require_once('../navbar/admin.php');
require_once('../database/imgration.php');
session_start();

if(isset($_SESSION['id_of_user']) )
{
    $id =$_SESSION['id_of_user'];
    $connect=connectdatabase();
    $sql="SELECT * FROM `user` WHERE `id` LIKE '$id' ";
    $result = mysqli_query($connect ,$sql);
    $my_sql=mysqli_fetch_assoc($result);

    $pas= $my_sql['password'];
    $pass= password_hash("$pas", PASSWORD_DEFAULT);
}
else
{
    echo "Not Found data of User";
}
?>
    <div class="container">
        <div class="row align-items-center vh-100">
            <div class="col-6 mx-auto">
                <div class="card" style="width: 35rem;">
                    <div class="card-header">
                        information for User
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> Name : <?php echo $my_sql['name'];  ?></li>
                        <li class="list-group-item"> Email : <?php echo $my_sql['email'];  ?></li>
                        <li class="list-group-item"> Password : <?php echo $pass; ?></li>
                        <li class="list-group-item"> Address : <?php echo $my_sql['address']; ?></li>
                        <li class="list-group-item"> Atatus : <?php echo $my_sql['status'];  ?></li>

                        <a href="update_admin.php" class="btn btn-primary">Update</a>
                        <?php echo "<br>"; ?>
                        <a href="delete.php?id=<?php echo $my_sql['id'];  ?>" class="btn btn-danger">Delete</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php require_once('../inc/footer.php');?>