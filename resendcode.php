<?php
session_start();
include('security.php');

$connection = mysqli_connect("localhost","root","","thesis");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function resend_email_verify($fname, $email, $verify_token)
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
    $mail->addAddress($email); //Add a recipient

    $mail->isHTML(true);
    $mail->Subject = "Resend - Email verification from Pototan Assessors";

    $email_template = "
    <h3>This email is send to you as for your request of email verification.</h3>
    <h3>Kindly verify your email address to login with the given link below.</h3>
    <a href='http://localhost/TaxMapping/admin/verify_email.php?token=$verify_token'>Click Me</a>
    <h3>Thank you!</h3>

";


    $mail->Body = $email_template;
    $mail->send();
    //echo 'Message has been sent';
}



if (isset($_POST['resend_btn'])) 
{
    if(!empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($connection, $_POST['email']);

        $checkemail_query = "SELECT * FROM register WHERE email = '$email' LIMIT 1";
        $checkemail_query_run = mysqli_query($connection, $checkemail_query);

        if(mysqli_num_rows($checkemail_query_run) >0 )
        {
            $row = mysqli_fetch_array($checkemail_query_run);
            if($row ['verify_status'] == "0")
            {
                $fname = $row ['fname'];
                $email = $row ['email'];
                $verify_token = $row ['verify_token'];

                resend_email_verify($fname,$email,$verify_token);
                $_SESSION['success'] = "Verification Email Link has been sent to your email address.";
                header("Location: login.php");
                exit(0); 
                
            }
            else
            {
                $_SESSION['success'] = "Email already verified. Please login.";
                header("Location: resend.php");
                exit(0); 

            }
        }
        else
        {
            $_SESSION['status'] = "Email is not registered. Please register now.";
            header("Location: signin.php");
            exit(0);
        }


    }
    else
    {
        $_SESSION['status'] = "Please enter the email field";
        header("Location: resend.php");
        exit(0);
    }
}


?>