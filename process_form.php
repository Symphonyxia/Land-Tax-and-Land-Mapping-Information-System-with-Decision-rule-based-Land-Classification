<?php
include('security.php');

$connection = mysqli_connect("localhost", "root", "", "thesis");

if (isset($_POST['threshbtn'])) {
  $id = $_POST['id'];
  $high = $_POST['edit_high'];
  $mid_max = $_POST['edit_mid_max'];
  $mid_min = $_POST['edit_mid_min'];
  $low = $_POST['edit_low'];

  $query = "UPDATE threshold_values SET high='$high',mid_max='$mid_max',mid_min='$mid_min',low='$low' WHERE id = '$id' ";
$query_run = mysqli_query($connection, $query);

if ($query_run) {
  $_SESSION['success'] = "Threshold Value is Updated";
      header('Location: factors.php');
  } else {
      $_SESSION['status'] = "Threshold Value NOT Updated";
      header('Location: factors.php');
  }
}

?>
