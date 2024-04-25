<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM landinfo";
    $stmt = $pdo->query($sql);

    if ($stmt) {
        $locations = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $locations[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($locations);
    } else {
        $errorInfo = $pdo->errorInfo();
        echo "Error: Unable to execute the query. Error code: " . $errorInfo[0] . ", Error message: " . $errorInfo[2];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
