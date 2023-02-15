<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
require "function.php";
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
        <section class="section d-flex flex-column justify-content-center">
            <!-- Title Start -->
            <div class="pagetitle">
                <h1 class="text-center">Data Patient <?= $user["fullname"] ?></h1>
            </div>
            <!-- Title End -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="d-flex ms-5">
                        <label class="w-50">Fullname</label>
                        <p>: <?= $user["fullname"] ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex ms-5">
                        <label class="w-50">Username</label>
                        <p>: <?= $user["username"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="d-flex ms-5">
                        <label class="w-50">Birth Place & Date</label>
                        <p>: <?= $user["birth_place"] ?>, <?= date("j F Y", strtotime($user['birth_date'])) ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex ms-5">
                        <label class="w-50">Gender</label>
                        <p>: <?= $user["gender"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="d-flex ms-5">
                        <label class="w-50">Blood Type</label>
                        <p>: <?= $user["blood_type"] ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex ms-5">
                        <label class="w-50">Work</label>
                        <p>: <?= $user["work"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="d-flex ms-5">
                        <label class="w-50">Address</label>
                        <p>: <?= $user["address"] ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex ms-5">
                        <label class="w-50">City</label>
                        <p>: <?= $user["city"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="d-flex ms-5">
                        <label class="w-50">Religion</label>
                        <p>: <?= $user["religion"] ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex ms-5">
                        <label class="w-50">Marital Status</label>
                        <p>: <?= $user["marital_status"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="d-flex ms-5">
                        <label class="w-50">Phone</label>
                        <p>: <?= $user["phone"] ?></p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="d-flex ms-5">
                        <label class="w-50">Type Room</label>
                        <p>: <?= $user["type_room"] ?></p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="d-flex ms-3">
                        <label class="w-50">Room Number</label>
                        <p>: <?= $user["room_number"] ?></p>
                    </div>
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