<?php
// Task 1
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = $_POST["number"];

    if ($num % 3 == 0 && $num % 5 == 0) {
        $magic = "FizzBuzz";
    } elseif ($num % 3 == 0) {
        $magic = "Fizz";
    } elseif ($num % 5 == 0) {
        $magic = "Buzz";
    } else {
        $magic = $num;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assignment</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .user { border:1px solid #000; margin:10px; padding:10px; }
    </style>
</head>
<body>

<h2>Task 1: Magic Number Game</h2>
<form method="post">
    Enter a number: <input type="number" name="number" required>
    <button type="submit">Check</button>
</form>

<?php if (isset($magic)) { ?>
    <p>Magic Number: <b><?php echo $magic; ?></b></p>
<?php } ?>

<hr>
<!-- Task 2 -->
<h2>Task 2: Users from API</h2>
<?php
function getUsers() {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
}

$users = getUsers();

for ($i = 0; $i < count($users); $i++) {
    echo "<div class='user'>";
    echo "<p><b>Name:</b> " . $users[$i]['name'] . "</p>";
    echo "<p><b>Email:</b> " . $users[$i]['email'] . "</p>";
    echo "<p><b>Address:</b> " . $users[$i]['address']['street'] . ", " . $users[$i]['address']['city'] . "</p>";
    echo "</div>";
}
?>
</body>
</html>
