<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$datas = query("SELECT * FROM tbl_medical_record 
INNER JOIN tbl_patient ON tbl_medical_record.id_patient = tbl_patient.id_patient
INNER JOIN tbl_doctor ON tbl_medical_record.id_doctor = tbl_doctor.id_doctor
INNER JOIN tbl_poly ON tbl_medical_record.id_poly = tbl_poly.id_poly ORDER BY check_up DESC");
$page = 'medical_record';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require '../partialsDoctor/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partialsDoctor/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partialsDoctor/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Rekam Medik</h1>
        </div>
        <div class="my-3">
            <a href="addMedicalRecord.php" class="btn btn-primary">Add data</a>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (isset($_GET['success'])) {
                        $msg = $_GET['success'];
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>' . $msg . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if (isset($_GET['failed'])) {
                        $msg = $_GET['failed'];
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>' . $msg . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    ?>
                    <div class="table">
                        <form action="" method="POST" name="proses">
                            <table class="table table-bordered table-hover" id="medical_record">
                                <thead>
                                    <tr>
                                        <th class="fw-semibold text-center">No</th>
                                        <th class="fw-semibold text-center">Date</th>
                                        <th class="fw-semibold text-center">Patient</th>
                                        <th class="fw-semibold text-center">Doctor</th>
                                        <th class="fw-semibold text-center">Medicine</th>
                                        <th class="fw-semibold text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_data = "SELECT * FROM tbl_medical_record 
                                    INNER JOIN tbl_patient ON tbl_medical_record.id_patient = tbl_patient.id_patient
                                    INNER JOIN tbl_doctor ON tbl_medical_record.id_doctor = tbl_doctor.id_doctor
                                    INNER JOIN tbl_poly ON tbl_medical_record.id_poly = tbl_poly.id_poly ORDER BY check_up DESC";
                                    $run_data = mysqli_query($db, $query_data);
                                    $i = 1;
                                    while ($data = mysqli_fetch_array($run_data)) {
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= date("j F Y", strtotime($data['check_up'])) ?></td>
                                            <td><?= $data['name_patient'] ?></td>
                                            <td><?= $data['name_doctor'] ?></td>
                                            <td class="text-center">
                                                <a href="addMedicalRecord.php" class="btn btn-success">Medicine</a>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal<?= $data['id_patient'] ?>">
                                                    View
                                                </button>
                                                <a href="deleteMedicalRecord.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure ?')">Delete</a>
                                            </td>
                                        </tr>
                                        <!-- Modal Start -->
                                        <div class="modal fade" id="modal<?= $data['id_patient'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Medical Record <span class="fw-bold"><?= $data['name_patient'] ?></span></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex">
                                                            <label style="width: 125px;">NIK</label>
                                                            <p class="mx-3">:</p>
                                                            <p><?= $data['nik_patient'] ?></p>
                                                        </div>
                                                        <div class="d-flex">
                                                            <label style="width: 125px;">Name</label>
                                                            <p class="mx-3">:</p>
                                                            <p><?= $data['name_patient'] ?></p>
                                                        </div>
                                                        <div class="d-flex">
                                                            <label style="width: 125px;">Place, date birth</label>
                                                            <p class="mx-3">:</p>
                                                            <p><?= $data['birth_place'] ?>,
                                                                <?= date("j F Y", strtotime($data['birth_date'])) ?></p>
                                                        </div>
                                                        <div class="d-flex">
                                                            <label style="width: 125px;">Gender</label>
                                                            <p class="mx-3">:</p>
                                                            <p><?= $data['gender_patient'] ?></p>
                                                        </div>
                                                        <div class="d-flex">
                                                            <label style="width: 125px;">Blood type</label>
                                                            <p class="mx-3">:</p>
                                                            <p><?= $data['blood_patient'] ?></p>
                                                        </div>
                                                        <div class="d-flex">
                                                            <label style="width: 125px;">Address</label>
                                                            <p class="mx-3">:</p>
                                                            <p><?= $data['address_patient'] ?></p>
                                                        </div>
                                                        <hr>
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Doctor</h1>
                                                        <div class="d-flex">
                                                            <label style="width: 125px;">Name</label>
                                                            <p class="mx-3">:</p>
                                                            <p><?= $data['name_doctor'] ?></p>
                                                        </div>
                                                        <div class="d-flex">
                                                            <label style="width: 125px;">Poly</label>
                                                            <p class="mx-3">:</p>
                                                            <p><?= $data['name_poly'] ?></p>
                                                        </div>
                                                        <div class="d-flex">
                                                            <label style="width: 125px;">Diagnosis</label>
                                                            <p class="mx-3">:</p>
                                                            <p><?= $data['diagnosis'] ?></p>
                                                        </div>
                                                        <div class="d-flex">
                                                            <label style="width: 125px;">Illness</label>
                                                            <p class="mx-3">:</p>
                                                            <p><?= $data['illness'] ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal End -->
                                    <?php
                                        $i++;
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
        $(document).ready(function() {
            $('#medical_record').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 5,
                }]
            });
        });
    </script>
    <!-- JS End -->
    <!-- Footer Start -->
    <?php require '../partialsDoctor/footer.php' ?>
    <!-- Footer End -->
</body>

</html>