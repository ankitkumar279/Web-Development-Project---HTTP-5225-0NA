<?php   
 $connect = mysqli_connect("localhost", "root", "", "web development project - http-5225-0na");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

?>