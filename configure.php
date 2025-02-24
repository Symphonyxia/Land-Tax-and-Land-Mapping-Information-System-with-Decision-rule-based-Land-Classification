<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $agriculture = $_POST['agriculture'];
    $residential = $_POST['residential'];
    $commercial = $_POST['commercial'];
    $industrial = $_POST['industrial'];


    //unit value
    $irrigated_1 = $_POST['irrigated_1'];
    $irrigated_2 = $_POST['irrigated_2'];
    $irrigated_3 = $_POST['irrigated_3'];
    $irrigated_4 = $_POST['irrigated_4'];

    $nonirrigated_1 = $_POST['nonirrigated_1'];
    $nonirrigated_2 = $_POST['nonirrigated_2'];
    $nonirrigated_3 = $_POST['nonirrigated_3'];
    $nonirrigated_4 = $_POST['nonirrigated_4'];

    $upland_1 = $_POST['upland_1'];
    $upland_2 = $_POST['upland_2'];
    $upland_3 = $_POST['upland_3'];
    $upland_4 = $_POST['upland_4'];

    $corn_1 = $_POST['corn_1'];
    $corn_2 = $_POST['corn_2'];
    $corn_3 = $_POST['corn_3'];
    $corn_4 = $_POST['corn_4'];

    $coconut_1 = $_POST['coconut_1'];
    $coconut_2 = $_POST['coconut_2'];
    $coconut_3 = $_POST['coconut_3'];
    $coconut_4 = $_POST['coconut_4'];

    $cotton_1 = $_POST['cotton_1'];
    $cotton_2 = $_POST['cotton_2'];
    $cotton_3 = $_POST['cotton_3'];
    $cotton_4 = $_POST['cotton_4'];

    $tabacco_1 = $_POST['tabacco_1'];
    $tabacco_2 = $_POST['tabacco_2'];
    $tabacco_3 = $_POST['tabacco_3'];
    $tabacco_4 = $_POST['tabacco_4'];

    $bamboo_1 = $_POST['bamboo_1'];
    $bamboo_2 = $_POST['bamboo_2'];
    $bamboo_3 = $_POST['bamboo_3'];
    $bamboo_4 = $_POST['bamboo_4'];

    $bangus_1 = $_POST['bangus_1'];
    $bangus_2 = $_POST['bangus_2'];
    $bangus_3 = $_POST['bangus_3'];
    $bangus_4 = $_POST['bangus_4'];

    $tilapia_1 = $_POST['tilapia_1'];
    $tilapia_2 = $_POST['tilapia_2'];
    $tilapia_3 = $_POST['tilapia_3'];
    $tilapia_4 = $_POST['tilapia_4'];

    $lapulapu_1 = $_POST['lapulapu_1'];
    $lapulapu_2 = $_POST['lapulapu_2'];
    $lapulapu_3 = $_POST['lapulapu_3'];
    $lapulapu_4 = $_POST['lapulapu_4'];

    $fisheries_1 = $_POST['fisheries_1'];
    $fisheries_2 = $_POST['fisheries_2'];
    $fisheries_3 = $_POST['fisheries_3'];
    $fisheries_4 = $_POST['fisheries_4'];

    $hito_1 = $_POST['hito_1'];
    $hito_2 = $_POST['hito_2'];
    $hito_3 = $_POST['hito_3'];
    $hito_4 = $_POST['hito_4'];

    $nipa_1 = $_POST['nipa_1'];
    $nipa_2 = $_POST['nipa_2'];
    $nipa_3 = $_POST['nipa_3'];
    $nipa_4 = $_POST['nipa_4'];

    $salt_1 = $_POST['salt_1'];
    $salt_2 = $_POST['salt_2'];
    $salt_3 = $_POST['salt_3'];
    $salt_4 = $_POST['salt_4'];

    $pasture_1 = $_POST['pasture_1'];
    $pasture_2 = $_POST['pasture_2'];
    $pasture_3 = $_POST['pasture_3'];
    $pasture_4 = $_POST['pasture_4'];

    $forest_1 = $_POST['forest_1'];
    $forest_2 = $_POST['forest_2'];
    $forest_3 = $_POST['forest_3'];
    $forest_4 = $_POST['forest_4'];

    $mangrove_1 = $_POST['mangrove_1'];
    $mangrove_2 = $_POST['mangrove_2'];
    $mangrove_3 = $_POST['mangrove_3'];
    $mangrove_4 = $_POST['mangrove_4'];

    $orchard_1 = $_POST['orchard_1'];
    $orchard_2 = $_POST['orchard_2'];
    $orchard_3 = $_POST['orchard_3'];
    $orchard_4 = $_POST['orchard_4'];

    $abaca_1 = $_POST['abaca_1'];
    $abaca_2 = $_POST['abaca_2'];
    $abaca_3 = $_POST['abaca_3'];
    $abaca_4 = $_POST['abaca_4'];

    $sorghum_1 = $_POST['sorghum_1'];
    $sorghum_2 = $_POST['sorghum_2'];
    $sorghum_3 = $_POST['sorghum_3'];
    $sorghum_4 = $_POST['sorghum_4'];

    $ipilipil_1 = $_POST['ipilipil_1'];
    $ipilipil_2 = $_POST['ipilipil_2'];
    $ipilipil_3 = $_POST['ipilipil_3'];
    $ipilipil_4 = $_POST['ipilipil_4'];

    $zacate_1 = $_POST['zacate_1'];
    $zacate_2 = $_POST['zacate_2'];
    $zacate_3 = $_POST['zacate_3'];
    $zacate_4 = $_POST['zacate_4'];

    $kangkong_1 = $_POST['kangkong_1'];
    $kangkong_2 = $_POST['kangkong_2'];
    $kangkong_3 = $_POST['kangkong_3'];
    $kangkong_4 = $_POST['kangkong_4'];

    $mango_1 = $_POST['mango_1'];
    $mango_2 = $_POST['mango_2'];
    $mango_3 = $_POST['mango_3'];
    $mango_4 = $_POST['mango_4'];

    $pineapple_1 = $_POST['pineapple_1'];
    $pineapple_2 = $_POST['pineapple_2'];
    $pineapple_3 = $_POST['pineapple_3'];
    $pineapple_4 = $_POST['pineapple_4'];

    $intensive_1 = $_POST['intensive_1'];
    $intensive_2 = $_POST['intensive_2'];
    $intensive_3 = $_POST['intensive_3'];
    $intensive_4 = $_POST['intensive_4'];

    $semiintensive_1 = $_POST['semiintensive_1'];
    $semiintensive_2 = $_POST['semiintensive_1'];
    $semiintensive_3 = $_POST['semiintensive_3'];
    $semiintensive_4 = $_POST['semiintensive_4'];

    $traditional_1 = $_POST['traditional_1'];
    $traditional_2 = $_POST['traditional_2'];
    $traditional_3 = $_POST['traditional_3'];
    $traditional_4 = $_POST['traditional_4'];

    $sugar_1 = $_POST['sugar_1'];
    $sugar_2 = $_POST['sugar_2'];
    $sugar_3 = $_POST['sugar_3'];
    $sugar_4 = $_POST['sugar_4'];

    $cardava_1 = $_POST['cardava_1'];
    $cardava_2 = $_POST['cardava_2'];
    $cardava_3 = $_POST['cardava_3'];
    $cardava_4 = $_POST['cardava_4'];

    $sweet_1 = $_POST['sweet_1'];
    $sweet_2 = $_POST['sweet_2'];
    $sweet_3 = $_POST['sweet_3'];
    $sweet_4 = $_POST['sweet_4'];

    $bananacommercial_1 = $_POST['bananacommercial_1'];
    $bananacommercial_2 = $_POST['bananacommercial_2'];
    $bananacommercial_3 = $_POST['bananacommercial_3'];
    $bananacommercial_4 = $_POST['bananacommercial_4'];

    $cassava_1 = $_POST['cassava_1'];
    $cassava_2 = $_POST['cassava_2'];
    $cassava_3 = $_POST['cassava_3'];
    $cassava_4 = $_POST['cassava_4'];

    $coffee_1 = $_POST['coffee_1'];
    $coffee_2 = $_POST['coffee_2'];
    $coffee_3 = $_POST['coffee_3'];
    $coffee_4 = $_POST['coffee_4'];

    $horticulture_1 = $_POST['horticulture_1'];
    $horticulture_2 = $_POST['horticulture_2'];
    $horticulture_3 = $_POST['horticulture_3'];
    $horticulture_4 = $_POST['horticulture_4'];

    $poultry_1 = $_POST['poultry_1'];
    $poultry_2 = $_POST['poultry_2'];
    $poultry_3 = $_POST['poultry_3'];
    $poultry_4 = $_POST['poultry_4'];

    $cacao_1 = $_POST['cacao_1'];
    $cacao_2 = $_POST['cacao_2'];
    $cacao_3 = $_POST['cacao_3'];
    $cacao_4 = $_POST['cacao_4'];

    $swine_1 = $_POST['swine_1'];
    $swine_2 = $_POST['swine_2'];
    $swine_3 = $_POST['swine_3'];
    $swine_4 = $_POST['swine_4'];

    $papayacommercial_1 = $_POST['papayacommercial_1'];
    $papayacommercial_2 = $_POST['papayacommercial_2'];
    $papayacommercial_3 = $_POST['papayacommercial_3'];
    $papayacommercial_4 = $_POST['papayacommercial_4'];

    $papayatraditional_1 = $_POST['papayatraditional_1'];
    $papayatraditional_2 = $_POST['papayatraditional_2'];
    $papayatraditional_3 = $_POST['papayatraditional_3'];
    $papayatraditional_4 = $_POST['papayatraditional_4'];

    $dragon_1 = $_POST['dragon_1'];
    $dragon_2 = $_POST['dragon_2'];
    $dragon_3 = $_POST['dragon_3'];
    $dragon_4 = $_POST['dragon_4'];

    $breeding_1 = $_POST['breeding_1'];
    $breeding_2 = $_POST['breeding_2'];
    $breeding_3 = $_POST['breeding_3'];
    $breeding_4 = $_POST['breeding_4'];

    $citrus_1 = $_POST['citrus_1'];
    $citrus_2 = $_POST['citrus_2'];
    $citrus_3 = $_POST['citrus_3'];
    $citrus_4 = $_POST['citrus_4'];

    $R1 = $_POST['R1'];
    $R2 = $_POST['R2'];
    $R3 = $_POST['R3'];
    $R4 = $_POST['R4'];
    $R5 = $_POST['R5'];
    $R6 = $_POST['R6'];

    $C1 = $_POST['C1'];
    $C2 = $_POST['C2'];
    $C3 = $_POST['C3'];
    $C4 = $_POST['C4'];
    $C5 = $_POST['C5'];
    $C6 = $_POST['C6'];

    $I1 = $_POST['I1'];
    $I2 = $_POST['I2'];
    $I3 = $_POST['I3'];
    $I4 = $_POST['I4'];
    $I5 = $_POST['I5'];
    $I6 = $_POST['I6'];



    // Save values in the session


    $_SESSION['agriculture'] = $agriculture;
    $_SESSION['residential'] = $residential;
    $_SESSION['commercial'] = $commercial;
    $_SESSION['industrial'] = $industrial;

    $_SESSION['irrigated_1'] = $irrigated_1;
    $_SESSION['irrigated_2'] = $irrigated_2;
    $_SESSION['irrigated_3'] = $irrigated_3;
    $_SESSION['irrigated_4'] = $irrigated_4;

    $_SESSION['nonirrigated_1'] = $nonirrigated_1;
    $_SESSION['nonirrigated_2'] = $nonirrigated_2;
    $_SESSION['nonirrigated_3'] = $nonirrigated_3;
    $_SESSION['nonirrigated_4'] = $nonirrigated_4;


    $_SESSION['upland_1'] = $upland_1;
    $_SESSION['upland_2'] = $upland_2;
    $_SESSION['upland_3'] = $upland_3;
    $_SESSION['upland_4'] = $upland_4;

    $_SESSION['corn_1'] = $corn_1;
    $_SESSION['corn_2'] = $corn_2;
    $_SESSION['corn_3'] = $corn_3;
    $_SESSION['corn_4'] = $corn_4;
 
    $_SESSION['coconut_1'] = $coconut_1;
    $_SESSION['coconut_2'] = $coconut_2;
    $_SESSION['coconut_3'] = $coconut_3;
    $_SESSION['coconut_4'] = $coconut_4;


    $_SESSION['cotton_1'] = $cotton_1;
    $_SESSION['cotton_2'] = $cotton_2;
    $_SESSION['cotton_3'] = $cotton_3;
    $_SESSION['cotton_4'] = $cotton_4;


    $_SESSION['tabacco_1'] = $tabacco_1;
    $_SESSION['tabacco_2'] = $tabacco_2;
    $_SESSION['tabacco_3'] = $tabacco_3;
    $_SESSION['tabacco_4'] = $tabacco_4;


    $_SESSION['bamboo_1'] = $bamboo_1;
    $_SESSION['bamboo_2'] = $bamboo_2;
    $_SESSION['bamboo_3'] = $bamboo_3;
    $_SESSION['bamboo_4'] = $bamboo_4;


    $_SESSION['bangus_1'] = $bangus_1;
    $_SESSION['bangus_2'] = $bangus_2;
    $_SESSION['bangus_3'] = $bangus_3;
    $_SESSION['bangus_4'] = $bangus_4;


    $_SESSION['tilapia_1'] = $tilapia_1;
    $_SESSION['tilapia_2'] = $tilapia_2;
    $_SESSION['tilapia_3'] = $tilapia_3;
    $_SESSION['tilapia_4'] = $tilapia_4;


    $_SESSION['lapulapu_1'] = $lapulapu_1;
    $_SESSION['lapulapu_2'] = $lapulapu_2;
    $_SESSION['lapulapu_3'] = $lapulapu_3;
    $_SESSION['lapulapu_4'] = $lapulapu_4;


    $_SESSION['fisheries_1'] = $fisheries_1;
    $_SESSION['fisheries_2'] = $fisheries_2;
    $_SESSION['fisheries_3'] = $fisheries_3;
    $_SESSION['fisheries_4'] = $fisheries_4;


    $_SESSION['hito_1'] = $hito_1;
    $_SESSION['hito_2'] = $hito_2;
    $_SESSION['hito_3'] = $hito_3;
    $_SESSION['hito_4'] = $hito_4;


    $_SESSION['nipa_1'] = $nipa_1;
    $_SESSION['nipa_2'] = $nipa_2;
    $_SESSION['nipa_3'] = $nipa_3;
    $_SESSION['nipa_4'] = $nipa_4;


    $_SESSION['salt_1'] = $salt_1;
    $_SESSION['salt_2'] = $salt_2;
    $_SESSION['salt_3'] = $salt_3;
    $_SESSION['salt_4'] = $salt_4;


    $_SESSION['pasture_1'] = $pasture_1;
    $_SESSION['pasture_2'] = $pasture_2;
    $_SESSION['pasture_3'] = $pasture_3;
    $_SESSION['pasture_4'] = $pasture_4;


    $_SESSION['forest_1'] = $forest_1;
    $_SESSION['forest_2'] = $forest_2;
    $_SESSION['forest_3'] = $forest_3;
    $_SESSION['forest_4'] = $forest_4;


    $_SESSION['mangrove_1'] = $mangrove_1;
    $_SESSION['mangrove_2'] = $mangrove_2;
    $_SESSION['mangrove_3'] = $mangrove_3;
    $_SESSION['mangrove_4'] = $mangrove_4;


    $_SESSION['orchard_1'] = $orchard_1;
    $_SESSION['orchard_2'] = $orchard_2;
    $_SESSION['orchard_3'] = $orchard_3;
    $_SESSION['orchard_4'] = $orchard_4;


