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
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <form action="function.php" method="POST">
                        <?php
                            $id = $_GET['id'];
                            $sql = mysqli_query($db, "SELECT * FROM tbl_medical_record 
                            INNER JOIN tbl_patient ON tbl_medical_record.id_patient = tbl_patient.id_patient
                            INNER JOIN tbl_doctor ON tbl_medical_record.id_doctor = tbl_doctor.id_doctor
                            INNER JOIN tbl_poly ON tbl_medical_record.id_poly = tbl_poly.id_poly WHERE id_hospital = '$id'");
                            $data = mysqli_fetch_array($sql);
                        ?>
                        <div class="form-group mb-3">
                            <input type="hidden" name="id" value="<?= $data['id_hospital'] ?>">
                            <label class="form-label" for="patient">Name Patient</label>
                            <select class="form-control" name="id_patient" id="patient">
                                <?php
                            $sql_patient = mysqli_query($db, "SELECT * FROM tbl_patient");
                            while ($patient = mysqli_fetch_assoc($sql_patient)) {
                                if ($patient['id_patient'] == $data['id_patient']) {
                                    echo '<option selected value="'.$patient['id_patient'].'">'.$patient['name_patient'].'</option>';
                                } else {
                                    echo '<option value="'.$patient['id_patient'].'">'.$patient['name_patient'].'</option>';
                                }
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="illness">Illness</label>
                            <textarea class="form-control" id="illness" name="illness" placeholder="Input illness"
                                rows="5" style="resize: none;" required><?= $data['illness'] ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="doctor">Name Doctor</label>
                            <select class="form-control" name="id_doctor" id="doctor">
                                <?php
                                $sql_doctor = mysqli_query($db, "SELECT * FROM tbl_doctor");
                                while ($doctor = mysqli_fetch_assoc($sql_doctor)) {
                                if ($doctor['id_doctor'] == $data['id_doctor']) {
                                    echo '<option selected value="'.$doctor['id_doctor'].'">'.$doctor['name_doctor'].'</option>';
                                } else {
                                    echo '<option value="'.$doctor['id_doctor'].'">'.$doctor['name_doctor'].'</option>';
                                }
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="diagnosis">Diagnosis</label>
                            <textarea class="form-control" id="diagnosis" name="diagnosis" placeholder="Input diagnosis"
                                rows="5" style="resize: none;"><?= $data['diagnosis'] ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="poly">Name Poly</label>
                            <select class="form-control" name="id_poly" id="poly">
                                <?php
                                $sql_poly = mysqli_query($db, "SELECT * FROM tbl_poly");
                                while ($poly = mysqli_fetch_assoc($sql_poly)) {
                                if ($poly['id_poly'] == $data['id_poly']) {
                                    echo '<option value="'.$poly['id_poly'].'">'.$poly['name_poly'].'</option>';
                                } else {
                                    echo '<option value="'.$poly['id_poly'].'">'.$poly['name_poly'].'</option>';
                                }
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="medicine">Name medicine</label>
                            <select class="form-control" multiple name="id_medicine[]" id="medicine">
                                <?php
                                $sql_medicine = mysqli_query($db, "SELECT * FROM tbl_medicine");
                                while ($medicine = mysqli_fetch_assoc($sql_medicine)) {
                                    if ($medicine['id_medicine'] == $data['id_medicine']) {
                                        echo '<option selected value="'.$medicine['id_medicine'].'">'.$medicine['name_medicine'].'</option>';
                                    } else {
                                        echo '<option value="'.$medicine['id_medicine'].'">'.$medicine['name_medicine'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="check_up_date">Check Up Date</label>
                            <input class="form-control" type="date" id="check_up_date" name="check_up"
                                value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="edit">Edit</button>
                            <button class="btn btn-danger" type="reset" name="reset" value="Reset">Reset</button>
                            <a href="data.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- JS -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#medicine').select2({
                placeholder: "Medicine",
                allowClear: true,
                language: "id"
            });
        });
    </script>
    <!-- JS -->
    <!-- Footer Start -->
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>