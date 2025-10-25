<?php
include('reusable/conn.php');
include('functions.php');
secure();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $image = null;

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image = uploadImage($_FILES['image']); // returns only filename
    }

    $query = "INSERT INTO users (name,email,password,image) VALUES ('$name','$email','$password','$image')";
    mysqli_query($connect, $query);

    set_message('User added successfully!', 'success');
    header('Location: users.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4 text-center">Add New User</h3>

    <?php get_message(); ?>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <button type="submit" name="submit" class="btn btn-success">Add User</button>
                <a href="users.php" class="btn btn-secondary">Back to Users</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
