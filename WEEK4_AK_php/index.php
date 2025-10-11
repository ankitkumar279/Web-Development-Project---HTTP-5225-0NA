<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>week4</title>
</head>
<body>
    <?php
    // Create connection to database
    // servername, username, password, dbname
    $connect = mysqli_connect('localhost', 
    'root', 
    '', 
    'web development project - http-5225-0na');
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $query = "SELECT * FROM colors";
    $colors = mysqli_query($connect, $query);
    // echo "<pre>";
    // print_r($colors);
    // echo "</pre>";

    echo "<pre>" . print_r($colors) . "</pre>";

    foreach($colors as $color) {
        echo "<div style='background-color: " . $color['Hex'] . "; padding: 20px; margin: 10px; color: white; text-align: center;'>" . $color['Name'] . " - " . $color['Hex'] . "</div>";
        
    }


    ?>
</body>
</html>