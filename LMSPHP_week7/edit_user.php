<?php
include('reusable/conn.php');
include('functions.php');
secure();

$id = $_GET['id'];
$user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE id=$id"));

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? md5($_POST['password']) : $user['password'];
    $image = $user['image'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image = uploadImage($_FILES['image']);
    }

    $query = "UPDATE users SET name='$name', email='$email', password='$password', image='$image' WHERE id=$id";
    mysqli_query($connect, $query);

    set_message('User updated successfully!', 'success');
    header('Location: users.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4 text-center">Edit User</h3>
    <?php get_message(); ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password (leave blank to keep current)</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                    <?php if($user['image'] && file_exists('uploads/'.$user['image'])): ?>
                        <img src="uploads/<?= $user['image'] ?>" width="50" height="50" class="rounded-circle mt-2">
                    <?php endif; ?>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update User</button>
                <a href="users.php" class="btn btn-secondary">Back to Users</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
