<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<style>

      .post-container {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .post-image {
        max-width: 200px;
        margin-right: 20px;
    }

    .post-content {
        flex: 1;
    }

    .read-more-button {
        margin-top: 10px;
    }

    .edit-button {
        color: #4CAF50; /* Green color */
        margin-right: 10px; /* Add margin to separate from the trash icon */
    }

    .delete-button {
        color: #FF0000; /* Red color */
    }

    .visibility-text {
        margin-right: 5px;
        cursor: pointer; /* Add a pointer cursor for clickable text */
    }

    /* Style the text when it's published */
    .published-text {
        color: green;
    }

    /* Style the text when it's unpublished */
    .unpublished-text {
        color: red;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function toggleVisibility(postId) {
        // Send an AJAX request to update the visibility status
        $.ajax({
            url: 'toggle_visibility.php',
            type: 'POST',
            data: { postId: postId },
            success: function(response) {
                // Update the visibility text and class based on the response
                var visibilityText = $('#visibility-text-' + postId);
                if (response === 'published') {
                    visibilityText.text('published');
                    visibilityText.removeClass('unpublished-text').addClass('published-text');
                } else if (response === 'unpublished') {
                    visibilityText.text('unpublished');
                    visibilityText.removeClass('published-text').addClass('unpublished-text');
                }
            }
        });
    }
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2 class="text-center font-weight-bold">Create New Post</h2>
            <form action="create_post.php" method="post" enctype="multipart/form-data">
                <div class="form-group font-weight-bold">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group font-weight-bold">
                    <label for="body">Body</label>
                    <textarea class="form-control" name="body" rows="4" required></textarea>
                </div>
                <div class="form-group font-weight-bold">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
                <button type="submit" class="btn btn-primary float-right">Create Post</button>
            </form>
        </div>
    </div>
</div>

    <br>
<hr>
<br>
<?php
// Display success message if set
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-primary">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']); // Clear the success message
}

// Fetch and display existing posts
$sql = "SELECT * FROM posts";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="post-container">';
        
        if (!empty($row['image_path'])) {
            echo '<div class="post-image" style="margin-left: 30px;">'; // Add margin to the left side of the image
            echo '<img src="' . $row['image_path'] . '" alt="Post Image" class="img-fluid">';
            echo '</div>';
        }
        
        echo '<div class="post-content" style="margin-bottom: 20px; padding: 15px; radius: 8px;" >';
        echo '<h2 style="margin-bottom: 10px;">' . $row['title'] . '</h2>';
        echo '<p style="margin-bottom: 15px;">' . substr($row['body'], 0, 150) . '...</p>'; // Limit to 150 characters
        echo '<a href="view_post.php?id=' . $row['id'] . '" class="btn btn-primary read-more-button">Read More</a>';
        echo '</div>';

        // Add margin to the right side of the visibility text
        echo '<span id="visibility-text-' . $row['id'] . '" class="visibility-text ';
        echo ($row['visible'] == 1) ? 'published-text" onclick="toggleVisibility(' . $row['id'] . '); return false;">' : 'unpublished-text" onclick="toggleVisibility(' . $row['id'] . '); return false;">';
        echo ($row['visible'] == 1) ? 'published' : 'unpublished';
        echo '</span>';

        // Add margin to the right side of the edit and delete buttons
        echo '<a href="edit_post.php?id=' . $row['id'] . '" class="edit-button" style="margin-right: 10px;"><i class="fas fa-pencil-alt"></i></a>'; // Edit icon
        echo '<a href="code.php?id=' . $row['id'] . '" class="delete-button" style="margin-right: 30px;"><i class="fas fa-trash"></i></a>'; // Trash icon

        echo '</div>';
    }
} else {
    echo '<p>No posts available.</p>';
}
?>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
