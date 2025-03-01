<?php
// Example database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "thesis";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch threshold values from the database
$sql = "SELECT * FROM threshold_values";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $high_value = $row['high'];
        $mid_min_value = $row['mid_min'];
        $mid_max_value = $row['mid_max'];
        $low_value = $row['low'];
    }
} else {
    echo "No rows found in the threshold_values table";
}

$conn->close();
?>


    <style>
        .text {
            font-size: 12px;
            fill: #333;
        }

        table.rule {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
<?php if (!isset($_POST['search'])): ?>
    <div class="container">
        <br>
        <h4 style="font-weight: bold;">Decision Table</h4>
        <table class="rule">
            <tr>
                <th>Rule</th>
                <th>Classification</th>
            </tr>
            <tr>
                <td>Lot median substantially exceeds market value</td>
                <td rowspan="2">High Value</td>
            </tr>
            <tr>
                <td>Selected more than <?php echo $high_value ?> factors from the checklist</td>
            </tr>
            <tr>
                <td>Lot median remains higher than market value (not significant)</td>
                <td rowspan="2">Mid Value</td>
            </tr>
            <tr>
                <td>Selected <?php echo $mid_min_value ?> or <?php echo $mid_max_value ?> factors from the checklist</td>
            </tr>
            <tr>
                <td>Lot median greater than market value</td>
                <td rowspan="2">Low Value</td>
            </tr>
            <tr>
                <td>Selected 0 or <?php echo $low_value ?> factor from the checklist</td>
            </tr>
            <tr>
                <td>Lot median lower than market value</td>
                <td rowspan="2">Low Value</td>
            </tr>
            <tr>
                <td>Identified any number of factors (greater than 0)</td>
            </tr>
        </table>
    </div>
    <?php endif; ?>
