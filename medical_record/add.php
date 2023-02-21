<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'medical_record';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require '../partials/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partials/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partials/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Medical Record</h1>
        </div>
        <div class="d-flex gap-1 mb-3">
            <a href="data.php" class="btn btn-secondary">Back</a>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <form action="function.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="patient">Name Patient</label>
                            <select name="patient" id="patient" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_pasien = mysqli_query($db, "SELECT * FROM tbl_patient");
                                while ($data_pasien = mysqli_fetch_array($sql_pasien)) { 
                                    echo '<option value="'.$data_pasien['id_patient'].'">'.$data_pasien['fullname'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="illness">Illness</label>
                            <textarea id="illness" name="illness" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="doctor">Name Doctor</label>
                            <select name="doctor" id="doctor" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_doctor = mysqli_query($db, "SELECT * FROM tbl_doctor");
                                while ($data_doctor = mysqli_fetch_array($sql_doctor)) { 
                                    echo '<option value="'.$data_doctor['id_doctor'].'">'.$data_doctor['fullname'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="diagnosis">Diagnosis</label>
                            <textarea id="diagnosis" name="diagnosis" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="poly">Name Poly</label>
                            <select name="poly" id="poly" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_poly = mysqli_query($db, "SELECT * FROM tbl_poly ORDER BY name_poly ASC");
                                while ($data_poly = mysqli_fetch_array($sql_poly)) { 
                                    echo '<option value="'.$data_poly['id_poly'].'">'.$data_poly['name_poly'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="medicine">Name medicine</label>
                            <select multiple size="7" name="medicine[]" id="medicine" class="form-control" required>
                                <?php
                                $sql_medicine = mysqli_query($db, "SELECT * FROM tbl_medicine ORDER BY name_medicine ASC");
                                while ($data_medicine = mysqli_fetch_array($sql_medicine)) { 
                                    echo '<option value="'.$data_medicine['id_medicine'].'">'.$data_medicine['name_medicine'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="check_up_date">Check Up Date</label>
                            <input type="date" id="check_up_date" name="check_up_date" value="<?= date('Y-m-d') ?>" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="add" value="Simpan">Simpan</button>
                            <button class="btn btn-default" type="reset" name="reset" value="Reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>