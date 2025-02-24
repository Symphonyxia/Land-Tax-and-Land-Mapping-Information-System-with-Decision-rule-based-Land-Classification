<?php
include('security.php');
include('user_include/header.php');
include('user_include/navbar.php');
?>

<style>
    .container {
        margin-top: 20px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 6px;
    }

    #table-container {
        margin-bottom: 20px;
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
    }

    .footer {
        background-color: #f8f9fa;
        padding: 20px;
        text-align: center;
    }
</style>

<div class="container-fluid">
    <div id="table-container">
        <?php
        $query = "SELECT * FROM landinfo LIMIT 1";
        $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tax To Pay</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(mysqli_num_rows($query_run) > 0) {
                    $row = mysqli_fetch_assoc($query_run);
                    $payables = $row['payables'];
                    $date = date('Y-m-d'); // Automatically generates the date in 'YYYY-MM-DD' format

                    // Perform your analysis or calculations here

                    echo "<tr>";
                    echo "<td>$payables</td>";
                    echo "<td>$date</td>";
                    echo "</tr>";
                } else {
                    echo "No Record Found";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include('user_include/scripts.php');
include('user_include/footer.php');
?>
