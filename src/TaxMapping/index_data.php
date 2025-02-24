<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Land Profile Details</h5>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if lot_no is provided in the request
if (isset($_GET['lot_no'])) {
    $lot_no = $_GET['lot_no'];

    // Query to fetch data from both tables based on land_id
    $sql = "SELECT li.date, li.market_val, li.payables, lr.market_val AS lr_market_val, lr.payables AS lr_payables FROM landinfo li LEFT JOIN land_record lr ON li.land_id = lr.land_id WHERE li.lot_no = '$lot_no'";
    $result = $conn->query($sql);

    $years = [];
    $marketValues = [];
    $taxPayables = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Convert the year to a date
            $date = date('Y-m-d', strtotime($row['date']));
            array_push($years, $date);
            array_push($marketValues, $row['market_val'] + $row['lr_market_val']); // Combine market values
            array_push($taxPayables, $row['payables'] + $row['lr_payables']); // Combine tax payables
        }
    }

    // Calculate the combined total market value and total tax payables
    $total_market_value = array_sum($marketValues);
    $total_tax_payables = array_sum($taxPayables);

    $conn->close();
} else {
    echo "Please provide a valid lot_no parameter.";
    exit;
}
?>


        <?php
        $connection = mysqli_connect("localhost", "root", "", "thesis");

        if (isset($_GET['lot_no'])) {
            $lot_no = $_GET['lot_no'];
        
            // Fetch the details of the specific land record using 'lot_no'
            $query_landinfo = "SELECT * FROM landinfo WHERE lot_no = '$lot_no'";
            $query_run_landinfo = mysqli_query($connection, $query_landinfo);
        
            // Initialize $row_landinfo as an empty array
            $row_landinfo = [];
        
            if (mysqli_num_rows($query_run_landinfo) > 0) {
                $row_landinfo = mysqli_fetch_assoc($query_run_landinfo);
        
                // Fetch the registered name from the register table based on the lot_no in the landinfo table
                $lotNo = $row_landinfo['lot_no'];
        
                // Perform a query to retrieve the registered name
                $query_register = "SELECT fname, lname FROM register WHERE lot_no = '$lotNo'";
                $query_run_register = mysqli_query($connection, $query_register);
        
                // Check if the query was executed successfully
                if ($query_run_register) {
                    if (mysqli_num_rows($query_run_register) > 0) {
                        $registerRow = mysqli_fetch_assoc($query_run_register);
                        $fullName = $registerRow['fname'] . ' ' . $registerRow['lname'];
                    } else {
                        $fullName = 'N/A';
                    }
                } else {
                    $fullName = 'N/A';
                    $error_message = 'Error retrieving registered name: ' . mysqli_error($connection);
                    echo $error_message;
                    echo 'Query: ' . $query_register;
                }

                $landId = $row_landinfo['land_id'];

        

                    // Display landinfo details
                    ?>
                     <div class="container">
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                    <?php
                                        if (isset($row_landinfo) && is_array($row_landinfo) && count($row_landinfo) > 0) {
                                            ?>
                                        <h5 class="m-0 font-weight-bold text-info">Land Info Details</h5>
                                            <table class="table table-bordered">
                                       <tbody>
                                                    <tr>
                                                        <th>Registered Name</th>
                                                        <td>
                                                            <?php echo $fullName; ?>
                                                        </td>
                                                    </tr>
                                                
                                                    <tr>
                                                        <th>Barangay</th>
                                                        <td>
                                                            <?php echo $row_landinfo['barangay']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Section No.</th>
                                                        <td>
                                                            <?php echo $row_landinfo['section_no']; ?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Classification</th>
                                                        <td>
                                                            <?php echo $row_landinfo['classification']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kinds</th>
                                                        <td>
                                                            <?php echo $row_landinfo['kinds']; ?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Area</th>
                                                        <td>
                                                            <?php
                                                            $area = $row_landinfo['area'];
                                                            if ($row_landinfo['classification'] === 'Agricultural') {
                                                                echo $area . ' ha.';
                                                            } elseif ($row_landinfo['classification'] === 'Industrial' || $row_landinfo['classification'] === 'Commercial' || $row_landinfo['classification'] === 'Residential') {
                                                                echo $area . ' sqm.';
                                                            } else {
                                                                echo $area;
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <th>Assessment Level</th>
                                                        <td>
                                                            <?php echo $row_landinfo['assess_level']; ?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Market Value</th>
                                                        <td>
                                                            <?php echo $row_landinfo['market_val']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tax To Pay</th>
                                                        <td>
                                                            <?php echo $row_landinfo['payables']; ?>
                                                        </td>
                                                    </tr>
                
                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    <?php
                                        } else {
                                            echo '<p style="font-weight: bold; text-align: center;">No land record found.</p>';
                                        }

                                        // Fetch additional data from land_record using 'land_id'
                $query_land_record = "SELECT * FROM land_record WHERE land_id = '$landId'";
                $query_run_land_record = mysqli_query($connection, $query_land_record);

                if (mysqli_num_rows($query_run_land_record) > 0) {
                    // Display additional land_record details
                    ?>
                    <div class="container">
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="m-0 font-weight-bold text-info"> Additional Land Record Details</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Classification</th>
                                                        <th>Kinds</th>
                                                        <th>Area</th>
                                                        <th>Assessment Level</th>
                                                        <th>Market Value</th>
                                                        <th>Tax Payables</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($row_land_record = mysqli_fetch_assoc($query_run_land_record)) {
                                                        // Display land_record details
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row_land_record['classification']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row_land_record['kinds']; ?>
                                                            </td>
                                                            
                                                            <td>
                                                                <?php echo $row_land_record['area']; ?>
                                                            </td>
                                                           
                                                            <td>
                                                                <?php echo $row_land_record['assess_level']; ?>
                                                            </td>
                                                           
                                                            <td>
                                                                <?php echo $row_land_record['market_val']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row_land_record['payables']; ?>
                                                            </td>
                                                                
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                                       } else {
                                            echo '<p style="font-weight: bold; text-align: center;">No additional land record found.</p>';
                                        }
                                        
                }
        }
        
            ?>

        <!-- Calculate Total Market Value and Tax Payables -->
        <?php
        // Check if $row_landinfo is not empty before accessing its values
        if (!empty($row_landinfo)) {
            $landId = $row_landinfo['land_id'];

            // Calculate the total market value and total tax payables from land_record
            $query_total_lr = "SELECT SUM(market_val) AS total_market_value_lr, SUM(payables) AS total_tax_payables_lr FROM land_record WHERE land_id = '$landId'";
            $query_run_total_lr = mysqli_query($connection, $query_total_lr);

            if ($query_run_total_lr) {
                $total_data_lr = mysqli_fetch_assoc($query_run_total_lr);
            } else {
                $total_data_lr = ['total_market_value_lr' => 0, 'total_tax_payables_lr' => 0];
            }

            // Calculate the total market value and total tax payables from landinfo
            $query_total_li = "SELECT SUM(market_val) AS total_market_value_li, SUM(payables) AS total_tax_payables_li FROM landinfo WHERE land_id = '$landId'";
            $query_run_total_li = mysqli_query($connection, $query_total_li);

            if ($query_run_total_li) {
                $total_data_li = mysqli_fetch_assoc($query_run_total_li);
            } else {
                $total_data_li = ['total_market_value_li' => 0, 'total_tax_payables_li' => 0];
            }

            // Calculate the total market value and tax payables by adding values from both tables
            $total_market_value = number_format($total_data_lr['total_market_value_lr'] + $total_data_li['total_market_value_li'], 2);
            $total_tax_payables = number_format($total_data_lr['total_tax_payables_lr'] + $total_data_li['total_tax_payables_li'], 2);
            ?>

            <div class="card mt-3">
                <div class="card-body" style="text-align: right;">
                    <h5 class="m-0 font-weight-bold text-primary">Total Market Value: <strong>
                            <?php echo $total_market_value; ?>
                        </strong></h5>
                    <h5 class="m-0 font-weight-bold text-primary">Total Tax Payables: <strong>
                            <?php echo $total_tax_payables; ?>
                        </strong></h5>
                </div>
            </div>

            <?php
        }
        ?>

    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>