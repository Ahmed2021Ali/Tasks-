<?php
session_start();
require_once ('../inc/header.php');

require_once ('../navbar/admin.php');

?>

    <div class="container">
        <div class="class">
            <div class="col-6 mx-auto my=5  ">

                <h1 class=" text-center"> Add Category </h1>

                <?php  if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success" role="alert"><?php echo $_SESSION['success']; ?></div>
                    <?php unset($_SESSION['success']); endif; ?>


                <?php if(isset($_SESSION['errors'])): ?>
                    <div class="alert alert-danger" role="alert"> <?php echo $_SESSION['errors']; ?> </div>
                    <?php  unset($_SESSION['errors']);   endif; ?>


                <form action="val/val_category.php" method ="POST" class = "">

                    <div class="from group p-3 my-1">
                        <label for="name" class="form-label"><h4> Enter your Category Name </h4></label>
                        <input type="text" name ="name" class="form-control" id="name" aria-describedby="">
                    </div>


                    <div class="from group p-3 my-1">
                        <label for="description" class="form-label"><h4> Enter your Category description </h4></label>
                        <textarea type="text" name ="description" class="form-control" id="description" rows="1"></textarea>
                    </div>

                    <div class="from group p-3 my-1">
                        <label for="image" class="form-label"> <h4> Enter your Category image </h4> </label>
                        <input type="file" name ="image" class="form-control" id="image" aria-describedby="">
                    </div>

                    <div class="d-grid gap-2 col-3 mx-auto">
                        <button class="btn btn-warning" value="login" type="from-control">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once ('../inc/footer.php');?>