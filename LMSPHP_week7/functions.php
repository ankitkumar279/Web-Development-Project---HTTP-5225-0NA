<?php
session_start();

/**
 * Protect pages from unauthorized access
 */
function secure(){
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
        exit;
    }
}

/**
 * Set a flash message
 */
function set_message($message, $className){
    $_SESSION['message'] = $message;
    $_SESSION['className'] = $className;
}

/**
 * Display a flash message
 */
function get_message(){
    if(isset($_SESSION['message'])){
        echo '<div class="alert alert-'.$_SESSION['className'].'" role="alert">'
             . $_SESSION['message'] .
             '</div>';
        unset($_SESSION['message']);
        unset($_SESSION['className']);
    }
}

/**
 * Upload an image file
 */
function uploadImage($file) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = time() . '_' . basename($file["name"]);
    $targetFile = $targetDir . $fileName;

    move_uploaded_file($file["tmp_name"], $targetFile);

    return $fileName; // only filename stored in DB
}
?>
