<?php
include('security.php');
session_start();
$connection = mysqli_connect("localhost", "root", "", "thesis");

if(!isset($_SESSION['authenticated']))
{
    $_SESSION['status'] = "Please login to access user dashboard";
    header('Location: login.php');
    exit(0);
}

?>
