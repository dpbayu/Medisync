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
                    $_SESSION['id_user'] = $value['id_user'];
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
    <title>Dashboard - Medisync</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Vendor CSS Files Start -->
    <!-- Google Fonts Start -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Google Fonts End -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Datables Start -->
    <link rel="stylesheet" type="text/css" href="../assets/libs/dataTables/datatables.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Datables End -->
    <!-- Select Start -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/i18n/id.js" type="text/javascript"></script>
    <!-- Select End -->
    <!-- MDB Start -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB End -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Vendor CSS Files End -->
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
                                    <span class="d-none d-lg-block">Medisync</span>
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
                                            <button class="btn btn-primary w-100" type="submit"
                                                name="login">Login</button>
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
    <script src="assets/js/main.js"></script>
    <!-- JS End -->
</body>

</html>