$_SESSION['abaca_1'] = $abaca_1;
    $_SESSION['abaca_2'] = $abaca_2;
    $_SESSION['abaca_3'] = $abaca_3;
    $_SESSION['abaca_4'] = $abaca_4;


$_SESSION['cogon_1'] = $cogon_1;
    $_SESSION['cogon_2'] = $cogon_2;
    $_SESSION['cogon_3'] = $cogon_3;
    $_SESSION['cogon_4'] = $cogon_4;


$_SESSION['sorghum_1'] = $sorghum_1;
    $_SESSION['sorghum_2'] = $sorghum_2;
    $_SESSION['sorghum_3'] = $sorghum_3;
    $_SESSION['sorghum_4'] = $sorghum_4;

  $_SESSION['ipilipil_1'] = $ipilipil_1;
    $_SESSION['ipilipil_2'] = $ipilipil_2;
    $_SESSION['ipilipil_3'] = $ipilipil_3;
    $_SESSION['ipilipil_4'] = $ipilipil_4;




$_SESSION['zacate_1'] = $zacate_1;
    $_SESSION['zacate_2'] = $zacate_2;
    $_SESSION['zacate_3'] = $zacate_3;
    $_SESSION['zacate_4'] = $zacate_4;


$_SESSION['kangkong_1'] = $kangkong_1;
    $_SESSION['kangkong_2'] = $kangkong_2;
    $_SESSION['kangkong_3'] = $kangkong_3;
    $_SESSION['kangkong_4'] = $kangkong_4;


