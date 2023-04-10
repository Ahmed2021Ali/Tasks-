<?php
require_once ('../inc/header.php');
require_once ('../navbar/admin.php');
require_once ('../database/imgration.php');
session_start();

$connect = connectdatabase();
$sql     = "SELECT * FROM `payment`";
$result  = mysqli_query($connect ,$sql);

?>
<?php   if (isset($_SESSION['errors'])):?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['errors']."<br>"; ?>
    </div>
    <?php  unset($_SESSION['errors']); endif;  ?>

<?php echo  "<br>"; ?>
<table class="table  table-striped-columns text-center">
    <thead>
    <tr>
        <th scope="col">Product_id</th>
        <th scope="col">Product_Name</th>
        <th scope="col">Product_Price</th>
        <th scope="col">User Name</th>
        <th scope="col">User Address</th>
        <th scope="col">Remove</th>
    </tr>
    </thead>
    <tbody>
    <?php  while ($sql=mysqli_fetch_assoc($result)): ?>
        <tr>
            <th scope="row"><?php echo $sql['id']; ?></th>
            <td><?php echo $sql['product_name']; ?></td>
            <td><?php echo $sql['product_price']; ?></td>
            <td><?php echo $sql['username']; ?></td>
            <td><?php echo $sql['adrress_user'];?></td>
            <td><a href="delete_peocess_payment.php?id=<?php echo $sql['id'];?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"> Delate Product </i></a> </a></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</div>
</div>
</div>



<?php require_once ('../inc/footer.php');?>
