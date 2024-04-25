<?php
include('security.php');
include('user_include/header.php'); 
include('user_include/navbar.php'); 
?>

<style>
  .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .vision-box,
  .mission-box {
    background-color: #F5F5F5;
    margin: 10px 0;
    padding: 20px;
    width: 48%; /* Adjusted width to leave space for margins */
    box-sizing: border-box; /* Include padding and border in the box's total width */
  }
</style>

<br>

<div class="card shadow mb-4">
  <div class="card-header py-5">
    <h6 class="font-weight-bold text-primary"> The City Assessors Office </h6>
    <p class="m-2 text-black">The City Assessor’s Office (CAO) ensures that all laws and policies governing the appraisal and assessment of real properties for taxation purposes are fairly, accurately and effectively executed. It is also responsible for the preparation, installation, accounting and maintenance of a system for tax mapping and record administration. It is also responsible for the development and upgrading of and identification of properties and geographic analysis system. It is also in charge of the preparation of Schedule of Fair Market Values of the different classes of properties within Iloilo City.</p>
  </div>
</div>

<div class="container">
  <div class="vision-box">
    <h6 class="font-weight-bold text-primary"> Vision </h6>
    <p class="m-2 text-black">A robust, progressive and globally-competitive and resilient Iloilo.</p>
  </div>

  <div class="mission-box">
    <h6 class="font-weight-bold text-primary"> Mission </h6>
    <p class="m-2 text-black">A local government unit committed to providing equitable distribution of resources and opportunities through good governance.</p>
  </div>
</div>
<br>
<div class="card shadow mb-4">
  <div class="card-header py-5">
    <h6 class="font-weight-bold text-primary"> Services Offered </h6>
    <ul>
      <li class="m-2 text-black">Issuances of Certified True Copy of Tax Declarations/Certification of Aggregate Landholdings for DAR / BIR</li>
      <li class="m-2 text-black">Issuances of Sketch Plan, Vicinity Plan and Blue Prints of Lots / Section Maps</li>
      <li class="m-2 text-black">Appraisal and Assessment of Real Properties</li>
      <li class="m-2 text-black">Correction of Data in the Tax Declaration</li>
      <li class="m-2 text-black">Cancellation of Improvements</li>
      <li class="m-2 text-black">Simple Transfer</li>
    </ul>
  </div>
</div>

<?php
include('user_include/scripts.php');
?>
