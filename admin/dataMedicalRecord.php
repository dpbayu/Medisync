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
<?php require '../partialsAdmin/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partialsAdmin/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partialsAdmin/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Rekam Medik</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                <?php
                    if (isset($_GET['success'])) {
                        $msg = $_GET['success'];
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>'.$msg.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if (isset($_GET['failed'])) {
                        $msg = $_GET['failed'];
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>'.$msg.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    ?>
                    <div class="table">
                        <form action="" method="POST" name="proses">
                            <table class="table table-bordered table-hover" id="medical_record">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Patient</th>
                                        <th>Illness</th>
                                        <th>Doctor</th>
                                        <th>Diagnosis</th>
                                        <th>Poly</th>
                                        <th>Medicine</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = "SELECT * FROM tbl_medical_record 
                                    INNER JOIN tbl_patient ON tbl_medical_record.id_patient = tbl_patient.id_patient
                                    INNER JOIN tbl_doctor ON tbl_medical_record.id_doctor = tbl_doctor.id_doctor
                                    INNER JOIN tbl_poly ON tbl_medical_record.id_poly = tbl_poly.id_poly ORDER BY check_up DESC";
                                    $sql = mysqli_query($db, $query);
                                    while ($data = mysqli_fetch_array($sql)) {
                                        ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= date("j F Y", strtotime($data['check_up'])) ?></td>
                                        <td><?= $data['name_patient'] ?></td>
                                        <td><?= $data['illness'] ?></td>
                                        <td><?= $data['name_doctor'] ?></td>
                                        <td><?= $data['diagnosis'] ?></td>
                                        <td><?= $data['name_poly'] ?></td>
                                        <td>
                                            <?php
                                            $sql_medicine = mysqli_query($db, "SELECT * FROM tbl_hospital_medicine 
                                            JOIN tbl_medicine ON tbl_hospital_medicine.id_medicine = tbl_medicine.id_medicine 
                                            WHERE id_hospital = '$data[id_hospital]'");
                                            while ($data_medicine = mysqli_fetch_array($sql_medicine)) {
                                                echo $data_medicine['name_medicine']."<br>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- JS Start -->
    <script>
        $(document).ready(function () {
            $('#medical_record').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 7,
                }]
            });
        });
    </script>
    <!-- JS End -->
    <!-- Footer Start -->
    <?php require '../partialsAdmin/footer.php' ?>
    <!-- Footer End -->
</body>

</html>