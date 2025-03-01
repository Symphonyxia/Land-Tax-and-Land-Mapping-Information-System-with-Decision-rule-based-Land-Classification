<?php
include('security.php');
include('user_include/header.php');
include('user_include/navbar.php');
?>

<style>
     body {
        background-color: #f0f0f0; 
        background-image: url('gallery/admin.jpg'); /* Replace 'path/to/your/image.jpg' with your image file path */
        background-size: cover;/* Set the background color of the body */
    }

  .post-container {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
    }

  .post-image {
        max-width: 100%;
        max-height: 100%;
        margin-right: 20px;
    }

    .post-content {
        flex: 1;
    }

    .read-more-button {
        margin-top: 10px;
    }

</style>

<!-- Begin Page Content -->
  <!-- Page Heading -->

  <br>
  <!-- Content Row -->
  


<br>
<br>
 <!-- Post Feed -->
    <div class="post-feed">
        <h2 style="color: black; text-align: center; font-weight: bold;">What's With the Assessors?</h2>
<br>
<br>


        <?php
        // Fetch and display published posts
        $sql = "SELECT * FROM posts WHERE visible = 1 ORDER BY id DESC"; // Assuming 'visible' indicates published posts
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="post" style="display: flex; align-items: center; margin-top: 20px;">';
                
                if (!empty($row['image_path'])) {
                    echo '<div style="flex: 0 0 30%; margin-right: 20px; padding: 50px;">';
                    echo '<img src="' . $row['image_path'] . '" alt="Post Image" class="img-fluid" style="max-width: 100%;">';
                    echo '</div>';
                }
                
                echo '<div style="flex: 1; color: black;">';
                echo '<div class="post-title" style="font-size: 24px; font-weight: bold; margin-top: 0px;">' . $row['title'] . '</div>';
                echo '<div>' . substr($row['body'], 0, 150) . '...</div>'; // Limit to 150 characters
                echo '<br>';
                echo '<br>';
                echo '<br>';
                echo '<a href="user_post.php?id=' . $row['id'] . '"><button class="btn btn-primary">Read More</button></a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p style="color: black; text-align: center; font-weight: bold;">No published posts available.</p>';
        }
        ?>
    </div>
</div>

</div>




<?php
include('user_include/scripts.php');
?>