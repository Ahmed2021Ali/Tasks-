<?php
session_start();
echo "<br>";
require_once ('inc/header.php');
?>

        <?php if(isset($_SESSION['errors'])) :  ?>
                <div class="alert alert-danger text-center" role="alert">
                                    <?php
                                    echo $_SESSION['errors'];
                                    ?>
                </div>
        <?php  unset($_SESSION['errors']); endif;  ?>

        <?php if(isset($_SESSION['successful'])) :  ?>
            <div class="alert alert-success text-center" role="alert">
                <?php
                echo $_SESSION['successful'];
                ?>
            </div>
            <?php  unset($_SESSION['successful']); endif;  ?>

            <form action="val/val.php" method="POST" class="form border p-2 my-5">
                <input type="text" name="title" class="form-control my-3 border border-success" placeholder="add new todo">
                <input type="submit" value="Add" class="form-control btn btn-primary my-3 " placeholder="add new todo">
            </form>

            <?php
            $connection = mysqli_connect("localhost","root","","ToDoApp");
            if (!$connection)
            {
                echo " Not connection sql".mysqli_connect_error();
            }

            $sql=" SELECT * FROM `tasks` ORDER BY id DESC ";

            $result= mysqli_query($connection,$sql);
            ?>

<table class="table table-bordered">

    <a href="delete_all.php" class="btn btn-danger" role="button" data-bs-toggle="button">Delete All Tasks </a>

    <thead>
        <tr>
            <th> id </th>
            <th>Task</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo $i++;   ?></td>
            <td><?php echo $row['content'];   ?></td>
            <td>
                <a href="Delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-info"><i class="fa-solid fa-edit"></i> </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require_once ('inc/fooder.php');?>