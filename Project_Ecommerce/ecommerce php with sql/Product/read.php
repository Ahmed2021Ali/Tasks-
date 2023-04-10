<?php
require_once ('../inc/header.php');

session_start();
include '../database/imgration.php';
require_once ('../navbar/admin.php');

$id=$_GET['id'];
$connect = connectdatabase();
$sql = "SELECT * FROM `product` where `category_id` LIKE '$id'";
$Result=mysqli_query($connect, $sql);


?>


<?php echo "<br>";?>
<div class="row row-cols-1 row-cols-md-4 g-3">
    <?php while ($my_sql=mysqli_fetch_assoc($Result)):?>
    <div class="col">
        <div class="card h-100">
            <img src="../image/<?php echo $my_sql['image']; ?>" class="card-img-top "width="300" height="300" alt="...">
            <div class="card-body">
                <h4 class="card-title text-center"style="color:blue;" ><?php echo $my_sql['name']; ?></h4>
                <h4 class="mb-0 font-weight-semibold"style="color:red;" ><?php echo $my_sql['price']; ?></h4>
                <div class="text-muted mb-3" class="col-md-3 text-right pqr" <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>  34 reviews</div>
            <a href="update.php?id=<?php echo $my_sql['id']; ?>" class="btn btn-primary ">Update</a>
            <a href="delete.php?id=<?php echo $my_sql['id']; ?>" class="btn btn-danger">Delete</a>

        </div>
    </div>
</div>
    <?php endwhile; ?>
</div>

<?php require_once ('../inc/footer.php');?>
