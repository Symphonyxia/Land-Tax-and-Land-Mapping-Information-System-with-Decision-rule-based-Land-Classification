<?php
session_start();
include('includes/header.php');

?>

<?php
include 'database/dbconfig.php';
?>



    <style>
   #wrapper {
      background-image: url('img/town.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      width: 100%;
      height: 100vh;
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
        top: 70%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    /* Rest of your existing CSS styles remain unchanged */
</style>


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
                           <h1 class="h4 text-gray-900 mb-4"> Change Password</h1>
                           <?php
                              if(isset($_SESSION['status']) && $_SESSION['status'] !='') {
                                 echo '<h4 class="bg-danger text-white"> '.$_SESSION['status'].' </h4>';
                                 unset($_SESSION['status']);
                              }
                           ?>
                        </div>
                        <form class="user" action="resetcode.php" method="POST">
                        <input type="hidden" name = "password_token" value = "<?php if(isset($_GET['token'])){echo $_GET['token'];}  ?>">

                           
                           <div class="form-group mb-3">
                           <label for="">Email Address</label>
                                <input type="text" name="email"  value = "<?php if(isset($_GET['email'])){echo $_GET['email'];}  ?>" class="form-control form-control-user" placeholder="Enter Email">
                            </div>
                          
                            <div class="form-group mb-3">
                            <div class="password-wrapper">
                                <label for="">New Password</label>
                                <input type="text" name = "new_password" class="form-control form-control-user" id="passwordField" placeholder="Enter New Password" onkeyup="trigger()" required>
                                <i class="far fa-eye-slash password-toggle" id="passwordToggle"></i>
                                </div>
                            </div>


                            <div class="form-group mb-3" >
                                <label for="">Confirm Password</label>
                                <input type="text" name = "confirm_password" class="form-control form-control-user" placeholder="Confirm Password">
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


                            <div class="form-group">
                                <button type="submit" name = "password_update" class="btn btn-primary btn-user btn-block">Update Now</button>
                            </div>   

                        </form>

                        
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
