<?php
include ('security.php');
include ('includes/header.php');
include ('includes/navbar.php');
?>


<style>
    .card {
        margin-left: 10px;
    }

    /* Center the "No data found" message */
    #no-data-message {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .invisible-link {
        display: none;
    }

    tr {
        cursor: pointer;
    }

    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        color: #007bff;
        text-decoration: none;
        padding: 8px 16px;
        border: 1px solid #007bff;
        margin: 0 4px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .pagination a:hover {
        background-color: #007bff;
        color: #fff;
    }

    .pagination .active {
        background-color: #007bff;
        color: #fff;
    }

    p {
        padding: 10px;
    }

    #print-button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
        text-decoration: none;
        left: 37%;
        top: -30px;
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

<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

<br>
<?php
// Display the "Generate Report" button
echo '<div class="navbar-nav align-items-center">';
echo '<a href="#" id="print-button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="window.print(); return false;">';
echo '<i class="fas fa-download fa-sm text-white-50"></i> Generate Report';
echo '</a>';
echo '</div>';
$pdo = new PDO('mysql:host=localhost;dbname=thesis', 'root', '');

// Fetch count of registered users where usertype is 'user'
$query = "SELECT COUNT(*) AS userCount FROM register WHERE usertype = 'user'";
$statement = $pdo->query($query);
$userCountResult = $statement->fetch(PDO::FETCH_ASSOC);
$userCount = $userCountResult['userCount'];

// Fetch count of registered lot_no in landinfo table
$queryLotCount = "SELECT COUNT(*) AS lotCount FROM landinfo";
$statementLotCount = $pdo->query($queryLotCount);
$lotCountResult = $statementLotCount->fetch(PDO::FETCH_ASSOC);
$lotCount = $lotCountResult['lotCount'];

// Fetching the count of different classifications for each barangay
$query = "SELECT barangay,
            SUM(CASE WHEN classification = 'Agriculture' THEN 1 ELSE 0 END) AS agriculture_count,
            SUM(CASE WHEN classification = 'Residential' THEN 1 ELSE 0 END) AS residential_count,
            SUM(CASE WHEN classification = 'Commercial' THEN 1 ELSE 0 END) AS commercial_count,
            SUM(CASE WHEN classification = 'Industrial' THEN 1 ELSE 0 END) AS industrial_count
          FROM landinfo
          GROUP BY barangay";

$statement = $pdo->query($query);
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Filter rows where all counts are zero
$data = array_filter($data, function ($row) {
    return ($row['agriculture_count'] > 0 || $row['residential_count'] > 0 || $row['commercial_count'] > 0 || $row['industrial_count'] > 0);
});

?>

