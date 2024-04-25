<?php
include ('security.php');
include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Land Owners Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php
            include ('land1.php');
            ?>


            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> District </label>
                        <input type="text" name="district" class="form-control" placeholder="Enter District">
                    </div>
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
                        <input type="text" name="section_no" class="form-control" placeholder="Enter Section">
                    </div>
                    <div class="form-group">
                        <label>Lot No.</label>
                        <input type="text" name="lot_no" class="form-control" placeholder="Enter Lot No.">
                    </div>

                    <div class="form-group">
                        <label for="classificationSelect">Classification:</label>
                        <select id="classificationSelect" name="classification" class="form-control"
                            onchange="onClassificationChange()">
                            <option value="">-- Select Classification --</option>
                            <option value="agriculture">Agriculture</option>
                            <option value="residential">Residential</option>
                            <option value="commercial">Commercial</option>
                            <option value="industrial">Industrial</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kindsSelect">Kinds</label>
                        <select id="kindsSelect" name="kinds" class="form-control" onchange="onKindsChange()">
                            <option value="">-- Select Kinds --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subclassSelect">Subclass</label>
                        <select id="subclassSelect" name="subclass" class="form-control" onchange="onSubclassChange()">
                            <option value="">-- Select Subclass --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="areaInput">Area:</label>
                        <div class="input-group">
                            <input type="text" id="areaInput" name="area" class="form-control" oninput="setUnitValue()">
                            <span class="input-group-text" id="areaInputLabel"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitValueInput">Unit Value</label>
                        <input type="text" name="unit_val" class="form-control" id="unitValueInput">
                        <input type="hidden" name="updated_unit_val" id="updatedUnitVal">
                    </div>
                    <div class="form-group" action="configure.php">
                        <label for="LevelInput">Assessment Level</label>
                        <input type="text" name="assess_level" class="form-control" id="LevelInput">
                        <input type="hidden" name="updated_assess_level" id="updatedAssessLevel">
                    </div>


                    <script>
                        var updatedUnitVal = parseFloat(document.getElementById("unit_val").value);
                        var updatedAssessLevel = parseFloat(document.getElementById("assess_level").value);

                        // Add this JavaScript code to update the hidden fields
                        document.addEventListener("DOMContentLoaded", function () {
                            var unitValueInput = document.getElementById("unitValueInput");
                            var updatedUnitValInput = document.getElementById("updatedUnitVal");

                            unitValueInput.addEventListener("input", function () {
                                updatedUnitValInput.value = unitValueInput.value;
                            });


                            var LevelInput = document.getElementById("LevelInput");
                            var updatedAssessLevelInput = document.getElementById("updatedAssessLevel");

                            LevelInput.addEventListener("input", function () {
                                updatedAssessLevelInput.value = LevelInput.value;
                            });
                        });


                    </script>


                    <div class="form-group">
                        <label for="assessValueInput">Assessment Value:</label>
                        <input type="text" name="assess_val" class="form-control" id="assessValueInput">
                    </div>
                    <div class="form-group">
                        <label for="marketValueInput">Market Value:</label>
                        <input type="text" name="market_val" class="form-control" id="marketValueInput">
                    </div>
                    <div class="form-group">
                        <label for="taxValueInput">Tax Payables:</label>
                        <input type="text" name="payables" class="form-control" id="taxValueInput">
                    </div>


                    <div class="form-group">
                        <label>Building / Structures</label>
                        <input type="text" name="structures" class="form-control" placeholder="Enter Structures">
                    </div>
                    <div class="form-group">
                        <label>Machinery</label>
                        <input type="text" name="machinery" class="form-control" placeholder="Enter Machinery">
                    </div>



                    <div class="form-group">
                        <h5> GPS: <button type="button" onclick="getLocation()"
                                class="btn btn-primary btn-sm my-2 buton"> <i
                                    class="fa-solid fa-location-dot"></i></button></h5>
                        <label for="current_loc">Current Location:</label>
                        <input id="current_loc" class="form-control" name="current_loc" required readonly>
                    </div>


                    <div class="form-group">
                        <label for="longitude">Longitude:</label>
                        <input id="longitude" class="form-control" name="longitude" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude:</label>
                        <input id="latitude" class="form-control" name="latitude" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="altitude">Altitude:</label>
                        <input id="altitude" class="form-control" name="altitude" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="accuracy">Precision:</label>
                        <input id="accuracy" class="form-control" name="accuracy" required readonly>
                    </div>

                </div>
                <script type="text/javascript">
                    function getLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition);
                        } else {
                            document.getElementById("current_loc").value = "Geolocation is not supported by this browser.";
                        }
                    }

                    function showPosition(position) {
                        var latitude = position.coords.latitude;
                        var longitude = position.coords.longitude;
                        var altitude = position.coords.altitude;
                        var accuracy = position.coords.accuracy;

                        // Replace null values with "0"
                        latitude = latitude !== null ? latitude : 0;
                        longitude = longitude !== null ? longitude : 0;
                        altitude = altitude !== null ? altitude : 0;
                        accuracy = accuracy !== null ? accuracy : 0;

                        var currentLocation = longitude + "," + latitude + "," + altitude + "," + accuracy;

                        document.getElementById("longitude").value = longitude;
                        document.getElementById("latitude").value = latitude;
                        document.getElementById("altitude").value = altitude;
                        document.getElementById("accuracy").value = accuracy;
                        document.getElementById("current_loc").value = currentLocation;

                        var output = "";
                        output += '<center><iframe src="https://www.google.com/maps?q=' + latitude + ',' + longitude + '&ie=UTF8&iwloc=&output=embed" width="100%" height="200px"></iframe></center>';
                        document.getElementById('displayMapa').innerHTML = output;
                    }
                </script>


                <form action="#.php" method="POST">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="mapbtn" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </form>

        </div>
    </div>
