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
    // Create an instance; passing `true` enables exceptions
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

if (isset($_POST['registerbtn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $lot_no = $_POST['lot_no'];
    $address = $_POST['address'];
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
        header('Location: register.php');
        exit();
    }

 // Email exists or not
 $check_email_query = "SELECT email FROM register WHERE email = '$email' LIMIT 1";
 $check_email_query_run = mysqli_query($connection, $check_email_query);

 if (mysqli_num_rows($check_email_query_run) > 0) {
     $_SESSION['status'] = "Email already exists";
     header('Location: register.php');
     exit();
 }

 


    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($password === $cpassword) {
        $query = "INSERT INTO register (fname, lname, username, lot_no, address, email, password, usertype, verify_token) VALUES ('$fname', '$lname', '$username', '$lot_no', '$address','$email', '$hashed_password', '$usertype', '$verify_token')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            // Send email verification
            sendemail_verify($fname, $email, $verify_token);

            $_SESSION['success'] = "Profile Added";
            header('Location: register.php');
        } else {
            $_SESSION['status'] = "Profile Not Added";
            header('Location: register.php');
        }
    } else {
        $_SESSION['status'] = "Password and Confirm Password does not Match";
        header('Location: register.php');
        exit();
    }
}


if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $fname = $_POST['edit_fname'];
    $lname = $_POST['edit_lname'];
    $username = $_POST['edit_username'];
    $address = $_POST['edit_address'];
    $lot_no = $_POST['edit_lot'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];

    $query = "UPDATE register SET fname = '$fname',lname = '$lname',username = '$username',address = '$address', lot_no = '$lot_no', email = '$email', password = '$password', usertype = '$usertypeupdate' WHERE id = '$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Error: " . mysqli_error($connection);
        header('Location: register.php');
    }
}





if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_lot_no'];

    $query = "DELETE FROM register WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Deleted";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        header('Location: register.php');
    }
}

?>