<div class="row">
    <div id="search-bar" style="margin-left: 20px; padding: 25px;">
        <form method="post" action="" id="search-form">
            <label for="barangay">Barangay:</label>
            <select name="barangay" id="barangay">
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
                <option value="Naga" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Naga') ? 'selected' : ''; ?>>Naga</option>
                <option value="Nanga" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Nanga') ? 'selected' : ''; ?>>Nanga</option>
                <option value="Naslo" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Naslo') ? 'selected' : ''; ?>>Naslo</option>
                <option value="Pajo" <?php echo (isset($_POST['barangay']) && $_POST['barangay'] == 'Pajo') ? 'selected' : ''; ?>>Pajo</option>
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
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process the search results and display them
            // For example, you can echo the selected barangay and inputted section number:
        
            $selected_barangay = isset($_POST['barangay']) ? htmlspecialchars($_POST['barangay']) : '';
            $inputted_section_no = isset($_POST['section_no']) ? htmlspecialchars($_POST['section_no']) : '';

        }
        ?>

    </div>



    <br>
    <?php if (!isset($_POST['search'])): ?>
        <!-- Display user count only if it's not a search -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Land Owners</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $userCount; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display lot count only if it's not a search -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered Lot Numbers
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $lotCount; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <br>
    <!-- Display the cluster diagram only if it's not a search -->
    <div class="row">
        <div style="width:40%;">
            <canva id="cluster-diagram"></canva>
        </div>
    </div>
    <div class="row" style="margin-left:50px;">

        <br>
        <div class="col">
            <?php
            // Display Pototan Land Summary only if it's not a search
            if (!isset($_POST['search'])) {
                echo '<h4 class="font-weight-bold text-primary">Pototan Land Summary</h4>';
                echo '<div class="table-responsive">';
                echo '<table class="table table-bordered" id="recordTable" width="100%" cellspacing="0">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Barangay</th>';
                echo '<th>Agriculture</th>';
                echo '<th>Residential</th>';
                echo '<th>Commercial</th>';
                echo '<th>Industrial</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';


                foreach ($data as $row):
                    echo '<tr>';
                    echo '<td>' . $row['barangay'] . '</td>';
                    echo '<td>' . $row['agriculture_count'] . '</td>';
                    echo '<td>' . $row['residential_count'] . '</td>';
                    echo '<td>' . $row['commercial_count'] . '</td>';
                    echo '<td>' . $row['industrial_count'] . '</td>';
                    echo '</tr>';
                endforeach;

                echo '</tbody>';
                echo '</table>';
                echo '</div>';

            }
            ?>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <style>
            #recordTable_wrapper {
                width: 100%;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('#recordTable').DataTable({
                    "scrollY": "200px"
                });
            });

        </script>
    </div>
    <br>
    <br>
        <div class="col-md-6">
        <div style="width: 45%;">
                <canva id="histogram-diagram" class="chart-container"></canva>
            </div>
        </div>
        <div class="col-md-6">
            <div style="width: 45%;">
                <div id="boxplot-diagram" class="chart-container"></div>
            </div>
        </div>
    <br>
    <?php include ('decision_tree.php'); ?>
    <br>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=thesis', 'root', '');

    // Function to calculate the median of an array
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

    // Function to generate the cluster diagram
    function generateClusterDiagram($data, $medianMarketValue)
    {
        $lowValueCount = 0;
        $midValueCount = 0;
        $highValueCount = 0;

        foreach ($data as $land) {
            $marketValue = $land['market_val'];
            $factors = $land['factors'];
            $cluster = classifyValue($marketValue, $factors, $medianMarketValue);

            if ($cluster === 'High Value') {
                $highValueCount++;
            } elseif ($cluster === 'Mid Value') {
                $midValueCount++;
            } else {
                $lowValueCount++;
            }
        }

        $clusterData = [
            'labels' => ['High Value', 'Mid Value', 'Low Value'],
            'values' => [$highValueCount, $midValueCount, $lowValueCount],
        ];

        $clusterDataJson = json_encode($clusterData);
        echo "<script>
        var clusterData = $clusterDataJson;
        var data = [{
            values: clusterData.values,
            labels: clusterData.labels,
            type: 'pie'
        }];
        var layout = {
            title: 'Land Valuation Cluster',
            height: 400
        };
        Plotly.newPlot('cluster-diagram', data, layout);
    </script>";
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

    // Function to generate the boxplot
    function generateBoxplot($data)
    {
        $marketValues = array_column($data, 'market_val');

        $boxplotData = [
            'y' => $marketValues,
            'type' => 'box'
        ];

        $boxplotDataJson = json_encode([$boxplotData]);
        echo '<br>';

        echo "<script>
        var boxplotData = $boxplotDataJson;
        var layout = {
            title: 'Market Value Boxplot',
            yaxis: {
                title: 'Market Value'
            },
            height: 400,
            width: 650,
        };
        Plotly.newPlot('boxplot-diagram', boxplotData, layout);
    </script>";
    }


    // Fetch data from the database here
    if (isset($_POST['search'])) {
        $barangay = $_POST['barangay'];
        $section_no = $_POST['section_no'];

        // Calculate cluster data for the searched records
        $query = "SELECT lot_no, classification, assess_level, market_val, payables, factors FROM landinfo WHERE barangay = :barangay AND section_no = :section_no";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':barangay', $barangay);
        $statement->bindParam(':section_no', $section_no);
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        // Inside your search block, after calculating the median value:
        if (!empty($data)) {
            echo '<div class="container">';
            // Calculate the median market value for the searched data
            $medianMarketValue = calculateMedian(array_column($data, 'market_val'));
            echo '<br>';
            echo '<p class="text-primary"S><strong>Median Market Value: ' . $medianMarketValue . '</strong></p>';
            echo '<br>';

            // Update and display the cluster value in the table
            echo '<div id="data-table-container" class="table-responsive">';
            echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Lot No.</th>';
            echo '<th>Assessment Level</th>';
            echo '<th>Market Value</th>';
            echo '<th>Payables</th>';
            echo '<th>Factors</th>';
            echo '<th>Classification</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($data as $row) {
                $marketValue = $row['market_val'];
                $factors = $row['factors']; // Factors as a string
                $cluster = classifyValue($marketValue, $factors, $medianMarketValue);

                // Update the cluster value in the database
                $updateQuery = "UPDATE landinfo SET cluster = :cluster WHERE lot_no = :lot_no";
                $updateStatement = $pdo->prepare($updateQuery);
                $updateStatement->bindParam(':cluster', $cluster);
                $updateStatement->bindParam(':lot_no', $row['lot_no']);
                $updateStatement->execute();

                // Add an onclick attribute to make the table row clickable
                echo '<tr onclick="window.location.href=\'index_data.php?lot_no=' . $row['lot_no'] . '\'">';
                echo '<td>' . $row['lot_no'] . '</td>';
                echo '<td>' . $row['assess_level'] . '</td>';
                echo '<td>' . $row['market_val'] . '</td>';
                echo '<td>' . $row['payables'] . '</td>';
                echo '<td>' . $factors . '</td>';
                echo '<td>' . $cluster . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';


            // Call the function to generate the pie chart
            generateClusterDiagram($data, $medianMarketValue);
            // Call the function to generate the histogram
            generateHistogram($data);

            generateBoxplot($data);



        } else {
            echo '<br>';
            echo '<div id="no-data-message"><strong>No data found!</strong></div>';
        }
    } else {
        // Display the default table here
        $query = "SELECT lot_no, classification, assess_level, market_val, payables, factors FROM landinfo";
        $statement = $pdo->query($query);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($data)) {
            // Calculate the median market value for all data
            $medianMarketValue = calculateMedian(array_column($data, 'market_val'));

            // Update and display the cluster value for all records
            echo '<div class="container">';
            echo '<div id="data-table-container" class="table-responsive">';
            echo '<br>';
            echo '<table class="table table-bordered" id="defaultTable" width="100%" cellspacing="0">';
            echo '<thead>';
            echo '<tr>';
            echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Lot No.</th>';
            echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Assessment Level</th>';
            echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Market Value</th>';
            echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Payables</th>';
            echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Factors</th>';
            echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Classification</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($data as $row) {
                $marketValue = $row['market_val'];
                $factors = $row['factors']; // Factors as a string
                $cluster = classifyValue($marketValue, $factors, $medianMarketValue);

                // Update the cluster value in the database
                $updateQuery = "UPDATE landinfo SET cluster = :cluster WHERE lot_no = :lot_no";
                $updateStatement = $pdo->prepare($updateQuery);
                $updateStatement->bindParam(':cluster', $cluster);
                $updateStatement->bindParam(':lot_no', $row['lot_no']);
                $updateStatement->execute();

                // Add an onclick attribute to make the table row clickable
                echo '<tr onclick="window.location.href=\'index_data.php?lot_no=' . $row['lot_no'] . '\'">';
                echo '<td>' . $row['lot_no'] . '</td>';
                echo '<td>' . $row['assess_level'] . '</td>';
                echo '<td>' . $row['market_val'] . '</td>';
                echo '<td>' . $row['payables'] . '</td>';
                echo '<td>' . $factors . '</td>';
                echo '<td>' . $cluster . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';

            echo '<br>';

            // Call the function to generate the pie chart
            generateClusterDiagram($data, $medianMarketValue);
            // Call the function to generate the boxplot
    
        } else {
            echo '<br>';
            echo '<div id="no-data-message" style="text-align: center;"><strong>No data found!</strong></div>';
        }
    }
    ?>

    <?php include ('includes/scripts.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        #recordstable_wrapper {
            width: 100%;
        }
    </style>

    <script>
        $(document).ready(function () {
            var table = $('#defaultTable').DataTable({
                "scrollY": "500px"
            });
        });
    </script>
    <br>
    <br>
    <br>
