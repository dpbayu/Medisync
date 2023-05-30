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
<?php require '../partialsDoctor/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partialsDoctor/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partialsDoctor/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
        </div>
        <section class="section dashboard" style="height: 75vh;">
            <div class="col-md-12">
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
                    <div class="col-md-6">
                        <form class="forms-sample" action="function.php" method="POST" enctype="multipart/form-data">
                            <img src="img/<?php echo $_SESSION['profile_doctor'] ?>" class="rounded-circle" height="200"
                                width="200">
                            <div class="form-group mb-3">
                                <label class="form-label" for="profil">Profile</label>
                                <input class="form-control" type="file" id="profile" name="profile_doctor">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Fullname</label>
                                <input class="form-control" type="text" id="name" name="name_doctor"
                                    value="<?php echo $_SESSION['name_doctor'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="text" id="email" name="email_doctor"
                                    value="<?php echo $_SESSION['email_doctor'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password_doctor">
                            </div>
                            <button type="submit" name="update" class="btn btn-success me-2">Update</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2" class="text-center fw-bold">My Detail</th>
                            </tr>
                            <tr>
                                <td class="w-50">Profile</td>
                                <td class="text-center"><img src="img/<?php echo $_SESSION['profile_doctor'] ?>"
                                        class="rounded-circle" alt="profile patient" width="100" height="100">
                                </td>
                            </tr>
                            <tr>
                                <td>Fullname</td>
                                <td><?php echo $_SESSION['name_doctor'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $_SESSION['email_doctor'] ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo $_SESSION['address_doctor'] ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><?php echo $_SESSION['phone_doctor'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partialsDoctor/footer.php' ?>
    <!-- Footer End -->
</body>

</html>