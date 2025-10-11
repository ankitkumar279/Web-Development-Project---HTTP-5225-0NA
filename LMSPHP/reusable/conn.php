<?php

$host = "localhost";
$user = "root";       
$pass = "";          
$dbname = "web development project - http-5225-0na"; 
$connect = mysqli_connect($host, $user, $pass, $dbname);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
