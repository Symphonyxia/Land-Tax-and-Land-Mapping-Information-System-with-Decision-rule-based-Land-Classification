<?php
include('security.php');
include('user_include/header.php');
include('user_include/navbar.php');
?>

<style>
  .card {
    margin-left: 10px;
    margin-right: 10px;
  }

  #table-container {
    margin-bottom: 20px;
    color: black;
    background-color: transparent;
    font-weight: bold;
  }

  #map-container {
    width: 1200px;
    height: 450px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    overflow: hidden;
  }

  #map {
    height: 100%;
    width: 100%;
    align-items: center;
  }

  h4 {
    color: black;
    font-weight: bold;
  }

  /* Pagination styling */
  .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }

  .pagination-list {
    list-style: none;
    padding: 0;
    display: flex;
  }

  .pagination-item {
    margin: 0 5px;
  }

  .pagination-link {
    padding: 5px 10px;
    text-decoration: none;
    border: 1px solid #ccc;
    color: #333;
    transition: background-color 0.3s;
  }

  .pagination-link:hover {
    background-color: #f0f0f0;
  }

  .pagination-link.active {
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
  }

  th {
    color: black;
    background-color: #f0f0f0;
  }

  td {
    color: black;
  }
</style>

<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <a href="user_map.php">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">News Feed</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
            </a>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Contacts -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <a href="user_contacts.php">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Contact Assessors</div>
          </a>
        </div>
        <div class="col-auto">
          <i class="fas fa-envelope fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- About -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <a href="user_aboutus.php">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Abouts of Pototan Assessor's</div>
          </a>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <a href="user_guidelines.php">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Guidelines</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
          </a>
        </div>
      </div>
    </div>
    <div class="col-auto">
      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
    </div>
  </div>
</div>
</div>
</div>
</div>

