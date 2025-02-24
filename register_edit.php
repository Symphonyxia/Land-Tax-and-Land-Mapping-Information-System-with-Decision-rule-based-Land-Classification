<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT Admin Profile</h6>
        </div>

        <div class="card-body">

            <?php
            $connection = mysqli_connect("localhost", "root", "", "thesis");
            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM register WHERE id = '$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
                    ?>

                    <form action="register_code.php" method="POST">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                        <div class="form-group">
                            <label> Lot No </label>
                            <input type="text" name="edit_lot" value="<?php echo $row['lot_no'] ?>"
                                   class="form-control" placeholder="Enter Lot No">
                        </div>
                        <div class="form-group">
                            <label> First Name </label>
                            <input type="text" name="edit_fname" value="<?php echo $row['fname'] ?>"
                                   class="form-control" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label> Last Name </label>
                            <input type="text" name="edit_lname" value="<?php echo $row['lname'] ?>"
                                   class="form-control" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label> Username</label>
                            <input type="text" name="edit_username" value="<?php echo $row['username'] ?>"
                                   class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label> Address</label>
                            <input type="text" name="edit_address" value="<?php echo $row['address'] ?>"
                                   class="form-control" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="edit_email" value="<?php echo $row['email'] ?>"
                                   class="form-control" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                        <label>Usertype</label>
                            <select name="update_usertype" class="form-control">
                                <option value="admin" <?php if ($row['usertype'] === 'admin') echo 'selected'; ?>>
                                    Admin
                                </option>
                                <option value="user" <?php if ($row['usertype'] === 'user') echo 'selected'; ?>>
                                    User
                                </option>
                            </select>
                        </div>

                        <a href="register.php" class="btn btn-danger"> Cancel </a>
                        <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
                    </form>

                    <?php
                }
            }
            ?>

        </div>
    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
