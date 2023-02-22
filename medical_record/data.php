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
            <h1>Data Rekam Medik</h1>
        </div>
        <div class="d-flex justify-content-end gap-1 mb-3">
            <a href="#" class="btn btn-outline-dark"><i class="ri-refresh-fill"></i></a>
            <a href="add.php" class="btn btn-primary">Add data</a>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="table">
                        <form action="" method="POST" name="proses">
                            <table class="table table-bordered table-hover" id="medical_record">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Check Up Date</th>
                                        <th>Name Patient</th>
                                        <th>Illness</th>
                                        <th>Name Doctor</th>
                                        <th>Diagnosis</th>
                                        <th>Poly</th>
                                        <th>Medicine</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no =1;
                                    $query = "SELECT * FROM tbl_medical_record 
                                    INNER JOIN tbl_patient ON tbl_medical_record.id_patient = tbl_patient.id_patient
                                    INNER JOIN tbl_doctor ON tbl_medical_record.id_doctor = tbl_doctor.id_doctor
                                    INNER JOIN tbl_poly ON tbl_medical_record.id_poly = tbl_poly.id_poly";
                                    $sql_mr = mysqli_query($db, $query);
                                    while ($data = mysqli_fetch_array($sql_mr)) {
                                        ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= tgl_indo ($data['check_up']) ?></td>
                                        <td><?= $data['fullname'] ?></td>
                                        <td><?= $data['illness'] ?></td>
                                        <td><?= $data['name_doctor'] ?></td>
                                        <td><?= $data['diagnosis'] ?></td>
                                        <td><?= $data['name_poly'] ?></td>
                                        <td>
                                            <?php
                                            $sql_obat = mysqli_query($db, "SELECT * FROM tbl_hospital_medicine JOIN tbl_medicine ON tbl_hospital_medicine.id_medicine = tbl_medicine.id_medicine WHERE id_hospital = '$data[id_hospital]'");
                                            while ($data_obat = mysqli_fetch_array($sql_obat)) {
                                                echo $data_obat['name_medicine']."<br>";
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <a href="edit.php?id=<?= $data['id_hospital'] ?>"
                                                class="btn btn-warning btn-xs">Edit</a>
                                            <a href="delete.php?id=<?= $data['id_hospital'] ?>"
                                                class="btn btn-danger btn-xs" onclick="return confirm('Are you sure ?')">Delete</a>
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
    <!-- Footer Start -->
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>