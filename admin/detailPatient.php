<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
require "../function.php";
$page = "patient";
$id = $_GET["id"];
$users = query("SELECT * FROM user WHERE id = $id");
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
        <?php foreach($users as $user) : ?>
        <!-- Title Start -->
        <div class="pagetitle">
            <h1 class="text-center">Data Patient <?= $user["fullname"] ?></h1>
        </div>
        <!-- Title End -->
        <section class="section dashboard">
            <div class="row">
                <div class="d-flex">
                    <label class="col-md-2">KTP</label>
                    <p>: <?= $user["ktp"] ?></p>
                </div>
                <div class="d-flex">
                    <label class="col-md-2">Username</label>
                    <p>: <?= $user["username"] ?></p>
                </div>
                <div class="d-flex">
                    <label class="col-md-2">Fullname</label>
                    <p>: <?= $user["fullname"] ?></p>
                </div>
                <div class="d-flex">
                    <label class="col-md-2">Gender</label>
                    <p>: <?= $user["gender"] ?></p>
                </div>
                <div class="d-flex">
                    <label class="col-md-2">Birth place, date</label>
                    <p>: <?= $user["birth_place"] ?>, <?= date("j F Y", strtotime($user['birth_date'])) ?></p>
                </div>
                <div class="d-flex">
                    <label class="col-md-2">Address</label>
                    <p>: <?= $user["address"] ?></p>
                </div>
                <div class="d-flex">
                    <label class="col-md-2">City</label>
                    <p>: <?= $user["city"] ?></p>
                </div>
                <div class="d-flex">
                    <label class="col-md-2">Blood Type</label>
                    <p>: <?= $user["blood_type"] ?></p>
                </div>
                <div class="d-flex">
                    <label class="col-md-2">Phone</label>
                    <p>: <?= $user["phone"] ?></p>
                </div>
                <div class="d-flex">
                    <label class="col-md-2">Marital Status</label>
                    <p>: <?= $user["marital_status"] ?></p>
                </div>
                <div class="d-flex">
                    <label class="col-md-2">Work</label>
                    <p>: <?= $user["work"] ?></p>
                </div>
            </div>
        </section>
        <?php endforeach; ?>
    </main>
    <!-- Content End -->
    <!-- Footer Start -->
    <?php require "partials/footer.php" ?>
    <!-- Footer End -->
</body>

</html>