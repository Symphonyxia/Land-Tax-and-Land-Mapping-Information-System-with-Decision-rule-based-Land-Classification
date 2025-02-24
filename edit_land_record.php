<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT Additional Land Profile</h6>
        </div>
        <div class="card-body">
            
            <?php
            $connection = mysqli_connect("localhost", "root", "", "thesis");

            if (isset($_POST['recordbtn'])) {
                $id = $_POST['record_edit_id'];
                $query = "SELECT * FROM land_record WHERE record_id = '$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
                    ?>
                    <form action="land_code.php" method="POST">
                        <input type="hidden" name="record_edit_id" value="<?php echo $row['record_id']; ?>">

                        <!-- Include form fields for editing the land record -->
                        <div class="form-group">
                            <label>Classification:</label>
                            <select name="edit_classification" id="edit_classification" class="form-control"
                                onchange="onClassificationChange(); calculateMarketValue();">
                                <option value="">Select Classification</option>
                                <option value="agriculture" <?php if ($row['classification'] === 'agriculture')
                                    echo 'selected'; ?>>Agriculture</option>
                                <option value="residential" <?php if ($row['classification'] === 'residential')
                                    echo 'selected'; ?>>Residential</option>
                                <option value="commercial" <?php if ($row['classification'] === 'commercial')
                                    echo 'selected'; ?>>
                                    Commercial</option>
                                <option value="industrial" <?php if ($row['classification'] === 'industrial')
                                    echo 'selected'; ?>>
                                    Industrial</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kindsSelect">Kinds:</label>
                            <select id="kindsSelect" name="edit_kinds" onchange="onKindsChange(); calculateMarketValue();"
                                class="form-control">
                                <option value="">Select Kinds</option>
                                <?php if ($classification === "agriculture"): ?>
                                    <option value="">-- Select Kinds --</option>
                                    <option value="irrigated" <?php if ($row['kinds'] === "irrigated")
                                        echo "selected"; ?>>Rice
                                        Irrigated</option>
                                    <option value="nonirrigated" <?php if ($row['kinds'] === "nonirrigated")
                                        echo "selected"; ?>>Rice
                                        Unirrigated</option>
                                    <option value="upland" <?php if ($row['kinds'] === "upland")
                                        echo "selected"; ?>>Rice Upland
                                    </option>
                                    <option value="corn" <?php if ($row['kinds'] === "corn")
                                        echo "selected"; ?>>CornLand</option>
                                    <option value="coconut" <?php if ($row['kinds'] === "coconut")
                                        echo "selected"; ?>>Coconut Land
                                    </option>
                                    <option value="cotton" <?php if ($row['kinds'] === "cotton")
                                        echo "selected"; ?>>Cotton Land
                                    </option>
                                    <option value="tobacco" <?php if ($row['kinds'] === "tobacco")
                                        echo "selected"; ?>>Tabacco Land
                                    </option>
                                    <option value="bamboo" <?php if ($row['kinds'] === "bamboo")
                                        echo "selected"; ?>>Bamboo Land
                                    </option>
                                    <option value="bangus" <?php if ($row['kinds'] === "bangus")
                                        echo "selected"; ?>>Fishpond:Bangus
                                    </option>
                                    <option value="tilapia" <?php if ($row['kinds'] === "tilapia")
                                        echo "selected"; ?>>
                                        Fishpond:Tilapia</option>
                                    <option value="lapulapu" <?php if ($row['kinds'] === "lapulapu")
                                        echo "selected"; ?>>
                                        Fishpond:Lapu-Lapu</option>
                                    <option value="fisheries" <?php if ($row['kinds'] === "fisheries")
                                        echo "selected"; ?>>In-Land
                                        Fisheries:Tilapia</option>
                                    <option value="hito" <?php if ($row['kinds'] === "hito")
                                        echo "selected"; ?>>In-Land
                                        Fisheries:Hito</option>
                                    <option value="nipa" <?php if ($row['kinds'] === "nipa")
                                        echo "selected"; ?>>Nipa Land</option>
                                    <option value="salt" <?php if ($row['kinds'] === "salt")
                                        echo "selected"; ?>>Salt Bed</option>
                                    <option value="pasture" <?php if ($row['kinds'] === "pasture")
                                        echo "selected"; ?>>Pasture
                                    </option>
                                    <option value="forest" <?php if ($row['kinds'] === "forest")
                                        echo "selected"; ?>>Forest</option>
                                    <option value="mangroove" <?php if ($row['kinds'] === "mangroove")
                                        echo "selected"; ?>>Mangroove
                                    </option>
                                    <option value="orchard" <?php if ($row['kinds'] === "orchard")
                                        echo "selected"; ?>>Orchard
                                    </option>
                                    <option value="abaca" <?php if ($row['kinds'] === "abaca")
                                        echo "selected"; ?>>Abaca</option>
                                    <option value="cogon" <?php if ($row['kinds'] === "cogon")
                                        echo "selected"; ?>>Cogon Land</option>
                                    <option value="sorghum" <?php if ($row['kinds'] === "sorghum")
                                        echo "selected"; ?>>Sorghum
                                    </option>
                                    <option value="ipilipil" <?php if ($row['kinds'] === "ipilipil")
                                        echo "selected"; ?>>Ipil-ipil
                                        Land</option>
                                    <option value="zacate" <?php if ($row['kinds'] === "zacate")
                                        echo "selected"; ?>>Zacate</option>
                                    <option value="kangkong" <?php if ($row['kinds'] === "kangkong")
                                        echo "selected"; ?>>Kangkong
                                    </option>
                                    <option value="mango" <?php if ($row['kinds'] === "mango")
                                        echo "selected"; ?>>Mango Land</option>
                                    <option value="pineapple" <?php if ($row['kinds'] === "pineapple")
                                        echo "selected"; ?>>Pineapple
                                        Land</option>
                                    <option value="intensive" <?php if ($row['kinds'] === "intensive")
                                        echo "selected"; ?>>Prawn Pond,
                                        Intensive</option>
                                    <option value="semiintensive" <?php if ($row['kinds'] === "semiintensive")
                                        echo "selected"; ?>>
                                        Prawn Pond, Semi-intensive</option>
                                    <option value="traditional" <?php if ($row['kinds'] === "traditional")
                                        echo "selected"; ?>>Prawn
                                        Pond, Traditional</option>
                                    <option value="sugar" <?php if ($row['kinds'] === "sugar")
                                        echo "selected"; ?>>Sugar Land</option>
                                    <option value="cardava" <?php if ($row['kinds'] === "cardava")
                                        echo "selected"; ?>>Banana
                                        Land:Cardava/Saba(pp of not more than 625)</option>
                                    <option value="sweet" <?php if ($row['kinds'] === "sweet")
                                        echo "selected"; ?>>Banana Land:Sweet
                                        Banana(pp of not more than 955)</option>
                                    <option value="bananacommercial" <?php if ($row['kinds'] === "bananacommercial")
                                        echo "selected"; ?>>Banana Land:Commercial Plantation(pp of not more than 956 for Sweet & more than 625 for
                                        Cardava/Saba)</option>
                                    <option value="cassava" <?php if ($row['kinds'] === "cassava")
                                        echo "selected"; ?>>Cassava Land &
                                        other Root Crops</option>
                                    <option value="coffee" <?php if ($row['kinds'] === "coffee")
                                        echo "selected"; ?>>Coffee</option>
                                    <option value="horticulture" <?php if ($row['kinds'] === "horticulture")
                                        echo "selected"; ?>>
                                        Horticulture</option>
                                    <option value="poultry" <?php if ($row['kinds'] === "poultry")
                                        echo "selected"; ?>>Poultry Farm
                                    </option>
                                    <option value="cacao" <?php if ($row['kinds'] === "cacao")
                                        echo "selected"; ?>>Cacao Land</option>
                                    <option value="swine" <?php if ($row['kinds'] === "swine")
                                        echo "selected"; ?>>Swine Farm Land
                                    </option>
                                    <option value="papayacommercial" <?php if ($row['kinds'] === "papayacommercial")
                                        echo "selected"; ?>>Papaya Land:Commercial Plantation (pp of 1,100 hills/ha. or more)</option>
                                    <option value="papayatraditional" <?php if ($row['kinds'] === "papayatraditional")
                                        echo "selected"; ?>>Papaya Land:Traditional (pp of 1,099 hills/ha. or more)</option>
                                    <option value="dragon" <?php if ($row['kinds'] === "dragon")
                                        echo "selected"; ?>>Dragon Fruit Land
                                    </option>
                                    <option value="breeding" <?php if ($row['kinds'] === "breeding")
                                        echo "selected"; ?>>Game Fowl
                                        Breeding Farm</option>
                                    <option value="citrus" <?php if ($row['kinds'] === "citrus")
                                        echo "selected"; ?>>Citrus Land
                                    </option>
                                <?php elseif ($classification === "residential"): ?>
                                    <option value="">-- Select Kinds --</option>
                                    <option value="pototan1" <?php echo ($row['kinds'] === 'pototan1') ? 'selected' : ''; ?>>
                                        Residential</option>
                                <?php elseif ($classification === "commercial"): ?>
                                    <option value="">-- Select Kinds --</option>
                                    <option value="pototan2" <?php echo ($row['kinds'] === 'pototan2') ? 'selected' : ''; ?>>
                                        Commercial</option>
                                <?php elseif ($classification === "industrial"): ?>
                                    <option value="">-- Select Kinds --</option>
                                    <option value="pototan3" <?php echo ($row['kinds'] === 'pototan3') ? 'selected' : ''; ?>>
                                        Industrial</option>
                                <?php endif; ?>

                            </select>
                        </div>





                        <div class="form-group">
                            <label for="subclassSelect">Subclass:</label>
                            <select id="subclassSelect" name="edit_subclass"
                                onchange="onSubclassChange(); calculateMarketValue();" class="form-control">
                                <option value="">Select Subclass</option>
                                <?php if (
                                    $classification === "agriculture" && ($kinds === "irrigated" || $kinds === "nonirrigated" || $kinds === "upland"
                                        || $kinds === "corn" || $kinds === "coconut" || $kinds === "cotton" || $kinds === "tobacco"
                                        || $kinds === "bamboo" || $kinds === "bangus" || $kinds === "tilapia" || $kinds === "lapulapu"
                                        || $kinds === "fisheries" || $kinds === "hito" || $kinds === "nipa" || $kinds === "salt"
                                        || $kinds === "pasture" || $kinds === "forest" || $kinds === "mangroove" || $kinds === "orchard"
                                        || $kinds === "abaca" || $kinds === "cogon" || $kinds === "sorghum" || $kinds === "ipilipil"
                                        || $kinds === "zacate" || $kinds === "kangkong" || $kinds === "mango" || $kinds === "pineapple"
                                        || $kinds === "intensive" || $kinds === "semiintensive" || $kinds === "traditional" || $kinds === "sugar"
                                        || $kinds === "cardava" || $kinds === "sweet" || $kinds === "bananacommercial" || $kinds === "cassava"
                                        || $kinds === "coffee" || $kinds === "horticulture" || $kinds === "poultry" || $kinds === "cacao"
                                        || $kinds === "swine" || $kinds === "papayacommercial" || $kinds === "papayatraditional" || $kinds === "dragon"
                                        || $kinds === "breeding" || $kinds === "citrus")
                                ): ?>

                                    <option value="1" <?php if ($subclass === "1")
                                        echo "selected"; ?>>1</option>
                                    <option value="2" <?php if ($subclass === "2")
                                        echo "selected"; ?>>2</option>
                                    <option value="3" <?php if ($subclass === "3")
                                        echo "selected"; ?>>3</option>
                                    <option value="4" <?php if ($subclass === "4")
                                        echo "selected"; ?>>4</option>
                                <?php elseif ($classification === "residential" && $kinds === "pototan1"): ?>
                                    <option value="R1" <?php if ($subclass === "R1")
                                        echo "selected"; ?>>R-1</option>
                                    <option value="R2" <?php if ($subclass === "R2")
                                        echo "selected"; ?>>R-2</option>
                                    <option value="R3" <?php if ($subclass === "R3")
                                        echo "selected"; ?>>R-3</option>
                                    <option value="R4" <?php if ($subclass === "R4")
                                        echo "selected"; ?>>R-4</option>
                                    <option value="R5" <?php if ($subclass === "R5")
                                        echo "selected"; ?>>R-5</option>
                                    <option value="R6" <?php if ($subclass === "R6")
                                        echo "selected"; ?>>R-6</option>
                                <?php elseif ($classification === "commercial" && $kinds === "pototan2"): ?>
                                    <option value="C1" <?php if ($subclass === "C1")
                                        echo "selected"; ?>>C-1</option>
                                    <option value="C2" <?php if ($subclass === "C2")
                                        echo "selected"; ?>>C-2</option>
                                    <option value="C3" <?php if ($subclass === "C3")
                                        echo "selected"; ?>>C-3</option>
                                    <option value="C4" <?php if ($subclass === "C4")
                                        echo "selected"; ?>>C-4</option>
                                    <option value="C5" <?php if ($subclass === "C5")
                                        echo "selected"; ?>>C-5</option>
                                    <option value="C6" <?php if ($subclass === "C6")
                                        echo "selected"; ?>>C-6</option>
                                <?php elseif ($classification === "industrial" && $kinds === "pototan3"): ?>
                                    <option value="I1" <?php if ($subclass === "I1")
                                        echo "selected"; ?>>I-1</option>
                                    <option value="I2" <?php if ($subclass === "I2")
                                        echo "selected"; ?>>I-2</option>
                                    <option value="I3" <?php if ($subclass === "I3")
                                        echo "selected"; ?>>I-3</option>
                                    <option value="I4" <?php if ($subclass === "I4")
                                        echo "selected"; ?>>I-4</option>
                                    <option value="I5" <?php if ($subclass === "I5")
                                        echo "selected"; ?>>I-5</option>
                                    <option value="I6" <?php if ($subclass === "I6")
                                        echo "selected"; ?>>I-6</option>
                                <?php endif; ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Assessment Level</label>
                            <input type="text" name="edit_level" id="LevelInput" value="<?php echo $row['assess_level'] ?>"
                                class="form-control" onchange="calculateMarketValue()">
                        </div>

                        <div class="form-group">
                            <label>Unit Value</label>
                            <input type="text" name="edit_unit_val" id="unitValueInput" value="<?php echo $row['unit_val'] ?>"
                                class="form-control" onchange="calculateMarketValue()">
                        </div>

                        <!-- Add other form fields here -->

                        <div class="form-group">
                            <label for="areaInput">Area:</label>
                            <input type="text" name="edit_area" id="areaInput" value="<?php echo $row['area'] ?>"
                                onchange="calculateMarketValue()" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="marketValueInput">Market Value:</label>
                            <input type="text" name="edit_market_val" id="marketValueInput" value="<?php echo $row['market_val'] ?>"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="assessValueInput">Assessed Value:</label>
                            <input type="text" name="edit_assess_val" id="assessValueInput"
                                value="<?php echo $row['assess_val'] ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="taxValueInput">Tax Payables:</label>
                            <input type="text" name="edit_payables" id="taxValueInput" value="<?php echo $row['payables'] ?>"
                                class="form-control" readonly>
                        </div>

                        <a href="map.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="record_update_btn" class="btn btn-primary">Update</button>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>


<script>
  function onClassificationChange() {
  var classificationSelect = document.getElementById("edit_classification");
  var kindsSelect = document.getElementById("kindsSelect");
  var subclassSelect = document.getElementById("subclassSelect");
  var LevelInput = document.getElementById("LevelInput");

  var selectedClassification = classificationSelect.value;

  // Reset Kinds and Subclass fields
  kindsSelect.innerHTML = '<option value="">Select Kinds</option>';
  subclassSelect.innerHTML = '<option value="">Select Subclass</option>';
  LevelInput.value = "";

  if (selectedClassification === "agriculture") {
    kindsSelect.innerHTML = `
     <option value="irrigated">Rice Irrigated</option>
    <option value="nonirrigated">Rice Unirrigated</option>
	 <option value="upland">Rice Upland</option>
      <option value="corn">Corn Land</option>
      <option value="coconut">Coconut Land</option>
      <option value="cotton">Cotton Land</option>
      <option value="tabacco">Tobacco Land</option>
      <option value="bamboo">Bamboo Land</option>
      <option value="bangus">Fishpond:Bangus</option>
      <option value="tilapia">Fishpond:Tilapia</option>
      <option value="lapulapu">Fishpond:Lapu-Lapu</option> 
	  <option value="fisheries">In-Land Fisheries:Tilapia</option>
      <option value="hito">In-Land Fisheries:Hito </option>
      <option value="nipa">Nipa Land</option>
      <option value="salt">Salt Bed</option>
      <option value="pasture">Pasture</option>
      <option value="forest">Forest</option>
      <option value="mangroove">Mangroove</option>
      <option value="orchard">Orchard</option>
      <option value="abaca">Abaca</option>
      <option value="cogon">Cogon Land</option>
      <option value="sorghum">Sorghum</option>
      <option value="ipilipil">Ipil-Ipil Land</option>
      <option value="zacate">Zacate</option>
      <option value="kangkong">Kangkong</option>
      <option value="mango">Mango Land</option
      <option value="pineapple">Pineapple Land</option>
      <option value="intensive">Prawn Pond, Intensive</option>
	  <option value="semiintensive">Prawn Pond, Semi-intensive</option>
      <option value="traditional">Prawn Pond, Traditional</option>
      <option value="sugar">Sugar Land</option>
      <option value="cardava">Banana Land:Cardava/Saba(pp of not more than 625)</option>
      <option value="sweet">Banana Land:Sweet Banana(pp of not more than 955)</option>
      <option value="bananacommercial">Banana Land:Commercial Plantation(pp of not more than 956 for Sweet & more than 625 for Cardava/Saba)</option>
      <option value="cassava">Cassava Land & other Root Crops</option>
      <option value="coffee">Coffee</option>
      <option value="horticulture">Horticulture</option>
      <option value="poultry">Poultry Farm Land(Broiler)</option>
      <option value="cacao">Cacao Land</option>' +
      <option value="swine">Swine Farm Land</option>
      <option value="papayacommercial">Papaya Land:Commercial Plantation (pp of 1,100 hills/ha. or more)</option>
      <option value="papayatraditional">Papaya Land:Traditional (pp of 1,099 hills/ha. or more)</option>
      <option value="dragon">Dragon Fruit Land</option>
      <option value="breeding">Game Fowl Breeding Farm</option>
      <option value="citrus">Citrus Land</option>`;
    LevelInput.value = "0.175";
  }else if (selectedClassification === "residential") {
    kindsSelect.innerHTML = `
      <option value="">-- Select Kinds --</option>
      <option value="pototan1">Residential</option>
    `;
    subclassSelect.innerHTML = `
      <option value="">-- Select Subclass --</option>
      <option value="R1">R-1</option>
      <option value="R2">R-2</option>
      <option value="R3">R-3</option>
      <option value="R4">R-4</option>
      <option value="R5">R-5</option>
      <option value="R6">R-6</option>
    `;
    LevelInput.value = "0.05";
  } else if (selectedClassification === "commercial") {
    kindsSelect.innerHTML = `
      <option value="">-- Select Kinds --</option>
      <option value="pototan2">Commercial</option>
    `;
    subclassSelect.innerHTML = `
      <option value="">-- Select Subclass --</option>
      <option value="C1">C-1</option>
      <option value="C2">C-2</option>
      <option value="C3">C-3</option>
      <option value="C4">C-4</option>
      <option value="C5">C-5</option>
      <option value="C6">C-6</option>
    `;
    LevelInput.value = "0.15";
  } else if (selectedClassification === "industrial") {
    kindsSelect.innerHTML = `
      <option value="">-- Select Kinds --</option>
      <option value="pototan3">Industrial</option>
    `;
    subclassSelect.innerHTML = `
      <option value="">-- Select Subclass --</option>
      <option value="I1">I-1</option>
      <option value="I2">I-2</option>
      <option value="I3">I-3</option>
      <option value="I4">I-4</option>
      <option value="I5">I-5</option>
      <option value="I6">I-6</option>
    `;
    LevelInput.value = "0.2";
  }
}


    // Update Subclass options based on selected Kinds
function onKindsChange() {
  var kindsSelect = document.getElementById("kindsSelect");
  var subclassSelect = document.getElementById("subclassSelect");
  var unitValueInput = document.getElementById("unitValueInput");

var selectedKinds = "agriculture";

// Reset Unit Value and Subclass select
unitValueInput.value = "";
subclassSelect.value = "";
subclassSelect.disabled = false;

if (kindsSelect.value !== "") {
    subclassSelect.disabled = false;
    if (kindsSelect.value === "irrigated") {
        subclassSelect.innerHTML = `
            <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    } else if (kindsSelect.value === "nonirrigated") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    } else if (kindsSelect.value === "upland") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    } else if (kindsSelect.value === "corn") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "coconut") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "cotton") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "tabacco") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    } else if (kindsSelect.value === "bamboo") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    } else if (kindsSelect.value === "bangus") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    } else if (kindsSelect.value === "tilapia") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "lapulapu") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "fisheries") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "hito") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "nipa") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "salt") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "pasture") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "forest") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "mangroove") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "orchard") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "abaca") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "cogon") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "sorghum") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "ipilipil") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "zacate") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "kangkong") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    } else if (kindsSelect.value === "mango") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "pineapple") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "intensive") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "semiintensive") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    } else if (kindsSelect.value === "traditional") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "sugar") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "cardava") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "sweet") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    } else if (kindsSelect.value === "bananacommercial") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "cassava") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "coffee") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "horticulture") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
} else if (kindsSelect.value === "poultry") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "cacao") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "swine") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "papayacommercial") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "papayatraditional") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "dragon") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "breeding") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
    }else if (kindsSelect.value === "citrus") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        `;
   }

  }            

if (kindsSelect.value !== "residential") {
    subclassSelect.disabled = false;
    if (kindsSelect.value === "pototan1") {
        subclassSelect.innerHTML = `
            <option value="">Select Subclass</option>
            <option value="R1">R-1</option>
            <option value="R2">R-2</option>
            <option value="R3">R-3</option>
            <option value="R4">R-4</option>
            <option value="R5">R-5</option>
            <option value="R6">R-6</option>
        `;
    }
}

if (kindsSelect.value !== "commercial") {
    subclassSelect.disabled = false;
    if (kindsSelect.value === "pototan2") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="C1">C-1</option>
            <option value="C2">C-2</option>
            <option value="C3">C-3</option>
            <option value="C4">C-4</option>
            <option value="C5">C-5</option>
            <option value="C6">C-6</option>
        
        `;
    }
}

if (kindsSelect.value !== "industrial") {
    subclassSelect.disabled = false;
    if (kindsSelect.value === "pototan3") {
        subclassSelect.innerHTML = `
        <option value="">Select Subclass</option>
            <option value="I1">I-1</option>
            <option value="I2">I-2</option>
            <option value="I3">I-3</option>
            <option value="I4">I-4</option>
            <option value="I5">I-5</option>
            <option value="I6">I-6</option>
        
        `;
    }
}
}



    // Update unit value based on selected subclass and classification
    function onSubclassChange() {
        var subclassSelect = document.getElementById("subclassSelect");
        var unitValueInput = document.getElementById("unitValueInput");

        // Set unit value based on selected subclass and classification
        var classificationSelect = document.getElementById("edit_classification");
        var kindsSelect = document.getElementById("kindsSelect");

        var subclass = subclassSelect.value;
        var unit_val = "";

        if (subclass !== "") {
            if (classificationSelect.value === "agriculture") {
                // Set unit value based on subclass for "agriculture"
                switch (kindsSelect.value) {
                    case "irrigated":
                        if (subclass === "1") {
                            unit_val = <?php echo isset($_SESSION['irrigated_1']) ? $_SESSION['irrigated_1'] : '767100'; ?>;
                        } else if (subclass === "2") {
                            unit_val = <?php echo isset($_SESSION['irrigated_2']) ? $_SESSION['irrigated_2'] : '715600'; ?>;
                        } else if (subclass === "3") {
                            unit_val = <?php echo isset($_SESSION['irrigated_3']) ? $_SESSION['irrigated_3'] : '631300'; ?>;
                        } else if (subclass === "4") {
                            unit_val = <?php echo isset($_SESSION['irrigated_4']) ? $_SESSION['irrigated_4'] : '527700'; ?>;
                        }
                        break;
                    case "nonirrigated":
                        if (subclass === "1") {
                            unit_val = <?php echo isset($_SESSION['nonirrigated_1']) ? $_SESSION['nonirrigated_1'] : '442400'; ?>;
                        } else if (subclass === "2") {
                            unit_val = <?php echo isset($_SESSION['nonirrigated_2']) ? $_SESSION['nonirrigated_2'] : '405500'; ?>;
                        } else if (subclass === "3") {
                            unit_val = <?php echo isset($_SESSION['nonirrigated_3']) ? $_SESSION['nonirrigated_3'] : '339200'; ?>;
                        } else if (subclass === "4") {
                            unit_val = <?php echo isset($_SESSION['nonirrigated_4']) ? $_SESSION['nonirrigated_4'] : "0"; ?>;
                        }
                        break;
                case "upland":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['upland_1']) ? $_SESSION['upland_1'] : '162600'; ?>;  
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['upland_2']) ? $_SESSION['upland_2'] : '128700'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['upland_3']) ? $_SESSION['upland_3'] : "0"; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['upland_4']) ? $_SESSION['upland_4'] : "0"; ?>;
                    }
                    break;
                case "corn":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['corn_1']) ? $_SESSION['corn_1'] : '206600'; ?>; 
                    } else if (subclass === "2") {
                        unit_val =<?php echo isset($_SESSION['corn_2']) ? $_SESSION['corn_2'] : '184600'; ?>;
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['corn_3']) ? $_SESSION['corn_3'] : '143300'; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['corn_4']) ? $_SESSION['corn_4'] : "0"; ?>; 
                    }
                    break;
                case "coconut":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['coconut_1']) ? $_SESSION['coconut_1'] : '217500'; ?>;
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['coconut_2']) ? $_SESSION['coconut_2'] : '190300'; ?>;
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['coconut_3']) ? $_SESSION['coconut_3'] : '146800'; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['coconut_4']) ? $_SESSION['coconut_4'] : "0"; ?>; 
                    }
                    break;
                case "cotton":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['cotton_1']) ? $_SESSION['cotton_1'] : '201800'; ?>;
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['cotton_2']) ? $_SESSION['cotton_2'] : '181600'; ?>;
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['cotton_3']) ? $_SESSION['cotton_3'] : "0"; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['cotton_3']) ? $_SESSION['cotton_3'] : "0"; ?>;
                    }
                    break;
					case "tabacco":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['tabacco_1']) ? $_SESSION['tabacco_1'] : '145800'; ?>; 
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['tabacco_2']) ? $_SESSION['tabacco_2'] : '131200'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['tabacco_3']) ? $_SESSION['tabacco_3'] : '102000'; ?>;
                    }else if (subclass === "4") {
                         unit_val = <?php echo isset($_SESSION['tabacco_4']) ? $_SESSION['tabacco_4'] : "0"; ?>;
                    }
                    break;
					case "bamboo":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['bamboo_1']) ? $_SESSION['bamboo_1'] : '148000'; ?>; 
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['bamboo_2']) ? $_SESSION['bamboo_2'] : '133100'; ?>;
                    }else if (subclass === "3") {
                       unit_val = <?php echo isset($_SESSION['bamboo_3']) ? $_SESSION['bamboo_3'] : '103500'; ?>; 
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['bamboo_4']) ? $_SESSION['bamboo_4'] : '0'; ?>;
                    }
                    break;
					case "bangus":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['bangus_1']) ? $_SESSION['bangus_1'] : '649800'; ?>;
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['bangus_2']) ? $_SESSION['bangus_2'] : '617100'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['bangus_3']) ? $_SESSION['bangus_3'] : '552200'; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['bangus_4']) ? $_SESSION['bangus_4'] : '487200'; ?>;
                    }
                    break;
					case "tilapia":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['tilapia_1']) ? $_SESSION['tilapia_1'] : '513500'; ?>;
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['tilapia_2']) ? $_SESSION['tilapia_2'] : '474900'; ?>;
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['tilapia_3']) ? $_SESSION['tilapia_3'] : '397800'; ?>; 
                    }else if (subclass === "4") {
                         unit_val = <?php echo isset($_SESSION['tilapia_4']) ? $_SESSION['tilapia_4'] : '320800'; ?>;
                    }
                    break;
					case "lapulapu":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['lapulapu_1']) ? $_SESSION['lapulapu_1'] : '846500'; ?>; 
                    } else if (subclass === "2") {
                       unit_val = <?php echo isset($_SESSION['lapulapu_2']) ? $_SESSION['lapulapu_2'] : '782700'; ?>;
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['lapulapu_3']) ? $_SESSION['lapulapu_3'] : '655700'; ?>; 
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['lapulapu_4']) ? $_SESSION['lapulapu_4'] : '528700'; ?>;
                    }
                    break;
					case "fisheries":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['fisheries_1']) ? $_SESSION['fisheries_1'] : '418800'; ?>;
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['fisheries_2']) ? $_SESSION['fisheries_2'] : '387300'; ?>;
                    }else if (subclass === "3") {
                       unit_val = <?php echo isset($_SESSION['fisheries_3']) ? $_SESSION['fisheries_3'] : '324500'; ?>; 
                    }else if (subclass === "4") {
                         unit_val = <?php echo isset($_SESSION['fisheries_4']) ? $_SESSION['fisheries_4'] : '261700'; ?>; 
                    }
                    break;
					case "hito":
                if (subclass === "1") {
                         unit_val = <?php echo isset($_SESSION['hito_1']) ? $_SESSION['hito_1'] : '555600'; ?>; 
                    } else if (subclass === "2") {
                       unit_val = <?php echo isset($_SESSION['hito_2']) ? $_SESSION['hito_2'] : '513800'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['hito_3']) ? $_SESSION['hito_3'] : '430500'; ?>; 
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['hito_4']) ? $_SESSION['hito_4'] : '347200'; ?>; 
                    }
                    break;
					case "nipa":
                if (subclass === "1") {
                      nit_val = <?php echo isset($_SESSION['nipa_1']) ? $_SESSION['nipa_1'] : '177600'; ?>; 
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['nipa_2']) ? $_SESSION['nipa_2'] : "0"; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['nipa_3']) ? $_SESSION['nipa_3'] : "0"; ?>; 
                    }else if (subclass === "4") {
                          unit_val = <?php echo isset($_SESSION['nipa_4']) ? $_SESSION['nipa_4'] : "0"; ?>; 
                    }
                    break;
					case "salt":
                if (subclass === "1") {
                       unit_val = <?php echo isset($_SESSION['salt_1']) ? $_SESSION['salt_1'] : '510500'; ?>; 
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['salt_2']) ? $_SESSION['salt_2'] : '474600'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['salt_3']) ? $_SESSION['salt_3'] : '403100"'; ?>; 
                    }else if (subclass === "4") {
                         unit_val = <?php echo isset($_SESSION['salt_4']) ? $_SESSION['salt_4'] : "0"; ?>;
                    }
                    break;
					case "pasture":
                if (subclass === "1") {
                       unit_val = <?php echo isset($_SESSION['pasture_1']) ? $_SESSION['pasture_1'] : '126000'; ?>;
                    } else if (subclass === "2") {
                      unit_val = <?php echo isset($_SESSION['pasture_2']) ? $_SESSION['pasture_2'] : "0"; ?>;
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['pasture_3']) ? $_SESSION['pasture_3'] : "0"; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['pasture_4']) ? $_SESSION['pasture_4'] : "0"; ?>; 
                    }
                    break;
					case "forest":
                if (subclass === "1") {
                       unit_val = <?php echo isset($_SESSION['forest_1']) ? $_SESSION['forest_1'] : '121300'; ?>; 
                    } else if (subclass === "2") {
                       unit_val = <?php echo isset($_SESSION['forest_2']) ? $_SESSION['forest_2'] : "0"; ?>;
                    }else if (subclass === "3") {
                       unit_val = <?php echo isset($_SESSION['forest_3']) ? $_SESSION['forest_3'] : "0"; ?>;
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['forest_4']) ? $_SESSION['forest_4'] : "0"; ?>; 
                    }
                    break;
					case "mangroove":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['mangrove_1']) ? $_SESSION['mangrove_1'] : '83000'; ?>; 
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['mangrove_2']) ? $_SESSION['mangrove_2'] : "0"; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['mangrove_3']) ? $_SESSION['mangrove_3'] : "0"; ?>; 
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['mangrove_4']) ? $_SESSION['mangrove_4'] : "0"; ?>; 
                    }
                    break;
					case "orchard":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['orchard_1']) ? $_SESSION['orchard_1'] : '298400'; ?>; 
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['orchard_2']) ? $_SESSION['orchard_2'] : '261000'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['orchard_3']) ? $_SESSION['orchard_3'] : '184600'; ?>; 
                    }else if (subclass === "4") {
                         unit_val = <?php echo isset($_SESSION['orchard_4']) ? $_SESSION['orchard_4'] : "0"; ?>; 
                    }
                    break;
					case "abaca":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['abaca_1']) ? $_SESSION['abaca_1'] : '116000'; ?>; 
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['abaca_2']) ? $_SESSION['abaca_2'] : '715600'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['abaca_3']) ? $_SESSION['abaca_3'] : '715600'; ?>; 
                    }else if (subclass === "4") {
                         unit_val = <?php echo isset($_SESSION['abaca_4']) ? $_SESSION['abaca_4'] : '715600'; ?>; 
                    }
                    break;
					case "cogon":
                if (subclass === "1") {
                         unit_val = <?php echo isset($_SESSION['cogon_1']) ? $_SESSION['cogon_1'] : '96000'; ?>;
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['cogon_2']) ? $_SESSION['cogon_2'] : "0"; ?>;
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['cogon_3']) ? $_SESSION['cogon_3'] : "0"; ?>; 
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['cogon_4']) ? $_SESSION['cogon_4'] : "0"; ?>; 
                    }
                    break;
					case "sorghum":
                if (subclass === "1") {
                       unit_val = <?php echo isset($_SESSION['sorghum_1']) ? $_SESSION['sorghum_1'] : '159800'; ?>;
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['sorghum_2']) ? $_SESSION['sorghum_2'] : '150200'; ?>; 
                    }else if (subclass === "3") {
                         unit_val = <?php echo isset($_SESSION['sorghum_3']) ? $_SESSION['sorghum_3'] : '130100'; ?>;
                    }else if (subclass === "4") {
                         unit_val = <?php echo isset($_SESSION['sorghum_4']) ? $_SESSION['sorghum_4'] : "0"; ?>; 
                    }
                    break;
					case "ipilipil":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['ipilipil_1']) ? $_SESSION['ipilipil_1'] : '193000'; ?>; 
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['ipilipil_2']) ? $_SESSION['ipilipil_2'] : '181600'; ?>;
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['ipilipil_3']) ? $_SESSION['ipilipil_3'] : '715600'; ?>; 
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['ipilipil_4']) ? $_SESSION['ipilipil_4'] : '715600'; ?>;
                    }
                    break;
					case "zacate":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['zacate_1']) ? $_SESSION['zacate_1'] : '108000'; ?>; 
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['zacate_2']) ? $_SESSION['zacate_2'] : "0"; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['zacate_3']) ? $_SESSION['zacate_3'] : "0"; ?>; 
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['zacate_4']) ? $_SESSION['zacate_4'] : "0"; ?>; 
                    }
                    break;
					case "kangkong":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['kangkong_1']) ? $_SESSION['kangkong_1'] : '114000'; ?>; 
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['kangkong_2']) ? $_SESSION['kangkong_2'] : "0"; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['kangkong_3']) ? $_SESSION['kangkong_3'] : "0"; ?>; 
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['kangkong_4']) ? $_SESSION['kangkong_4'] : "0"; ?>; 
                    }
                    break;
					case "mango":
                if (subclass === "1") {
                      unit_val = <?php echo isset($_SESSION['mango_1']) ? $_SESSION['mango_1'] : '489800'; ?>;
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['mango_2']) ? $_SESSION['mango_2'] : '440800'; ?>; 
                    }else if (subclass === "3") {
                         unit_val = <?php echo isset($_SESSION['mango3']) ? $_SESSION['mango_3'] : '342800'; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['mango_4']) ? $_SESSION['mango_4'] : "0"; ?>; 
                    }
                    break;
					case "pineapple":
                if (subclass === "1") {
                         unit_val = <?php echo isset($_SESSION['pineapple_1']) ? $_SESSION['pineapple_1'] : '244600'; ?>;
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['pineapple_2']) ? $_SESSION['pineapple_2'] : '220100'; ?>;
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['pineapple_3']) ? $_SESSION['pineapple_3'] : '171200'; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['pineapple_4']) ? $_SESSION['pineapple_4'] : "0"; ?>; 
                    }
                    break;
					case "intensive":
                if (subclass === "1") {
                       unit_val = <?php echo isset($_SESSION['intensive_1']) ? $_SESSION['intensive_1'] : '889200'; ?>; 
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['intensive_2']) ? $_SESSION['intensive_2'] : '844700'; ?>; 
                    }else if (subclass === "3") {
                         unit_val = <?php echo isset($_SESSION['intensive_3']) ? $_SESSION['intensive_3'] : '755700'; ?>; 
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['intensive_4']) ? $_SESSION['intensive_4'] : '666800'; ?>; 
                    }
                    break;
					case "semiintensive":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['semiintensive_1']) ? $_SESSION['semiintensive_1'] : '793300'; ?>; 
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['semiintensive_2']) ? $_SESSION['semiintensive_2'] : '753600'; ?>; 
                    }else if (subclass === "3") {
                       unit_val = <?php echo isset($_SESSION['semiintensive_3']) ? $_SESSION['semiintensive_3'] : '674200'; ?>; 
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['semiintensive_4']) ? $_SESSION['semiintensive_4'] : '594900'; ?>; 
                    }
                    break;
					case "traditional":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['traditional_1']) ? $_SESSION['traditional_1'] : '697500'; ?>; 
                    } else if (subclass === "2") {
                       unit_val = <?php echo isset($_SESSION['traditional_2']) ? $_SESSION['traditional_2'] : '662500'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['traditional_3']) ? $_SESSION['traditional_3'] : '592800'; ?>; 
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['traditional_4']) ? $_SESSION['traditional_4'] : '523000'; ?>;
                    }
                    break;
					case "sugar":
                if (subclass === "1") {
                       unit_val = <?php echo isset($_SESSION['sugar_1']) ? $_SESSION['sugar_1'] : '568100'; ?>; 
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['sugar_2']) ? $_SESSION['sugar_2'] : '529300'; ?>; 
                    }else if (subclass === "3") {
                         unit_val = <?php echo isset($_SESSION['sugar_3']) ? $_SESSION['sugar_3'] : '28100'; ?>; 
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['sugar_4']) ? $_SESSION['sugar_4'] : "0"; ?>; 
                    }
                    break;
					case "cardava":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['cardava_1']) ? $_SESSION['cardava_1'] : '238400'; ?>; 
                    } else if (subclass === "2") {
                       unit_val = <?php echo isset($_SESSION['cardava_2']) ? $_SESSION['cardava_2'] : '220500'; ?>; 
                    }else if (subclass === "3") {
                       unit_val = <?php echo isset($_SESSION['cardava_3']) ? $_SESSION['cardava_3'] : '184700'; ?>; 
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['cardava_4']) ? $_SESSION['cardava_4'] : '149000'; ?>; 
                    }
                    break;
					case "sweet":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['sweet_1']) ? $_SESSION['sweet_1'] : '284400'; ?>; 
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['sweet_2']) ? $_SESSION['sweet_2'] : '263000'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['sweet_3']) ? $_SESSION['sweet_3'] : '220400'; ?>; 
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['sweet_4']) ? $_SESSION['sweet_4'] : '177700'; ?>; 
                    }
                    break;
					case "bananacommercial":
                if (subclass === "1") {
                       unit_val = <?php echo isset($_SESSION['bananacommercial_1']) ? $_SESSION['bananacommercial_1'] : '662000'; ?>; 
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['bananacommercial_2']) ? $_SESSION['bananacommercial_2'] : '12300'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['bananacommercial_3']) ? $_SESSION['bananacommercial_3'] : '51300'; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['bananacommercial_4']) ? $_SESSION['bananacommercial_4'] : '413700'; ?>; 
                    }
                    break;
					case "cassava":
                if (subclass === "1") {
                       unit_val = <?php echo isset($_SESSION['cassava_1']) ? $_SESSION['cassava_1'] : '170900'; ?>; 
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['cassava_2']) ? $_SESSION['cassava_2'] : '153800'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['cassava_3']) ? $_SESSION['cassava_3'] : '119600'; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['cassava_4']) ? $_SESSION['cassava_4'] : "0"; ?>;
                    }
                    break;
					case "coffee":
                if (subclass === "1") {
                       unit_val = <?php echo isset($_SESSION['coffee_1']) ? $_SESSION['coffee_1'] : '143500'; ?>; 
                    } else if (subclass === "2") {
                       unit_val = <?php echo isset($_SESSION['coffee_2']) ? $_SESSION['coffee_2'] : '129100'; ?>; 
                    }else if (subclass === "3") {
                         unit_val = <?php echo isset($_SESSION['coffee_3']) ? $_SESSION['coffee_3'] : '100400'; ?>; 
                    }else if (subclass === "4") {
                         unit_val = <?php echo isset($_SESSION['coffee_4']) ? $_SESSION['coffee_4'] : "0"; ?>; 
                    }
                    break;
					case "horticulture":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['horticulture_1']) ? $_SESSION['horticulture_1'] : '122300'; ?>; 
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['horticulture_2']) ? $_SESSION['horticulture_2'] : "0"; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['horticulture_3']) ? $_SESSION['horticulture_3'] : "0"; ?>; 
                    }else if (subclass === "4") {
                         unit_val = <?php echo isset($_SESSION['horticulture_4']) ? $_SESSION['horticulture_4'] : "0"; ?>; 
                    }
                    break;
					case "poultry":
                if (subclass === "1") {
                          unit_val = <?php echo isset($_SESSION['poultry_1']) ? $_SESSION['poultry_1'] : '771800'; ?>;
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['poultry_2']) ? $_SESSION['poultry_2'] : '713900'; ?>;
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['poultry_3']) ? $_SESSION['poultry_3'] : '598100'; ?>; 
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['poultry_4']) ? $_SESSION['poultry_4'] : '482400'; ?>; 
                    }
                    break;
					case "cacao":
                if (subclass === "1") {
                      unit_val = <?php echo isset($_SESSION['cacao_1']) ? $_SESSION['cacao_1'] : '266000'; ?>; 
                    } else if (subclass === "2") {
                       unit_val = <?php echo isset($_SESSION['cacao_2']) ? $_SESSION['cacao_2'] : '239300'; ?>; 
                    }else if (subclass === "3") {
                       unit_val = <?php echo isset($_SESSION['cacao_3']) ? $_SESSION['cacao_3'] : '186100'; ?>; 
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['cacao_4']) ? $_SESSION['cacao_4'] : "0"; ?>;
                    }
                    break;
					case "swine":
                if (subclass === "1") {
                         unit_val = <?php echo isset($_SESSION['swine_1']) ? $_SESSION['swine_1'] : '797000'; ?>; 
                    } else if (subclass === "2") {
                       unit_val = <?php echo isset($_SESSION['swine_2']) ? $_SESSION['swine_2'] : '737000'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['swine_3']) ? $_SESSION['swine_3'] : '617500'; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['swine_4']) ? $_SESSION['swine_4'] : '497900'; ?>; 
                    }
                    break;
					case "papayacommercial":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['papayacommercial_1']) ? $_SESSION['papayacommercial_1'] : '577800'; ?>; 
                    } else if (subclass === "2") {
                       unit_val = <?php echo isset($_SESSION['papayacommercial_2']) ? $_SESSION['papayacommercial_2'] : '534500'; ?>; 
                    }else if (subclass === "3") {
                         unit_val = <?php echo isset($_SESSION['papayacommercial_3']) ? $_SESSION['papayacommercial_3'] : '447800'; ?>; 
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['papayacommercial_4']) ? $_SESSION['papayacommercial_4'] : '361100'; ?>; 
                    }
                    break;
					case "papayatraditional":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['papayatraditional_1']) ? $_SESSION['papayatraditional_1'] : '324200'; ?>; 
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['papayatraditional_2']) ? $_SESSION['papayatraditional_2'] : '308000'; ?>; 
                    }else if (subclass === "3") {
                       unit_val = <?php echo isset($_SESSION['papayatraditional_3']) ? $_SESSION['papayatraditional_3'] : '275600'; ?>; 
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['papayatraditional_4']) ? $_SESSION['papayatraditional_4'] : '43100'; ?>; 
                    }
                    break;
					case "dragon":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['dragon_1']) ? $_SESSION['dragon_1'] : '662300'; ?>; 
                    } else if (subclass === "2") {
                         unit_val = <?php echo isset($_SESSION['dragon_2']) ? $_SESSION['dragon_2'] : '596000'; ?>; 
                    }else if (subclass === "3") {
                       unit_val = <?php echo isset($_SESSION['dragon_3']) ? $_SESSION['dragon_3'] : '463600'; ?>; 
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['dragon_4']) ? $_SESSION['dragon_4'] : "0"; ?>; 
                    }
                    break;case "breeding":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['breeding_1']) ? $_SESSION['breeding_1'] : '823200'; ?>; 
                    } else if (subclass === "2") {
                       unit_val = <?php echo isset($_SESSION['breeding_2']) ? $_SESSION['breeding_2'] : '759400'; ?>; 
                    }else if (subclass === "3") {
                         unit_val = <?php echo isset($_SESSION['breeding_3']) ? $_SESSION['breeding_3'] : '635900'; ?>;
                    }else if (subclass === "4") {
                        unit_val = <?php echo isset($_SESSION['breeding_4']) ? $_SESSION['breeding_4'] : '512400'; ?>; 
                    }
                    break;case "citrus":
                if (subclass === "1") {
                        unit_val = <?php echo isset($_SESSION['citrus_1']) ? $_SESSION['citrus_1'] : '365600'; ?>;
                    } else if (subclass === "2") {
                        unit_val = <?php echo isset($_SESSION['citrus_2']) ? $_SESSION['citrus_2'] : '329000'; ?>; 
                    }else if (subclass === "3") {
                        unit_val = <?php echo isset($_SESSION['citrus_3']) ? $_SESSION['citrus_4'] : '255900'; ?>; 
                    }else if (subclass === "4") {
                       unit_val = <?php echo isset($_SESSION['citrus_4']) ? $_SESSION['citrus_4'] : "0"; ?>; 
                    }
                    break;
                    
                    // Add other cases for different kinds and subclasses in agriculture
                }
            }  else if (classificationSelect.value === "residential") {
                // Set unit value based on subclass for "commercial"
                switch (subclass) {
                    case "R1":
                       unit_val = <?php echo isset($_SESSION['R1']) ? $_SESSION['R1'] : '4900'; ?>; ;
                        break;
                    case "R2":
                        unit_val = <?php echo isset($_SESSION['R2']) ? $_SESSION['R2'] : '4300'; ?>;
                        break;
                    case "R3":
                       unit_val = <?php echo isset($_SESSION['R3']) ? $_SESSION['R3'] : '3500'; ?>;
                        break;
                    case "R4":
                        unit_val = <?php echo isset($_SESSION['R4']) ? $_SESSION['R4'] : '3000'; ?>;
                        break;
                    case "R5":
                        unit_val = <?php echo isset($_SESSION['R5']) ? $_SESSION['R5'] : '2200'; ?>;
                        break;
                    case "R6":
                         unit_val = <?php echo isset($_SESSION['R6']) ? $_SESSION['R6'] : '1500'; ?>;
                        break;
                    // Add other cases for different subclasses in commercial
                }
            }
            
            
            else if (classificationSelect.value === "commercial") {
                // Set unit value based on subclass for "commercial"
                switch (subclass) {
                    case "C1":
                        unit_val = <?php echo isset($_SESSION['C1']) ? $_SESSION['C1'] : '6000'; ?>;
                        break;
                    case "C2":
                        unit_val = <?php echo isset($_SESSION['C2']) ? $_SESSION['C2'] : '5300'; ?>;
                        break;
                    case "C3":
                       unit_val = <?php echo isset($_SESSION['C3']) ? $_SESSION['C3'] : '4300'; ?>;
                        break;
                    case "C4":
                        unit_val = <?php echo isset($_SESSION['C4']) ? $_SESSION['C4'] : '3300'; ?>;
                        break;
                    case "C5":
                         unit_val = <?php echo isset($_SESSION['C5']) ? $_SESSION['C5'] : '2500'; ?>;
                        break;
                    case "C6":
                       unit_val = <?php echo isset($_SESSION['C6']) ? $_SESSION['C6'] : '2000'; ?>;
                        break;
                    // Add other cases for different subclasses in commercial
                }
            } else if (classificationSelect.value === "industrial") {
                // Set unit value based on subclass for "industrial"
                switch (subclass) {
                    case "I1":
                        unit_val = <?php echo isset($_SESSION['I1']) ? $_SESSION['I1'] : '4000'; ?>;
                        break;
                    case "I2":
                         unit_val = <?php echo isset($_SESSION['I2']) ? $_SESSION['I2'] : '3500'; ?>;
                        break;
                    case "I3":
                         unit_val = <?php echo isset($_SESSION['I3']) ? $_SESSION['I3'] : '3000'; ?>;
                        break;
                    case "I4":
                        unit_val = <?php echo isset($_SESSION['I4']) ? $_SESSION['I4'] : '2500'; ?>;
                        break;
                    case "I5":
                         unit_val = <?php echo isset($_SESSION['I5']) ? $_SESSION['I5'] : '2000'; ?>; 
                        break;
                    case "I6":
                         unit_val = <?php echo isset($_SESSION['I6']) ? $_SESSION['I6'] : '1500'; ?>;
                        break;
                    // Add other cases for different subclasses in industrial
                }
            }

            // Set the unit value input field
            unitValueInput.value = unit_val;
        }
}
   
  // Get the input fields
// Get the input fields
const areaInput = document.getElementById('areaInput');
const unitValueInput = document.getElementById('unitValueInput');
const LevelInput = document.getElementById('LevelInput');

// Add event listeners to input fields
areaInput.addEventListener('input', calculateMarketValue);
unitValueInput.addEventListener('input', calculateMarketValue);
LevelInput.addEventListener('input', calculateMarketValue);

function calculateMarketValue() {
  // Get input values
  const area = parseFloat(areaInput.value);
  const unit_val = parseFloat(unitValueInput.value);
  const assess_level = parseFloat(LevelInput.value);

  var market_val;
  var classificationSelect = document.getElementById("edit_classification");
  if (classificationSelect.value === "agriculture") {
        market_val = (area * unit_val).toFixed(2);
    } else {
        market_val = (area * 100 * unit_val).toFixed(2);
    }
  document.getElementById("marketValueInput").value = market_val;


  // Set market value input value

  // Update assess value and payables
  const assess_val = market_val * assess_level;
  document.getElementById('assessValueInput').value = assess_val.toFixed(2);

  const payables = assess_val * 0.02;
  document.getElementById('taxValueInput').value = payables.toFixed(2);
}

// Trigger initial calculation
calculateMarketValue();




</script>

<!-- Add other scripts or functions as needed -->
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>