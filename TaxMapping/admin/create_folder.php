<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['folderName'])) {
    $folderName = $_POST['folderName'];
    $iconUrl = 'https://img.icons8.com/emoji/96/file-folder-emoji.png';

    // Define the path to the gallery folder
    $galleryFolderPath = '';

    // Create the folder inside the gallery folder
    if (!file_exists($galleryFolderPath . $folderName)) {
        mkdir($galleryFolderPath . $folderName);

        // Insert the folder name into your database table
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "thesis";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO folders (folder_name) VALUES (?)");
        $stmt->bind_param("s", $folderName);
        $stmt->execute();

        // Check if the folder was inserted successfully
        if ($stmt->affected_rows > 0) {
            $newFolderId = $stmt->insert_id;
            echo json_encode(array('success' => true, 'folder_id' => $newFolderId, 'message' => 'Folder created and inserted successfully.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Error inserting folder into the database.'));
        }

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(array('success' => false, 'message' => 'Folder already exists.'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request.'));
}
?>
