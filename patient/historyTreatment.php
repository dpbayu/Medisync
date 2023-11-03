<!-- PHP -->
<?php
require '../function.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'dashboard';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require '../partialsPatient/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partialsPatient/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partialsPatient/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h3>History Treatment <b><?= $_SESSION['name_patient'] ?></b></h3>
        </div>
        <section class="section dashboard my-3">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $sql_medical_record = "SELECT * FROM tbl_medical_record
                    INNER JOIN tbl_doctor ON tbl_medical_record.id_doctor = tbl_doctor.id_doctor ORDER BY check_up DESC";
                    $run_medical_record = mysqli_query($db, $sql_medical_record);
                    if (mysqli_num_rows($run_medical_record) > 0) {
                        $i;
                        while ($medical_record = mysqli_fetch_assoc($run_medical_record)) {
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Medisync</h4>
                                <h6 class="text-end"><?= date("j F Y", strtotime($medical_record['check_up'])); ?></h6>
                                <hr>
                                <div class="mb-3">
                                    <h5 class="card-subtitle mb-2 text-primary fw-bold"><i class="fa fa-user-md me-2"></i>Doctor</h5>
                                    <p class="card-text"><?= $medical_record['name_doctor'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-subtitle mb-2 text-primary fw-bold"><i class="fa fa-stethoscope me-2"></i>Illness</h5>
                                    <p class="card-text"><?= $medical_record['illness'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-subtitle mb-2 text-primary fw-bold"><i class="bi bi-chat me-2"></i>Diagnosis</h5>
                                    <p class="card-text"><?= $medical_record['diagnosis'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-subtitle mb-2 text-primary fw-bold"><i class="bi bi-capsule me-2"></i>Medicine</h5>
                                    <p class="card-text">
                                        <?php
                                        $sql_medicine = "SELECT * FROM tbl_hospital_medicine JOIN tbl_medicine ON tbl_hospital_medicine.id_medicine = tbl_medicine.id_medicine 
                                    WHERE id_hospital = '$medical_record[id_hospital]'";
                                        $run_medicine = mysqli_query($db, $sql_medicine);
                                        if (mysqli_num_rows($run_medicine) > 0) {
                                            while ($data_medicine = mysqli_fetch_array($run_medicine)) {
                                                echo $data_medicine['name_medicine'] . ' = ' . $data_medicine['qty_medicine'] . ' tablet ' . '<br>';
                                            }
                                        } else {
                                            echo '<p>-</p>';
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    } else {
                        echo '<p>no history treatment!</p>';
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partialsPatient/footer.php' ?>
    <!-- Footer End -->
</body>

</html>