<?php
include('security.php');

// Check if folder ID is provided in the request
if (isset($_POST['folderId'])) {
    $folderId = $_POST['folderId'];

    // Establish a database connection
    $conn = mysqli_connect("localhost", "root", "", "thesis");

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Get the folder name and associated files
    $getFolderInfoQuery = "SELECT folder_name FROM folders WHERE folder_id = '$folderId'";
    $folderInfoResult = mysqli_query($conn, $getFolderInfoQuery);

    if ($folderInfoResult && mysqli_num_rows($folderInfoResult) > 0) {
        $folderInfo = mysqli_fetch_assoc($folderInfoResult);
        $folderName = $folderInfo['folder_name'];

        // Delete the folder's associated files from the server
        $folderPath = "" . $folderName;
        if (is_dir($folderPath)) {
            // Remove all files in the folder
            $files = glob($folderPath . "*");
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
            
            // Remove the folder
            rmdir($folderPath);
        }

        // Delete the folder and its associated files from the database
        $deleteFolderQuery = "DELETE FROM folders WHERE folder_id = '$folderId'";
        $deleteFilesQuery = "DELETE FROM files WHERE folder_id = '$folderId'";

        if (mysqli_query($conn, $deleteFolderQuery) && mysqli_query($conn, $deleteFilesQuery)) {
            $response = array('success' => true, 'message' => 'Folder and associated files deleted successfully.');
            echo json_encode($response);
        } else {
            $response = array('success' => false, 'message' => 'Failed to delete folder and associated files.');
            echo json_encode($response);
        }
    } else {
        $response = array('success' => false, 'message' => 'Folder not found.');
        echo json_encode($response);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    $response = array('success' => false, 'message' => 'Folder ID not provided.');
    echo json_encode($response);
}
?>
