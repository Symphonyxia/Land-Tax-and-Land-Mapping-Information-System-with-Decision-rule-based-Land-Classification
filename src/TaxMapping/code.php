<?php
include('security.php');

$connection = mysqli_connect("localhost", "root", "", "thesis");



if (isset($_POST['mapbtn'])) {
  $district = $_POST['district'];
  $barangay = $_POST['barangay'];
  $section_no = $_POST['section_no'];
  $lot_no = $_POST['lot_no'];
  $classification = $_POST['classification'];
  $kinds = $_POST['kinds'];
  $subclass = $_POST['subclass'];
  $area = $_POST['area'];
  $unit_val = $_POST['unit_val'];
  $assess_level = $_POST['assess_level'];
  $assess_val = $_POST['assess_val'];
  $market_val = $_POST['market_val'];
  $payables = $_POST['payables'];
  $structures = $_POST['structures'];
  $machinery = $_POST['machinery'];
  $current_loc = $_POST['current_loc'];
  $longitude = $_POST['longitude'];
  $latitude = $_POST['latitude'];
  $altitude = $_POST['altitude'];
  $accuracy = $_POST['accuracy'];

  // Capture the selected factors as an array
  $selectedFactors = isset($_POST['factors']) ? $_POST['factors'] : [];
  $factorsStr = implode(', ', $selectedFactors);

  $query = "INSERT INTO landinfo (district, barangay, section_no, lot_no, classification, kinds, subclass, area, unit_val, assess_level, assess_val, market_val, payables, structures, machinery, factors, current_loc, longitude, latitude, altitude, accuracy) 
      VALUES ('$district','$barangay','$section_no','$lot_no','$classification','$kinds','$subclass','$area','$unit_val','$assess_level','$assess_val','$market_val','$payables','$structures','$machinery', '$factorsStr', '$current_loc', '$longitude', '$latitude', '$altitude', '$accuracy')";

  $query_run = mysqli_query($connection, $query);

  if ($query_run) {
    // Update factors in landinfo based on saved_sections
    $updateQuery = "UPDATE landinfo
                INNER JOIN saved_sections ON landinfo.barangay = saved_sections.barangay
                                          AND landinfo.section_no = saved_sections.section
                SET landinfo.factors = saved_sections.factors";


    $updateQuery_run = mysqli_query($connection, $updateQuery);

    if ($updateQuery_run) {
        $_SESSION['success'] = "Land Data Added and Factors Updated";
        header('Location: map.php');
    } else {
        $_SESSION['status'] = "Land Data Added, but Factors Update Failed";
        header('Location: map.php');
    }
} else {
    $_SESSION['status'] = "Data Not Added";
    header('Location: map.php');
}
}


if (isset($_POST['map_update_btn'])) {
  $land_id = $_POST['map_id'];
  $district = $_POST['edit_district'];
  $barangay = $_POST['edit_barangay'];
  $section_no = $_POST['edit_section'];
  $lot_no = $_POST['edit_lot_no'];
  $classification = $_POST['edit_classification'];
  $kinds = $_POST['edit_kinds'];
  $subclass = $_POST['edit_subclass'];
  $area = $_POST['edit_area'];
  $unit_val = $_POST['edit_unit_val'];
  $assess_level = $_POST['edit_level'];
  $assess_val = $_POST['edit_assess_val'];
  $market_val = $_POST['edit_market'];
  $payables = $_POST['edit_payables'];
  $structures = $_POST['edit_structure'];
  $machinery = $_POST['edit_machinery'];
  $factors = $_POST['edit_factors'];
  $current_loc = $_POST['current_loc'];
  $longitude = $_POST['longitude'];
  $latitude = $_POST['latitude'];
  $altitude = $_POST['altitude'];
  $accuracy = $_POST['accuracy'];

  $query = "UPDATE landinfo SET district='$district', barangay='$barangay', section_no='$section_no', lot_no='$lot_no',
      classification='$classification', kinds='$kinds',
      subclass='$subclass', area='$area', unit_val='$unit_val', assess_level='$assess_level', assess_val='$assess_val', market_val='$market_val',
      payables='$payables', structures='$structures', machinery='$machinery', factors='$factors', current_loc='$current_loc', longitude='$longitude', latitude='$latitude', altitude='$altitude', accuracy='$accuracy' WHERE land_id = '$land_id' ";

  try {
      $query_run = mysqli_query($connection, $query);
      if ($query_run) {
          $_SESSION['success'] = "Your Data is Updated";
          header('Location: map.php');
      } else {
          $_SESSION['status'] = "Your Data is NOT Updated";
          header('Location: map.php');
      }
  } catch (mysqli_sql_exception $e) {
      // Check if the error is related to foreign key constraint
      if ($e->getCode() === 1451) { // MySQL error code for foreign key constraint violation
          // Display a danger message indicating the constraint violation
          $_SESSION['status'] = "Existing data on tax payment history. Cannot change the lot number.";
          header('Location: map.php');
      } else {
          // For other database errors, you can display a generic error message
          $_SESSION['status'] = "An error occurred while processing your request. Please try again later.";
          header('Location: map.php');
      }
  }
}



