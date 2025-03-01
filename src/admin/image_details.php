
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'thesis';

// Check if the filename parameter is present
if (isset($_GET['file_name'])) {
    $file_name = $_GET['file_name'];

    // Fetch data based on the filename
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve image metadata
    $sql = "SELECT * FROM files WHERE file_name = '$file_name'";
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
    }
}
// Close the database connection
$conn->close();

// Include the header
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<style>
  @media print {
    /* Hide navigation bars when printing */
    .navbar-nav, #print-button {
        display: none;
    }

    body * {
        visibility: visible;
    }
    #dataImage {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

    #imageData,
    #imageData * {
        visibility: visible;
        position: relative;
    }

    #barangayData,
    #barangayData * {
        visibility: visible;
        position: relative;
    }

    #dataTable,
    #dataTable * {
        visibility: visible;
        position: relative;
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

    /* Add styles to ensure proper layout */
    #imageData {
        margin-bottom: 0px; 
        border: 1px solid black;/* Adjust as needed */
    }

    #dataTable {
        margin-top: 75%; /* Adjust as needed */
    }
    
    #barangayData {
        margin-bottom: 25px; /* Adjust as needed */
    }
}

#imageData{
    align-items: center;
    margin-top: -50px;
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


<div class="table-responsive">
    <div style="position: relative; text-align: center;">
        <img id="dataImage" src="<?php echo $imageData['file_path']; ?>" alt="<?php echo $imageData['file_name']; ?>" style="max-width: 100%; max-height: 100%; display: inline-block;">
    </div>

    <div class="table-container">
    <table class="table table-bordered" id= "barangayData" width="100%" cellspacing="0">
            <tr>
                <th>Barangay</th>
                <th>Section No.</th>
            </tr>
            <tr>
                <td>
                    <?php echo $imageData['barangay']; ?>
                </td>
                <td>
                    <?php echo $imageData['section_no']; ?>
                </td>
            </tr>
        </table>
    </div>
    <h4><strong>Related Land Data</strong></h4>
    <div class="table-container">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <?php if (!empty($landinfoData)): ?>
                <tr>
                    <th>Lot No.</th>
                    <th>Area</th>
                    <th>Classification</th>
                    <th>Kinds</th>
                    <th>Subclass</th>
                    <th>Unit Value</th>
                    <th>Assessment Level</th>
                    <th>Assessment Value</th>
                    <th>Market Value</th>
                    <th>Payables</th>
                </tr>
                <?php foreach ($landinfoData as $row): ?>
                    <tr>
                        <td>
                            <?php echo $row['lot_no']; ?>
                        </td>
                        <td>
                            <?php echo $row['area']; ?>
                        </td>
                        <td>
                            <?php echo $row['classification']; ?>
                        </td>
                        <td>
                            <?php echo $row['kinds']; ?>
                        </td>
                        <td>
                            <?php echo $row['subclass']; ?>
                        </td>
                        <td>
                            <?php echo $row['unit_val']; ?>
                        </td>
                        <td>
                            <?php echo $row['assess_level']; ?>
                        </td>
                        <td>
                            <?php echo $row['assess_val']; ?>
                        </td>
                        <td>
                            <?php echo $row['market_val']; ?>
                        </td>
                        <td>
                            <?php echo $row['payables']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    <?php else: ?>
        <p style="text-align: center; font-weight: bold;">No related landinfo data found.</p>
    <?php endif; ?>
</div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');

?>