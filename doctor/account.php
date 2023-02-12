<!-- PHP Start -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../loginDoctor.php");
    exit;
}
$page="account";
require "../function.php";
if (isset($_POST["update"])) {
    if (update_doctor($_POST) > 0) {
        echo "<script>document.location.href = 'account.php';</script>";
    } else {
        echo "<script>document.location.href = 'account.php';</script>";    
    }
}
?>
<!-- PHP End -->

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
    <main id="main" class="main" style="height: 84vh">
        <!-- Title Start -->
        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div>
        <!-- Title End -->
        <section class="section dashboard">
            <div class="row">
                <!-- Content Start -->
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname"
                                value="<?= $_SESSION["fullname"] ?>">
                            <label for="fullname">Fullname</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"
                                value="<?= $_SESSION["phone"] ?>">
                            <label for="phone">Phone</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" id="address" name="address" placeholder="Address"
                                style="height: 100px;"><?= $_SESSION["address"] ?></textarea>
                            <label for="address">Address</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="profil">Profile</label><br>
                        <img src="assets/img/<?php echo $_SESSION['doctor_profile'] ?>" class="rounded-circle mb-2"
                            height="200" width="200">
                        <div class="form-group">
                            <input type="file" class="form-control" id="profile" name="doctor_profile">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" name="update" class="btn btn-primary mt-3">Update</button>
                    </div>
                </form>
                <!-- Content End -->
        </section>
    </main>
    <!-- Content End -->
    <!-- Footer Start -->
    <?php require "partials/footer.php" ?>
    <!-- Footer End -->
</body>

</html>