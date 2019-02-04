<!DOCTYPE html>
<html lang="en">
<head>
    <title>Display</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
</head>

<form method="post">
    <div class="container">
        <div class="col-lg-12"><br/>
            <div class="card">
                <div class="card-header bg-dark"><br/>
                    <h1 class="text-white text-center">Displaying Contents</h1>
                </div>
                <table class="table table-striped table-hover table-bordered text-center">
                    <tr>
                        <th>ID</th>
<!--                        <th>IMAGE</th>>-->
                        <th>ARTIST NAME</th>
                        <th>DESCRIPTION</th>
                        <th>UPDATE</th>
                        <th>DELETE</th>
                        <th>INSERT</th>
                    </tr>

                    <?php
                    include 'connection.php';
                    $q = "SELECT * FROM `tbl_images`";
                    $query = mysqli_query($connect,$q);
                    while ($res = mysqli_fetch_array($query)) {

                        ?>
                        <tr>
                            <td><?php echo $res['id'];  ?></td>
<!--                            <td>--><?php //echo $res['name']; ?><!--</td>-->
                            <td> <?php echo $res['artname'];?> </td>
                            <td> <?php echo $res['des'];?> </td>
                            <td> <button class="btn btn-success text-white"><a class="text-white" href="update.php?id=<?php echo $res['id'];?>">Update</a></button></td>
                            <td><button class="btn btn-danger text-white"><a class="text-white" href="delete.php?id=<?php echo $res['id'];?>">Delete</a></button></td>
                            <td><a href="index.php" class="text-white"><button type="button" class="btn btn-outline-primary">Insert</button></a></td>
                        </tr>

                        <?php
                    }
                    ?>
                </table>
</form>
</div>
</div>
</div>



<script src="js/bootstrap.min.js"></script>
</body>
</html>