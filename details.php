<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>




  <?php
    // Get the image file name from query parameter
    $image_file_name = $_GET['image_file_name'];
    // Display the uploaded image
    echo "<h2>Image Details</h2>";
    echo "<img src='uploads/$image_file_name' alt='Uploaded Image' width='300'>";
  ?>
  <form action="#" method="post">
    <!-- Add additional form fields for details as needed -->
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <input type="hidden" name="image_file_name" value="<?php echo $image_file_name; ?>">
    <input type="submit" name="submit" value="Save">
  </form>



  
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>
