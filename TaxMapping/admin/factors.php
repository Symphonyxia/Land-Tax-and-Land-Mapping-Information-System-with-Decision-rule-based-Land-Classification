<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<form action="code.php" method="POST">

    <div class="modal-body">
        <div class="form-group">
            <label for="barangay">Barangay</label>
            <select name="barangay" id="barangay" class="form-control">
                <option value="Abangay">Abangay</option>
                <option value="Amamaros">Amamaros</option>
                <option value="Bagacay">Bagacay</option>
                <option value="Barasan">Barasan</option>
                <option value="Batuan">Batuan</option>
                <option value="Bongco">Bongco</option>
                <option value="Cahaguichican">Cahaguichican</option>
                <option value="Callan">Callan</option>
                <option value="Cansilayan">Cansilayan</option>
                <option value="Casalsagan">Casalsagan</option>
                <option value="Cato-ogan">Cato-ogan</option>
                <option value="Cau-ayan">Cau-ayan</option>
                <option value="Culob">Culob</option>
                <option value="Danao">Danao</option>
                <option value="Dapitan">Dapitan</option>
                <option value="Dawis">Dawis</option>
                <option value="Dongsol">Dongsol</option>
                <option value="Fernando Parcon Ward">Fernando Parcon Ward</option>
                <option value="Fundacion">Fundacion</option>
                <option value="Guibuangan">Guibuangan</option>
                <option value="Guinacas">Guinacas</option>
                <option value="Igang">Igang</option>
                <option value="Intaluan">Intaluan</option>
                <option value="Iwa Ilaud">Iwa Ilaud</option>
                <option value="Iwa Ilaya">Iwa Ilaya</option>
                <option value="Jamabalud">Jamabalud</option>
                <option value="Jebioc">Jebioc</option>
                <option value="Lay-ahan">Lay-ahan</option>
                <option value="Lopez Jaena Ward">Lopez Jaena Ward</option>
                <option value="Lumbo">Lumbo</option>
                <option value="Macatol">Macatol</option>
                <option value="Malusgod">Malusgod</option>
                <option value="Nabitasan">Nabitasan</option>
                <option value="Naga">Naga</option>
                <option value="Nanga">Nanga</option>
                <option value="Naslo">Naslo</option>
                <option value="Pajo">Pajo</option>
                <option value="Palanguia">Palanguia</option>
                <option value="Pitogo">Pitogo</option>
                <option value="Polot-an">Polot-an</option>
                <option value="Primitivo Ledesma Ward">Primitivo Ledesma Ward</option>
                <option value="Purog">Purog</option>
                <option value="Rumbang">Rumbang</option>
                <option value="San Jose Ward">San Jose Ward</option>
                <option value="Sinuagan">Sinuagan</option>
                <option value="Tuburan">Tuburan</option>
                <option value="Tumcon Ilaud">Tumcon Ilaud</option>
                <option value="Tumcon Ilaya">Tumcon Ilaya</option>
                <option value="Ubang">Ubang</option>
                <option value="Zarrague">Zarrague</option>
            </select>
        </div>

        <div class="form-group">
            <label>Section Number</label>
            <input type="text" name="section" class="form-control" placeholder="Enter Section">
        </div>

        <div class="form-group">
            <label for="factors">Configure Factors</label>
            <textarea name="factors" id="factors" class="form-control" rows="5"
                placeholder="Enter factors, separated by commas"></textarea>
        </div>

        <button type="submit" name="factaddbtn" class="btn btn-primary">Save</button>

</form>


<hr>

<div class="card-body">
    <?php
    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h5 class="bg-primary text-white">' . $_SESSION['success'] . '</h5>';
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h5 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h5>';
        unset($_SESSION['status']);
    }
    ?>