</div>
<?php if (!isset($_POST['search'])): ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Display the chart -->
    <div class="row">
        <div style="width: 45%; margin: auto;">
            <canvas id="histoChart"></canvas>
        </div>
        <div style="width: 45%; margin: auto;">
            <canvas id="histoChart2"></canvas>
        </div>
    </div>
<?php endif; ?>

</div>

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

// Fetch data from the land_record table
$recordQuery = "SELECT kinds FROM land_record WHERE kinds IS NOT NULL AND kinds <> ''";
$recordResult = $conn->query($recordQuery);
$recordData = array();

if ($recordResult->num_rows > 0) {
    while ($row = $recordResult->fetch_assoc()) {
        $recordData[] = $row;
    }
}

// Fetch data from the landinfo table
$infoQuery = "SELECT kinds FROM landinfo WHERE kinds IS NOT NULL AND kinds <> ''";
$infoResult = $conn->query($infoQuery);
$infoData = array();

if ($infoResult->num_rows > 0) {
    while ($row = $infoResult->fetch_assoc()) {
        $infoData[] = $row;
    }
}

// Combine data from both tables
$data = array_merge($recordData, $infoData);

// Count occurrences of each kind
$kindCounts = array_count_values(array_column($data, 'kinds'));

// Extract labels and counts for the chart
$labels = array_keys($kindCounts);
$counts = array_values($kindCounts);

