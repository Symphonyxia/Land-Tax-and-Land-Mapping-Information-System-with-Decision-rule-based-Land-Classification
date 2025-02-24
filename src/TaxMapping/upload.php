<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

// Initialize message
$msg = "";

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "thesis");


// Check if the form is submitted for image deletion
if (isset($_POST['deleteImages'])) {
    // Check if any images are selected for deletion
    if (isset($_POST['imageToDelete']) && is_array($_POST['imageToDelete'])) {
        foreach ($_POST['imageToDelete'] as $imageId) {
            // Sanitize and validate the image ID (to prevent SQL injection)
            $imageId = mysqli_real_escape_string($conn, $imageId);

            // Query to get the file path for the selected image
            $query = "SELECT file_path FROM files WHERE file_id = '$imageId'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $filePath = $row['file_path'];

                // Check if the file exists before attempting to delete
                if (file_exists($filePath)) {
                    // Delete the file from the server
                    if (unlink($filePath)) {
                        // Remove the image record from the database
                        $deleteQuery = "DELETE FROM files WHERE file_id = '$imageId'";
                        mysqli_query($conn, $deleteQuery);
                        $msg = "Deleted successfully!";
                    } else {
                        $msg = "Failed to delete image.";
                    }
                } else {
                    $msg = "File does not exist: $filePath";
                }
            } else {
                $msg = "Image not found in the database.";
            }
        }
    }
}




// Initialize folder ID
$folderId = null;
if (isset($_GET['folder_id'])) {
    $folderId = $_GET['folder_id'];
}

// Check if the form is submitted
if (isset($_POST['upload'])) {
    // Rest of your code
}
// Check if the form is submitted
if (isset($_POST['upload'])) {
    // Retrieve other input data
    $barangay = $_POST['image-barangay'];
    $sectionNo = $_POST['image-section'];


    // File upload configuration
    $filename = basename($_FILES["image-file"]["name"]);
    $targetFilePath = 'uploads/' . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    
    // Check if the file type is allowed
    if (in_array($fileType, $allowedTypes)) {
        // Upload the file
        if (move_uploaded_file($_FILES["image-file"]["tmp_name"], $targetFilePath)) {
            // Insert image data into the database
            $insertQuery = "INSERT INTO files (folder_id, file_name, file_path, barangay, section_no) 
                            VALUES ('$folderId', '$filename', '$targetFilePath', '$barangay', '$sectionNo')";
            mysqli_query($conn, $insertQuery);
            
            $msg = "Image uploaded and data saved successfully!";
        } else {
            $msg = "Failed to upload image.";
        }
    } else {
        $msg = "Invalid file format. Allowed formats: " . implode(', ', $allowedTypes);
    }
}

// Check for a success message in the URL
$successMessage = isset($_GET['success_message']) ? urldecode($_GET['success_message']) : '';

// Display the success message if it's not empty
if (!empty($successMessage)) {
    echo '<div class="alert alert-primary" role="alert">' . $successMessage . '</div>';
}
?>

<!-- Display the message only if it is not empty -->
<?php if (!empty($msg)): ?>
    <div class="alert alert-primary" role="alert"><?php echo $msg; ?></div>
<?php endif; ?>


<!-- Rest of your HTML content and form -->
<!-- ... -->


<style>
   .image-container {
        display: inline-block;
        width: 350px; /* Adjust the width of each image container */
        margin: 10px; /* Adjust the margin between image containers */
    }

    .image-container img {
        max-width: 100%; /* Ensure the image fits within the container */
        height: auto; /* Maintain the aspect ratio of the image */
        justify-content: center;
    }

    .folder-info {
    display: flex;
    align-items: center;
    margin-left: 10px;
}

.folder-name {
    margin-left: 30px;
}

    
</style>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "thesis");

    // Get the folder name
    $folderId = null;
    $folderName = null;

    if (isset($_GET['folder_id'])) {
        $folderId = $_GET['folder_id'];

        $folderQuery = "SELECT folder_name FROM folders WHERE folder_id = $folderId";
        $folderResult = mysqli_query($conn, $folderQuery);
        $folderRow = mysqli_fetch_assoc($folderResult);
        $folderName = $folderRow['folder_name'];
    }



    // Query to count the number of files in the folder
$countFilesQuery = "SELECT COUNT(*) as fileCount FROM files WHERE folder_id = '$folderId'";
$fileCountResult = mysqli_query($conn, $countFilesQuery);

// Initialize a variable to store the file count
$fileCount = 0;

if ($fileCountResult && mysqli_num_rows($fileCountResult) > 0) {
    $fileCountRow = mysqli_fetch_assoc($fileCountResult);
    $fileCount = $fileCountRow['fileCount'];
}

    ?>

    
<div class="folder-info">
    <a href="gallery.php" style="text-decoration: none; color: primary; font-size: 35px; margin-right:-30px; margin-bottom: 10px;">←</a>
    <h3 class="folder-name">Folder: <?php echo $folderName; ?></h3>
</div>


    <div id="content">
    <form method="POST" action="" enctype="multipart/form-data">
    <!-- Existing form content -->

    <div class="form-row ">
        <div class="form-group col-md-4">
            <label for="image-file">Choose Image:</label>
            <input type="file" id="image-file" name="image-file" required class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label for="image-barangay">Barangay:</label>
            <input type="text" id="image-barangay" name="image-barangay" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label for="image-section">Section No.:</label>
            <input type="text" id="image-section" name="image-section" class="form-control">
        </div>
        </div>

        <div class="text-right ">
            <button class="btn btn-primary" type="submit" name="upload">Upload</button>
        </div>
</form>

    </div>
   <!-- Inside your PHP and HTML code -->
   <div id="display-image">
    <form method="POST" action="">
        <input type="hidden" name="folder_id" value="<?php echo $folderId; ?>">

        <?php
        $query = "SELECT * FROM files WHERE folder_id = '$folderId'";
        $result = mysqli_query($conn, $query);

        while ($data = mysqli_fetch_assoc($result)) {
        ?>

            <div class="image-container">
                <label>
                    <input type="checkbox" name="imageToDelete[]" value="<?php echo $data['file_id']; ?>">
                    <img src="<?php echo $data['file_path']; ?>" alt="<?php echo $data['file_name']; ?>" style="cursor: pointer;" onclick="viewImageDetails('<?php echo $data['file_name']; ?>')">
                </label>
            </div>

        <?php
        }
        ?>

        <?php if ($fileCount > 0): ?>
            <div class="text-right">
                <button class="btn btn-danger" type="submit" name="deleteImages" style="font-size: 15px;">
                    <i class="fas fa-trash-alt"></i> Delete
                </button>
            </div>
        <?php endif; ?>
    </form>
</div>

<div id="image-data">
    <!-- Image data and related data will be displayed here -->
</div>
<br>
<div id="landinfo-data">
    <!-- Image data and related data will be displayed here -->
</div>

<script>

function viewImageDetails(filename) {
    window.location.href = `image_details.php?file_name=${filename}`;
}

</script>



<?php
include('includes/scripts.php');
?>