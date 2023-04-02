<!-- PHP -->
<?php
require 'function.php';
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($db, "SELECT * FROM tbl_user WHERE email = '$email'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result)['role'];
        if ($row == 'Admin') {
            $patient = mysqli_query($db, "SELECT * FROM tbl_admin WHERE email_admin = '$email'");
            if (mysqli_num_rows($patient) === 1) {
                $value = mysqli_fetch_assoc($patient);
                if (password_verify($password, $value["password_admin"])) {
                    $_SESSION['id_user'] = $value['id_user'];
                    $_SESSION['name_admin'] = $value['name_admin'];
                    $_SESSION['email_admin'] = $value['email_admin'];
                    $_SESSION['profile_admin'] = $value['profile_admin'];
                    $_SESSION['role'] = $value['role'];
                    $_SESSION["login"] = true;
                    header("Location: admin/index.php");
                    exit;
                } else {
                    $error = true;
                }
            }
        } else if ($row == 'Doctor') {
            $doctor = mysqli_query($db, "SELECT * FROM tbl_doctor WHERE email_doctor = '$email'");
            if (mysqli_num_rows($doctor) === 1) {
                $value = mysqli_fetch_assoc($doctor);
                if (password_verify($password, $value["password_doctor"])) {
                    $_SESSION['id_doctor'] = $value['id_doctor'];
                    $_SESSION['name_doctor'] = $value['name_doctor'];
                    $_SESSION['email_doctor'] = $value['email_doctor'];
                    $_SESSION['specialist_doctor'] = $value['specialist_doctor'];
                    $_SESSION['address_doctor'] = $value['address_doctor'];
                    $_SESSION['phone_doctor'] = $value['phone_doctor'];
                    $_SESSION['profile_doctor'] = $value['profile_doctor'];
                    $_SESSION['role'] = $value['role'];
                    $_SESSION["login"] = true;
                    header("Location: doctor/index.php");
                    exit;
                } else {
                    $error = true;
                }
            }
        } else if ($row == 'Owner') {
            $owner = mysqli_query($db, "SELECT * FROM tbl_owner WHERE email_owner = '$email'");
            if (mysqli_num_rows($owner) === 1) {
                $value = mysqli_fetch_assoc($owner);
                if (password_verify($password, $value["password_owner"])) {
                    $_SESSION['id_user'] = $value['id_user'];
                    $_SESSION['name_owner'] = $value['name_owner'];
                    $_SESSION['email_owner'] = $value['email_owner'];
                    $_SESSION['profile_owner'] = $value['profile_owner'];
                    $_SESSION['role'] = $value['role'];
                    $_SESSION["login"] = true;
                    header("Location: owner/index.php");
                    exit;
                } else {
                    $error = true;
                }
            }
        }
    }
    $error = true;
}
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>E-CURE</title>
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Main Start -->
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <!-- Logo Start -->
                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">E-CURE</span>
                                </a>
                            </div>
                            <!-- Logo End -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                        <p class="text-center small">Enter your email & password to login</p>
                                    </div>
                                    <!-- Message Failed Start -->
                                    <?php if(isset($error)) : ?>
                                    <p style="color: red; font-style: italic;">Email / password wrong</p>
                                    <?php endif; ?>
                                    <!-- Message Failed End -->
                                    <!-- Form Start -->
                                    <form action="" method="POST" class="row g-3 needs-validation">
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control" id="email" required
                                                autofocus>
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit"
                                                name="login">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="pages-register.html">Create an account</a></p>
                                        </div>
                                    </form>
                                    <!-- Form End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- Main End -->
    <!-- JS Start -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- JS End -->
</body>

</html>