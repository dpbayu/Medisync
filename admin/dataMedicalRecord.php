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
INNER JOIN tbl_doctor ON tbl_medical_record.id_user = tbl_doctor.id_user
INNER JOIN tbl_poly ON tbl_medical_record.id_poly = tbl_poly.id_poly ORDER BY check_up DESC");
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
                                        <th class="fw-semibold">No</th>
                                        <th class="fw-semibold">Date</th>
                                        <th class="fw-semibold">Patient</th>
                                        <th class="fw-semibold">Illness</th>
                                        <th class="fw-semibold">Doctor</th>
                                        <th class="fw-semibold">Diagnosis</th>
                                        <th class="fw-semibold">Poly</th>
                                        <th class="fw-semibold">Medicine</th>
                                        <th class="fw-semibold text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($datas as $data) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
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
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Modal Start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: max-content;">
            <div class="modal-content" style="width: 100%;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Medical Record <span
                            class="fw-bold"><?= $data['name_patient'] ?></span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex">
                                <label style="width: 150px;">NIK</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['nik_patient'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Name</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['name_patient'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Place, date birth</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['birth_place'] ?>, <?= date("j-m-Y", strtotime($data['birth_date'])) ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Gender</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['gender_patient'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Blood Type</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['blood_patient'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Phone</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['phone_patient'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Address</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['address_patient'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Religion</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['religion_patient'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Marital Status</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['marriage_patient'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Illness</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['illness'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Diagnosis</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['diagnosis'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Medicines</label>
                                <p class="mx-3">:</p>
                                <p>
                                    <?php
                                        $sql_medicine = mysqli_query($db, "SELECT * FROM tbl_hospital_medicine 
                                        JOIN tbl_medicine ON tbl_hospital_medicine.id_medicine = tbl_medicine.id_medicine 
                                        WHERE id_hospital = '$data[id_hospital]'");
                                        while ($data_medicine = mysqli_fetch_array($sql_medicine)) {
                                            echo $data_medicine['name_medicine']."<br>";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <label style="width: 150px;">Doctor</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['name_doctor'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Email</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['email_doctor'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Phone</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['phone_doctor'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Address</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['address_doctor'] ?></p>
                            </div>
                            <div class="d-flex">
                                <label style="width: 150px;">Poly</label>
                                <p class="mx-3">:</p>
                                <p><?= $data['name_poly'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <!-- JS Start -->
    <script>
        $(document).ready(function () {
            $('#medical_record').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 8,
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