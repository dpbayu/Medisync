<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../loginDoctor.php");
    exit;
}
require "function.php";
$page = "profile";
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require "partials/head.php" ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require "partials/header.php" ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require "partials/sidebar.php" ?>
    <!-- Sidebar End -->
    <!-- Content Start -->
    <main id="main" class="main">
        <!-- Title Start -->
        <div class="pagetitle">
            <h1 class="text-center">Profile Doctor <?php echo $_SESSION['fullname'] ?></h1>
        </div>
        <!-- Title End -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-7">
                    <div class="d-flex">
                        <label class="col-md-5">NIP</label>
                        <p>: <?php echo $_SESSION['nip'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label class="col-md-5">KTP</label>
                        <p>: <?php echo $_SESSION['ktp'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label class="col-md-5">Fullname</label>
                        <p>: <?php echo $_SESSION['fullname'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label class="col-md-5">Gender</label>
                        <p>: <?php echo $_SESSION['gender'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label class="col-md-5">Birth place, date</label>
                        <p>: <?php echo $_SESSION['birth_place'] ?>, <?php echo date("j F Y", strtotime($_SESSION['birth_date'])) ?></p>
                    </div>
                    <div class="d-flex">
                        <label class="col-md-5">Address</label>
                        <p>: <?php echo $_SESSION['address'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label class="col-md-5">Spesialis</label>
                        <p>: <?php echo $_SESSION['spesialis'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label class="col-md-5">Blood Type</label>
                        <p>: <?php echo $_SESSION['blood_type'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label class="col-md-5">Phone</label>
                        <p>: <?php echo $_SESSION['phone'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label class="col-md-5">Marital Status</label>
                        <p>: <?php echo $_SESSION['marital_status'] ?></p>
                    </div>
                    <div class="d-flex">
                        <label class="col-md-5">Role</label>
                        <p>: <?php echo $_SESSION['role'] ?></p>
                    </div>
                </div>
                <div class="col-md-5 d-flex justify-content-center">
                    <img class="rounded-circle" src="assets/img/<?= $_SESSION['doctor_profile'] ?>" height="400" width="400">
                </div>
            </div>
        </section>
    </main>
    <!-- Content End -->
    <!-- Footer Start -->
    <?php require "partials/footer.php" ?>
    <!-- Footer End -->
</body>

</html>