$_SESSION['mango_1'] = $mango_1;
    $_SESSION['mango_2'] = $mango_2;
    $_SESSION['mango_3'] = $mango_3;
    $_SESSION['mango_4'] = $mango_4;


$_SESSION['pineapple_1'] = $pineapple_1;
    $_SESSION['pineapple_2'] = $pineapple_2;
    $_SESSION['pineapple_3'] = $pineapple_3;
    $_SESSION['pineapple_4'] = $pineapple_4;


$_SESSION['intensive_1'] = $intensive_1;
    $_SESSION['intensive_2'] = $intensive_2;
    $_SESSION['intensive_3'] = $intensive_3;
    $_SESSION['intensive_4'] = $intensive_4;




$_SESSION['semiintensive_1'] = $semiintensive_1;
    $_SESSION['semiintensive_2'] = $semiintensive_2;
    $_SESSION['semiintensive_3'] = $semiintensive_3;
    $_SESSION['semiintensive_4'] = $semiintensive_4;


$_SESSION['traditional_1'] = $traditional_1;
    $_SESSION['traditiona_2'] = $traditional_2;
    $_SESSION['traditional_3'] = $traditional_3;
    $_SESSION['traditional_4'] = $traditional_4;


$_SESSION['sugar_1'] = $sugar_1;
    $_SESSION['sugar_2'] = $sugar_2;
    $_SESSION['sugar_3'] = $sugar_3;
    $_SESSION['sugar_4'] = $sugar_4;


$_SESSION['cardava_1'] = $cardava_1;
    $_SESSION['cardava_2'] = $cardava_2;
    $_SESSION['cardava_3'] = $cardava_3;
    $_SESSION['cardava_4'] = $cardava_4;


$_SESSION['sweet_1'] = $sweet_1;
    $_SESSION['sweet_2'] = $sweet_2;
    $_SESSION['sweet_3'] = $sweet_3;
    $_SESSION['sweet_4'] = $sweet_4;




$_SESSION['bananacommercial_1'] = $bananacommercial_1;
    $_SESSION['bananacommercial_2'] = $bananacommercial_2;
    $_SESSION['bananacommercial_3'] = $bananacommercial_3;
    $_SESSION['bananacommercial_4'] = $bananacommercial_4;


$_SESSION['casava_1'] = $casava_1;
    $_SESSION['casava_2'] = $casava_2;
    $_SESSION['casava_3'] = $casava_3;
    $_SESSION['casava_4'] = $casava_4;


$_SESSION['coffee_1'] = $coffee_1;
    $_SESSION['coffee_2'] = $coffee_2;
    $_SESSION['coffee_3'] = $coffee_3;
    $_SESSION['coffee_4'] = $coffee_4;


$_SESSION['horticulture_1'] = $horticulture_1;
    $_SESSION['horticulture_2'] = $horticulture_2;
    $_SESSION['horticulture_3'] = $horticulture_3;
    $_SESSION['horticulture_4'] = $horticulture_4;


$_SESSION['poultry_1'] = $poultry_1;
    $_SESSION['poultry_2'] = $poultry_2;
    $_SESSION['poultry_3'] = $poultry_3;
    $_SESSION['[poultry_4'] = $poultry_4;


$_SESSION['cacao_1'] = $cacao_1;
    $_SESSION['cacao_2'] = $cacao_2;
    $_SESSION['cacao_3'] = $cacao_3;
    $_SESSION['cacao_4'] = $cacao_4;


$_SESSION['swine_1'] = $swine_1;
    $_SESSION['swine_2'] = $swine_2;
    $_SESSION['swine_3'] = $swine_3;
    $_SESSION['swine_4'] = $swine_4;


$_SESSION['papayacommercial_1'] = $papayacommercial_1;
    $_SESSION['papayacommercial_2'] = $papayacommercial_2;
    $_SESSION['papayacommercial_3'] = $papayacommercial_3;
    $_SESSION['papayacommercial_4'] = $papayacommercial_4;

 $_SESSION['papayatraditional_1']= $papayatraditional_1;
 $_SESSION['papayatraditional_2']= $papayatraditional_2;
 $_SESSION['papayatraditional_3']= $papayatraditional_3;
 $_SESSION['papayatraditional_4']= $papayatraditional_4;

$_SESSION['dragon_1'] = $dragon_1;
    $_SESSION['dragon_2'] = $dragon_2;
    $_SESSION['dragon_3'] = $dragon_3;
    $_SESSION['dragon_4'] = $dragon_4;


$_SESSION['breeding_1'] = $breeding_1;
    $_SESSION['breeding_2'] = $breeding_2;
    $_SESSION['breeding_3'] = $breeding_3;
    $_SESSION['breeding_4'] = $breeding_4;


$_SESSION['citrus_1'] = $citrus_1;
    $_SESSION['citrus_2'] = $citrus_2;
    $_SESSION['citrus_3'] = $citrus_3;
    $_SESSION['citrus_4'] = $citrus_4;

    $_SESSION['R1'] = $R1;
    $_SESSION['R2'] = $R2;
    $_SESSION['R3'] = $R3;
    $_SESSION['R4'] = $R4;
    $_SESSION['R5'] = $R5;
    $_SESSION['R6'] = $R6;

    $_SESSION['C1'] = $C1;
    $_SESSION['C2'] = $C2;
    $_SESSION['C3'] = $C3;
    $_SESSION['C4'] = $C4;
    $_SESSION['C5'] = $C5;
    $_SESSION['C6'] = $C6;

    $_SESSION['I1'] = $I1;
    $_SESSION['I2'] = $I2;
    $_SESSION['I3'] = $I3;
    $_SESSION['I4'] = $I4;
    $_SESSION['I5'] = $I5;
    $_SESSION['I6'] = $I6;


    // Redirect back to map.php
    header('Location: map.php');
    exit();
}
?>

<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<style>
    .form-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .form-section {
        flex: 1;
        margin-right: 20px;
    }

    .form-section:last-child {
        margin-right: 0;
    }
    .input-group {
        align-items: center;
    }

    .input-group label {
        width: 100px;
        margin-right: 5px;
    }


</style>

<div class="container">

<h3>Assessment Level of Actual Use</h3>
<form method="post">

<div class="input-group">
    <label for="agriculture">Agriculture:</label>
    <input type="text" id="agriculture" name="agriculture" value="<?php echo $_SESSION['agriculture'] ?? '0.175'; ?>"><br>
</div>
<div class="input-group">
    <label for="residential">Residential:</label>
    <input type="text" id="residential" name="residential" value="<?php echo $_SESSION['residential'] ?? '0.05'; ?>"><br>
</div>
<div class="input-group">
    <label for="commercial">Commercial:</label>
    <input type="text" id="commercial" name="commercial" value="<?php echo $_SESSION['commercial'] ?? '0.15'; ?>"><br>
</div>
<div class="input-group">
    <label for="industrial">Industrial:</label>
    <input type="text" id="industrial" name="industrial" value="<?php echo $_SESSION['industrial'] ?? '0.2'; ?>"><br>
</div>


    <div style="text-align: right; margin-right: 20px;">
    <button class="btn btn-primary" type="submit" name="save">Save</button>