// Generate pastel colors dynamically based on the number of data points
function generatePastelColors($numColors)
{
    $colors = array();
    $increment = floor(360 / $numColors);
    $saturation = 50; // Adjust the saturation level as needed
    $lightness = 75; // Adjust the lightness level as needed

    for ($i = 0; $i < $numColors; $i++) {
        $hue = ($i * $increment) % 360;
        $colors[] = "hsl(" . $hue . ", " . $saturation . "%, " . $lightness . "%)";
    }

    return $colors;
}

// Generate pastel colors for the chart
$numColors = count($labels);
$backgroundColor = generatePastelColors($numColors);

// Close the connection
$conn->close();
?>


<script>
    // Create bar chart with dynamically generated pastel colors
    var ctx = document.getElementById('histoChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Count of Kinds',
                data: <?php echo json_encode($counts); ?>,
                backgroundColor: <?php echo json_encode($backgroundColor); ?>,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
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

// Fetch data from the land_record table
$recordQuery = "SELECT classification FROM land_record WHERE classification IS NOT NULL AND classification <> ''";
$recordResult = $conn->query($recordQuery);
$recordData = array();

if ($recordResult->num_rows > 0) {
    while ($row = $recordResult->fetch_assoc()) {
        $recordData[] = $row;
    }
}

// Fetch data from the landinfo table
$infoQuery = "SELECT classification FROM landinfo WHERE classification IS NOT NULL AND classification <> ''";
$infoResult = $conn->query($infoQuery);
$infoData = array();

if ($infoResult->num_rows > 0) {
    while ($row = $infoResult->fetch_assoc()) {
        $infoData[] = $row;
    }
}

// Combine data from both tables
$data = array_merge($recordData, $infoData);

// Count occurrences of each kind
$kindCounts = array_count_values(array_column($data, 'classification'));

// Extract labels and counts for the chart
$labels = array_keys($kindCounts);
$counts = array_values($kindCounts);

// Generate similar colors dynamically based on the number of data points
function generateSimilarColors($numColors, $baseColor)
{
    $colors = array();
    $numSteps = $numColors - 1;
    $stepSize = 20;

    for ($i = 0; $i < $numColors; $i++) {
        $hue = $baseColor + ($i * $stepSize);
        $colors[] = "hsl(" . $hue . ", 50%, 70%)"; // Adjust saturation and lightness as needed
    }

    return $colors;
}

// Generate similar colors for the chart
$numColors = count($labels);
$baseColor = 180; // Adjust the base color (hue) as needed
$backgroundColor = generateSimilarColors($numColors, $baseColor);

// Close the connection
$conn->close();
?>

<script>
    // Create bar chart with dynamically generated similar colors
    var ctx = document.getElementById('histoChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Count of Land Actual Use',
                data: <?php echo json_encode($counts); ?>,
                backgroundColor: <?php echo json_encode($backgroundColor); ?>,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php if (!isset($_POST['search'])): ?>
    <div class="row" style="text-align: center; padding-top: 10px;">
        <h4 style="margin:20px; font-weight: bold;">Land Valuation Analysis per Actual Use</h4>
        <br>
    </div>
    <div class="row">
        <div style="width: 45%; margin: 0px auto; margin-top: 10px;">
            <canvas id="agricultureChart"></canvas>
        </div>



        <div style="width: 45%; margin: 0px auto; margin-top: 10px;">
            <canvas id="residentialChart"></canvas>
        </div>


        <div style="width: 45%; margin: 0px auto; margin-top: 10px;">
            <canvas id="commercialChart"></canvas>
        </div>


        <div style="width: 45%; margin: 0px auto; margin-top: 10px;">
            <canvas id="industrialChart"></canvas>
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

// Fetch data from the landinfo table
$agriQuery = "SELECT cluster FROM landinfo WHERE classification = 'agriculture'";
$agriResult = $conn->query($agriQuery);
$agriData = array();

if ($agriResult->num_rows > 0) {
    while ($row = $agriResult->fetch_assoc()) {
        $agriData[] = $row;
    }
}

// Combine data from both tables
$data = array_merge($agriData);

// Count occurrences of each kind
$agriCounts = array_count_values(array_column($data, 'cluster'));

// Extract labels and counts for the chart
$labels = array_keys($agriCounts);
$counts = array_values($agriCounts);

// Generate pastel colors for the chart
function generatePastel($numColors)
{
    $colors = array();
    $increment = 360 / $numColors;
    $saturation = 40; // Adjust the saturation level as needed
    $lightness = 70; // Adjust the lightness level as needed

    for ($i = 0; $i < $numColors; $i++) {
        $hue = ($i * $increment) % 360;
        $colors[] = "hsl(" . $hue . ", " . $saturation . "%, " . $lightness . "%)";
    }

    return $colors;
}

$backgroundColor = generatePastel(count($labels));

// Close the connection
$conn->close();
?>

<script>
    // Create bar chart
    var ctx = document.getElementById('agricultureChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Count for Agriculture',
                data: <?php echo json_encode($counts); ?>,
                backgroundColor: <?php echo json_encode($backgroundColor); ?>,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
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

// Fetch data from the landinfo table for residential
$resiQuery = "SELECT cluster FROM landinfo WHERE classification = 'residential'";
$resiResult = $conn->query($resiQuery);
$resiData = array();

if ($resiResult->num_rows > 0) {
    while ($row = $resiResult->fetch_assoc()) {
        $resiData[] = $row;
    }
}

// Combine data from both tables
$data = array_merge($resiData);

// Count occurrences of each kind
$resiCounts = array_count_values(array_column($data, 'cluster'));

// Extract labels and counts for the chart
$labels = array_keys($resiCounts);
$counts = array_values($resiCounts);

// Generate pastel colors for the chart
function generatePastelRes($numColors)
{
    $colors = array();
    $increment = 360 / $numColors;
    $saturation = 40; // Adjust the saturation level as needed
    $lightness = 70; // Adjust the lightness level as needed

    for ($i = 0; $i < $numColors; $i++) {
        $hue = ($i * $increment) % 360;
        $colors[] = "hsl(" . $hue . ", " . $saturation . "%, " . $lightness . "%)";
    }

    return $colors;
}

$backgroundColor = generatePastelRes(count($labels));

// Close the connection
$conn->close();
?>

<script>
    // Create bar chart for residential
    var ctx = document.getElementById('residentialChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Count for Residential',
                data: <?php echo json_encode($counts); ?>,
                backgroundColor: <?php echo json_encode($backgroundColor); ?>,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
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

// Fetch data from the landinfo table for commercial
$commQuery = "SELECT cluster FROM landinfo WHERE classification = 'commercial'";
$commResult = $conn->query($commQuery);
$commData = array();

if ($commResult->num_rows > 0) {
    while ($row = $commResult->fetch_assoc()) {
        $commData[] = $row;
    }
}

// Count occurrences of each kind
$commCounts = array_count_values(array_column($commData, 'cluster'));

// Extract labels and counts for the chart
$labels = array_keys($commCounts);
$counts = array_values($commCounts);

// Generate pastel colors for the chart
function generatePastelComm($numColors)
{
    $colors = array();
    $increment = 360 / $numColors;
    $saturation = 40; // Adjust the saturation level as needed
    $lightness = 70; // Adjust the lightness level as needed

    for ($i = 0; $i < $numColors; $i++) {
        $hue = ($i * $increment) % 360;
        $colors[] = "hsl(" . $hue . ", " . $saturation . "%, " . $lightness . "%)";
    }

    return $colors;
}

// Check if there are no counts for the commercial data
if (empty($labels)) {
    // Provide default labels and counts
    $labels = ['No Data'];
    $counts = [0];
}

$backgroundColor = generatePastelComm(count($labels));

// Close the connection
$conn->close();
?>

<script>
    // Create bar chart for commercial
    var ctx = document.getElementById('commercialChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Count for Commercial',
                data: <?php echo json_encode($counts); ?>,
                backgroundColor: <?php echo json_encode($backgroundColor); ?>,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
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

// Fetch data from the landinfo table for industrial
$induQuery = "SELECT cluster FROM landinfo WHERE classification = 'industrial'";
$induResult = $conn->query($induQuery);
$induData = array();

if ($induResult->num_rows > 0) {
    while ($row = $induResult->fetch_assoc()) {
        $induData[] = $row;
    }
}

// Count occurrences of each kind
$induCounts = array_count_values(array_column($induData, 'cluster'));

// Extract labels and counts for the chart
$labels = array_keys($induCounts);
$counts = array_values($induCounts);

// Generate pastel colors for the chart
function generatePastelIndu($numColors)
{
    $colors = array();
    $increment = 360 / $numColors;
    $saturation = 40; // Adjust the saturation level as needed
    $lightness = 70; // Adjust the lightness level as needed

    for ($i = 0; $i < $numColors; $i++) {
        $hue = ($i * $increment) % 360;
        $colors[] = "hsl(" . $hue . ", " . $saturation . "%, " . $lightness . "%)";
    }

    return $colors;
}

// Check if there are no counts for the industrial data
if (empty($labels)) {
    // Provide default labels and counts
    $labels = ['No Data'];
    $counts = [0];
}

$backgroundColor = generatePastelIndu(count($labels));

// Close the connection
$conn->close();
?>

<script>
    // Create bar chart for industrial
    var ctx = document.getElementById('industrialChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Count for Industrial',
                data: <?php echo json_encode($counts); ?>,
                backgroundColor: <?php echo json_encode($backgroundColor); ?>,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    // Get all the invisible link elements
    const invisibleLinks = document.querySelectorAll('.invisible-link');

    // Add a click event listener to each invisible link
    invisibleLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default link behavior
            window.location.href = this.getAttribute('href'); // Navigate to the specified URL
        });
    });
</script>
<?php
include ('includes/footer.php');
?>