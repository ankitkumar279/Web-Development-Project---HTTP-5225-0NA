<?php
$connect = mysqli_connect('localhost', 'root', '', 'webdevelopmentproject_http-5225_0na');

if(!$connect){
    die("Connection Failed: " . mysqli_connect_error());
}
?>
