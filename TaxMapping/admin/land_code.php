<?php
include('security.php');

$connection = mysqli_connect("localhost", "root", "", "thesis");


if (isset($_POST['record_update_btn'])) {
    $record_id = $_POST['record_edit_id'];
    $classification = $_POST['edit_classification'];
    $kinds = $_POST['edit_kinds'];
    $subclass = $_POST['edit_subclass'];
    $area = $_POST['edit_area'];
    $unit_val = $_POST['edit_unit_val'];
    $assess_level = $_POST['edit_level'];
    $assess_val = $_POST['edit_assess_val'];
    $market_val = $_POST['edit_market_val'];
    $payables = $_POST['edit_payables'];

    // Perform the UPDATE operation
    $query = "UPDATE land_record SET 
        classification='$classification',kinds='$kinds',
        subclass='$subclass', area='$area',unit_val='$unit_val',assess_level='$assess_level',assess_val='$assess_val',market_val='$market_val',
        payables='$payables' WHERE record_id = '$record_id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Land Record Updated Successfully";
        header('Location: map.php'); // Redirect to data_record.php
    } else {
        $_SESSION['status'] = "Failed to Update Land Record";
        header('Location: map.php'); // Redirect to data_record.php
    }
}



if (isset($_POST['delete_record'])) {
    $record_id = $_POST['idelete_record'];

    // Perform the DELETE operation
    $delete_query = "DELETE FROM land_record WHERE record_id='$record_id'";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['success'] = "Land Record Deleted Successfully";
        header('Location: map.php'); // Redirect to data_record.php
        exit(); // Ensure no further code execution in this request
    } else {
        $_SESSION['status'] = "Failed to Delete Land Record";
        header('Location: map.php'); // Redirect to data_record.php
        exit(); // Ensure no further code execution in this request
    }
}


?>