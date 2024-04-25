<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['folder_id']) && isset($_POST['new_folder_name'])) {
  $folderId = $_POST['folder_id'];
  $newFolderName = $_POST['new_folder_name'];

  // Perform necessary database operations to update the folder name
  // Example code using MySQLi:
  $conn = new mysqli("localhost", "root", "", "thesis");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the SQL statement
  $stmt = $conn->prepare("UPDATE folders SET folder_name = ? WHERE folder_id = ?");
  $stmt->bind_param("si", $newFolderName, $folderId);
  $stmt->execute();

  $stmt->close();
  $conn->close();

  echo 'Folder name updated successfully';
}
?>
