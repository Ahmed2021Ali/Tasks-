<?php
require_once ('../inc/header.php');
require_once ('../navbar/admin.php');
require_once ('../database/imgration.php');
session_start();

$connect=connectdatabase();

$sql="SELECT `id`, `image`, `name`, `description` FROM `category`";

$result = mysqli_query($connect ,$sql);

if (isset($_GET['id']))
{
    $id =$_GET['id'];
    $sql="SELECT * from `category` where `id`='$id'";
    $result=mysqli_query($connect, $sql);
    $row=mysqli_fetch_assoc($result);
}


?>

<div class="container">
    <div class="class">
        <div class="col-6 mx-auto my=5  ">

            <h1 class=" text-center"> Update Category </h1>

            <form action="val/val_category_update.php?id=<?php echo $row['id']; ?>" method ="POST" class = "">

                <div class="from group p-3 my-1">
                    <label for="name" class="form-label"><h4> Enter your Category Name Again </h4></label>
                    <input type="text" name ="name"  value ="<?php echo $row['name']; ?>" class="form-control" id="name" aria-describedby="">
                </div>

                <div class="from group p-3 my-1">
                    <label for="description" class="form-label"><h4> Enter your Category description Again</h4></label>
                    <input type="text" name ="description" value="<?php echo $row['description']; ?>" class="form-control" id="description" aria-describedby="">
                </div>

                <div class="from group p-3 my-1">
                    <label for="image" class="form-label"><h4> Enter your Category image Again </h4></label>
                    <input type="file" name ="image" value ="<?php echo $row['image']; ?>" class="form-control" id="image" aria-describedby="">
                </div>

                <div class="d-grid gap-2 col-3 mx-auto">
                    <button class="btn btn-warning" value="Update" type="from-control">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once ('../inc/footer.php');?>
