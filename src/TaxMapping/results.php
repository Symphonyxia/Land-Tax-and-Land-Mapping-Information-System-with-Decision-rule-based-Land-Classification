<?php
include('security.php');
include('includes/header.php');
include('includes/navbar_print.php');



$high_value = $mid_min_value = $mid_max_value = $low_value = ""; // Initialize variables

?>


<style>
    @media print {

        /* Hide navigation bars when printing */
        .navbar-nav {
            display: none;
        }

        .print-hidden {
            display: none !important;
        }

        body * {
            visibility: visible;
        }

        * {
            overflow: hidden;
        }

        #graphData,
        #graphData * {
            visibility: visible;
            position: relative;
        }

        #dataTable,
        #dataTable * {
            visibility: visible;
        }

        #dataTable {
            position: absolute;
            top: 0;
            left: 0;
        }

        .sticky-footer {
            display: none;
        }


        .input-group {
            display: none;
        }

        #graphData {
            margin-bottom: 20px;
            /* Adjust as needed */
        }

        #dataTable {
            margin-top: 60%;
            /* Adjust as needed */
        }

    }


    th {
        color: black;
    }

    td {
        color: black;
    }

    #print-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
    text-decoration: none;
    left: 37%;
    top: -10px;
    position: relative;
    }


#print-button:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

#print-button .fa-download {
    margin-right: 5px;
}
</style>

<div class="navbar-nav  align-items-center ">
    <a href="#" id="print-button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="window.print(); return false;">
        <i class="fas fa-download fa-sm text-white-50" style="margin-right: 5px;"></i> Generate Report
    </a>
</div>

<br>