</div>
    <br>



    <h3>Unit Value for Agriculture</h3>
    <div class="form-container">
    <div class="form-section">

    <label for="irrigated_1">Irrigated Sub 1:</label>
    <input type="text" id="irrigated_1" name="irrigated_1" value="<?php echo $_SESSION['irrigated_1'] ?? '767100'; ?>"><br>

    <label for="irrigated_2">Irrigated Sub 2:</label>
    <input type="text" id="irrigated_2" name="irrigated_2" value="<?php echo $_SESSION['irrigated_2'] ?? '715600'; ?>"><br>

    <label for="irrigated_3">Irrigated Sub 3:</label>
    <input type="text" id="irrigated_3" name="irrigated_3" value="<?php echo $_SESSION['irrigated_3'] ?? '631300'; ?>"><br>

    <label for="irrigated_4">Irrigated Sub 4:</label>
    <input type="text" id="irrigated_4" name="irrigated_4" value="<?php echo $_SESSION['irrigated_4'] ?? '527700'; ?>"><br>
    </div>

    <div class="form-section">
    <label for="nonirrigated_1">Non-Irrigated Sub 1:</label>
    <input type="text" id="nonirrigated_1" name="nonirrigated_1" value="<?php echo $_SESSION['nonirrigated_1'] ?? '442400'; ?>"><br>

    <label for="nonirrigated_2">Non-Irrigated Sub 2:</label>
    <input type="text" id="nonirrigated_2" name="nonirrigated_2" value="<?php echo $_SESSION['nonirrigated_2'] ?? '405500'; ?>"><br>

    <label for="nonirrigated_3">Non-Irrigated Sub 3:</label>
    <input type="text" id="nonirrigated_3" name="nonirrigated_3" value="<?php echo $_SESSION['nonirrigated_3'] ?? '339200'; ?>"><br>

    <label for="nonirrigated_4">Non-Irrigated Sub 4:</label>
    <input type="text" id="nonirrigated_4" name="nonirrigated_4" value="<?php echo $_SESSION['nonirrigated_4'] ?? "0"; ?>"><br>
</div>

    <div class="form-section">
    <label for="upland_1">Upland Sub 1:</label>
    <input type="text" id="upland_1" name="upland_1" value="<?php echo $_SESSION['upland_1'] ?? '162600'; ?>"><br>

    <label for="upland_2">Upland Sub 2:</label>
    <input type="text" id="upland_2" name="upland_2" value="<?php echo $_SESSION['upland_2'] ?? '128700'; ?>"><br>

    <label for="upland_3">Upland Sub 3:</label>
    <input type="text" id="upland_3" name="upland_3" value="<?php echo $_SESSION['upland_3'] ?? "0"; ?>"><br>

    <label for="upland_4">Upland Sub 4:</label>
    <input type="text" id="upland_4" name="upland_4" value="<?php echo $_SESSION['upland_4'] ?? "0"; ?>"><br>
    </div>

    <div class="form-section">
    <label for="corn_1">Corn Sub 1:</label>
    <input type="text" id="corn_1" name="corn_1" value="<?php echo $_SESSION['corn_1'] ?? '206600'; ?>"><br>

    <label for="corn_2">Corn Sub 2:</label>
    <input type="text" id="corn_2" name="corn_2" value="<?php echo $_SESSION['corn_2'] ?? '184600'; ?>"><br>

    <label for="corn_3">Corn Sub 3:</label>
    <input type="text" id="corn_3" name="corn_3" value="<?php echo $_SESSION['corn_3'] ?? '143300'; ?>"><br>

    <label for="corn_4">Corn Sub 4:</label>
    <input type="text" id="corn_4" name="corn_4" value="<?php echo $_SESSION['corn_4'] ?? "0"; ?>"><br>
    </div>

    <div class="form-section">

    <label for="coconut_1">Coconut Sub 1:</label>
    <input type="text" id="coconut_1" name="coconut_1" value="<?php echo $_SESSION['coconut_1'] ?? '217500'; ?>"><br>

    <label for="coconut_2">Coconut Sub 2:</label>
    <input type="text" id="coconut_2" name="coconut_2" value="<?php echo $_SESSION['coconut_2'] ?? '190300	'; ?>"><br>

    <label for="coconut_3">Coconut Sub 3:</label>
    <input type="text" id="coconut_3" name="coconut_3" value="<?php echo $_SESSION['coconut_3'] ?? '146800'; ?>"><br>

    <label for="coconut_4">Coconut Sub 4:</label>
    <input type="text" id="coconut_4" name="coconut_4" value="<?php echo $_SESSION['coconut_4'] ?? "0"; ?>"><br>

    </div>
    </div>

    
    <br>

    <div class="form-container">
    <div class="form-section">
    <label for="cotton_1">Cotton Sub 1:</label>
    <input type="text" id="cotton_1" name="cotton_1" value="<?php echo $_SESSION['cotton_1'] ?? '201800'; ?>"><br>

    <label for="cotton_2">Cotton Sub 2:</label>
    <input type="text" id="cotton_2" name="cotton_2" value="<?php echo $_SESSION['cotton_2'] ?? '181600'; ?>"><br>

    <label for="cotton_3">Cotton Sub 3:</label>
    <input type="text" id="cotton_3" name="cotton_3" value="<?php echo $_SESSION['cotton_3'] ?? "0"; ?>"><br>

    <label for="cotton_4">Cotton Sub 4:</label>
    <input type="text" id="cotton_4" name="cotton_4" value="<?php echo $_SESSION['cotton_4'] ?? "0"; ?>"><br>

    </div>

    <div class="form-section">
    <label for="tabacco_1">Tabacco Sub 1:</label>
    <input type="text" id="tabacco_1" name="tabacco_1" value="<?php echo $_SESSION['tabacco_1'] ?? '145800	'; ?>"><br>

    <label for="tabacco_2">Tabacco Sub 2:</label>
    <input type="text" id="tabacco_2" name="tabacco_2" value="<?php echo $_SESSION['tabacco_2'] ?? '131200'; ?>"><br>

    <label for="tabacco_3">Tabacco Sub 3:</label>
    <input type="text" id="tabacco_3" name="tabacco_3" value="<?php echo $_SESSION['tabacco_3'] ?? '102000'; ?>"><br>

    <label for="tabacco_4">Tabacco Sub 4:</label>
    <input type="text" id="tabacco_4" name="tabacco_4" value="<?php echo $_SESSION['tabacco_4'] ?? "0"; ?>"><br>

</div>


<div class="form-section">
    <label for="bamboo_1">Bamboo Sub 1:</label>
    <input type="text" id="bamboo_1" name="bamboo_1" value="<?php echo $_SESSION['bamboo_1'] ?? '148000'; ?>"><br>

    <label for="bamboo_2">Bamboo Sub 2:</label>
    <input type="text" id="bamboo_2" name="bamboo_2" value="<?php echo $_SESSION['bamboo_2'] ?? '133100'; ?>"><br>

    <label for="bamboo_3">Bamboo Sub 3:</label>
    <input type="text" id="bamboo_3" name="bamboo_3" value="<?php echo $_SESSION['bamboo_3'] ?? '103500'; ?>"><br>

    <label for="bamboo_4">Bamboo Sub 4:</label>
    <input type="text" id="bamboo_4" name="bamboo_4" value="<?php echo $_SESSION['bamboo_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="bangus_1">Bangus Sub 1:</label>
    <input type="text" id="bangus_1" name="bangus_1" value="<?php echo $_SESSION['bangus_1'] ?? '649800'; ?>"><br>

    <label for="bangus_2">Bangus Sub 2:</label>
    <input type="text" id="bangus_2" name="bangus_2" value="<?php echo $_SESSION['bangus_2'] ?? '617100'; ?>"><br>

    <label for="bangus_3">Bangus Sub 3:</label>
    <input type="text" id="bangus_3" name="bangus_3" value="<?php echo $_SESSION['bangus_3'] ?? '552200'; ?>"><br>

    <label for="bangus_4">Bangus Sub 4:</label>
    <input type="text" id="bangus_4" name="bangus_4" value="<?php echo $_SESSION['bangus_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="tilapia_1">Tilapia Sub 1:</label>
    <input type="text" id="tilapia_1" name="tilapia_1" value="<?php echo $_SESSION['tilapia_1'] ?? '513500'; ?>"><br>

    <label for="tilapia_2">Tilapia Sub 2:</label>
    <input type="text" id="tilapia_2" name="tilapia_2" value="<?php echo $_SESSION['tilapia_2'] ?? '474900'; ?>"><br>

    <label for="tilapia_3">Tilapia Sub 3:</label>
    <input type="text" id="tilapia_3" name="tilapia_3" value="<?php echo $_SESSION['tilapia_3'] ?? '397800'; ?>"><br>

    <label for="tilapia_4">Tilapia Sub 4:</label>
    <input type="text" id="tilapia_4" name="tilapia_4" value="<?php echo $_SESSION['tilapia_4'] ?? '320800'; ?>"><br>

</div>
</div>
<br>

