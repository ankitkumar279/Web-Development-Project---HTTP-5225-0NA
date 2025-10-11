<?php 
  include('functions.php');
  secure();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ontario Public Schools</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
  <?php include('reusable/nav.php'); ?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-4 mt-5 mb-5">All Schools</h1>
        </div>
      </div>
    </div>
  </div>

  <?php 
      require('reusable/conn.php');
      $query = 'SELECT * FROM schools';
      $schools = mysqli_query($connect, $query);
  ?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php get_message(); ?>
        </div>
      </div>
      <div class="row">
        <?php
          foreach($schools as $school){
            $schoolName = htmlspecialchars($school['School Name']);
            $schoolLevel = htmlspecialchars($school['School Level']);
            $phone = htmlspecialchars($school['Phone']);
            $email = htmlspecialchars($school['Email']);
            $id = intval($school['id']);

            echo '<div class="col-md-4 mt-2 mb-2">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">' . $schoolName . '</h5>
                        <p class="card-text">' . $schoolLevel . '</p>
                        <span class="badge bg-secondary">' . $phone . '</span>
                        <span class="badge bg-info">' . $email . '</span>
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col">
                            <form action="updateSchool.php" method="GET">
                              <input type="hidden" name="id" value="' . $id . '">
                              <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                          </div>
                          <div class="col text-end">
                            <form action="deleteSchool.php" method="GET">
                                <input type="hidden" name="id" value="' . $id . '">
                                <button type="submit" name="deleteSchool" class="btn btn-sm btn-danger">Delete</button>
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';  
          }
        ?>
      </div>
    </div>
  </div>

</body>
</html>
