<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT Threshold Values </h6>
        </div>

        <div class="card-body">

            <?php
            $connection = mysqli_connect("localhost", "root", "", "thesis");

                $id = $_POST['id'];

                $query = "SELECT * FROM threshold_values WHERE id = '$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
                    ?>
                    <form action="process_form.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                        <div class="form-group">
                            <label for="high">High Value Threshold</label>
                            <input type="number" name="edit_high" value="<?php echo $row['high'] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="mid_max">Mid Max Value Threshold</label>
                            <input type="number" name="edit_mid_max" value="<?php echo $row['mid_max'] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="mid_min">Mid Min Value Threshold</label>
                            <input type="number" name="edit_mid_min" value="<?php echo $row['mid_min'] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="low">Low Value Threshold</label>
                            <input type="number" name="edit_low" value="<?php echo $row['low'] ?>" class="form-control">
                        </div>

                        <a href="factors.php" class="btn btn-danger"> Cancel </a>
                        <button type="submit" name="threshbtn" class="btn btn-primary"> Update </button>
                    </form>

                    <?php
                }

            
            ?>

        </div>
    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>