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
            <h1>Dashboard</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left Side Start -->
                <div class="col-lg-8">
                    <div class="row">
                        <h1>Welcome to E-CURE <?= $_SESSION['name_admin'] ?></h1>
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
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>