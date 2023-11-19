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
            <h1>Dashboard</h1>
        </div>
        <h3>Welcome to Medisync <b><?= $_SESSION['name_owner'] ?></b></h3>
        <section class="section dashboard my-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex gap-4 py-4 px-3">
                                        <i class="bi bi-people rounded-circle fs-1 py-1 px-3 text-danger" style="background-color: rgba(255, 99, 132, 0.2);"></i></i>
                                        <div class="d-block">
                                            <h2 class="fw-bolder">
                                                <?php
                                                $sql = "SELECT * FROM tbl_patient";
                                                $query = mysqli_query($db, $sql);
                                                $count = mysqli_num_rows($query);
                                                echo "$count";
                                                ?>
                                            </h2>
                                            <h6 class="text-secondary">Patients</h6>
                                        </div>
                                    </div>
                                    <a href="../owner/dataPatient.php" class="btn btn-primary w-100">Patients</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex gap-4 py-4 px-3">
                                        <i class="fa fa-user-md rounded-circle fs-1 py-3 px-4 text-success" style="background-color: rgba(99, 255, 86, 0.2);"></i></i>
                                        <div class="d-block">
                                            <h2 class="fw-bolder">
                                                <?php
                                                $sql = "SELECT * FROM tbl_doctor";
                                                $query = mysqli_query($db, $sql);
                                                $count = mysqli_num_rows($query);
                                                echo "$count";
                                                ?>
                                            </h2>
                                            <h6 class="text-secondary">Doctors</h6>
                                        </div>
                                    </div>
                                    <a href="../owner/dataDoctor.php" class="btn btn-primary w-100">Doctors</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex gap-4 py-4 px-3">
                                        <i class="fa fa-medkit rounded-circle fs-1 py-3 px-3 text-warning" style="background-color: rgba(255, 205, 86, 0.2);"></i></i>
                                        <div class="d-block">
                                            <h2 class="fw-bolder">
                                                <?php
                                                $sql = "SELECT * FROM tbl_medicine";
                                                $query = mysqli_query($db, $sql);
                                                $count = mysqli_num_rows($query);
                                                echo "$count";
                                                ?>
                                            </h2>
                                            <h6 class="text-secondary">Medicines</h6>
                                        </div>
                                    </div>
                                    <a href="../owner/dataMedicine.php" class="btn btn-primary w-100">Medicines</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex gap-4 py-4 px-3">
                                        <i class="bi bi-bounding-box rounded-circle fs-1 py-1 px-3 text-primary" style="background-color: rgba(54, 162, 235, 0.2);"></i></i>
                                        <div class="d-block">
                                            <h2 class="fw-bolder">
                                                <?php
                                                $sql = "SELECT * FROM tbl_poly";
                                                $query = mysqli_query($db, $sql);
                                                $count = mysqli_num_rows($query);
                                                echo "$count";
                                                ?>
                                            </h2>
                                            <h6 class="text-secondary">Polys</h6>
                                        </div>
                                    </div>
                                    <a href="../owner/dataPoly.php" class="btn btn-primary w-100">Polys</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex gap-4 py-4 px-3">
                                        <i class="fa fa-hospital-o rounded-circle fs-1 py-3 px-4 text-dark" style="background-color: rgba(200, 200, 250, 0.2);"></i></i>
                                        <div class="d-block">
                                            <h2 class="fw-bolder">
                                                <?php
                                                $sql = "SELECT * FROM tbl_specialist";
                                                $query = mysqli_query($db, $sql);
                                                $count = mysqli_num_rows($query);
                                                echo "$count";
                                                ?>
                                            </h2>
                                            <h6 class="text-secondary">Specialist</h6>
                                        </div>
                                    </div>
                                    <a href="../owner/dataSpecialist.php" class="btn btn-primary w-100">Specialist</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex gap-4 py-4 px-3">
                                        <i class="bi bi-diagram-2 rounded-circle fs-1 py-1 px-3 text-white" style="background-color: rgba(108, 117, 125, 0.2);"></i></i>
                                        <div class="d-block">
                                            <h2 class="fw-bolder">
                                                <?php
                                                $sql = "SELECT * FROM tbl_medical_record";
                                                $query = mysqli_query($db, $sql);
                                                $count = mysqli_num_rows($query);
                                                echo "$count";
                                                ?>
                                            </h2>
                                            <h6 class="text-secondary">Medical Records</h6>
                                        </div>
                                    </div>
                                    <a href="../owner/dataMedicalRecord.php" class="btn btn-primary w-100">Medical Records</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex gap-4 py-4 px-3">
                                        <i class="bi bi-person rounded-circle fs-1 py-1 px-3 text-info" style="background-color: rgba(13, 202, 240, 0.2);"></i></i>
                                        <div class="d-block">
                                            <h2 class="fw-bolder">
                                                <?php
                                                $sql = "SELECT * FROM tbl_admin";
                                                $query = mysqli_query($db, $sql);
                                                $count = mysqli_num_rows($query);
                                                echo "$count";
                                                ?>
                                            </h2>
                                            <h6 class="text-secondary">Admins</h6>
                                        </div>
                                    </div>
                                    <a href="../owner/dataAdmin.php" class="btn btn-primary w-100">Admins</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Left Side Start -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Chart Start -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Chart Medisync</h5>
                                    <canvas id="barChart" style="max-height: 900; display: block; box-sizing: border-box; height: 244px; width: 488px;" width="976" height="488"></canvas>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new Chart(document.querySelector('#barChart'), {
                                                type: 'bar',
                                                data: {
                                                    labels: ['Patient', 'Doctor', 'Medicine', 'Poly',
                                                        'Specialist', 'Medical Record', 'Admin'
                                                    ],
                                                    datasets: [{
                                                        label: 'Medisync',
                                                        data: [
                                                            <?php
                                                            $patients = mysqli_query($db, "SELECT * FROM tbl_patient");
                                                            echo mysqli_num_rows($patients);
                                                            ?>,
                                                            <?php
                                                            $doctors = mysqli_query($db, "SELECT * FROM tbl_doctor");
                                                            echo mysqli_num_rows($doctors);
                                                            ?>,
                                                            <?php
                                                            $medicines = mysqli_query($db, "SELECT * FROM tbl_medicine");
                                                            echo mysqli_num_rows($medicines);
                                                            ?>,
                                                            <?php
                                                            $polys = mysqli_query($db, "SELECT * FROM tbl_poly");
                                                            echo mysqli_num_rows($polys);
                                                            ?>,
                                                            <?php
                                                            $specialists = mysqli_query($db, "SELECT * FROM tbl_specialist");
                                                            echo mysqli_num_rows($specialists);
                                                            ?>,
                                                            <?php
                                                            $medicalRecords = mysqli_query($db, "SELECT * FROM tbl_medical_record");
                                                            echo mysqli_num_rows($medicalRecords);
                                                            ?>,
                                                            <?php
                                                            $admins = mysqli_query($db, "SELECT * FROM tbl_admin");
                                                            echo mysqli_num_rows($admins);
                                                            ?>
                                                        ],
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(99, 255, 86, 0.2)',
                                                            'rgba(255, 205, 86, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(200, 200, 250, 0.2)',
                                                            'rgba(108, 117, 125, 0.2)',
                                                            'rgba(13, 202, 240, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgb(255, 99, 132)',
                                                            'rgb(99, 255, 86)',
                                                            'rgb(255, 205, 86)',
                                                            'rgb(54, 162, 235)',
                                                            'rgb(200, 200, 250)',
                                                            'rgb(108, 117, 125)',
                                                            'rgb(13, 202, 240)'
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true
                                                        }
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <!-- Chart End -->
                        </div>
                    </div>
                </div>
                <!-- Left Side Start -->
                <!-- Right Side Start -->
                <div class="col-lg-4">
                </div>
                <!-- Right Side End -->
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partialsOwner/footer.php' ?>
    <!-- Footer End -->
</body>

</html>