<div class="form-container">
<div class="form-section">

    <label for="lapulapu_1">lapulapu Sub 1:</label>
    <input type="text" id="lapulapu_1" name="lapulapu_1" value="<?php echo $_SESSION['lapulapu_1'] ?? '846500'; ?>"><br>

    <label for="lapulapu_2">lapulapu Sub 2:</label>
    <input type="text" id="lapulapu_2" name="lapulapu_2" value="<?php echo $_SESSION['lapulapu_2'] ?? '782700'; ?>"><br>

    <label for="lapulapu_3">lapulapu Sub 3:</label>
    <input type="text" id="lapulapu_3" name="lapulapu_3" value="<?php echo $_SESSION['lapulapu_3'] ?? '655700'; ?>"><br>

    <label for="lapulapu_4">lapulapu Sub 4:</label>
    <input type="text" id="lapulapu_4" name="lapulapu_4" value="<?php echo $_SESSION['lapulapu_4'] ?? '528700'; ?>"><br>
</div>


<div class="form-section">
    <label for="fisheries_1">Fisheries Sub 1:</label>
    <input type="text" id="fisheries_1" name="fisheries_1" value="<?php echo $_SESSION['fisheries_1'] ?? '418800'; ?>"><br>

    <label for="fisheries_2">Fisheries Sub 2:</label>
    <input type="text" id="fisheries_2" name="fisheries_2" value="<?php echo $_SESSION['fisheries_2'] ?? '387300'; ?>"><br>

    <label for="fisheries_3">Fisheries Sub 3:</label>
    <input type="text" id="fisheries_3" name="fisheries_3" value="<?php echo $_SESSION['fisheries_3'] ?? '324500'; ?>"><br>

    <label for="fisheries_4">Fisheries Sub 4:</label>
    <input type="text" id="fisheries_4" name="fisheries_4" value="<?php echo $_SESSION['fisheries_4'] ?? '261700'; ?>"><br>

</div>

<div class="form-section">
    <label for="hito_1">Hito Sub 1:</label>
    <input type="text" id="hito_1" name="hito_1" value="<?php echo $_SESSION['hito_1'] ?? '555600'; ?>"><br>

    <label for="hito_2">Hito Sub 2:</label>
    <input type="text" id="hito_2" name="hito_2" value="<?php echo $_SESSION['hito_2'] ?? '513800'; ?>"><br>

    <label for="hito_3">Hito Sub 3:</label>
    <input type="text" id="hito_3" name="hito_3" value="<?php echo $_SESSION['hito_3'] ?? '430500'; ?>"><br>

    <label for="hito_4">Hito Sub 4:</label>
    <input type="text" id="hito_4" name="hito_4" value="<?php echo $_SESSION['hito_4'] ?? '347200'; ?>"><br>

</div>

<div class="form-section">

    <label for="nipa_1">Nipa Sub 1:</label>
    <input type="text" id="nipa_1" name="nipa_1" value="<?php echo $_SESSION['nipa_1'] ?? '177600'; ?>"><br>

    <label for="nipa_2">Nipa Sub 2:</label>
    <input type="text" id="nipa_2" name="nipa_2" value="<?php echo $_SESSION['nipa_2'] ?? "0"; ?>"><br>

    <label for="nipa_3">Nipa Sub 3:</label>
    <input type="text" id="nipa_3" name="nipa_3" value="<?php echo $_SESSION['nipa_3'] ?? "0"; ?>"><br>

    <label for="nipa_4">Nipa Sub 4:</label>
    <input type="text" id="nipa_4" name="nipa_4" value="<?php echo $_SESSION['nipa_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">

    <label for="salt_1">Salt Sub 1:</label>
    <input type="text" id="salt_1" name="salt_1" value="<?php echo $_SESSION['salt_1'] ?? '510500'; ?>"><br>

    <label for="salt_2">Salt Sub 2:</label>
    <input type="text" id="salt_2" name="salt_2" value="<?php echo $_SESSION['salt_2'] ?? '474600'; ?>"><br>

    <label for="salt_3">Salt Sub 3:</label>
    <input type="text" id="salt_3" name="salt_3" value="<?php echo $_SESSION['salt_3'] ?? '403100'; ?>"><br>

    <label for="salt_4">Salt Sub 4:</label>
    <input type="text" id="salt_4" name="salt_4" value="<?php echo $_SESSION['salt_4'] ?? "0"; ?>"><br>

</div>
</div>
<br>

<div class="form-container">
<div class="form-section">
    
    <label for="pasture_1">Pasture Sub 1:</label>
    <input type="text" id="pasture_1" name="pasture_1" value="<?php echo $_SESSION['pasture_1'] ?? '126000'; ?>"><br>

    <label for="pasture_2">Pasture Sub 2:</label>
    <input type="text" id="pasture_2" name="pasture_2" value="<?php echo $_SESSION['pasture_2'] ?? "0"; ?>"><br>

    <label for="pasture_3">Pasture Sub 3:</label>
    <input type="text" id="pasture_3" name="pasture_3" value="<?php echo $_SESSION['pasture_3'] ?? "0"; ?>"><br>

    <label for="pasture_4">Pasture Sub 4:</label>
    <input type="text" id="pasture_4" name="pasture_4" value="<?php echo $_SESSION['pasture_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="forest_1">Forest Sub 1:</label>
    <input type="text" id="forest_1" name="forest_1" value="<?php echo $_SESSION['forest_1'] ?? '121300'; ?>"><br>

    <label for="forest_2">Forest Sub 2:</label>
    <input type="text" id="forest_2" name="forest_2" value="<?php echo $_SESSION['forest_2'] ?? "0" ?>"><br>

    <label for="forest_3">Forest Sub 3:</label>
    <input type="text" id="forest_3" name="forest_3" value="<?php echo $_SESSION['forest_3'] ?? "0"; ?>"><br>

    <label for="forest_4">Forest Sub 4:</label>
    <input type="text" id="forest_4" name="forest_4" value="<?php echo $_SESSION['forest_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="mangrove_1">Mangrove Sub 1:</label>
    <input type="text" id="mangrove_1" name="mangrove_1" value="<?php echo $_SESSION['mangrove_1'] ?? '83000'; ?>"><br>

    <label for="mangrove_2">Mangrove Sub 2:</label>
    <input type="text" id="mangrove_2" name="mangrove_2" value="<?php echo $_SESSION['mangrove_2'] ?? "0"; ?>"><br>

    <label for="mangrove_3">Mangrove Sub 3:</label>
    <input type="text" id="mangrove_3" name="mangrove_3" value="<?php echo $_SESSION['mangrove_3'] ?? "0"; ?>"><br>

    <label for="mangrove_4">Mangrove Sub 4:</label>
    <input type="text" id="mangrove_4" name="mangrove_4" value="<?php echo $_SESSION['mangrove_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="orchard_1">Orchard Sub 1:</label>
    <input type="text" id="orchard_1" name="orchard_1" value="<?php echo $_SESSION['orchard_1'] ?? '298400'; ?>"><br>

    <label for="orchard_2">Orchard Sub 2:</label>
    <input type="text" id="orchard_2" name="orchard_2" value="<?php echo $_SESSION['orchard_2'] ?? '261000'; ?>"><br>

    <label for="orchard_3">Orchard Sub 3:</label>
    <input type="text" id="orchard_3" name="orchard_3" value="<?php echo $_SESSION['orchard_3'] ?? '184600'; ?>"><br>

    <label for="orchard_4">Orchard Sub 4:</label>
    <input type="text" id="orchard_4" name="orchard_4" value="<?php echo $_SESSION['orchard_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="abaca_1">Abaca Sub 1:</label>
    <input type="text" id="abaca_1" name="abaca_1" value="<?php echo $_SESSION['abaca_1'] ?? '116000'; ?>"><br>

    <label for="abaca_2">Abaca Sub 2:</label>
    <input type="text" id="abaca_2" name="abaca_2" value="<?php echo $_SESSION['abaca_2'] ?? "0"; ?>"><br>

    <label for="abaca_3">Abaca Sub 3:</label>
    <input type="text" id="abaca_3" name="abaca_3" value="<?php echo $_SESSION['abaca_3'] ?? "0"; ?>"><br>

    <label for="abaca_4">Abaca Sub 4:</label>
    <input type="text" id="abaca_4" name="abaca_4" value="<?php echo $_SESSION['abaca_4'] ?? "0"; ?>"><br>

</div>
</div>
<br>


