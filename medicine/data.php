<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'medicine';
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
            <h1>Data Medicine</h1>
        </div>
        <div class="d-flex gap-1 mb-3">
            <a href="#" class="btn btn-outline-dark"><i class="ri-refresh-fill"></i></a>
            <a href="add.php" class="btn btn-primary">Add data</a>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <form class="d-flex gap-2" action="" method="POST">
                        <div class="form-group">
                            <input type="text" name="pencarian" class="form-control" placeholder="Pencarian data">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><span class="bi bi-search"
                                    aria-hidden="true"></span></button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name Medicine</th>
                                    <th>Description</th>
                                    <th><i class="bi bi-joystick"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $medicine = mysqli_query($db, "SELECT * FROM tbl_medicine");
                                if (mysqli_num_rows($medicine) > 0) {
                                    while ($data = mysqli_fetch_array($medicine)) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['name_medicine'] ?></td>
                                    <td><?= $data['description_medicine'] ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-warning btn-xs" href="edit.php?id=<?= $data['id_medicine'] ?>"><i
                                                class="ri-edit-2-line"></i></a>
                                        <a class="btn btn-danger btn-xs" href="delete.php?id=<?= $data['id_medicine'] ?>"
                                            onclick="return confirm('Are you sure ?')"><i
                                                class=" ri-chat-delete-line"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan=\"4\" align=\"center\">Data not found<td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>