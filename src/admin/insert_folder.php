<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['folder_name'])) {
  $folderName = $_POST['folder_name'];

  // Perform necessary database operations to insert the new folder
  // Example code using MySQLi:
  $conn = new mysqli("localhost", "root", "", "thesis");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the SQL statement
  $stmt = $conn->prepare("INSERT INTO folders (folder_name) VALUES (?)");
  $stmt->bind_param("s", $folderName);
  $stmt->execute();

  $folderId = $stmt->insert_id;

  $stmt->close();
  $conn->close();

  echo $folderId;
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folderName = isset($_POST["folderName"]) ? $_POST["folderName"] : '';

    if (empty($folderName)) {
        echo json_encode(array("success" => false, "message" => "Folder name is required."));
    } else {
        $mysqli = new mysqli("localhost", "root", "", "thesis");

        if ($mysqli->connect_error) {
            echo json_encode(array("success" => false, "message" => "Database connection error."));
        } else {
            $query = "INSERT INTO folders (folder_name) VALUES ('$folderName')";

            if ($mysqli->query($query) === true) {
                echo json_encode(array("success" => true, "folderId" => $mysqli->insert_id));
            } else {
                echo json_encode(array("success" => false, "message" => "Error inserting folder into the database."));
            }

            $mysqli->close();
        }
    }
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request."));
}
?>
