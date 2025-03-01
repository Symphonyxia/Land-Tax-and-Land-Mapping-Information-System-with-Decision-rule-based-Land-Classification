<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barangayName = isset($_POST["barangayName"]) ? $_POST["barangayName"] : '';
    $sectionNo = isset($_POST["sectionNumber"]) ? $_POST["sectionNumber"] : '';
    $imageData = isset($_FILES["imageData"]) ? $_FILES["imageData"] : '';

    if (empty($barangayName) || empty($sectionNo) || empty($imageData)) {
        header("Location: gallery.php?folder_name=" . urlencode($barangayName));
    } else {
        // Create a folder if it doesn't exist
        $folderPath =  $barangayName;

        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0755, true); // Create the folder recursively
        }

        // Get the file name
        $timestamp = time();
        $randomString = bin2hex(random_bytes(8));
        $fileName = $barangayName . '_' . $sectionNo . '_' . $timestamp . '_' . $randomString . '.png';
        $targetFilePath = $folderPath . '/' . $fileName;

        // Check if the folder already exists in the database
        $conn = mysqli_connect("localhost", "root", "", "thesis");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $folderQuery = "SELECT folder_id FROM folders WHERE folder_name = '$barangayName'";
        $folderResult = $conn->query($folderQuery);

        if ($folderResult->num_rows > 0) {
            $folderRow = $folderResult->fetch_assoc();
            $folderId = $folderRow["folder_id"];
        } else {
            // If the folder doesn't exist in the database, create a new one
            $createFolderQuery = "INSERT INTO folders (folder_name) VALUES ('$barangayName')";
            if ($conn->query($createFolderQuery) === true) {
                $folderId = $conn->insert_id;
            } else {
                echo "Error creating folder in the database: " . $conn->error;
                $conn->close();
                exit;
            }
        }

        // Move the uploaded image to the destination folder
        if (move_uploaded_file($imageData["tmp_name"], $targetFilePath)) {
            // Now, insert the details into the database
            $insertQuery = "INSERT INTO files (folder_id, file_name, file_path, barangay, section_no) 
                VALUES ('$folderId', '$fileName', '$targetFilePath', '$barangayName', '$sectionNo')";

            if ($conn->query($insertQuery) === true) {
                // Record added successfully
                $conn->close();

                // Redirect to the appropriate folder in upload.php with the barangay parameter
                header("Location: upload.php?folder_id=" . $folderId . "&folder_name=" . urlencode($barangayName));
                exit;
            } else {
                echo "Error inserting data into the files table: " . $conn->error;
            }
        } else {
            echo "Failed to save the image.";
        }

        $conn->close();
    }
} else {
    echo "Invalid request.";
}
?>