<h5 class="font-weight-bold">Threshold Value Count</h5>
    <?php
    // Your PHP code for fetching and displaying the table
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thesis";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query_thresh = "SELECT * FROM threshold_values ORDER BY high, mid_max, mid_min, low";
    $query_thresh_run = mysqli_query($conn, $query_thresh);

    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="text-center" style="color: black; background-color:#f5f5f5">High Threshold Value</th>';
    echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Mid Max Threshold Value</th>';
    echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Mid Min Threshold Value</th>';
    echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Low Threshold Value</th>';
    echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Edit</th>'; // New column for Edit button
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($query_thresh_run)) {
        echo '<tr>';
        echo '<td class="text-center">' . $row['high'] . '</td>';
        echo '<td class="text-center">' . $row['mid_max'] . '</td>';
        echo '<td class="text-center">' . $row['mid_min'] . '</td>';
        echo '<td class="text-center">' . $row['low'] . '</td>';
        echo '<td class="text-center">
                <form action="threshold_edit.php" method="POST" >
                    <input type="hidden" name="id" value="' . $row['id'] . '">
                    <button type="submit" name="threshbtn" class="btn btn-success">EDIT</button>
                </form>
            </td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    $conn->close();
    ?>

<br>
<hr>
<h5 class="font-weight-bold">Barangay Section Factors</h5>

<?php
    // Your PHP code for fetching and displaying the table
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thesis";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    

    $query = "SELECT * FROM saved_sections ORDER BY barangay, section";
    $query_run = mysqli_query($conn, $query);

    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Barangay</th>';
    echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Section</th>';
    echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Factors</th>';
    echo '<th class="text-center" style="color: black; background-color:#f5f5f5">Edit</th>'; // New column for Edit button
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($query_run)) {
        echo '<tr>';
        echo '<td class="text-center">' . $row['barangay'] . '</td>';
        echo '<td class="text-center">' . $row['section'] . '</td>';
        echo '<td class="text-center">' . $row['factors'] . '</td>';
        echo '<td class="text-center">
                <form action="factors_edit.php" method="POST">
                    <input type="hidden" name="id" value="' . $row['id'] . '">
                    <button type="submit" name="factbtn" class="btn btn-success">EDIT</button>
                </form>
            </td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    $conn->close();
    ?>
</div>




<script>
    function saveConfiguration() {
        var barangay = document.getElementById("barangay").value;
        var section = document.getElementsByName("section")[0].value;
        var factors = document.getElementById("factors").value;

        fetch('factors_con.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'barangay=' + encodeURIComponent(barangay) +
                '&section=' + encodeURIComponent(section) +
                '&factors=' + encodeURIComponent(factors),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                alert(data.message);
                displaySavedConfigurations(); // Refresh the table
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('Error saving configuration.');
            });
    }

    function displaySavedConfigurations() {
        fetch('factors_conn.php')
            .then(response => response.json())
            .then(data => {
                var tableBody = document.querySelector('#savedConfigTable tbody');
                tableBody.innerHTML = '';

                data.forEach(config => {
                    var row = tableBody.insertRow();
                    row.insertCell(0).textContent = config.barangay;
                    row.insertCell(1).textContent = config.section;
                    row.insertCell(2).textContent = config.factors;

                    var editButton = document.createElement('button');
                    editButton.textContent = 'Edit';
                    editButton.onclick = function () {
                        editConfiguration(config.id, config.barangay, config.section, config.factors);
                    };

                    row.insertCell(4).appendChild(editButton);
                });
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    function editConfiguration(id, barangay, section, factors) {
        // Use window.location.href to navigate to factors_edit.php with parameters
        window.location.href = 'factors_edit.php?id=' + encodeURIComponent(id) +
            '&barangay=' + encodeURIComponent(barangay) +
            '&section=' + encodeURIComponent(section) +
            '&factors=' + encodeURIComponent(factors);
    }


    function updateConfiguration(id) {
        var barangay = document.getElementById("barangay").value;
        var section = document.getElementsByName("section")[0].value;
        var factors = document.getElementById("factors").value;

        // Send a request to the backend to update the configuration
        fetch('factors_edit.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id=' + encodeURIComponent(id) +
                '&barangay=' + encodeURIComponent(barangay) +
                '&section=' + encodeURIComponent(section) +
                '&factors=' + encodeURIComponent(factors),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                alert(data.message);
                displaySavedConfigurations(); // Refresh the table
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('Error updating configuration.');
            });

        // Switch back the "Update Configuration" button to "Save Configuration"
        document.querySelector('button.btn-primary').textContent = 'Save Configuration';

        // Update the onclick function to call the saveConfiguration function
        document.querySelector('button.btn-primary').onclick = saveConfiguration;

        // Clear the form fields after updating
        document.getElementById("barangay").value = '';
        document.getElementsByName("section")[0].value = '';
        document.getElementById("factors").value = '';
    }


    // Initial display of saved configurations
    displaySavedConfigurations();
</script>




</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>