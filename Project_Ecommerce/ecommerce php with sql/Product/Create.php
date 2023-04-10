<?php
session_start();
require_once ('../inc/header.php');
include '../database/imgration.php';
require_once ('../navbar/admin.php');

$connect = connectdatabase();


$sql="SELECT `name`,`id` FROM `category`";
$result = mysqli_query($connect ,$sql);


?>

<div class="container">
    <div class="class">
        <div class="col-6 mx-auto my=5  ">
            <h1 class=" text-center"> Add Products </h1>

            <?php  if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success" role="alert"><?php echo $_SESSION['success']; ?></div>
                <?php unset($_SESSION['success']); endif; ?>


            <?php if(isset($_SESSION['errors'])): ?>
                <div class="alert alert-danger" role="alert"> <?php echo $_SESSION['errors']; ?> </div>
                <?php  unset($_SESSION['errors']);   endif; ?>


            <form action="val/val_produc.php" method ="POST" class = "from group p-3 my-1">

                <select name="categories_id" id="categories_id"  class="form-select form-select-lg mb-8 " aria-label=".form-select-lg example">
                    <?php  while ($sql=mysqli_fetch_assoc($result)): ?>
                        <option value="<?php echo $sql['id'];?>" name ="categories_id"  style="color:crimson;text-align:center;"> <h3> <?php echo $sql['name'];?> <h3></option>
                    <?php endwhile; ?>
                </select>

                <div class="from group p-1 my-1">
                    <label for="name" class="form-label"><h5> Enter your Product  Name </h5></label>
                    <input type="text" name ="name"  class="form-control" id="" aria-describedby="">
                </div>

                <div class="from group p-1 my-1">
                    <label for="description" class="form-label"><h5> Enter your Product description </h5></label>
                    <textarea type="text" name ="description" class="form-control" id="" rows="1"></textarea>
                </div>

                <div class="from group p-1 my-1">
                    <label for="description" class="form-label"><h5> Enter your Product  Price </h5></label>
                    <input type="text" name ="price" class="form-control" id="" aria-describedby="">
                </div>

                <div class="from group p-1 my-1">
                    <label for="image" class="form-label"> <h5> Enter your Product image </h5> </label>
                    <input type="file" name ="image1" class="form-control" id="image" aria-describedby="">
                </div>
                <?php  echo "<br>";?>
                <div class="d-grid gap-3 col-4 mx-auto">
                    <button class="btn btn-primary" value="submit" type="from-submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once ('../inc/footer.php');?>
