<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$admins = query("SELECT * FROM tbl_admin ORDER BY name_admin ASC");
$page = 'admin';
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
            <h1>Data Admin</h1>
        </div>
        <?php
            if (isset($_GET['success'])) {
                $msg = $_GET['success'];
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>'.$msg.'</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if (isset($_GET['failed'])) {
                $msg = $_GET['failed'];
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>'.$msg.'</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-7">
                    <form action="function.php" method="POST">
                        <div class="form-group mb-3">
                            <label class="form-label" for="name_admin">Name Admin</label>
                            <input class="form-control" type="text" id="name_admin" name="name_admin"
                                placeholder="Input name admin" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="email_admin">Email Admin</label>
                            <input class="form-control" type="email" id="email_admin" name="email_admin"
                                placeholder="Input email admin" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="password_admin">Password</label>
                            <input class="form-control" type="password" id="password_admin" name="password_admin"
                                placeholder="Input password" required>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="addAdmin">Add data</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <div class="table">
                        <form action="" method="POST" name="process">
                            <table class="table table-bordered table-hover" id="admin">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($admins as $admin) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $admin['name_admin'] ?></td>
                                        <td><?= $admin['email_admin'] ?></td>
                                        <td class="text-center">
                                            <a onclick="return confirm('Are you sure delete this data ?')"
                                                href="deleteAdmin.php?id=<?= $admin['id_user'] ?>"
                                                class="btn btn-danger">
                                                Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- JS Start -->
    <script>
        // Data Tables
        $(document).ready(function () {
            $('#admin').DataTable({
                columnDefs: [{
                    targets: '_all',
                    visible: true
                }]
            });
        });
    </script>
    <!-- JS End -->
    <!-- Footer Start -->
    <?php require '../partialsOwner/footer.php' ?>
    <!-- Footer End -->
</body>

</html>