</div>




<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Owners Profile</h6>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile"> Add
                Profile </button>
            <button type="button" class="btn btn-primary" style="position: absolute; right: 10px;"
                onclick="window.location.href='configure.php'">
                <svg width="16" height="16" fill="currentColor" class="bi bi-pencil-square">
                    <path
                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                    </path>
                    <path
                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z">
                    </path>
                </svg>
                Configure Calculation
            </button>
            <button type="button" class="btn btn-success" style="position: absolute; right: 220px;"
                onclick="window.location.href='factors.php'">
                <svg width="16" height="16" fill="currentColor" class="bi bi-pencil-square">
                    <path
                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                    </path>
                    <path
                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z">
                    </path>
                </svg>
                Configure Factors
            </button>
        </div>

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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" id="dataTablerecord" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Lot No.</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Classification</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Kind of Land</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Sub Class</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Area</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Unit Value</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Assessment Level</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Assessment Value</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Market Value</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Tax To Pay</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Edit</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">Add New Data</th>
                        <th class="text-center" style="color: black; background-color:#f5f5f5">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM landinfo";
                        $query_run = mysqli_query($connection, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                echo '<tr>';
                                echo '<td>' . $row['lot_no'] . '</td>';
                                echo '<td>' . $row['classification'] . '</td>';
                                echo '<td>' . $row['kinds'] . '</td>';
                                echo '<td>' . $row['subclass'] . '</td>';
                                echo '<td>' . $row['area'] . '</td>';
                                echo '<td>' . $row['unit_val'] . '</td>';
                                echo '<td>' . $row['assess_level'] . '</td>';
                                echo '<td>' . $row['assess_val'] . '</td>';
                                echo '<td>' . $row['market_val'] . '</td>';
                                echo '<td>' . $row['payables'] . '</td>';

                                echo '<td>
            <form action="map_edit.php" method="POST">
                <input type="hidden" name="map_id" value="' . $row['land_id'] . '">
                <button type="submit" name="mapbtn" class="btn btn-success">EDIT</button>
            </form>
        </td>';
                                echo '<td>
        <form action="map_add.php" method="POST">
            <input type="hidden" name="map_id" value="' . $row['land_id'] . '">
            <button type="submit" name="mapadd_btn" class="btn btn-info">Add</button>
        </form>
        </td>';
                                echo '<td>
            <form action="data_record.php" method="POST">
                <input type="hidden" name="map_id" value="' . $row['land_id'] . '">
                <button type="submit" name="mapview_btn" class="btn btn-primary">VIEW</button>
            </form>
        </td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="18" class="text-center font-weight-bold">No records found</td></tr>';
                        }
                        ?>




                    </tbody>
                </table>
            </div>
        </div>

       


    </div>
</div>
<?php
include ('includes/scripts.php');
?>
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
        $('#dataTable').DataTable({
            "scrollY": "600px" 
        });
    });
</script>

<?php
include ('includes/footer.php');
?>