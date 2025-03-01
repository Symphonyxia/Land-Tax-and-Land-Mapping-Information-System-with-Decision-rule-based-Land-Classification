<?php
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "thesis";

$connection = mysqli_connect($server_name, $db_username, $db_password);
$dbconfig = mysqli_select_db($connection, $db_name);

$response = array();

if ($dbconfig) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the image data and label from the request
        $imageData = $_POST["imageSrc"];
        $label = $_POST["label"];

        // Prepare the SQL statement
        $sql = "INSERT INTO images (image_data, label) VALUES (?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $imageData, $label);

        // Execute the statement
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Image and label were added to the database.";
            $response['imageId'] = $stmt->insert_id; // Retrieve the inserted image ID
        } else {
            $response['success'] = false;
            $response['error'] = "Error inserting data: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        $response['success'] = false;
        $response['error'] = "Invalid request method.";
    }
} else {
    $response['success'] = false;
    $response['error'] = "Database NOT Connected";
}

// Return the response in JSON format
header('Content-Type: application/json');
echo json_encode($response);
?>
