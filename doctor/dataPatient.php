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
            <h1>Data Patient</h1>
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
                                    <th class="fw-semibold">Phone</th>
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
                                    <td><?= $patient['phone_patient'] ?></td>
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
                    "targets": 6,
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