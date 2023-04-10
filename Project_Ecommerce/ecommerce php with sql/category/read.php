<?php
require_once ('../inc/header.php');
require_once ('../navbar/admin.php');
require_once ('../database/imgration.php');
session_start();
$connect=connectdatabase();
$sql="SELECT `id`, `image`, `name`, `description` FROM `category`";
$result = mysqli_query($connect ,$sql);
?>

    <?php  if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success" role="alert"><?php echo $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); endif; ?>


    <?php if(isset($_SESSION['errors'])): ?>
    <div class="alert alert-danger" role="alert"> <?php echo $_SESSION['errors']; ?> </div>
    <?php  unset($_SESSION['errors']);   endif; ?>

<?php echo "<br>";?>

<div class="row row-cols-1 row-cols-md-3 g-3">
    <?php while ($my_sql=mysqli_fetch_assoc($result)): ?>
        <div class="col">
            <div class="card h-100">
                <img src="../image/<?php echo $my_sql['image'];?>" class="card-img-top" width="200" height="300" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color:blue;"><?php echo $my_sql['name']; ?></h5>
                    <p class="card-text"><?php echo $my_sql['description']; ?></p>
                    <a href="update.php?id=<?php echo $my_sql['id']; ?>" class="btn btn-success">Update Category</a>
                    <a href="delate.php?id=<?php echo $my_sql['id']; ?>" class="btn btn-danger">Delate Category</a>
                    <a href="../Product/read.php?id=<?php echo $my_sql['id']; ?>" class="btn btn-info">Edit Products</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php require_once ('../inc/footer.php');?>
