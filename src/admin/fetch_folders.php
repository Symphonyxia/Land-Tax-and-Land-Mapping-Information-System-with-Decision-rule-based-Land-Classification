<?php
// Perform necessary database operations to retrieve the existing folders
// Example code using MySQLi:
$conn = new mysqli("localhost", "root", "", "thesis");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT * FROM folders");
$stmt->execute();
$result = $stmt->get_result();

// Fetch the folders from the result set
$folders = [];
while ($row = $result->fetch_assoc()) {
  $folders[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode($folders);
?>
