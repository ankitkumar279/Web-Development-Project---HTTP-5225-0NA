<?php
  include('functions.php');
  secure();
  require('reusable/conn.php');

  if(isset($_GET['deleteSchool']) && isset($_GET['id'])){
    $id = intval($_GET['id']); // ensure id is an integer
    $query = "DELETE FROM schools WHERE id = '$id'";
    $school = mysqli_query($connect, $query);

    if($school){
      set_message('School was deleted successfully!', 'danger');
      header('Location: index.php');
      exit();
    } else {
      set_message('Failed to delete school: '.mysqli_error($connect), 'danger');
    }

  } else {
    set_message('Not authorized to delete.', 'danger');
    header('Location: index.php');
    exit();
  }
?>
