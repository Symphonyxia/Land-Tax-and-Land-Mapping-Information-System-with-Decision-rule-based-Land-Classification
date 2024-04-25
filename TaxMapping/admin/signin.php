<?php
session_start();
include('includes/header.php');
?>

<style>
    #wrapper {
        background-image: url('img/signin.png');
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 100%;
    }


   .card {
        background-color: rgba(255, 255, 255, 0.5); /* Adjust the alpha (fourth value) for transparency */
       color: black;
       font-weight: bold;
       padding: 5px;
       box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adjust the values for the box shadow */
       border-radius: 20px; /* Adjust the radius for rounded corners */

    }
    a{
      font-weight: bold;
      color: blue;
    }

    .form-group{
        border-radius: 5px;
    }
    h1{
        color: black;
    }

    .indicator ul li {
        display: block;
        /* Change display to 'block' to make the checklist visible */
    }


    .indicator ul li::before {
        content: "\2713";
        /* Checkmark character */
        color: #23ad5c;
        /* Green color for checkmark */
        font-weight: bold;
        margin-right: 5px;
        display: none;
        /* Initially hidden */
    }

    .indicator ul li.unchecked::before {
        content: "";
    }

    form .text.weak {
        color: green;
    }

    form .text.medium {
        color: orange;
    }

    form .text.strong {
        color: red;
    }

    /* Add this CSS to your existing styles */
    .password-wrapper {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    /* Rest of your existing CSS styles remain unchanged */
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-mzrmE5MHJ7In9S3d2Gpym3lSS3cJw5Bz/5a6Pd5F5F5w5O5w5w5w5w5w5w5w5w5w5w5" crossorigin="anonymous">


<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-black-900 font-weight-bold  mb-4"> SignIn Here!</h1>
                                    <?php
                                     if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                                        echo '<h4 class="bg-primary text-white">' . $_SESSION['success'] . '</h2>';
                                        unset($_SESSION['success']);
                                      }
                                
                                      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                                        echo '<h4 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                                        unset($_SESSION['status']);
                                      }
                                    ?>
                                </div>

                                <form action="signcode.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="fname" class="form-control"
                                            placeholder="Enter First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lname" class="form-control"
                                            placeholder="Enter Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Enter Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control"
                                            placeholder="Enter  Current Address" required>
                                    </div>
                                
                                    <div class="form-group">
                                        <input type="text" name="lot_no" class="form-control"
                                            placeholder="Enter Lot No." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <div class="password-wrapper">
                                            <input type="password" name="password" class="form-control"
                                                id="passwordField" placeholder="Enter Password" onkeyup="trigger()"
                                                required>
                                            <i class="far fa-eye-slash password-toggle" id="passwordToggle"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="confirmpassword" class="form-control"
                                            placeholder="Confirm Password">
                                    </div>
                                    <div class="indicator">
                                        <ul>
                                            <li id="lowercase" class="unchecked"><i class="fas fa-check"></i> At least
                                                one lowercase letter (a-z)</li>
                                            <li id="uppercase" class="unchecked"><i class="fas fa-check"></i> At least
                                                one uppercase letter (A-Z)</li>
                                            <li id="number" class="unchecked"><i class="fas fa-check"></i> At least one
                                                number (0-9)</li>
                                            <li id="special" class="unchecked"><i class="fas fa-check"></i> At least one
                                                special character (!@#$%^&*...)</li>
                                            <li id="length" class="unchecked"><i class="fas fa-check"></i> At least 8
                                                characters in length</li>
                                        </ul>
                                    </div>

                                    <div class="text"></div>
                                    <div class="form-group">
                                        <input type="hidden" name="usertype" class="form-control" value="user">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="verification" class="form-control"
                                            value="unverified">
                                    </div>
                                    <button type="submit" name="signin_btn"
                                        class="btn btn-primary btn-user btn-block">Sign In</button>
                                    <a href="login.php" class="btn btn-danger btn-user btn-block">Cancel</a>
                                    <hr>
                                </form>

                                <div class="text-center">
                                    <p class="para-2">Have an account? <a href="login.php">Login Here!</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const indicator = document.querySelector(".indicator");
    const input = document.querySelector("#passwordField");
    const text = document.querySelector(".text");
    const checklistItems = indicator.querySelectorAll("li");
    const passwordToggle = document.querySelector("#passwordToggle");

    passwordToggle.addEventListener("click", togglePasswordVisibility);

    function togglePasswordVisibility() {
        if (input.type === "password") {
            input.type = "text";
            passwordToggle.classList.remove("fa-eye-slash");
            passwordToggle.classList.add("fa-eye");
        } else {
            input.type = "password";
            passwordToggle.classList.remove("fa-eye");
            passwordToggle.classList.add("fa-eye-slash");
        }
    }

    function trigger() {
    const password = input.value;

    // Reset checklist
    checklistItems.forEach(item => {
        item.classList.remove("checked");
        item.classList.add("unchecked");
        item.style.color = ""; // Clear the color style
    });

    // Hide checklist if password is empty
    if (password.length === 0) {
        indicator.style.display = "none";
        return;
    } else {
        indicator.style.display = "block";
    }

    // Check for lowercase letters
    if (/[a-z]/.test(password)) {
        document.getElementById("lowercase").classList.remove("unchecked");
        document.getElementById("lowercase").classList.add("checked");
        document.getElementById("lowercase").style.color = "#23ad5c"; // Green color
    }

    // Check for uppercase letters
    if (/[A-Z]/.test(password)) {
        document.getElementById("uppercase").classList.remove("unchecked");
        document.getElementById("uppercase").classList.add("checked");
        document.getElementById("uppercase").style.color = "#23ad5c"; // Green color
    }

    // Check for numbers
    if (/\d/.test(password)) {
        document.getElementById("number").classList.remove("unchecked");
        document.getElementById("number").classList.add("checked");
        document.getElementById("number").style.color = "#23ad5c"; // Green color
    }

    // Check for special characters
    if (/[!@#$%^&*]/.test(password)) {
        document.getElementById("special").classList.remove("unchecked");
        document.getElementById("special").classList.add("checked");
        document.getElementById("special").style.color = "#23ad5c"; // Green color
    }

    // Check for password length
    if (password.length >= 8) {
        document.getElementById("length").classList.remove("unchecked");
        document.getElementById("length").classList.add("checked");
        document.getElementById("length").style.color = "#23ad5c"; // Green color
    }

    // Calculate password strength (you can adjust this logic)
    let strength = 0;
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/\d/.test(password)) strength++;
    if (/[!@#$%^&*]/.test(password)) strength++;
    if (password.length >= 8) strength++;

    // Update text based on strength
    text.textContent = "Your password is ";

    if (strength <= 2) {
        text.textContent += "weak";
        text.classList.add("weak");
    } else if (strength <= 4) {
        text.textContent += "medium";
        text.classList.add("medium");
    } else {
        text.textContent += "strong";
        text.classList.add("strong");
    }
}

</script>



<?php
include('includes/scripts.php');
?>