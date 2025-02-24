<?php
include('security.php');

$connection = mysqli_connect("localhost", "root", "", "thesis");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $title = $_POST['title'];
    $body = $_POST['body'];

    // Check if an image was uploaded
    $image_path = '';
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/'; // Create a directory called 'uploads' to store images
        $image_name = $_FILES['image']['name'];
        $image_path = $upload_dir . $image_name;

        // Move the uploaded image to the 'uploads' directory
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }

    // Use prepared statements to avoid SQL injection
    $sql = "INSERT INTO posts (title, body, image_path) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $title, $body, $image_path);
        if (mysqli_stmt_execute($stmt)) {
            // Post created successfully, redirect to the blog page
            session_start(); // Start the session if not already started
            $_SESSION['success'] = 'New post added successfully';
            header('Location: post.php');
            exit;
        } else {
            // Error handling if the post creation fails
            echo 'Error: ' . mysqli_error($connection);
            header('Location: post.php');
        }
        mysqli_stmt_close($stmt);
    }
}
?>