<div class="container-fluid">
  <div class="row">
    <div style="width: 50%; margin: auto;">
      <?php
      // Assuming you have already established a database connection
      $username = $_SESSION['username']; // Replace with your own method of retrieving the logged-in username

      // Retrieve the lot_no from the register table based on the username
      $registerQuery = "SELECT lot_no FROM register WHERE username = ?";
      $registerStmt = mysqli_prepare($connection, $registerQuery);
      mysqli_stmt_bind_param($registerStmt, "s", $username);
      mysqli_stmt_execute($registerStmt);
      $registerResult = mysqli_stmt_get_result($registerStmt);

      if (mysqli_num_rows($registerResult) > 0) {
        $registerRow = mysqli_fetch_assoc($registerResult);
        $lotNo = $registerRow['lot_no'];

        // Fetch the `barangay` and `section_no` from the user's land information
        $landInfoQuery = "SELECT barangay, section_no FROM landinfo WHERE lot_no = ?";
        $landInfoStmt = mysqli_prepare($connection, $landInfoQuery);
        mysqli_stmt_bind_param($landInfoStmt, "s", $lotNo);
        mysqli_stmt_execute($landInfoStmt);
        $landInfoResult = mysqli_stmt_get_result($landInfoStmt);

        if (mysqli_num_rows($landInfoResult) > 0) {
          $landInfoRow = mysqli_fetch_assoc($landInfoResult);
          $barangay = $landInfoRow['barangay'];
          $sectionNo = $landInfoRow['section_no'];

          // Fetch images from the files database that match the user's land information
          $filesQuery = "SELECT file_path, file_name FROM files WHERE barangay = ? AND section_no = ?";
          $filesStmt = mysqli_prepare($connection, $filesQuery);
          mysqli_stmt_bind_param($filesStmt, "ss", $barangay, $sectionNo);
          mysqli_stmt_execute($filesStmt);
          $filesResult = mysqli_stmt_get_result($filesStmt);

          if (mysqli_num_rows($filesResult) > 0) {
            // Display the images in a centered container
            echo '<div class="table-responsive">';
            echo '<div style="display: flex; justify-content: center; align-items: center;">';

            while ($row = mysqli_fetch_assoc($filesResult)) {
              $imagePath = $row['file_path'];
              $imageName = $row['file_name'];
              echo '<img src="' . $imagePath . '" alt="' . $imageName . '" style="max-width: 100%;">';
            }

            echo '</div>';
            echo '</div>';
          } else {
            echo '<div style="text-align: center;">No Images Found for this Land Information</div>';
          }
        } else {
          echo '<div style="text-align: center;">No Land Information Found</div>';
        }
      } else {
        echo '<div style="text-align: center;">No Record Found</div>';
      }
      ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Display the chart -->
    <div style="width: 50%; margin: auto;">
      <canvas id="histoChart"></canvas>
    </div>
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

  // Assuming you have a session variable named $_SESSION['username']
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Fetch data from the land_record table for the specific user
    $recordQuery = "SELECT kinds, market_val FROM land_record WHERE land_id = (SELECT land_id FROM landinfo WHERE lot_no = (SELECT lot_no FROM register WHERE username = '$username'))";
    $recordResult = $conn->query($recordQuery);
    $recordData = array();

    if ($recordResult->num_rows > 0) {
      while ($row = $recordResult->fetch_assoc()) {
        $recordData[] = $row;
      }
    }

    // Fetch data from the landinfo table for the specific user
    $infoQuery = "SELECT kinds, market_val FROM landinfo WHERE lot_no = (SELECT lot_no FROM register WHERE username = '$username')";
    $infoResult = $conn->query($infoQuery);
    $infoData = array();

    if ($infoResult->num_rows > 0) {
      while ($row = $infoResult->fetch_assoc()) {
        $infoData[] = $row;
      }
    }

    // Combine data from both tables
    $data = array_merge($recordData, $infoData);
  } else {
    // Handle the case where the username is not set in the session
    $data = array();
  }

  // Close the connection
  $conn->close();
  ?>

  <script>
    // Convert PHP data to JavaScript
    var data = <?php echo json_encode($data); ?>;
    console.log('Combined Land Record Data:', data);

    // Extract kinds and market values from the data
    var kinds = data.map(item => item.kinds || item.kinds); // Use 'kind' or 'kinds' depending on the structure
    var marketValues = data.map(item => item.market_val);

    // Function to generate pastel colors dynamically
    function generatePastelColors(numColors) {
      var colors = [];
      var increment = 360 / numColors;
      for (var i = 0; i < numColors; i++) {
        var hue = (increment * i) % 360;
        colors.push('hsl(' + hue + ', 50%, 80%)'); // Adjust saturation and lightness as needed
      }
      return colors;
    }

    // Generate pastel colors for the chart
    var backgroundColors = generatePastelColors(kinds.length);

    // Create histogram
    var ctx = document.getElementById('histoChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: kinds,
        datasets: [{
          label: 'Market Values by Land Kind',
          data: marketValues,
          backgroundColor: backgroundColors,
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


<br>
<h4 class='text-black'>Land Information</h4>

<div id="table-container">
  <?php
  // Assuming you have already established a database connection
  $username = $_SESSION['username']; // Replace with your own method of retrieving the logged-in username

  // Retrieve the lot_no from the register table based on the username
  $registerQuery = "SELECT lot_no FROM register WHERE username = '$username'";
  $registerResult = mysqli_query($connection, $registerQuery);

  if (mysqli_num_rows($registerResult) > 0) {
    $registerRow = mysqli_fetch_assoc($registerResult);
    $lotNo = $registerRow['lot_no'];

    // Fetch the corresponding details from the landinfo table using the lot_no
    $landInfoQuery = "SELECT * FROM landinfo WHERE lot_no = '$lotNo'";
    $landInfoResult = mysqli_query($connection, $landInfoQuery);

    if (mysqli_num_rows($landInfoResult) > 0) {
      while ($row = mysqli_fetch_assoc($landInfoResult)) {
        $area = $row['area'];
        $classification = $row['classification'];
        $marketValue = $row['market_val'];

        // Perform your analysis or calculations here

        echo "<table class='table table-bordered' id='landInfoTable'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Lot No.</th>";
        echo "<th>Area</th>";
        echo "<th>Classification</th>";
        echo "<th>Market Value</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td>$lotNo</td>";
        echo "<td>$area</td>";
        echo "<td>$classification</td>";
        echo "<td>$marketValue</td>";
        // Add the necessary analysis column here
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
      }

      // Retrieve the latest payables record from the landinfo table
      $payablesQuery = "SELECT payables, date FROM landinfo WHERE lot_no = '$lotNo' ORDER BY land_id DESC LIMIT 1";
      $payablesResult = mysqli_query($connection, $payablesQuery);

      if (mysqli_num_rows($payablesResult) > 0) {
        $payablesRow = mysqli_fetch_assoc($payablesResult);
        $payables = $payablesRow['payables'];
        $date = $payablesRow['date'];

        // Check if the latest payables record already exists in the tax_payment_history table
        $historyCheckQuery = "SELECT * FROM tax_payment_history WHERE lot_no = '$lotNo' AND payables = '$payables'";
        $historyCheckResult = mysqli_query($connection, $historyCheckQuery);

        if (mysqli_num_rows($historyCheckResult) == 0) {
          // Insert the new tax payment record into the tax_payment_history table
          $insertQuery = "INSERT INTO tax_payment_history (lot_no, payables, date) VALUES ('$lotNo', '$payables', '$date')";
          mysqli_query($connection, $insertQuery);
        }
      }
    } else {
      echo '<div class="text" style="text-align: center;">No Land Information Found</div>';
    }
  } else {
    echo '<div class="text" style="text-align: center;">No Record Found</div>';
  }
  ?>
</div>


<br>
<h4 class='text-black'>Additional Data</h4>
<div id="table-container">
  <?php
  // Assuming you have already established a database connection
  // Fetch the corresponding `land_id` from the `landinfo` table based on the username
  $landInfoQuery = "SELECT land_id FROM landinfo WHERE lot_no = '$lotNo'";
  $landInfoResult = mysqli_query($connection, $landInfoQuery);

  if (mysqli_num_rows($landInfoResult) > 0) {
    $landInfoRow = mysqli_fetch_assoc($landInfoResult);
    $landId = $landInfoRow['land_id'];

    // Fetch additional data for the specific `land_id`
    $additionalDataQuery = "SELECT * FROM land_record WHERE land_id = '$landId'";
    $additionalDataResult = mysqli_query($connection, $additionalDataQuery);

    if (mysqli_num_rows($additionalDataResult) > 0) {
      echo "<table class='table table-bordered' id='additionalDataTable'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Classification</th>";
      echo "<th>Area</th>";
      echo "<th>Market Value</th>";
      echo "<th>Tax Payables</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($additionalDataRow = mysqli_fetch_assoc($additionalDataResult)) {
        // Display the fields from the `land_record` table
        echo "<tr>";
        echo "<td>" . $additionalDataRow['classification'] . "</td>";
        echo "<td>" . $additionalDataRow['area'] . "</td>";
        echo "<td>" . $additionalDataRow['market_val'] . "</td>";
        echo "<td>" . $additionalDataRow['payables'] . "</td>";
        echo "</tr>";
      }

      echo "</tbody>";
      echo "</table>";
    } else {
      echo '<div class="text" style="text-align: center;">No Additional Land Data Found</div>';
    }
  } else {
    echo '<div class="text" style="text-align: center;">No Record Found</div>';
  }
  ?>
</div>


  <br>
  <h4 class='text-black'>Tax Payment History</h4>
  <div id="table-container">
    <?php
    // Assuming you have already established a database connection
    $recordsPerPage = 5; // Number of records to display per page
    // Retrieve the lot_no from the register table based on the username
    $registerQuery = "SELECT lot_no FROM register WHERE username = '$username'";
    $registerResult = mysqli_query($connection, $registerQuery);

    if (mysqli_num_rows($registerResult) > 0) {
      $registerRow = mysqli_fetch_assoc($registerResult);
      $lotNo = $registerRow['lot_no'];

      // Fetch the date from the landinfo table
      $dateQuery = "SELECT date FROM landinfo WHERE lot_no = '$lotNo'";
      $dateResult = mysqli_query($connection, $dateQuery);
      $dateRow = mysqli_fetch_assoc($dateResult);
      $date = $dateRow['date'];

      // Fetch the current payables from tax_payment_history table, including timestamps
      $currentPayablesQuery = "SELECT payables, date FROM tax_payment_history WHERE lot_no = '$lotNo' ORDER BY date DESC";
      $currentPayablesResult = mysqli_query($connection, $currentPayablesQuery);

      // Fetch the total payables from land_record
      $landRecordPayablesQuery = "SELECT SUM(payables) AS total_payables FROM land_record WHERE land_id = (SELECT land_id FROM landinfo WHERE lot_no = '$lotNo')";
      $landRecordPayablesResult = mysqli_query($connection, $landRecordPayablesQuery);
      $landRecordPayablesRow = mysqli_fetch_assoc($landRecordPayablesResult);
      $totalLandRecordPayables = $landRecordPayablesRow['total_payables'] ?? 0;

      // Calculate the combined payables
      $combinedPayables = $totalLandRecordPayables;

      // Display the combined payables above the table
      if ($row = mysqli_fetch_assoc($currentPayablesResult)) {
        $mostCurrentPayables = $row['payables'];
        $combinedPayables += $mostCurrentPayables;
      }

      $totalRecords = mysqli_num_rows($currentPayablesResult);
      $totalPages = ceil($totalRecords / $recordsPerPage);

      if (!isset($_GET['page'])) {
        $page = 1;
      } else {
        $page = $_GET['page'];
      }

      $startFrom = ($page - 1) * $recordsPerPage;

      // Fetch paginated records for the current page
      $paginatedPayablesQuery = "SELECT payables, date FROM tax_payment_history WHERE lot_no = '$lotNo' ORDER BY date DESC LIMIT $startFrom, $recordsPerPage";
      $paginatedPayablesResult = mysqli_query($connection, $paginatedPayablesQuery);

      echo "<div style='text-align: right;'>";
      echo "<h5 class='card-title text-black'><strong>Combined Payables:</strong> <strong class='text-danger'>$combinedPayables</strong></h5>";
      echo "</div>";

      // Display the current payables from tax_payment_history
      echo "<table class='table table-bordered' id='recordTable'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Date</th>";
      echo "<th>Payables</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      while ($row = mysqli_fetch_assoc($paginatedPayablesResult)) {
        $payables = $row['payables'];
        $payablesDate = $row['date']; // Timestamp from tax_payment_history
        echo "<tr>";
        echo "<td>$payablesDate</td>";
        echo "<td>$payables</td>";
        echo "</tr>";
      }

      echo "</tbody>";
      echo "</table>";

    } else {
      echo '<div class="text" style="text-align: center;">No Record Found</div>';
    }
    ?>
  </div>
</div>

<?php
include('user_include/scripts.php');
?>


<!-- Add jQuery before DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Add DataTables plugin -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
  $(document).ready(function() {

    $('#landInfoTable').DataTable({
      "paging": false,
      "searching": false,
      "info": false
    });
    $('#additionalDataTable').DataTable({
      "paging": false,
      "searching": false,
      "info": false
    });

    $('#recordTable').DataTable({
    "scrollY": "200px"

  });
});

</script>

<?php
include('user_include/footer.php');
?>
