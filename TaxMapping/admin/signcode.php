<?php
include('security.php');
$connection = mysqli_connect("localhost", "root", "", "thesis");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($fname, $email, $verify_token)
{

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        // $mail->SMTPDebug = 0;
        $mail->isSMTP(); //Send using SMTP
        $mail->SMTPAuth = true;

        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->Username = 'pototanassessorsoffice@gmail.com'; //SMTP username
        $mail->Password = 'gnieelqhqlpfgkht';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
        $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('pototanassessorsoffice@gmail.com', "Pototan Assessor");
        $mail->addAddress($email); //Add a recipient

        $mail->isHTML(true);
        $mail->Subject = "Email verification from Pototan Assessors";

        $email_template = "
        <h3>You have registered with Pototan Assessors</h3>
        <h3>Verify your email address to login with the below given link</h3>
        <a href='http://localhost/TaxMapping/admin/verify_email.php?token=$verify_token'>Click Me</a>
        <h3>Thank you!</h3>


    ";


        $mail->Body = $email_template;
        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



if (isset($_POST['signin_btn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $lot_no = $_POST['lot_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];
    $verify_token = md5(rand());

    // Check if the provided username exists in register table
    $check_username_query = "SELECT username FROM register WHERE username = '$username' LIMIT 1";
    $check_username_query_run = mysqli_query($connection, $check_username_query);

    if (mysqli_num_rows($check_username_query_run) > 0) {
        $_SESSION['status'] = "Username already exists";
        header('Location: signin.php');
        exit();
    }

    // Check if the provided lot_no exists in register table
    $check_lot_query = "SELECT lot_no FROM register WHERE lot_no = '$lot_no' LIMIT 1";
    $check_lot_query_run = mysqli_query($connection, $check_lot_query);

    if (mysqli_num_rows($check_lot_query_run) > 0) {
        $_SESSION['status'] = "Registration with this lot number already exists";
        header('Location: signin.php');
        exit();
    }

    // Check if the provided lot_no exists in landinfo table
    $check_lot_query = "SELECT * FROM landinfo WHERE lot_no = '$lot_no'";
    $check_lot_query_run = mysqli_query($connection, $check_lot_query);

    if (mysqli_num_rows($check_lot_query_run) == 0) {
        $_SESSION['status'] = "The provided lot number does not exist";
        header('Location: signin.php');
        exit();
    }

    // Email exists or not
    $check_email_query = "SELECT email FROM register WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($connection, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email already exists";
        header('Location: signin.php');
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into register table
        $query = "INSERT INTO register (fname, lname, username, address, lot_no, email, password, usertype, verify_token) VALUES ('$fname', '$lname', '$username', '$address', '$lot_no', '$email', '$hashed_password', '$usertype', '$verify_token')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            sendemail_verify("$fname", "$email", "$verify_token");
            $_SESSION['success'] = "Registered Successfully! Kindly Check your Email to verify";
            header('Location: signin.php');
            exit();
        } else {
            $_SESSION['status'] = "Registration Failed: " . mysqli_error($connection);
            header('Location: signin.php');
            exit();
        }
    }
}
?>