<div class="container">
    <h4 style="margin:10px; color: black; font-weight: bold;">Analysis Per Zoning and Actual Uses</h4>
    <form method="post">
        <div class="form-group">
            <label for="classification">Select Classification:</label>
            <select name="classification" id="classification">
                <option value="agriculture" <?php echo (isset($_POST['classification']) && $_POST['classification'] == 'agriculture') ? 'selected' : ''; ?>>Agriculture</option>
                <option value="residential" <?php echo (isset($_POST['classification']) && $_POST['classification'] == 'residential') ? 'selected' : ''; ?>>Residential</option>
                <option value="industrial" <?php echo (isset($_POST['classification']) && $_POST['classification'] == 'industrial') ? 'selected' : ''; ?>>Industrial</option>
                <option value="commercial" <?php echo (isset($_POST['classification']) && $_POST['classification'] == 'commercial') ? 'selected' : ''; ?>>Commercial</option>
            </select>

            <label for="barangay">Barangay:</label>
            <select name="barangay" id="barangay">
                <option value="">All Barangay</option>
                <option value="Abangay" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Abangay') ? 'selected' : ''; ?>>Abangay</option>
                <option value="Amamaros" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Amamaros') ? 'selected' : ''; ?>>Amamaros</option>
                <option value="Bagacay" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Bagacay') ? 'selected' : ''; ?>>Bagacay</option>
                <option value="Barasan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Barasan') ? 'selected' : ''; ?>>Barasan</option>
                <option value="Batuan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Batuan') ? 'selected' : ''; ?>>Batuan</option>
                <option value="Bongco" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Bongco') ? 'selected' : ''; ?>>Bongco</option>
                <option value="Cahaguichican" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Cahaguichican') ? 'selected' : ''; ?>>Cahaguichican</option>
                <option value="Callan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Callan') ? 'selected' : ''; ?>>Callan</option>
                <option value="Cansilayan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Cansilayan') ? 'selected' : ''; ?>>Cansilayan</option>
                <option value="Casalsagan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Casalsagan') ? 'selected' : ''; ?>>Casalsagan</option>
                <option value="Cato-ogan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Cato-ogan') ? 'selected' : ''; ?>>Cato-ogan</option>
                <option value="Cau-ayan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Cau-ayan') ? 'selected' : ''; ?>>Cau-ayan</option>
                <option value="Culob" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Culob') ? 'selected' : ''; ?>>Culob</option>
                <option value="Danao" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Danao') ? 'selected' : ''; ?>>Danao</option>
                <option value="Dapitan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Dapitan') ? 'selected' : ''; ?>>Dapitan</option>
                <option value="Dawis" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Dawis') ? 'selected' : ''; ?>>Dawis</option>
                <option value="Dongsol" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Dongsol') ? 'selected' : ''; ?>>Dongsol</option>
                <option value="Fernando Parcon Ward" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Fernando Parcon Ward') ? 'selected' : ''; ?>>Fernando Parcon Ward</option>
                <option value="Fundacion" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Fundacion') ? 'selected' : ''; ?>>Fundacion</option>
                <option value="Guibuangan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Guibuangan') ? 'selected' : ''; ?>>Guibuangan</option>
                <option value="Guinacas" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Guinacas') ? 'selected' : ''; ?>>Guinacas</option>
                <option value="Igang" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Igang') ? 'selected' : ''; ?>>Igang</option>
                <option value="Intaluan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Intaluan') ? 'selected' : ''; ?>>Intaluan</option>
                <option value="Iwa Ilaud" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Iwa Ilaud') ? 'selected' : ''; ?>>Iwa Ilaud</option>
                <option value="Iwa Ilaya" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Iwa Ilaya') ? 'selected' : ''; ?>>Iwa Ilaya</option>
                <option value="Jamabalud" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Jamabalud') ? 'selected' : ''; ?>>Jamabalud</option>
                <option value="Jebioc" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Jebioc') ? 'selected' : ''; ?>>Jebioc</option>
                <option value="Lay-ahan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Lay-ahan') ? 'selected' : ''; ?>>Lay-ahan</option>
                <option value="Lopez Jaena Ward" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Lopez Jaena Ward') ? 'selected' : ''; ?>>Lopez Jaena Ward</option>
                <option value="Lumbo" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Lumbo') ? 'selected' : ''; ?>>Lumbo</option>
                <option value="Macatol" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Macatol') ? 'selected' : ''; ?>>Macatol</option>
                <option value="Malusgod" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Malusgod') ? 'selected' : ''; ?>>Malusgod</option>
                <option value="Nabitasan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Nabitasan') ? 'selected' : ''; ?>>Nabitasan</option>
                <option value="Naga" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Naga') ? 'selected' : ''; ?>>
                    Naga</option>
                <option value="Nanga" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Nanga') ? 'selected' : ''; ?>>Nanga</option>
                <option value="Naslo" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Naslo') ? 'selected' : ''; ?>>Naslo</option>
                <option value="Pajo" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Pajo') ? 'selected' : ''; ?>>
                    Pajo</option>
                <option value="Palanguia" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Palanguia') ? 'selected' : ''; ?>>Palanguia</option>
                <option value="Pitogo" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Pitogo') ? 'selected' : ''; ?>>Pitogo</option>
                <option value="Polot-an" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Polot-an') ? 'selected' : ''; ?>>Polot-an</option>
                <option value="Primitivo Ledesma Ward" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Primitivo Ledesma Ward') ? 'selected' : ''; ?>>Primitivo Ledesma Ward</option>
                <option value="Purog" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Purog') ? 'selected' : ''; ?>>Purog</option>
                <option value="Rumbang" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Rumbang') ? 'selected' : ''; ?>>Rumbang</option>
                <option value="San Jose Ward" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'San Jose Ward') ? 'selected' : ''; ?>>San Jose Ward</option>
                <option value="Sinuagan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Sinuagan') ? 'selected' : ''; ?>>Sinuagan</option>
                <option value="Tuburan" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Tuburan') ? 'selected' : ''; ?>>Tuburan</option>
                <option value="Tumcon Ilaud" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Tumcon Ilaud') ? 'selected' : ''; ?>>Tumcon Ilaud</option>
                <option value="Tumcon Ilaya" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Tumcon Ilaya') ? 'selected' : ''; ?>>Tumcon Ilaya</option>
                <option value="Ubang" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Ubang') ? 'selected' : ''; ?>>Ubang</option>
                <option value="Zarrague" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Zarrague') ? 'selected' : ''; ?>>Zarrague</option>
            </select>

            <label for="section_no">Section No:</label>
            <input type="text" name="section_no" id="section_no"
                value="<?php echo isset($_POST['section_no']) ? htmlspecialchars($_POST['section_no']) : ''; ?>">

            <button type="submit" name="search" class="btn btn-primary print-hidden">Search</button>
        </div>

    </form>

    <br>

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <!-- Previous code remains unchanged -->

    <div class="row" id="graphData">
        <div style="width: 49%;">
            <div id="boxplot5" style="width: 100%;"></div>
        </div>

        <br>
        <div style="width: 49%;">
            <div id="histogram-diagram" class="chart-container" style=" margin-left: 15px; width: 100%;"></div>
        </div>
    </div>



    <?php
    // Include database connection and common functions
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thesis";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to fetch data and calculate median
    function fetchDataAndCalculateMedian($classification, $barangay, $section_no)
    {
        global $conn;

        $sql = "SELECT * FROM landinfo WHERE classification = ?";
        $params = ["s", &$classification];

        if (!empty($barangay)) {
            $sql .= " AND barangay = ?";
            $params[0] .= "s";
            $params[] = &$barangay;
        }

        if (!empty($section_no)) {
            $sql .= " AND section_no = ?";
            $params[0] .= "s";
            $params[] = &$section_no;
        }

        $stmt = $conn->prepare($sql);

        // Check if the statement was prepared successfully
        if (!$stmt) {
            return ["success" => false];
        }

        call_user_func_array([$stmt, 'bind_param'], $params);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            // Fetch all rows and store them in an array
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            // Calculate median for the cluster
            $marketValues = array_column($rows, 'market_val');
            $median = calculateMedian($marketValues);

            return ["success" => true, "median" => $median, "rows" => $rows];
        }

        return ["success" => false];
    }

    // Function to display data in a responsive table
    function displayData($rows, $median)
    {
        echo "<div class='table-responsive'>
    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
    <tr>
                        <th>Lot No.</th>
                        <th>Assessment Level</th>
                        <th>Market Value</th>
                        <th>Payables</th>
                        <th>Factors</th>
                        <th>Classification</th>
                    </tr>";

        // Display rows
        foreach ($rows as $row) {
            $cluster = calculateMedian([$row['market_val']]); // Calculate cluster using the median of individual market values
            $classification = classifyValue($row['market_val'], $row['factors'], $median);

            echo "<tr>
                <td>{$row['lot_no']}</td>
                <td>{$row['assess_level']}</td>
                <td>{$row['market_val']}</td>
                <td>{$row['payables']}</td>
                <td>{$row['factors']}</td>
                <td>{$classification}</td>
            </tr>";
        }

        echo "</table></div>";
    }

    // Handle search
    if (isset($_POST['search'])) {
        $classification = $_POST['classification'];
        $barangay = $_POST['barangay'];
        $section_no = $_POST['section_no'];

        // Fetch data and calculate median
        $searchResult = fetchDataAndCalculateMedian($classification, $barangay, $section_no);

        if ($searchResult["success"]) {
            // Display the median
            echo "<p><strong>Median Market Value: {$searchResult['median']}</strong></p>";

            // Display the data in a responsive table
            displayData($searchResult['rows'], $searchResult['median']);

            // Generate and display the histogram
            generateHistogram($searchResult['rows']);

            // Fetch market_val data from the landinfo table based on search criteria for the box plot
            $Query = "SELECT market_val FROM landinfo WHERE classification = ?";

            // Add conditions for barangay and section_no if they are provided
            if (!empty($barangay)) {
                $Query .= " AND barangay = ?";
            }

            if (!empty($section_no)) {
                $Query .= " AND section_no = ?";
            }

            // Prepare and execute the query
            $stmt = $conn->prepare($Query);

            // Check if the statement was prepared successfully
            if (!$stmt) {
                echo "Error preparing statement: " . $conn->error;
                exit;
            }

            // Bind parameters
            $stmt = $conn->prepare($Query);

            // Check if the statement was prepared successfully
            if (!$stmt) {
                echo "Error preparing statement: " . $conn->error;
                exit;
            }

            $params = ["s"];

            // Bind classification parameter
            $params[] = &$classification;

            // Bind additional parameters if provided
            if (!empty($barangay)) {
                $Query .= " AND barangay = ?";
                $params[0] .= "s";
                $params[] = &$barangay;
            }

            if (!empty($section_no)) {
                $Query .= " AND section_no = ?";
                $params[0] .= "s";
                $params[] = &$section_no;
            }

            call_user_func_array([$stmt, 'bind_param'], $params);

            // Execute the query
            $stmt->execute();



            // Fetch the result
            $result = $stmt->get_result();

            // Process the result as needed
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $marketValues[] = $row['market_val'];
                }

                // Include Plotly.js
                echo "<script src='https://cdn.plot.ly/plotly-latest.min.js'></script>";

                // Prepare data for Plotly
                echo "<script>
                var trace = {
                    y: " . json_encode($marketValues) . ",
                    type: 'box',
                    boxpoints: 'outliers', // Show outliers
                    boxmean: 'sd', // Show standard deviation
                    name: 'Market Value Boxplot'
                };

                var layout = {
                    title: 'Market Value Boxplot',
                    yaxis: { title: 'Market Value' }
                };

                // Create the boxplot using Plotly
                Plotly.newPlot('boxplot5', [trace], layout);
            </script>";
            } else {
                echo "No records found for the box plot.";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo '<p style="text-align: center; font-weight: bold;">No records found.</p>';
        }
    }


    // Function to generate the histogram
    function generateHistogram($data)
    {
        // Count the occurrences of each classification
        $classificationCounts = array_count_values(array_column($data, 'classification'));

        // Extract data for the histogram
        $histogramData = [
            'labels' => array_keys($classificationCounts),
            'values' => array_values($classificationCounts),
        ];

        $histogramDataJson = json_encode($histogramData);

        echo "<script>
        var histogramData = $histogramDataJson;
        var data = [{
            x: histogramData.labels,
            y: histogramData.values,
            type: 'bar'
        }];
        var layout = {
            title: 'Classification Histogram',
            xaxis: {
                title: 'Classification'
            },
            yaxis: {
                title: 'Count'
            },
            height: 400
        };
        Plotly.newPlot('histogram-diagram', data, layout);
    </script>";
    }


    // Function to calculate median
    function calculateMedian($data)
    {
        sort($data);
        $count = count($data);
        $middle = floor($count / 2);

        if ($count % 2 == 0) {
            $median = ($data[$middle - 1] + $data[$middle]) / 2;
        } else {
            $median = $data[$middle];
        }

        return $median;
    }

    // Function to classify the value based on market_val and factors
    function classifyValue($marketValue, $factors, $median)
    {
        $factorsArray = explode(',', $factors);
        $factorsCount = count($factorsArray);

        // Fetch threshold values from the database
        $thresholdValues = getThresholdValues();

        // Use the fetched threshold values
        $high = $thresholdValues['high'];
        $mid_max = $thresholdValues['mid_max'];
        $mid_min = $thresholdValues['mid_min'];
        $low = $thresholdValues['low'];

        if ($marketValue > $median) {
            if ($factorsCount >= $high) {
                return 'High Value';
            } elseif ($factorsCount >= $mid_min && $factorsCount <= $mid_max) {
                return 'Mid Value';
            } else {
                return 'Low Value';
            }
        } else {
            if ($factorsCount >= $low && $factorsCount <= 0) {
                return 'Low Value';
            } else {
                return 'Low Value';
            }
        }
    }

    // Function to fetch threshold values from the database
    function getThresholdValues()
    {
        $connection = mysqli_connect("localhost", "root", "", "thesis");

        $query = "SELECT * FROM threshold_values";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            // Handle the case when fetching fails (e.g., return default values)
            return array(
                'high' => 3,
                'mid_max' => 2,
                'mid_min' => 1,
                'low' => 0
            );
        }
    }


    ?>

