<?php
session_start();
include('security.php');

$connection = mysqli_connect("localhost","root","","thesis");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_fname,$get_email, $token)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

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
    $mail->setFrom('pototanassessorsoffice@gmail.com',"Pototan Assessor");
    $mail->addAddress($get_email); //Add a recipient

    $mail->isHTML(true);
    $mail->Subject = "Reset Your Password Link";

    $email_template = "
    <h2>Hello User!</h2>
    <h3>We are sending a password reset link to you as per you request.</h3>
    <br>
    <a href= 'http://localhost/TaxMapping/admin/password_change.php?token=$token&email=$get_email'> Click Me </a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}

if (isset($_POST['passreset_btn'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT fname, lname, email FROM register WHERE email = '$email' LIMIT 1";
    $check_email_run = mysqli_query($connection, $check_email);
    
    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_fname = $row['fname'];
        $get_email = $row['email'];
    


        $update_token = "UPDATE register SET verify_token = '$token' WHERE email = '$get_email' LIMIT 1";
        $update_token_run = mysqli_query($connection, $update_token);

        if ($update_token_run) {
            send_password_reset($get_fname, $get_email, $token);
            $_SESSION['success'] = "We e-mailed you a password reset link";
            header("Location: password_reset.php");
            exit(0);

        } else {
            $_SESSION['status'] = "Something went wrong!. #1";
            header("Location: password_reset.php");
            exit(0);
        }

    } else {
        $_SESSION['status'] = "No Email Found";
        header("Location: password_reset.php");
        exit(0);

    }

}



if (isset($_POST['password_update'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $new_password = mysqli_real_escape_string($connection, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($connection, $_POST['password_token']);

    if (!empty($token)) {

        if (!empty($email) && !empty($new_password) && !empty($confirm_password)) {

            // Check if the token is valid
            $check_token_query = "SELECT verify_token FROM register WHERE verify_token = ? LIMIT 1";
            $stmt_check_token = mysqli_prepare($connection, $check_token_query);
            mysqli_stmt_bind_param($stmt_check_token, "s", $token);
            mysqli_stmt_execute($stmt_check_token);
            mysqli_stmt_store_result($stmt_check_token);

            if (mysqli_stmt_num_rows($stmt_check_token) > 0) {

                if ($new_password == $confirm_password) {
                    // Hash the new password
                    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

                    // Update the password and generate a new token
                    $update_password_query = "UPDATE register SET password = ?, verify_token = ? WHERE verify_token = ? LIMIT 1";
                    $stmt_update_password = mysqli_prepare($connection, $update_password_query);
                    $new_token = md5(random_bytes(32));
                    mysqli_stmt_bind_param($stmt_update_password, "sss", $hashed_password, $new_token, $token);
                    mysqli_stmt_execute($stmt_update_password);

                    if ($stmt_update_password) {
                        $_SESSION['success'] = "New Password Successfully Updated!";
                        header("Location: login.php");
                        exit(0);
                    } else {
                        $_SESSION['status'] = "Password Failed To Update. Something Went Wrong!";
                        header("Location: password_change.php?token=$token&email=$email");
                        exit(0);
                    }
                } else {
                    $_SESSION['status'] = "New Password and Confirm Password Do not match";
                    header("Location: password_change.php?token=$token&email=$email");
                    exit(0);
                }

            } else {
                $_SESSION['status'] = "Invalid Token";
                header("Location: password_change.php?token=$token&email=$email");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "All fields are mandatory";
            header("Location: password_change.php?token=$token&email=$email");
            exit(0);
        }

    } else {
        $_SESSION['status'] = "No Token Available";
        header("Location: password_change.php");
        exit(0);
    }
}
?>