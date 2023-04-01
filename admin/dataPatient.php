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
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Name Patient</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Age</th>
                                    <th class="text-center">Action</th>
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
                                    <td><?= $patient['phone_patient'] ?></td>
                                    <td><?= $year. " years " .$month. " month " ?></td>
                                    <td class="text-center">
                                        <a href="editPatient.php?id=<?= $patient['id_patient'] ?>"
                                            class="btn btn-warning">
                                            Edit
                                        </a>
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
    <!-- JS Start -->
    <script>
        // Data Tables
        $(document).ready(function () {
            $('#patient').DataTable({
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