<?php
include('security.php');
include('includes/header.php');
include('includes/navbar_print.php');
?>

<style>
    @media print {

        
        /* Hide navigation bars when printing */
        .navbar-nav, #print-button{
            display: none;
        }


        body * {
  visibility: visible;

}

*{
    overflow: hidden;
}

#dataTable,
#dataTable * {
  visibility: visible;
}

#dataTable {
  position: relative;
  top: 0;
  left: 0;
}

.sticky-footer {
  display: none;
}


.input-group {
  display: none;
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
    <a href="#" id="print-button" onclick="window.print(); return false;">
        <i class="fas fa-download fa-sm text-white-50" style="margin-right: 5px;"></i> Generate Report
    </a>
</div>


<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Land Profile Details</h6>
        </div>


        <br>

        <?php
        $connection = mysqli_connect("localhost", "root", "", "thesis");

        if (isset($_POST['mapview_btn'])) {
            $mapId = $_POST['map_id'];

            // Fetch the details of the specific land record using $mapId
            $query_landinfo = "SELECT * FROM landinfo WHERE land_id = '$mapId'";
            $query_land_record = "SELECT * FROM land_record WHERE land_id = '$mapId'";

            $query_run_landinfo = mysqli_query($connection, $query_landinfo);
            $query_run_land_record = mysqli_query($connection, $query_land_record);

            // Initialize $row_landinfo as an empty array
            $row_landinfo = [];

            // Display the details from landinfo
            if (mysqli_num_rows($query_run_landinfo) > 0) {
                $row_landinfo = mysqli_fetch_assoc($query_run_landinfo);

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

                // Display landinfo details
                ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <?php
                                    if (isset($row_landinfo) && is_array($row_landinfo) && count($row_landinfo) > 0) {
                                        ?>
                                        <h5 class="card-title">Land Info Details</h5>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <tbody>
                                               
                                                <tr>
                                                    <th>Registered Name</th>
                                                    <td>
                                                        <?php echo $fullName; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>District</th>
                                                    <td>
                                                        <?php echo $row_landinfo['district']; ?>
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
                                                    <th>Lot No.</th>
                                                    <td>
                                                        <?php echo $row_landinfo['lot_no']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Classification</th>
                                                    <td>
                                                        <?php echo $row_landinfo['classification']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Kind of Land</th>
                                                    <td>
                                                        <?php echo $row_landinfo['kinds']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Sub Class</th>
                                                    <td>
                                                        <?php echo $row_landinfo['subclass']; ?>
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
                                                    <th>Unit Value</th>
                                                    <td>
                                                        <?php echo $row_landinfo['unit_val']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Assessment Level</th>
                                                    <td>
                                                        <?php echo $row_landinfo['assess_level']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Assessment Value</th>
                                                    <td>
                                                        <?php echo $row_landinfo['assess_val']; ?>
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
                                                <tr>
                                                    <th>No. of Building / Structures</th>
                                                    <td>
                                                        <?php echo $row_landinfo['structures']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>No. of Machinery</th>
                                                    <td>
                                                        <?php echo $row_landinfo['machinery']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Near Factors Available</th>
                                                    <td>
                                                        <?php echo $row_landinfo['factors']; ?>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                                    } else {
                                        echo '<div id="no-data-message" style="text-align: center;"><strong>No landinfo record found.</strong></div>';
                                    }

                                    // Display land_record details
                                    if (mysqli_num_rows($query_run_land_record) > 0) {
                                        ?>
                    <div class="container-fluid">
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"> Additional Land Record Details</h5>
                                        <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Classification</th>
                                                        <th>Kinds</th>
                                                        <th>Subclass</th>
                                                        <th>Area</th>
                                                        <th>Unit Value</th>
                                                        <th>Assessment Level</th>
                                                        <th>Assessment Value</th>
                                                        <th>Market Value</th>
                                                        <th>Tax Payables</th>
                                                        <th><div class="input-group">Edit </div></th>
                                                        <th><div class="input-group">Delete </div></th>
                                                        </div>
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
                                                                <?php echo $row_land_record['subclass']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row_land_record['area']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row_land_record['unit_val']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row_land_record['assess_level']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row_land_record['assess_val']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row_land_record['market_val']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row_land_record['payables']; ?>
                                                            </td>
                                                            <td>
                                                                <form class= "input-group" action="edit_land_record.php" method="POST">
                                                                    <input type="hidden" name="record_edit_id"
                                                                        value="<?php echo $row_land_record['record_id']; ?>">
                                                                    <button type="submit" name="recordbtn"
                                                                        class="btn btn-success">EDIT</button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <form class= "input-group" action="land_code.php" method="POST">
                                                                    <input type="hidden" name="idelete_record"
                                                                        value="<?php echo $row_land_record['record_id']; ?>">
                                                                    <button type="submit" name="delete_record"
                                                                        class="btn btn-danger">DELETE</button>
                                                                </form>
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
                                        echo '<div id="no-data-message" style="text-align: center;"><strong>No additional land record records found.</strong></div>';
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
                    <h5 class="card-title">Total Market Value: <strong>
                            <?php echo $total_market_value; ?>
                        </strong></h5>
                    <h5 class="card-title">Total Tax Payables: <strong>
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