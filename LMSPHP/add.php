<?php
  include('functions.php');
  secure();

  include('reusable/conn.php');

  if(isset($_POST['addSchool'])){
    $schoolName = $_POST['schoolName'];
    $schoolLevel = $_POST['schoolLevel'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "INSERT INTO schools (`School Name`, `School Level`, `Phone`, `Email`) 
              VALUES (
                '".mysqli_real_escape_string($connect, $schoolName)."',
                '".mysqli_real_escape_string($connect, $schoolLevel)."',
                '".mysqli_real_escape_string($connect, $phone)."',
                '".mysqli_real_escape_string($connect, $email)."'
              )";

    $school = mysqli_query($connect, $query);

    if($school){
      set_message('School was added successfully!', 'success');
      header("Location: index.php"); 
      exit();
    } else {
      set_message('Failed to add school: '.mysqli_error($connect), 'danger');
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ontario Public Schools</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include('reusable/nav.php'); ?>

  <div class="container mt-5">
    <?php get_message(); ?>
    <h1 class="mb-4">Add a New School</h1>
    <form action="add.php" method="POST">
      <div class="mb-3">
        <label for="schoolName" class="form-label">School Name</label>
        <input type="text" class="form-control" id="schoolName" name="schoolName" required>
      </div>
      <div class="mb-3">
        <label for="schoolLevel" class="form-label">School Level</label>
        <input type="text" class="form-control" id="schoolLevel" name="schoolLevel" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <button type="submit" class="btn btn-primary" name="addSchool">Add School</button>
    </form>
  </div>
</body>
</html>
