<?php
require_once ('../inc/header.php');
 require_once ('../navbar/admin.php');
require_once ('../database/imgration.php');
 session_start();
$connect=connectdatabase();
$sql="SELECT * FROM `user` WHERE `status` LIKE 'admin' ";
$result = mysqli_query($connect ,$sql);
 ?>


<?php echo  "<br>"; ?>
<table class="table  table-striped-columns text-center">
    <thead>
    <tr>
        <th scope="col">Number of Admin</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Remove</th>
        <th scope="col">Update</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; while ($sql=mysqli_fetch_assoc($result)): ?>
        <tr>
            <th scope="row"><?php echo $i++; ?></th>
            <td><?php echo $sql['name']."<br>" ?></td>
            <td><?php echo $sql['address']."<br>" ?></td>
            <td><?php echo $sql['email']."<br>" ?></td>
            <td><?php echo $sql['password']."<br>";?></td>
            <td><a href="" class="btn btn-danger"><i class="fa-solid fa-trash-can"> Delate Admin </i></a> </a></td>
            <td><a href="" class="btn btn-info"><i class="fa-solid fa-trash-can"> Update Admin </i></a> </a></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</div>
</div>
</div>



<?php require_once ('../inc/footer.php');?>
