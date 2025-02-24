<?php
// get_images.php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'thesis';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch the image URLs from the images table
$query = "SELECT filename FROM images";
$result = $conn->query($query);

$images = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = 'uploads/' . $row['filename'];
    }
}

$conn->close();

// Return the list of image URLs as a JSON response
header('Content-Type: application/json');
echo json_encode($images);
?>
