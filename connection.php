<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'artgalleryimgdb';

$connect = mysqli_connect($servername,$username,$password);
mysqli_select_db($connect,$dbname);
if(!$connect){
    die("Database Not Connected!!!".mysqli_connect_error());
}

?>