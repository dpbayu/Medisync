<!-- PHP -->
<?php
session_start();
require "include/db.php";

if (isset($_SESSION["login"])) {
    header("Location: index.html");
    exit;
}

if (isset($_POST['login'])) {
    $username = mysqli_escape_string($db, $_POST['username']);
    $password = mysqli_escape_string($db, $_POST['password']);
        $sql = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) === 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['nik'] = $row['nik'];
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['admin_profile'] = $row['admin_profile'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION["login"] = true;
                    header("Location: admin/index.php");
                    exit();
                }
            }
        }
        $error = true;
    }
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require "admin/partials/head.php" ?>
<!-- Head End -->

<body>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">NiceAdmin</span>
                            </a>
                        </div><!-- End Logo -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>
                                <form action="" method="POST" class="row g-3 needs-validation">
                                    <div class="col-12">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control" id="username">
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true"
                                                id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>