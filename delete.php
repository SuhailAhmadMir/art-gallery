<?php
include 'connection.php';
$id = $_GET['id'];
$sql = "DELETE FROM `tbl_images` WHERE id=$id";
mysqli_query($connect,$sql);
header('location:display.php');




?>