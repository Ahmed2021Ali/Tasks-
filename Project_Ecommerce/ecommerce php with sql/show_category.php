<?php
require_once ('inc/header.php');
require_once ('navbar/user.php');
require_once ('database/imgration.php');
session_start();
$connect=connectdatabase();
$sql="SELECT `id`, `image`, `name`, `description` FROM `category`";
$result = mysqli_query($connect ,$sql);
?>


<?php
if (isset($_GET["search"]))
{
    $name=$_GET["search"];
    $s="SELECT * FROM `category` WHERE `name` LIKE '%$name%' OR  `name`  LIKE '$name'  ";
    $result= mysqli_query($connect, $s);
}
?>

<div class="row row-cols-1 row-cols-md-3 g-3">
    <?php while ($my_sql=mysqli_fetch_assoc($result)): ?>
        <div class="col">
            <div class="card h-100">
                <img src="image/<?php echo $my_sql['image'];?>" class="card-img-top" width="200" height="300" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color:blue;"><?php echo $my_sql['name']; ?></h5>
                    <p class="card-text"><?php echo $my_sql['description']; ?></p>
                    <a href="show_product_of_category_id.php?id=<?php echo $my_sql['id']; ?>" class="btn btn-info">Show Products</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php require_once ('inc/footer.php');?>

