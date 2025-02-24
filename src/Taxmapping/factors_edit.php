<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT Section Factors </h6>
        </div>

        <div class="card-body">

            <?php
            $connection = mysqli_connect("localhost", "root", "", "thesis");

            if (isset($_POST['factbtn'])) {
                $id = $_POST['id'];

                $query = "SELECT * FROM saved_sections WHERE id = '$id' ";
                $query_run = mysqli_query($connection, $query);

                if ($query_run) {
                    $row = mysqli_fetch_assoc($query_run);
                    $factors = explode(", ", $row['factors']); // Assuming factors are stored as a comma-separated string
                }

                foreach ($query_run as $row) {
                    ?>

                    <form action="code.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                        <div class="form-group">
                            <label for="barangay">Barangay</label>
                            <select name="edit_barangay" id="edit_barangay" class="form-control">
                                <option value="Abangay" <?php echo ($row['barangay'] == 'Abangay') ? 'selected' : ''; ?>>Abangay
                                </option>
                                <option value="Amamaros" <?php echo ($row['barangay'] == 'Amamaros') ? 'selected' : ''; ?>>
                                    Amamaros</option>
                                <option value="Bagacay" <?php echo ($row['barangay'] == 'Bagacay') ? 'selected' : ''; ?>>Bagacay
                                </option>
                                <option value="Barasan" <?php echo ($row['barangay'] == 'Barasan') ? 'selected' : ''; ?>>Barasan
                                </option>
                                <option value="Batuan" <?php echo ($row['barangay'] == 'Batuan') ? 'selected' : ''; ?>>Batuan
                                </option>
                                <option value="Bongco" <?php echo ($row['barangay'] == 'Bongco') ? 'selected' : ''; ?>>Bongco
                                </option>
                                <option value="Cahaguichican" <?php echo ($row['barangay'] == 'Cahaguichican') ? 'selected' : ''; ?>>Cahaguichican</option>
                                <option value="Callan" <?php echo ($row['barangay'] == 'Callan') ? 'selected' : ''; ?>>Callan
                                </option>
                                <option value="Cansilayan" <?php echo ($row['barangay'] == 'Cansilayan') ? 'selected' : ''; ?>>
                                    Cansilayan</option>
                                <option value="Casalsagan" <?php echo ($row['barangay'] == 'Casalsagan') ? 'selected' : ''; ?>>
                                    Casalsagan</option>
                                <option value="Cato-ogan" <?php echo ($row['barangay'] == 'Cato-ogan') ? 'selected' : ''; ?>>
                                    Cato-ogan</option>
                                <option value="Cau-ayan" <?php echo ($row['barangay'] == 'Cau-ayan') ? 'selected' : ''; ?>>
                                    Cau-ayan</option>
                                <option value="Culob" <?php echo ($row['barangay'] == 'Culob') ? 'selected' : ''; ?>>Culob
                                </option>
                                <option value="Danao" <?php echo ($row['barangay'] == 'Danao') ? 'selected' : ''; ?>>Danao
                                </option>
                                <option value="Dapitan" <?php echo ($row['barangay'] == 'Dapitan') ? 'selected' : ''; ?>>Dapitan
                                </option>
                                <option value="Dawis" <?php echo ($row['barangay'] == 'Dawis') ? 'selected' : ''; ?>>Dawis
                                </option>
                                <option value="Dongsol" <?php echo ($row['barangay'] == 'Dongsol') ? 'selected' : ''; ?>>Dongsol
                                </option>
                                <option value="Fernando Parcon Ward" <?php echo ($row['barangay'] == 'Fernando Parcon Ward') ? 'selected' : ''; ?>>Fernando Parcon Ward</option>
                                <option value="Fundacion" <?php echo ($row['barangay'] == 'Fundacion') ? 'selected' : ''; ?>>
                                    Fundacion</option>
                                <option value="Guibuangan" <?php echo ($row['barangay'] == 'Guibuangan') ? 'selected' : ''; ?>>
                                    Guibuangan</option>
                                <option value="Guinacas" <?php echo ($row['barangay'] == 'Guinacas') ? 'selected' : ''; ?>>
                                    Guinacas</option>
                                <option value="Igang" <?php echo ($row['barangay'] == 'Igang') ? 'selected' : ''; ?>>Igang
                                </option>
                                <option value="Intaluan" <?php echo ($row['barangay'] == 'Intaluan') ? 'selected' : ''; ?>>
                                    Intaluan</option>
                                <option value="Iwa Ilaud" <?php echo ($row['barangay'] == 'Iwa Ilaud') ? 'selected' : ''; ?>>Iwa
                                    Ilaud</option>
                                <option value="Iwa Ilaya" <?php echo ($row['barangay'] == 'Iwa Ilaya') ? 'selected' : ''; ?>>Iwa
                                    Ilaya</option>
                                <option value="Jamabalud" <?php echo ($row['barangay'] == 'Jamabalud') ? 'selected' : ''; ?>>
                                    Jamabalud</option>
                                <option value="Jebioc" <?php echo ($row['barangay'] == 'Jebioc') ? 'selected' : ''; ?>>Jebioc
                                </option>
                                <option value="Lay-ahan" <?php echo ($row['barangay'] == 'Lay-ahan') ? 'selected' : ''; ?>>
                                    Lay-ahan</option>
                                <option value="Lopez Jaena Ward" <?php echo ($row['barangay'] == 'Lopez Jaena Ward') ? 'selected' : ''; ?>>Lopez Jaena Ward</option>
                                <option value="Lumbo" <?php echo ($row['barangay'] == 'Lumbo') ? 'selected' : ''; ?>>Lumbo
                                </option>
                                <option value="Macatol" <?php echo ($row['barangay'] == 'Macatol') ? 'selected' : ''; ?>>Macatol
                                </option>
                                <option value="Malusgod" <?php echo ($row['barangay'] == 'Malusgod') ? 'selected' : ''; ?>>
                                    Malusgod</option>
                                <option value="Nabitasan" <?php echo ($row['barangay'] == 'Nabitasan') ? 'selected' : ''; ?>>
                                    Nabitasan</option>
                                <option value="Naga" <?php echo ($row['barangay'] == 'Naga') ? 'selected' : ''; ?>>Naga</option>
                                <option value="Nanga" <?php echo ($row['barangay'] == 'Nanga') ? 'selected' : ''; ?>>Nanga
                                </option>
                                <option value="Naslo" <?php echo ($row['barangay'] == 'Naslo') ? 'selected' : ''; ?>>Naslo
                                </option>
                                <option value="Pajo" <?php echo ($row['barangay'] == 'Pajo') ? 'selected' : ''; ?>>Pajo</option>
                                <option value="Palanguia" <?php echo ($row['barangay'] == 'Palanguia') ? 'selected' : ''; ?>>
                                    Palanguia</option>
                                <option value="Pitogo" <?php echo ($row['barangay'] == 'Pitogo') ? 'selected' : ''; ?>>Pitogo
                                </option>
                                <option value="Polot-an" <?php echo ($row['barangay'] == 'Polot-an') ? 'selected' : ''; ?>>
                                    Polot-an</option>
                                <option value="Primitivo Ledesma Ward" <?php echo ($row['barangay'] == 'Primitivo Ledesma Ward') ? 'selected' : ''; ?>>Primitivo Ledesma Ward</option>
                                <option value="Purog" <?php echo ($row['barangay'] == 'Purog') ? 'selected' : ''; ?>>Purog
                                </option>
                                <option value="Rumbang" <?php echo ($row['barangay'] == 'Rumbang') ? 'selected' : ''; ?>>Rumbang
                                </option>
                                <option value="San Jose Ward" <?php echo ($row['barangay'] == 'San Jose Ward') ? 'selected' : ''; ?>>San Jose Ward</option>
                                <option value="Sinuagan" <?php echo ($row['barangay'] == 'Sinuagan') ? 'selected' : ''; ?>>
                                    Sinuagan</option>
                                <option value="Tuburan" <?php echo ($row['barangay'] == 'Tuburan') ? 'selected' : ''; ?>>Tuburan
                                </option>
                                <option value="Tumcon Ilaud" <?php echo ($row['barangay'] == 'Tumcon Ilaud') ? 'selected' : ''; ?>>Tumcon Ilaud</option>
                                <option value="Tumcon Ilaya" <?php echo ($row['barangay'] == 'Tumcon Ilaya') ? 'selected' : ''; ?>>Tumcon Ilaya</option>
                                <option value="Ubang" <?php echo ($row['barangay'] == 'Ubang') ? 'selected' : ''; ?>>Ubang
                                </option>
                                <option value="Zarrague" <?php echo ($row['barangay'] == 'Zarrague') ? 'selected' : ''; ?>>
                                    Zarrague</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="section">Section</label>
                            <input type="text" name="edit_section" value="<?php echo $row['section'] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="factors">Configure Factors</label>
                            <input type="text" name="edit_factors" value="<?php echo $row['factors'] ?>" class="form-control">
                        </div>

                        <a href="factors.php" class="btn btn-danger"> Cancel </a>
                        <button type="submit" name="fact_update_btn" class="btn btn-primary"> Update </button>
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