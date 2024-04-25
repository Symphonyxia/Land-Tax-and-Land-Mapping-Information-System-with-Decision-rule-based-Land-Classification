<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="register_code.php" method="POST">

        <div class="modal-body">
          <div class="form-group">
            <label> Lot Number </label>
            <input type="text" name="lot_no" class="form-control" placeholder="Enter Lot No.">
          </div>
          <div class="form-group">
            <label> First Name </label>
            <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
          </div>
          <div class="form-group">
            <label> Last Name </label>
            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label> Address </label>
            <input type="text" name="address" class="form-control" placeholder="Enter Address">
          </div>
        
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
          </div>

          <div class="form-group">
            <label>UserType</label>
            <select name="usertype" class="form-control">
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>


<div class="container-fluid">
<?php if (!isset($_GET['print'])) { ?>
  <div class="row justify-content-center  print-hide">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Admin Profile
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile"> Add Profile
        </button>
      </h6>
    </div>

    <div class="card-body">
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
      <div class="table-responsive">
        <?php
        $query = "SELECT * FROM register";
        $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <!-- Table Header -->
          <thead>
            <tr>
              <th>Lot No.</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <th>Address</th>
              <th>Email</th>
              <th>Usertype</th>
              <th>EDIT</th>
              <th>DELETE</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                  <td>
                    <?php echo $row['lot_no']; ?>
                  </td>
                  <td>
                    <?php echo $row['fname']; ?>
                  </td>
                  <td>
                    <?php echo $row['lname']; ?>
                  </td>
                  <td>
                    <?php echo $row['username']; ?>
                  </td>
                  <td>
                    <?php echo $row['address']; ?>
                  </td>
                  <td>
                    <?php echo $row['email']; ?>
                  </td>
                  <td>
                    <?php echo $row['usertype']; ?>
                  </td>
                
                  <td>
                    <form action="register_edit.php" method="POST">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                    </form>
                  </td>
                  <td>
                    <form action="register_code.php" method="POST">
                      <input type="hidden" name="delete_lot_no" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td>

                </tr>
                <?php
              }
            } else {
              echo "No Record Found";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php } ?>


<?php
include('includes/scripts.php');

if (isset($_GET['print'])) {
  // Print the page if 'print' parameter is set in the URL
  echo '<script type="text/javascript">window.print();</script>';
}
?>