if (isset($_POST['mapadd_btn'])) {
  $land_id = $_POST['map_id'];
  $classification = $_POST['classification'];
  $kinds = $_POST['kinds'];
  $subclass = $_POST['subclass'];
  $area = $_POST['area'];
  $unit_val = $_POST['unit_val'];
  $assess_level = $_POST['assess_level'];
  $assess_val = $_POST['assess_val'];
  $market_val = $_POST['market_val'];
  $payables = $_POST['payables'];

  // Perform the database insert for classification data
  $query = "INSERT INTO land_record (land_id, classification, kinds, subclass, area, unit_val, assess_level, assess_val, market_val, payables)
                VALUES ('$land_id', '$classification', '$kinds', '$subclass', '$area', '$unit_val', '$assess_level', '$assess_val', '$market_val', '$payables')";
  $query_run = mysqli_query($connection, $query);

  if ($query_run) {
    $_SESSION['success'] = "Classification data added successfully!";
    header('Location: map.php'); // Redirect back to map.php
  } else {
    $_SESSION['status'] = "Error: Unable to add classification data.";
    header('Location: map.php'); // Redirect back to map.php
  }
}


if (isset($_POST['factaddbtn'])) {
  $barangay = $_POST['barangay'];
  $section = $_POST['section'];
  $factors = $_POST['factors'];


  $query = "INSERT INTO saved_sections ( barangay, section, factors) 
  VALUES ('$barangay','$section','$factors')";

  $query_run = mysqli_query($connection, $query);

  if ($query_run) {
      $_SESSION['success'] = "Zoning Data Saved";
      header('Location: factors.php');
  } else {
      $_SESSION['status'] = "Zoning Data NOT Saved";
      header('Location: factors.php');
  }
}

if (isset($_POST['fact_update_btn'])) {
  $id = $_POST['id'];
  $barangay = $_POST['edit_barangay'];
  $section = $_POST['edit_section'];
  $factors = $_POST['edit_factors'];

  // Update factors in saved_sections table
  $updateQuery = "UPDATE saved_sections SET factors='$factors',section='$section',barangay='$barangay'  WHERE id='$id'";
  $updateQuery_run = mysqli_query($connection, $updateQuery);

  // Update factors in landinfo table
  $updateLandInfoQuery = "UPDATE landinfo SET factors='$factors' WHERE barangay='$barangay' AND section_no='$section'";
  $updateLandInfoQuery_run = mysqli_query($connection, $updateLandInfoQuery);

  if ($updateQuery_run && $updateLandInfoQuery_run) {
      $_SESSION['success'] = "Zoning Data is Updated";
      header('Location: factors.php');
  } else {
      $_SESSION['status'] = "Zoning Data NOT Updated";
      header('Location: factors.php');
  }
}




if (isset($_GET['id'])) {
  $post_id = $_GET['id'];

  // Add your database connection code here
  $sql = "DELETE FROM posts WHERE id = $post_id";
  if (mysqli_query($connection, $sql)) {
    $_SESSION['success'] = "Post deleted successfully!";
      header('Location: post.php');
      exit;
  } else {
      // Error handling if the post deletion fails
      echo 'Error: ' . mysqli_error($connection);
  }
} else {
  echo 'Post ID not provided';
  exit;
}




if (isset($_POST['logout_btn'])) {
  session_destroy();
  unset($_SESSION['username']);
}
?>