<div class="form-container">
<div class="form-section">
    <label for="cogon_1">Cogon Sub 1:</label>
    <input type="text" id="cogon_1" name="cogon_1" value="<?php echo $_SESSION['cogon_1'] ?? '96000'; ?>"><br>

    <label for="cogon_2">Cogon Sub 2:</label>
    <input type="text" id="cogon_2" name="cogon_2" value="<?php echo $_SESSION['cogon_2'] ?? "0"; ?>"><br>

    <label for="cogon_3">Cogon Sub 3:</label>
    <input type="text" id="cogon_3" name="cogon_3" value="<?php echo $_SESSION['cogon_3'] ?? "0"; ?>"><br>

    <label for="cogon_4">Cogon Sub 4:</label>
    <input type="text" id="cogon_4" name="cogon_4" value="<?php echo $_SESSION['cogon_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="sorghum_1">Sorghum Sub 1:</label>
    <input type="text" id="sorghum_1" name="sorghum_1" value="<?php echo $_SESSION['sorghum_1'] ?? '159800'; ?>"><br>

    <label for="sorghum_2">Sorghum Sub 2:</label>
    <input type="text" id="sorghum_2" name="sorghum_2" value="<?php echo $_SESSION['sorghum_2'] ?? '150200'; ?>"><br>

    <label for="sorghum_3">Sorghum Sub 3:</label>
    <input type="text" id="sorghum_3" name="sorghum_3" value="<?php echo $_SESSION['sorghum_3'] ?? '130100'; ?>"><br>

    <label for="sorghum_4">Sorghum Sub 4:</label>
    <input type="text" id="sorghum_4" name="sorghum_4" value="<?php echo $_SESSION['sorghum_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="ipilipil_1">ipilipil Sub 1:</label>
    <input type="text" id="ipilipil_1" name="ipilipil_1" value="<?php echo $_SESSION['ipilipil_1'] ?? '193000'; ?>"><br>

    <label for="ipilipil_2">ipilipil Sub 2:</label>
    <input type="text" id="ipilipil_2" name="ipilipil_2" value="<?php echo $_SESSION['ipilipil_2'] ?? '181600'; ?>"><br>

    <label for="ipilipil_3">ipilipil Sub 3:</label>
    <input type="text" id="ipilipil_3" name="ipilipil_3" value="<?php echo $_SESSION['ipilipil_3'] ?? "0"; ?>"><br>

    <label for="ipilipil_4">ipilipil Sub 4:</label>
    <input type="text" id="ipilipil_4" name="ipilipil_4" value="<?php echo $_SESSION['ipilipil_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="zacate_1">Zacate Sub 1:</label>
    <input type="text" id="zacate_1" name="zacate_1" value="<?php echo $_SESSION['zacate_1'] ?? '108000'; ?>"><br>

    <label for="zacate_2">Zacate Sub 2:</label>
    <input type="text" id="zacate_2" name="zacate_2" value="<?php echo $_SESSION['zacate_2'] ?? "0"; ?>"><br>

    <label for="zacate_3">Zacate Sub 3:</label>
    <input type="text" id="zacate_3" name="zacate_3" value="<?php echo $_SESSION['zacate_3'] ?? "0"; ?>"><br>

    <label for="zacate_4">Zacate Sub 4:</label>
    <input type="text" id="zacate_4" name="zacate_4" value="<?php echo $_SESSION['zacate_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="kangkong_1">Kangkong Sub 1:</label>
    <input type="text" id="kangkong_1" name="kangkong_1" value="<?php echo $_SESSION['kangkong_1'] ?? '114000'; ?>"><br>

    <label for="kangkong_2">Kangkong Sub 2:</label>
    <input type="text" id="kangkong_2" name="kangkong_2" value="<?php echo $_SESSION['kangkong_2'] ?? "0"; ?>"><br>

    <label for="kangkong_3">Kangkong Sub 3:</label>
    <input type="text" id="kangkong_3" name="kangkong_3" value="<?php echo $_SESSION['kangkong_3'] ?? "0"; ?>"><br>

    <label for="kangkong_4">Kangkong Sub 4:</label>
    <input type="text" id="kangkong_4" name="kangkong_4" value="<?php echo $_SESSION['kangkong_4'] ?? "0"; ?>"><br>

</div>
</div>
<br>

<div class="form-container">
<div class="form-section">
    <label for="mango_1">Mango Sub 1:</label>
    <input type="text" id="mango_1" name="mango_1" value="<?php echo $_SESSION['mango_1'] ?? '498000'; ?>"><br>

    <label for="mango_2">Mango Sub 2:</label>
    <input type="text" id="mango_2" name="mango_2" value="<?php echo $_SESSION['mango_2'] ?? '440800'; ?>"><br>

    <label for="mango_3">Mango Sub 3:</label>
    <input type="text" id="mango_3" name="mango_3" value="<?php echo $_SESSION['mango_3'] ?? '342800'; ?>"><br>

    <label for="mango_4">Mango Sub 4:</label>
    <input type="text" id="mango_4" name="mango_4" value="<?php echo $_SESSION['mango_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="pineapple_1">Pineapple Sub 1:</label>
    <input type="text" id="pineapple_1" name="pineapple_1" value="<?php echo $_SESSION['pineapple_1'] ?? '244600'; ?>"><br>

    <label for="pineapple_2">Pineapple Sub 2:</label>
    <input type="text" id="pineapple_2" name="pineapple_2" value="<?php echo $_SESSION['pineapple_2'] ?? "0"; ?>"><br>

    <label for="pineapple_3">Pineapple Sub 3:</label>
    <input type="text" id="pineapple_3" name="pineapple_3" value="<?php echo $_SESSION['pineapple_3'] ?? "0"; ?>"><br>

    <label for="pineapple_4">Pineapple Sub 4:</label>
    <input type="text" id="pineapple_4" name="pineapple_4" value="<?php echo $_SESSION['pineapple_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section"> 
    <label for="intensive_1">Intensive Sub 1:</label>
    <input type="text" id="intensive_1" name="intensive_1" value="<?php echo $_SESSION['intensive_1'] ?? '889200'; ?>"><br>

    <label for="intensive_2">Intensive Sub 2:</label>
    <input type="text" id="intensive_2" name="intensive_2" value="<?php echo $_SESSION['intensive_2'] ?? '844700'; ?>"><br>

    <label for="intensive_3">Intensive Sub 3:</label>
    <input type="text" id="intensive_3" name="intensive_3" value="<?php echo $_SESSION['intensive_3'] ?? '755700'; ?>"><br>

    <label for="intensive_4">Intensive Sub 4:</label>
    <input type="text" id="intensive_4" name="intensive_4" value="<?php echo $_SESSION['intensive_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="semiintensive_1">semiintensive Sub 1:</label>
    <input type="text" id="semiintensive_1" name="semiintensive_1" value="<?php echo $_SESSION['semiintensive_1'] ?? '793300'; ?>"><br>

    <label for="semiintensive_2">semiintensive Sub 2:</label>
    <input type="text" id="semiintensive_2" name="semiintensive_2" value="<?php echo $_SESSION['semiintensive_2'] ?? '753600'; ?>"><br>

    <label for="semiintensive_3">semiintensive Sub 3:</label>
    <input type="text" id="semiintensive_3" name="semiintensive_3" value="<?php echo $_SESSION['semiintensive_3'] ?? '674200'; ?>"><br>

    <label for="semiintensive_4">semiintensive Sub 4:</label>
    <input type="text" id="semiintensive_4" name="semiintensive_4" value="<?php echo $_SESSION['semiintensive_4'] ?? '594900'; ?>"><br>

</div>

<div class="form-section">
    <label for="traditional_1">Traditional Sub 1:</label>
    <input type="text" id="traditional_1" name="traditional_1" value="<?php echo $_SESSION['traditional_1'] ?? '697500'; ?>"><br>

    <label for="traditional_2">Traditional Sub 2:</label>
    <input type="text" id="traditional_2" name="traditional_2" value="<?php echo $_SESSION['traditional_2'] ?? '662500'; ?>"><br>

    <label for="traditional_3">Traditional Sub 3:</label>
    <input type="text" id="traditional_3" name="traditional_3" value="<?php echo $_SESSION['traditional_3'] ?? '592800'; ?>"><br>

    <label for="traditional_4">Traditional Sub 4:</label>
    <input type="text" id="traditional_4" name="traditional_4" value="<?php echo $_SESSION['traditional_4'] ?? '523000'; ?>"><br>

</div>
</div>
<br>

