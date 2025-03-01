
<?php
// Replace the database credentials with your own
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
