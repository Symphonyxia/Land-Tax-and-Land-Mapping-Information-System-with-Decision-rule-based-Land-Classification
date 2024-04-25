<?php
include('security.php');

if (isset($_POST['postId'])) {
    $postId = $_POST['postId'];

    // Add your database connection code here (replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thesis";

    // Create a database connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch the current visibility status from the database
    $sql = "SELECT visible FROM posts WHERE id = $postId";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $currentVisibility = $row['visible'];
        // Toggle the visibility (0 to 1 or 1 to 0)
        $newVisibility = $currentVisibility ? 0 : 1;

        // Update the visibility status in the database
        $updateSql = "UPDATE posts SET visible = $newVisibility WHERE id = $postId";
        if (mysqli_query($conn, $updateSql)) {
            // Send the updated visibility status back to the JavaScript
            echo ($newVisibility == 1) ? 'published' : 'unpublished';
            exit;
        } else {
            echo "Error updating visibility: " . mysqli_error($conn);
        }
    } else {
        echo "Post not found";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request";
}
?>