<div class="form-container">
<div class="form-section">
    <label for="sugar_1">Sugar Sub 1:</label>
    <input type="text" id="sugar_1" name="sugar_1" value="<?php echo $_SESSION['sugar_1'] ?? '568100'; ?>"><br>

    <label for="sugar_2">Sugar Sub 2:</label>
    <input type="text" id="sugar_2" name="sugar_2" value="<?php echo $_SESSION['sugar_2'] ?? '529300'; ?>"><br>

    <label for="sugar_3">Sugar Sub 3:</label>
    <input type="text" id="sugar_3" name="sugar_3" value="<?php echo $_SESSION['sugar_3'] ?? '428100'; ?>"><br>

    <label for="sugar_4">Sugar Sub 4:</label>
    <input type="text" id="sugar_4" name="sugar_4" value="<?php echo $_SESSION['sugar_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="cardava_1">Cardava Sub 1:</label>
    <input type="text" id="cardava_1" name="cardava_1" value="<?php echo $_SESSION['cardava_1'] ?? '238400'; ?>"><br>

    <label for="cardava_2">Cardava Sub 2:</label>
    <input type="text" id="cardava_2" name="cardava_2" value="<?php echo $_SESSION['cardava_2'] ?? '220500'; ?>"><br>

    <label for="cardava_3">Cardava Sub 3:</label>
    <input type="text" id="cardava_3" name="cardava_3" value="<?php echo $_SESSION['cardava_3'] ?? '184700'; ?>"><br>

    <label for="cardava_4">Cardava Sub 4:</label>
    <input type="text" id="cardava_4" name="cardava_4" value="<?php echo $_SESSION['cardava_4'] ?? '149000'; ?>"><br>

</div>

<div class="form-section">
    <label for="sweet_1">Sweet Sub 1:</label>
    <input type="text" id="sweet_1" name="sweet_1" value="<?php echo $_SESSION['sweet_1'] ?? '284400'; ?>"><br>

    <label for="sweet_2">Sweet Sub 2:</label>
    <input type="text" id="sweet_2" name="sweet_2" value="<?php echo $_SESSION['sweet_2'] ?? '263000'; ?>"><br>

    <label for="sweet_3">Sweet Sub 3:</label>
    <input type="text" id="sweet_3" name="sweet_3" value="<?php echo $_SESSION['sweet_3'] ?? '220400'; ?>"><br>

    <label for="sweet_4">Sweet Sub 4:</label>
    <input type="text" id="sweet_4" name="sweet_4" value="<?php echo $_SESSION['sweet_4'] ?? '177700'; ?>"><br>

</div>

<div class="form-section">
    <label for="bananacommercial_1">Banana commercial Sub 1:</label>
    <input type="text" id="bananacommercial_1" name="bananacommercial_1" value="<?php echo $_SESSION['bananacommercial_1'] ?? '662000'; ?>"><br>

    <label for="bananacommercial_2">Banana commercial Sub 2:</label>
    <input type="text" id="bananacommercial_2" name="bananacommercial_2" value="<?php echo $_SESSION['bananacommercial_2'] ?? '612300'; ?>"><br>

    <label for="bananacommercial_3">Banana commercial Sub 3:</label>
    <input type="text" id="bananacommercial_3" name="bananacommercial_3" value="<?php echo $_SESSION['bananacommercial_3'] ?? '513000'; ?>"><br>

    <label for="bananacommercial_4">Banana commercial Sub 4:</label>
    <input type="text" id="bananacommercial_4" name="bananacommercial_4" value="<?php echo $_SESSION['bananacommercial_4'] ?? '413700'; ?>"><br>

</div>

<div class="form-section">
    <label for="cassava_1">Cassava Sub 1:</label>
    <input type="text" id="cassava_1" name="cassava_1" value="<?php echo $_SESSION['cassava_1'] ?? '170900'; ?>"><br>

    <label for="cassava_2">Cassava Sub 2:</label>
    <input type="text" id="cassava_2" name="cassava_2" value="<?php echo $_SESSION['cassava_2'] ?? '153800'; ?>"><br>

    <label for="cassava_3">Cassava Sub 3:</label>
    <input type="text" id="cassava_3" name="cassava_3" value="<?php echo $_SESSION['cassava_3'] ?? '119600'; ?>"><br>

    <label for="cassava_4">Cassava Sub 4:</label>
    <input type="text" id="cassava_4" name="cassava_4" value="<?php echo $_SESSION['cassava_4'] ?? "0"; ?>"><br>

</div>
</div>
<br>

<div class="form-container">
<div class="form-section">
    <label for="coffee_1">Coffee Sub 1:</label>
    <input type="text" id="coffee_1" name="coffee_1" value="<?php echo $_SESSION['coffee_1'] ?? '143500'; ?>"><br>

    <label for="coffee_2">Coffee Sub 2:</label>
    <input type="text" id="coffee_2" name="coffee_2" value="<?php echo $_SESSION['coffee_2'] ?? '129100'; ?>"><br>

    <label for="coffee_3">Coffee Sub 3:</label>
    <input type="text" id="coffee_3" name="coffee_3" value="<?php echo $_SESSION['coffee_3'] ?? '100400'; ?>"><br>

    <label for="coffee_4">Coffee Sub 4:</label>
    <input type="text" id="coffee_4" name="coffee_4" value="<?php echo $_SESSION['coffee_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="horticulture_1">Horticulture Sub 1:</label>
    <input type="text" id="horticulture_1" name="horticulture_1" value="<?php echo $_SESSION['horticulture_1'] ?? '122300'; ?>"><br>

    <label for="horticulture_2">Horticulture Sub 2:</label>
    <input type="text" id="horticulture_2" name="horticulture_2" value="<?php echo $_SESSION['horticulture_2'] ?? "0"; ?>"><br>

    <label for="horticulture_3">Horticulture Sub 3:</label>
    <input type="text" id="horticulture_3" name="horticulture_3" value="<?php echo $_SESSION['horticulture_3'] ?? "0"; ?>"><br>

    <label for="horticulture_4">Horticulture Sub 4:</label>
    <input type="text" id="horticulture_4" name="horticulture_4" value="<?php echo $_SESSION['horticulture_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section"> 
    <label for="poultry_1">Poultry Sub 1:</label>
    <input type="text" id="poultry_1" name="poultry_1" value="<?php echo $_SESSION['poultry_1'] ?? '771800'; ?>"><br>

    <label for="poultry_2">Poultry Sub 2:</label>
    <input type="text" id="poultry_2" name="poultry_2" value="<?php echo $_SESSION['poultry_2'] ?? '713900'; ?>"><br>

    <label for="poultry_3">Poultry Sub 3:</label>
    <input type="text" id="poultry_3" name="poultry_3" value="<?php echo $_SESSION['poultry_3'] ?? '598100'; ?>"><br>

    <label for="poultry_4">Poultry Sub 4:</label>
    <input type="text" id="poultry_4" name="poultry_4" value="<?php echo $_SESSION['poultry_4'] ?? '484200'; ?>"><br>

</div>

<div class="form-section">    
    <label for="cacao_1">Cacao Sub 1:</label>
    <input type="text" id="cacao_1" name="cacao_1" value="<?php echo $_SESSION['cacao_1'] ?? '266000'; ?>"><br>

    <label for="cacao_2">Cacao Sub 2:</label>
    <input type="text" id="cacao_2" name="cacao_2" value="<?php echo $_SESSION['cacao_2'] ?? '239300'; ?>"><br>

    <label for="cacao_3">Cacao Sub 3:</label>
    <input type="text" id="cacao_3" name="cacao_3" value="<?php echo $_SESSION['cacao_3'] ?? '186100'; ?>"><br>

    <label for="cacao_4">Cacao Sub 4:</label>
    <input type="text" id="cacao_4" name="cacao_4" value="<?php echo $_SESSION['cacao_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">   
    <label for="swine_1">Swine Sub 1:</label>
    <input type="text" id="swine_1" name="swine_1" value="<?php echo $_SESSION['swine_1'] ?? '797000'; ?>"><br>

    <label for="swine_2">Swine Sub 2:</label>
    <input type="text" id="swine_2" name="swine_2" value="<?php echo $_SESSION['swine_2'] ?? '737000'; ?>"><br>

    <label for="swine_3">Swine Sub 3:</label>
    <input type="text" id="swine_3" name="swine_3" value="<?php echo $_SESSION['swine_3'] ?? '617500'; ?>"><br>

    <label for="swine_4">Swine Sub 4:</label>
    <input type="text" id="swine_4" name="swine_4" value="<?php echo $_SESSION['swine_4'] ?? '497900'; ?>"><br>

