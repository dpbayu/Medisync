<!-- PHP -->
<?php
session_start();
require "include/db.php";

if (isset($_POST['login'])) {
    $nip = mysqli_escape_string($db, $_POST['nip']);
    $password = mysqli_escape_string($db, $_POST['password']);
        $sql = "SELECT * FROM doctor WHERE nip = '$nip'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) === 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['nip'] = $row['nip'];
                    $_SESSION['ktp'] = $row['ktp'];
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['birth_place'] = $row['birth_place'];
                    $_SESSION['birth_date'] = $row['birth_date'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['poly'] = $row['poly'];
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['blood_type'] = $row['blood_type'];
                    $_SESSION['marital_status'] = $row['marital_status'];
                    $_SESSION['doctor_profile'] = $row['doctor_profile'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION["login"] = true;
                    header("Location: doctor/index.php");
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
<?php require "partials/head.php" ?>
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
                                    <h5 class="card-title text-center pb-0 fs-4">Login Doctor</h5>
                                    <p class="text-center small">Enter your NIP & password to login</p>
                                </div>
                                <form action="" method="POST" class="row g-3 needs-validation">
                                    <div class="col-12">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" name="nip" class="form-control" id="nip">
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
                                    <div>
                                        <a href="index.php">Login as admin</a>
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