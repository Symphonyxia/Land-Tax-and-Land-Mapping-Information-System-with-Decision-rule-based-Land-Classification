<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Add Land Profile </h6>
  </div>

  <div class="card-body">

<?php
$connection = mysqli_connect("localhost", "root", "", "thesis");
  if(isset($_POST['mapadd_btn']))
{
    $id = $_POST['map_id'];

    $query = "SELECT * FROM landinfo WHERE land_id = '$id' ";
    $query_run= mysqli_query($connection, $query);

    foreach($query_run as $row)
    {
        ?>

<!-- Main land information form -->
<form action="code.php" method="POST">
    <!-- Main land info fields -->
    <input type="hidden" name ="map_id" value = "<?php echo $row['land_id'] ?>"> 

    <div class="modal-body">

    <div class="classification-form">
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
<div class="form-group" action= "configure.php">
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
        </div>


<div id="classificationFormsContainer">
    <!-- Additional classification forms will be added here -->
</div>


<?php include('classify1.php'); ?>


<a href="map.php" class = "btn btn-danger" > Cancel </a>
    <button type="submit" name="mapadd_btn" class="btn btn-primary">Save</button>
</form>
<?php
    }

}
?>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

