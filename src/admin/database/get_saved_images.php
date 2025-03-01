<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Database connection and query to fetch image data
    $connection = mysqli_connect("localhost", "root", "", "thesis");
    $query = "SELECT * FROM images";
    $result = mysqli_query($connection, $query);

    // Create an array to store the image data
    $imageData = array();

    // Fetch each row and add it to the image data array
    while ($row = mysqli_fetch_assoc($result)) {
        $imageData[] = $row;
    }

    // Close the database connection
    mysqli_close($connection);

    // Return the image data as JSON
    echo json_encode(array('success' => true, 'data' => $imageData));
} else {
    echo json_encode(array('success' => false, 'error' => 'Invalid request method.'));
}
?>
