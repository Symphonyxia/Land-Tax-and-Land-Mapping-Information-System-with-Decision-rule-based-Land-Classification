<?php
session_start();
include('security.php');

$connection = mysqli_connect("localhost", "root", "", "thesis");

if (isset($_POST['login_btn'])) {
    $username_login = $_POST['username'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE username = '$username_login'";
    $query_run = mysqli_query($connection, $query);
    
    if ($query_run) {
        $user = mysqli_fetch_assoc($query_run);

        if ($user) {
            // Check if the provided password matches the hashed password in the database
            if (password_verify($password_login, $user['password'])) {
                if ($user['usertype'] == "user") {
                    if ($user['verify_status'] == 0) {
                        $_SESSION['status'] = 'Your email is not yet verified. Please verify your email address to login.';
                        header('Location: login.php');
                        exit();
                    } elseif ($user['verify_status'] == 1) {
                        $_SESSION['authenticated'] = true;
                        $_SESSION['username'] = $username_login;
                        header('Location: user_index.php');
                        exit();
                    } else {
                        $_SESSION['status'] = 'Please try again later. The admin is still checking your registration data.';
                        header('Location: login.php');
                        exit();
                    }
                } elseif ($user['usertype'] == "admin") {
                    $_SESSION['username'] = $username_login;
                    header('Location: index.php');
                    exit();
                } else {
                    $_SESSION['status'] = 'Invalid usertype.';
                    header('Location: login.php');
                    exit();
                }
            } else {
                $_SESSION['status'] = 'Username / Password is Invalid';
                header('Location: login.php');
                exit();
            }
        } else {
            $_SESSION['status'] = 'Username / Password is Invalid';
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['status'] = 'Database error. Please try again later.';
        header('Location: login.php');
        exit();
    }
} else {
    $_SESSION['status'] = 'Login form submission failed.';
    header('Location: login.php');
    exit();
}
?>
