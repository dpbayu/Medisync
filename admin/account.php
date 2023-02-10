<!-- PHP Start -->
<?php
$page="account";
require "../function.php";
if (isset($_POST["update"])) {
    if (update($_POST) > 0) {
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
                <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="NIK">NIK</label>
                        <input type="text" class="form-control" id="NIK" name="nik"
                            value="<?php echo $_SESSION['nik'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?php echo $_SESSION['username'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" id="fullname" name="fullname"
                            value="<?php echo $_SESSION['fullname'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <label for="profil">Profile</label><br>
                    <img src="assets/img/<?php echo $_SESSION['admin_profile'] ?>" class="rounded-circle mb-2"
                        height="200" width="200">
                    <div class="form-group">
                        <input type="file" class="form-control" id="profile" name="admin_profile">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary mt-3">Update</button>
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