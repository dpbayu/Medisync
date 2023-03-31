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
            <h1>Dashboard</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left Side Start -->
                <div class="col-lg-6">
                    <div class="row">
                        <h2>Welcome to E-CURE <?= $_SESSION['name_admin'] ?></h2>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Chart E-CURE</h5>
                                    <!-- Chart Start -->
                                    <canvas id="barChart"
                                        style="max-height: 900; display: block; box-sizing: border-box; height: 244px; width: 488px;"
                                        width="976" height="488"></canvas>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new Chart(document.querySelector('#barChart'), {
                                                type: 'bar',
                                                data: {
                                                    labels: ['Patient', 'Doctor', 'Medicine', 'Poly',
                                                        'Specialist'
                                                    ],
                                                    datasets: [{
                                                        label: 'E-CURE',
                                                        data: [
                                                            <?php 
                                                            $patients = mysqli_query($db,"SELECT * FROM tbl_patient");
                                                            echo mysqli_num_rows($patients);
                                                            ?>,
                                                            <?php 
                                                            $doctors = mysqli_query($db,"SELECT * FROM tbl_doctor");
                                                            echo mysqli_num_rows($doctors);
                                                            ?>,
                                                            <?php 
                                                            $medicines = mysqli_query($db,"SELECT * FROM tbl_medicine");
                                                            echo mysqli_num_rows($medicines);
                                                            ?>,
                                                            <?php 
                                                            $polys = mysqli_query($db,"SELECT * FROM tbl_poly");
                                                            echo mysqli_num_rows($polys);
                                                            ?>,
                                                            <?php 
                                                            $specialists = mysqli_query($db,"SELECT * FROM tbl_specialist");
                                                            echo mysqli_num_rows($specialists);
                                                            ?>
                                                            ],
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)',
                                                            'rgba(255, 205, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(201, 203, 207, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgb(255, 99, 132)',
                                                            'rgb(255, 159, 64)',
                                                            'rgb(255, 205, 86)',
                                                            'rgb(75, 192, 192)',
                                                            'rgb(54, 162, 235)',
                                                            'rgb(153, 102, 255)',
                                                            'rgb(201, 203, 207)'
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
                                    <!-- Chart End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Left Side Start -->
                <!-- Right Side Start -->
                <div class="col-lg-4">
                    <h1>Hello World!</h1>
                </div>
                <!-- Right Side End -->
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partialsAdmin/footer.php' ?>
    <!-- Footer End -->
</body>

</html>