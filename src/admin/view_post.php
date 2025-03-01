<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<style>
    /* Add CSS styles for post content */
    .post-container {
        text-align: center;
    }

    .post-image {
        max-width: 400px;
        margin: 0 auto; /* Center the image horizontally */
    }

    .post-title {
        margin-top: 20px;
        font-size: 24px;
        font-weight: bold;
    }

    .post-body {
        text-align: justify;
        margin: 20px;
    }
</style>

<div class="container">
    <?php
    if (isset($_GET['id'])) {
        $post_id = $_GET['id'];

        // Add your database connection code here
        $sql = "SELECT * FROM posts WHERE id = $post_id";
        $result = mysqli_query($connection, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            if (!empty($row['image_path'])) {
                echo '<div class="post-container">';
                echo '<img src="' . $row['image_path'] . '" alt="Post Image" class="img-fluid post-image">';
                echo '<div class="post-title">' . $row['title'] . '</div>';
                echo '</div>';
            }

            echo '<div class="post-body">' . $row['body'] . '</div>';
        } else {
            echo 'Post not found';
        }
    } else {
        echo 'Post ID not provided';
    }
    ?>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