<?php if (!isset($_POST['search'])): ?>
    <h4 style="margin:10px; color: black; font-weight: bold;">Land Analysis per Actual Uses</h4>
    <div class="row">
        <div style="width: 49%;">
            <div id="boxplot" class="input-group" style="width: 100%;"></div>
        </div>

        <div style="width: 49%;">
            <div id="boxplot2" class="input-group" style="width: 100%;"></div>
        </div>

        <div style="width: 49%;">
            <div id="boxplot3" class="input-group" style="width: 100%;"></div>
        </div>

        <div style="width: 49%;">
            <div id="boxplot4" class="input-group" style="width: 100%;"></div>
        </div>
    </div>
    <?php endif; ?>

    <br>




    <?php
    // Replace these variables with your actual database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thesis";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch market_val data from the landinfo table for agriculture classification
    $agriQuery = "SELECT market_val FROM landinfo WHERE classification = 'agriculture'";
    $agriResult = $conn->query($agriQuery);
    $marketValues = array();

    if ($agriResult->num_rows > 0) {
        while ($row = $agriResult->fetch_assoc()) {
            $marketValues[] = $row['market_val'];
        }
    }

    // Close the connection
    $conn->close();
    ?>

    <!-- Include Plotly.js -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>


    <script>
        // Prepare data for Plotly
        var trace = {
            y: <?php echo json_encode($marketValues); ?>,
            type: 'box',
            boxpoints: 'outliers', // Show outliers
            boxmean: 'sd', // Show standard deviation
            name: 'Market Value Boxplot'
        };

        var layout = {
            title: 'Market Value Boxplot for Agriculture',
            yaxis: { title: 'Market Value' }
        };

        // Create the boxplot using Plotly
        Plotly.newPlot('boxplot', [trace], layout);
    </script>



    <?php
    // Replace these variables with your actual database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thesis";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch market_val data from the landinfo table for agriculture classification
    $resiQuery = "SELECT market_val FROM landinfo WHERE classification = 'residential'";
    $resiResult = $conn->query($resiQuery);
    $marketValues = array();

    if ($resiResult->num_rows > 0) {
        while ($row = $resiResult->fetch_assoc()) {
            $marketValues[] = $row['market_val'];
        }
    }

    // Close the connection
    $conn->close();
    ?>

    <!-- Include Plotly.js -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>


    <script>
        // Prepare data for Plotly
        var trace = {
            y: <?php echo json_encode($marketValues); ?>,
            type: 'box',
            boxpoints: 'outliers', // Show outliers
            boxmean: 'sd', // Show standard deviation
            name: 'Market Value Boxplot'
        };

        var layout = {
            title: 'Market Value Boxplot for Residential',
            yaxis: { title: 'Market Value' }
        };

        // Create the boxplot using Plotly
        Plotly.newPlot('boxplot2', [trace], layout);
    </script>



    <?php
    // Replace these variables with your actual database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thesis";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch market_val data from the landinfo table for agriculture classification
    $commQuery = "SELECT market_val FROM landinfo WHERE classification = 'commercial'";
    $commResult = $conn->query($commQuery);
    $marketValues = array();

    if ($commResult->num_rows > 0) {
        while ($row = $commResult->fetch_assoc()) {
            $marketValues[] = $row['market_val'];
        }
    }

    // Close the connection
    $conn->close();
    ?>

    <!-- Include Plotly.js -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>


    <script>
        // Prepare data for Plotly
        var trace = {
            y: <?php echo json_encode($marketValues); ?>,
            type: 'box',
            boxpoints: 'outliers', // Show outliers
            boxmean: 'sd', // Show standard deviation
            name: 'Market Value Boxplot'
        };

        var layout = {
            title: 'Market Value Boxplot for Commercial',
            yaxis: { title: 'Market Value' }
        };

        // Create the boxplot using Plotly
        Plotly.newPlot('boxplot3', [trace], layout);
    </script>



    <?php
    // Replace these variables with your actual database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thesis";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch market_val data from the landinfo table for agriculture classification
    $induQuery = "SELECT market_val FROM landinfo WHERE classification = 'industrial'";
    $induResult = $conn->query($induQuery);
    $marketValues = array();

    if ($induResult->num_rows > 0) {
        while ($row = $induResult->fetch_assoc()) {
            $marketValues[] = $row['market_val'];
        }
    }

    // Close the connection
    $conn->close();
    ?>

    <!-- Include Plotly.js -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>


    <script>
        // Prepare data for Plotly
        var trace = {
            y: <?php echo json_encode($marketValues); ?>,
            type: 'box',
            boxpoints: 'outliers', // Show outliers
            boxmean: 'sd', // Show standard deviation
            name: 'Market Value Boxplot'
        };

        var layout = {
            title: 'Market Value Boxplot for Industrial',
            yaxis: { title: 'Market Value' }
        };

        // Create the boxplot using Plotly
        Plotly.newPlot('boxplot4', [trace], layout);

    </script>

    <br>
    <br>
</div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>