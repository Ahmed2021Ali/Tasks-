<?php
require_once ('../inc/header.php');

session_start();
include '../database/imgration.php';
require_once ('../navbar/admin.php');


$connect = connectdatabase();

if (isset($_GET['id']))
{

    $id =$_GET['id'];
    $sql="SELECT * from `product` where `id`='$id'";
    $result=mysqli_query($connect, $sql);

    $row=mysqli_fetch_assoc($result);
}
?>

    <div class="container">
        <div class="class">
            <div class="col-6 mx-auto my=5  ">
                <h1 class=" text-center"> Update Product </h1>

                <form action="val/update_product.php?id=<?php echo $row['id']; ?>" method ="POST" class = "">

                    <div class="from group p-2 my-1">
                        <label for="name" class="form-label"><h4> Enter your product Name Again </h4></label>
                        <input type="text" name ="name"  value ="<?php echo $row['name']; ?>" class="form-control" id="name" aria-describedby="">
                    </div>

                    <div class="from group p-2 my-1">
                        <label for="description" class="form-label"><h4> Enter your product description Again</h4></label>
                        <input type="text" name ="description" value="<?php echo $row['description']; ?>" class="form-control" id="description" aria-describedby="">
                    </div>

                    <div class="from group p-2 my-1">
                        <label for="description" class="form-label"><h4> Enter your product Price Again</h4></label>
                        <input type="text" name ="price" value="<?php echo $row['price']; ?>" class="form-control" id="description" aria-describedby="">
                    </div>

                    <div class="from group p-2 my-1">
                        <label for="image" class="form-label"><h4> Enter your product image Again </h4></label>
                        <input type="file" name ="image1" value ="<?php echo $row['image']; ?>" class="form-control" id="" aria-describedby="">
                    </div>

                    <div class="d-grid gap-2 col-3 mx-auto">
                        <button class="btn btn-warning" value="Update" type="from-control">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require_once ('../inc/footer.php');?>