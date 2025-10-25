<?php
include('reusable/conn.php');
include('functions.php');
secure();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Get the image to delete from uploads folder
    $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE id=$id"));
    if($user['image'] && file_exists('uploads/'.$user['image'])){
        unlink('uploads/'.$user['image']);
    }

    // Delete user from database
    mysqli_query($connect, "DELETE FROM users WHERE id=$id");

    set_message('User deleted successfully!', 'success');
}

header('Location: users.php');
exit;
?>
