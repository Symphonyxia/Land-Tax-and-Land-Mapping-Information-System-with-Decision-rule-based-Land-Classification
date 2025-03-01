<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'thesis';

// Check if the filename parameter is present
if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];

    // Fetch data based on the filename
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve image metadata
    $sql = "SELECT * FROM images WHERE filename = '$filename'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $imageData = $result->fetch_assoc();

        // Retrieve related landinfo data
        $barangay = $imageData['barangay'];
        $sectionNo = $imageData['section_no'];

        $sql = "SELECT * FROM landinfo WHERE barangay = '$barangay' AND section_no = '$sectionNo'";
        $result = $conn->query($sql);

        $landinfoData = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $landinfoData[] = $row;
            }
        }

        // Return the data as JSON
        echo json_encode([
            'image' => $imageData,
            'landinfo' => $landinfoData
        ]);
    } else {
        echo "No data found for the image.";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
