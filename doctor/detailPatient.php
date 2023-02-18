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
        <section class="p-5 border">
            <!-- Title Start -->
            <div class="pagetitle mb-5">
                <h1 class="text-center">Data Patient <?= $user["fullname"] ?></h1>
            </div>
            <!-- Title End -->
            <div class="row d-flex px-5">
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Fullname</label>
                        <p>: <?= $user["fullname"] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Username</label>
                        <p>: <?= $user["username"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex px-5">
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Birth Place & Date</label>
                        <p>: <?= $user["birth_place"] ?>, <?= date("j F Y", strtotime($user['birth_date'])) ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Gender</label>
                        <p>: <?= $user["gender"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex px-5">
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Blood Type</label>
                        <p>: <?= $user["blood_type"] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Work</label>
                        <p>: <?= $user["work"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex px-5">
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Address</label>
                        <p>: <?= $user["address"] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">City</label>
                        <p>: <?= $user["city"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex px-5">
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Religion</label>
                        <p>: <?= $user["religion"] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Marital Status</label>
                        <p>: <?= $user["marital_status"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex px-5">
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Phone</label>
                        <p>: <?= $user["phone"] ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">Room</p>
                    <div class="d-flex">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <label class="w-50 fw-bold">Type</label>
                                <p>: <?= $user["type_room"] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <label class="w-50 fw-bold">Number</label>
                                <p>: <?= $user["room_number"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex px-5">
                <div class="col-md-12">
                    <div class="d-flex">
                        <label class="fw-bold w-25">Diagnosis</label>
                        <p>: <?= $user["diagnosis"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex px-5">
                <div class="col-md-12">
                    <div class="d-flex">
                        <label class="fw-bold w-25">Complication</label>
                        <p>: <?= $user["complication"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex px-5">
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Infection</label>
                        <p>: <?= $user["infection"] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Cause of Infection</label>
                        <p>: <?= $user["cause_of_infection"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex px-5">
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Exit Condition</label>
                        <p>: <?= $user["exit_condition"] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex">
                        <label class="w-50 fw-bold">Way Out</label>
                        <p>: <?= $user["way_out"] ?></p>
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