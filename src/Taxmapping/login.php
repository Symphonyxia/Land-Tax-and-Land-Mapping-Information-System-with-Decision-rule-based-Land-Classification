<?php
session_start();
include('includes/header.php');
?>
<script type = "text/javascript">
    function preventBack(){window.history.forward()};
    setTimeout("preventBack()", 0);
    window.onunload=function(){null;}
</script>


<?php
include 'database/dbconfig.php';
?>



    <style>
   #wrapper {
      background-image: url('img/login.png');
      background-repeat: no-repeat;
      background-size: cover;
      width: 100%;
      height: 100vh;
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
</style>


<div class="container">
   <!-- Outer Row -->
   <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
         <div class="card o-hidden my-5">
            <div class="card-body p-0">
               <!-- Nested Row within Card Body -->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="p-5">
                        <div class="text-center">
                           <h1 class="h4 text-black-900 font-weight-bold mb-4"> Login Here!</h1>
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
                        <form class="user" action="logcode.php" method="POST">
                           <div class="form-group">
                              <input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username">
                           </div>
                           
                           <div class="form-group">
                              <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                           </div>
                           <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block">Login</button>
                           <br>
                           <div class="text-center">
                           <a href="password_reset.php">Forgot Password?</a> 
                           </div>                          
                            <hr>

                        </form>

                        <div class="p-2">
                           <div class="text-center">
                              <p class="para-2">Do not have an account? <a href="signin.php">Sign Up Here!</a></p>
                              <p class="para-2">Did not receive your verification email?
                            <a href="resend.php">Resend</a></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php
include('includes/scripts.php');
?>
