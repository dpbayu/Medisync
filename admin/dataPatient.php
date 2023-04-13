<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$patients = query("SELECT * FROM tbl_patient ORDER BY name_patient ASC");
$page = 'patient';
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
            <h1>Data Patient</h1>
        </div>
        <div class="my-3">
            <a href="addPatient.php" class="btn btn-primary">Add data</a>
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
                        <table id="patient" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="fw-semibold">No</th>
                                    <th class="fw-semibold">NIK</th>
                                    <th class="fw-semibold">Name Patient</th>
                                    <th class="fw-semibold">Gender</th>
                                    <th class="fw-semibold">Address</th>
                                    <th class="fw-semibold">Age</th>
                                    <th class="text-center fw-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($patients as $patient) : ?>
                                <?php
                                    $birth_date = new DateTime($patient['birth_date']);
                                    $selisih = date_diff($birth_date, new DateTime());
                                    $year = $selisih->y;
                                    $month = $selisih->m;
                                ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $patient['nik_patient'] ?></td>
                                    <td><?= $patient['name_patient'] ?></td>
                                    <td><?= $patient['gender_patient'] ?></td>
                                    <td><?= $patient['address_patient'] ?></td>
                                    <td><?= $year. " years " .$month. " month " ?></td>
                                    <td class="text-center">
                                        <a href="editPatient.php?id=<?= $patient['id_patient'] ?>"
                                            class="btn btn-warning">
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            View
                                        </button>
                                        <a onclick="return confirm('Are you sure delete this data ?')"
                                            href="deletePatient.php?id=<?= $patient['id_patient'] ?>"
                                            class="btn btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Modal Start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Patient <span class="fw-bold"><?= $patient['name_patient'] ?></span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex">
                        <label style="width: 150px;">NIK</label>
                        <p class="mx-3">:</p>
                        <p><?= $patient['nik_patient'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label style="width: 150px;">Name</label>
                        <p class="mx-3">:</p>
                        <p><?= $patient['name_patient'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label style="width: 150px;">Place, date birth</label>
                        <p class="mx-3">:</p>
                        <p><?= $patient['birth_place'] ?>, <?= date("j F Y", strtotime($patient['birth_date'])) ?></p>
                    </div>
                    <div class="d-flex">
                        <label style="width: 150px;">Gender</label>
                        <p class="mx-3">:</p>
                        <p><?= $patient['gender_patient'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label style="width: 150px;">Blood Type</label>
                        <p class="mx-3">:</p>
                        <p><?= $patient['blood_patient'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label style="width: 150px;">Phone</label>
                        <p class="mx-3">:</p>
                        <p><?= $patient['phone_patient'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label style="width: 150px;">Address</label>
                        <p class="mx-3">:</p>
                        <p><?= $patient['address_patient'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label style="width: 150px;">Religion</label>
                        <p class="mx-3">:</p>
                        <p><?= $patient['religion_patient'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label style="width: 150px;">Marital Status</label>
                        <p class="mx-3">:</p>
                        <p><?= $patient['marriage_patient'] ?></p>
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
        // Data Tables
        $(document).ready(function () {
            $('#patient').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 6,
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