<?php 
  include('functions.php');
  secure();
  include('reusable/conn.php');

  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM schools WHERE id=$id";
    $result = mysqli_query($connect, $query);
    $school = mysqli_fetch_assoc($result);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateSchool'])) {
    $id = intval($_POST['id']);
    $schoolName = mysqli_real_escape_string($connect, $_POST['schoolName']);
    $schoolLevel = mysqli_real_escape_string($connect, $_POST['schoolLevel']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);

    $query = "UPDATE schools 
              SET `School Name`='$schoolName', 
                  `School Level`='$schoolLevel', 
                  `Phone`='$phone', 
                  `Email`='$email' 
              WHERE id=$id";
    $result = mysqli_query($connect, $query);

    if($result){
      set_message('School was updated successfully!', 'success');
      header("Location: index.php"); 
      exit();
    } else {
      echo "Failed: " . mysqli_error($connect);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update School</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
  <?php include('reusable/nav.php'); ?>

  <div class="container mt-5">
    <h1 class="mb-4">Update School</h1>
    <form action="updateSchool.php" method="POST">
      <input type="hidden" name="id" value="<?php echo intval($school['id']); ?>">
      
      <div class="mb-3">
        <label for="schoolName" class="form-label">School Name</label>
        <input type="text" class="form-control" id="schoolName" name="schoolName" value="<?php echo htmlspecialchars($school['School Name']); ?>" required>
      </div>

      <div class="mb-3">
        <label for="schoolLevel" class="form-label">School Level</label>
        <input type="text" class="form-control" id="schoolLevel" name="schoolLevel" value="<?php echo htmlspecialchars($school['School Level']); ?>" required>
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($school['Phone']); ?>" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($school['Email']); ?>" required>
      </div>

      <button type="submit" class="btn btn-primary" name="updateSchool">Update School</button>
    </form>
  </div>
</body>
</html>
