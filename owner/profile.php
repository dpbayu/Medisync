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
<?php require '../partialsOwner/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partialsOwner/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partialsOwner/sidebar.php' ?>
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
                <div class="col-md-6">
                    <form class="forms-sample" action="function.php" method="POST" enctype="multipart/form-data">
                        <img src="img/<?php echo $_SESSION['profile_owner'] ?>" class="rounded-circle" height="200"
                            width="200">
                        <div class="form-group mb-3">
                            <label class="form-label" for="profil">Profile</label>
                            <input class="form-control" type="file" id="profile" name="profile_owner">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Fullname</label>
                            <input class="form-control" type="text" id="name" name="name_owner"
                                value="<?php echo $_SESSION['name_owner'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="text" id="email" name="email_owner"
                                value="<?php echo $_SESSION['email_owner'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="password" id="password" name="password_owner">
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
                            <td class="text-center"><img src="img/<?php echo $_SESSION['profile_owner'] ?>"
                                    class="rounded-circle" alt="profile patient" width="100" height="100">
                            </td>
                        </tr>
                        <tr>
                            <td>Fullname</td>
                            <td><?php echo $_SESSION['name_owner'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $_SESSION['email_owner'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partialsOwner/footer.php' ?>
    <!-- Footer End -->
</body>

</html>