</div>
</div>
<br>

<div class="form-container">
<div class="form-section"> 
    <label for="papayacommercial_1">Papaya commercial Sub 1:</label>
    <input type="text" id="papayacommercial_1" name="papayacommercial_1" value="<?php echo $_SESSION['papayacommercial_1'] ?? '577800'; ?>"><br>

    <label for="papayacommercial_2">Papaya commercial Sub 2:</label>
    <input type="text" id="papayacommercial_2" name="papayacommercial_2" value="<?php echo $_SESSION['papayacommercial_2'] ?? '534500'; ?>"><br>

    <label for="papayacommercial_3">Papaya commercial Sub 3:</label>
    <input type="text" id="papayacommercial_3" name="papayacommercial_3" value="<?php echo $_SESSION['papayacommercial_3'] ?? '447800'; ?>"><br>

    <label for="papayacommercial_4">Papaya commercial Sub 4:</label>
    <input type="text" id="papayacommercial_4" name="papayacommercial_4" value="<?php echo $_SESSION['papayacommercial_4'] ?? '361100'; ?>"><br>

</div>

<div class="form-section">
    <label for="papayatraditional_1">Papaya traditional Sub 1:</label>
    <input type="text" id="papayatraditional_1" name="papayatraditional_1" value="<?php echo $_SESSION['papayatraditional_1'] ?? '324200'; ?>"><br>

    <label for="papayatraditional_2">Papaya traditional Sub 2:</label>
    <input type="text" id="papayatraditional_2" name="papayatraditional_2" value="<?php echo $_SESSION['papayatraditional_2'] ?? '308000'; ?>"><br>

    <label for="papayatraditional_3">Papaya traditional Sub 3:</label>
    <input type="text" id="papayatraditional_3" name="papayatraditional_3" value="<?php echo $_SESSION['papayatraditional_3'] ?? '275600'; ?>"><br>

    <label for="papayatraditional_4">Papaya traditional Sub 4:</label>
    <input type="text" id="papayatraditional_4" name="papayatraditional_4" value="<?php echo $_SESSION['papayatraditional_4'] ?? '243100'; ?>"><br>

</div>

<div class="form-section">
    <label for="dragon_1">Dragon Sub 1:</label>
    <input type="text" id="dragon_1" name="dragon_1" value="<?php echo $_SESSION['dragon_1'] ?? '662300'; ?>"><br>

    <label for="dragon_2">Dragon Sub 2:</label>
    <input type="text" id="dragon_2" name="dragon_2" value="<?php echo $_SESSION['dragon_2'] ?? '596000'; ?>"><br>

    <label for="dragon_3">Dragon Sub 3:</label>
    <input type="text" id="dragon_3" name="dragon_3" value="<?php echo $_SESSION['dragon_3'] ?? '463600'; ?>"><br>

    <label for="dragon_4">Dragon Sub 4:</label>
    <input type="text" id="dragon_4" name="dragon_4" value="<?php echo $_SESSION['dragon_4'] ?? "0"; ?>"><br>

</div>

<div class="form-section">
    <label for="breeding_1">Breeding Sub 1:</label>
    <input type="text" id="breeding_1" name="breeding_1" value="<?php echo $_SESSION['breeding_1'] ?? '823200'; ?>"><br>

    <label for="breeding_2">Breeding Sub 2:</label>
    <input type="text" id="breeding_2" name="breeding_2" value="<?php echo $_SESSION['breeding_2'] ?? '759400'; ?>"><br>

    <label for="breeding_3">Breeding Sub 3:</label>
    <input type="text" id="breeding_3" name="breeding_3" value="<?php echo $_SESSION['breeding_3'] ?? '635900'; ?>"><br>

    <label for="breeding_4">Breeding Sub 4:</label>
    <input type="text" id="breeding_4" name="breeding_4" value="<?php echo $_SESSION['breeding_4'] ?? '512400'; ?>"><br>

</div>

<div class="form-section">
    <label for="citrus_1">Citrus Sub 1:</label>
    <input type="text" id="citrus_1" name="citrus_1" value="<?php echo $_SESSION['citrus_1'] ?? '365600'; ?>"><br>

    <label for="citrus_2">Citrus Sub 2:</label>
    <input type="text" id="citrus_2" name="citrus_2" value="<?php echo $_SESSION['citrus_2'] ?? '329000	'; ?>"><br>

    <label for="citrus_3">Citrus Sub 3:</label>
    <input type="text" id="citrus_3" name="citrus_3" value="<?php echo $_SESSION['citrus_3'] ?? '255900'; ?>"><br>

    <label for="citrus_4">Citrus Sub 4:</label>
    <input type="text" id="citrus_4" name="citrus_4" value="<?php echo $_SESSION['citrus_4'] ?? "0"; ?>"><br>

</div>
</div>
<br>

 <div class="form-container">
<div class="form-section">
<h3>Unit Value of Residential</h3>
 <label for="R1">Residential Sub 1:</label>
    <input type="text" id="R1" name="R1" value="<?php echo $_SESSION['R1'] ?? '4900'; ?>"><br>

    <label for="R2">Residential Sub 2:</label>
    <input type="text" id="R2" name="R2" value="<?php echo $_SESSION['R2'] ?? '4300	'; ?>"><br>

    <label for="R3">Residential Sub 3:</label>
    <input type="text" id="R3" name="R3" value="<?php echo $_SESSION['R3'] ?? '3500'; ?>"><br>

    <label for="R4">Residential Sub 4:</label>
    <input type="text" id="R4" name="R4" value="<?php echo $_SESSION['R4'] ?? "3000"; ?>"><br>
    <label for="R5">Residential Sub 5:</label>
    <input type="text" id="R5" name="R5" value="<?php echo $_SESSION['R5'] ?? '2200'; ?>"><br>

    <label for="R6">Residential Sub 6:</label>
    <input type="text" id="R6" name="R6" value="<?php echo $_SESSION['R6'] ?? "1500"; ?>"><br>


</div>

<div class="form-section">
    <h3>Unit Value of Commercial</h3>
 <label for="C1">Commercial Sub 1:</label>
    <input type="text" id="C1" name="C1" value="<?php echo $_SESSION['C1'] ?? '6000'; ?>"><br>

    <label for="C2">Commercial Sub 2:</label>
    <input type="text" id="C2" name="C2" value="<?php echo $_SESSION['C2'] ?? '5300	'; ?>"><br>

    <label for="C3">Commercial Sub 3:</label>
    <input type="text" id="C3" name="C3" value="<?php echo $_SESSION['C3'] ?? '4300'; ?>"><br>

    <label for="C4">Commercial Sub 4:</label>
    <input type="text" id="C4" name="C4" value="<?php echo $_SESSION['C4'] ?? "3300"; ?>"><br>

    <label for="C5">Commercial Sub 5:</label>
    <input type="text" id="C5" name="C5" value="<?php echo $_SESSION['C5'] ?? '2500'; ?>"><br>

    <label for="C6">Commercial Sub 6:</label>
    <input type="text" id="C6" name="C6" value="<?php echo $_SESSION['C6'] ?? "2000"; ?>"><br>


</div>

<div class="form-section">
    <h3> Unit Value of Industrial</h3>
    <label for="I1">Industrial Sub 1:</label>
    <input type="text" id="I1" name="I1" value="<?php echo $_SESSION['I1'] ?? '4000'; ?>"><br>

    <label for="I2">Industrial Sub 2:</label>
    <input type="text" id="I2" name="I2" value="<?php echo $_SESSION['I2'] ?? '3500'; ?>"><br>

    <label for="I3">Industrial Sub 3:</label>
    <input type="text" id="I3" name="I3" value="<?php echo $_SESSION['I3'] ?? '3000'; ?>"><br>

    <label for="I4">Industrial Sub 4:</label>
    <input type="text" id="I4" name="I4" value="<?php echo $_SESSION['I4'] ?? "2500"; ?>"><br>

    <label for="I5">Industrial Sub 5:</label>
    <input type="text" id="I5" name="I5" value="<?php echo $_SESSION['I5'] ?? '2000'; ?>"><br>

    <label for="I6">Industrial Sub 6:</label>
    <input type="text" id="I6" name="I6" value="<?php echo $_SESSION['I6'] ?? "1500"; ?>"><br>


</div>
</div>







    
<div style="text-align: right; margin-right: 20px;">
    <button class="btn btn-primary" type="submit" name="save">Save</button>
</div>
</form>
</div>
<br>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
