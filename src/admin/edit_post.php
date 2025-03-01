<?php
include('security.php');
ob_start(); // Start output buffering
include('includes/header.php');
include('includes/navbar.php');

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Add your database connection code here
    $sql = "SELECT * FROM posts WHERE id = $post_id";
    $result = mysqli_query($connection, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $body = $row['body'];
    } else {
        echo 'Post not found';
        exit;
    }
} else {
    echo 'Post ID not provided';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $new_title = $_POST['title'];
    $new_body = $_POST['body'];

    // Check if an image was uploaded
    $image_path = $row['image_path'];
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        $image_name = $_FILES['image']['name'];
        $image_path = $upload_dir . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }

    // Add your database connection code here
    // Add your database connection code here
$update_sql = "UPDATE posts SET title = ?, body = ?, image_path = ? WHERE id = ?";
$stmt = mysqli_prepare($connection, $update_sql);

if ($stmt) {
    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "sssi", $new_title, $new_body, $image_path, $post_id);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success'] = "Post deleted successfully!";
        header('Location: post.php');
        exit;
    } else {
        // Error handling if the post update fails
        echo 'Error: ' . mysqli_error($connection);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Error handling if the prepared statement fails
    echo 'Error: ' . mysqli_error($connection);
}

}
?>

<!-- Display the edit form -->
<div class="container">
    <h2>Edit Post</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" required>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" rows="4" required><?php echo $body; ?></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <a href= "post.php" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
ob_end_flush(); // Flush (send) the output buffer and turn off output buffering

?>
