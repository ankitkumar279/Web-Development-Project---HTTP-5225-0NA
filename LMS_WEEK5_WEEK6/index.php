<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Schools</title>
</head>
<body>
    <h1>All Schools</h1>
    <hr>
    <div>
        <?php
       
        include ('connect.php');
        $query = "SELECT * FROM schools";
        $schools = mysqli_query($connect, $query);
        // echo '<pre>' .print_r ($schools) . '</pre>';

        foreach ($schools as $school) {
            echo $school['School Name'] . 
            '<form>
            <input type="hidden" name="id" value="123>
            <input type="submit" value"EDIT">
            </form>' .
            '<br>';
            // echo '<div>';
            // echo '<h2>' . htmlspecialchars($school['School Name']) . '</h2>';
            // echo '<p>' . htmlspecialchars($school['Email']) . '</p>';
            // echo '<p>' . htmlspecialchars($school['Phone']) . '</p>';
            // echo '</div><hr>';
        }







        ?>
    
</body>
</html>