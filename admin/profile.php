<!-- PHP -->
<?php
require '../function.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'profile';
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
            <h1>Profile</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
            <?php
                    if (isset($_GET['success'])) {
                        $msg = $_GET['success'];
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>'.$msg.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    ?>
                <form class="forms-sample" action="function.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label" for="fullname">Fullname</label>
                        <input class="form-control" type="text" id="fullname" name="fullname"
                            value="<?php echo $_SESSION['fullname'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" id="username" name="username"
                            value="<?php echo $_SESSION['username'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" id="password" name="password">
                    </div>
                    <img src="img/<?php echo $_SESSION['user_profile'] ?>" class="rounded-circle" height="200"
                        width="200">
                    <div class="form-group mb-3">
                        <label class="form-label" for="profil">Profile</label>
                        <input class="form-control" type="file" id="profile" name="user_profile">
                    </div>
                    <button type="submit" name="update" class="btn btn-success me-2">Update</button>
                </form>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>