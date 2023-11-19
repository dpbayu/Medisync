<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'pharmacist';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require '../partialsOwner/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partialsOwner/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partialsOwner/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Pharmacist</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                        <table class="table table-bordered table-hover" id="pharmacist">
                            <thead>
                                <tr>
                                    <th class="fw-semibold text-center">No</th>
                                    <th class="fw-semibold text-center">Date</th>
                                    <th class="fw-semibold text-center">Doctor</th>
                                    <th class="fw-semibold text-center">Patient</th>
                                    <th class="fw-semibold text-center">Medicine</th>
                                    <th class="fw-semibold text-center">Total</th>
                                    <th class="fw-semibold text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query_medical = "SELECT * FROM tbl_pharmacist 
                                INNER JOIN tbl_patient ON tbl_pharmacist.id_patient = tbl_patient.id_patient
                                INNER JOIN tbl_doctor ON tbl_pharmacist.id_doctor = tbl_doctor.id_doctor ORDER BY check_up DESC";
                                $run_medical = mysqli_query($db, $query_medical);
                                $i = 1;
                                while ($data = mysqli_fetch_array($run_medical)) {
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= date("j F Y", strtotime($data['check_up'])) ?></td>
                                        <td><?= $data['name_doctor'] ?></td>
                                        <td><?= $data['name_patient'] ?></td>
                                        <td><?= $data['total_medicine'] ?></td>
                                        <td><?= 'Rp ' . number_format($data['total_price'], 0, ',', '.') ?></td>
                                        <td class="text-center"><a class="btn btn-warning" href="receipt.php?id=<?= $data['id_hospital'] ?>">Receipt</a></td>
                                    </tr>
                                <?php
                                $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- JS Start -->
    <script>
        $(document).ready(function() {
            $('#pharmacist').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [4,5,6],
                }]
            });
        });
    </script>
    <!-- JS End -->
    <!-- Footer Start -->
    <?php require '../partialsOwner/footer.php' ?>
    <!-- Footer End -->
</body>

</html>