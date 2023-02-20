<!-- PHP -->
<?php
require '../function.php';
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
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
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
                                $medicines = mysqli_query($db, "SELECT * FROM tbl_medicine");
                                if (mysqli_num_rows($medicines) > 0) {
                                ?>
                                    <?php $i=1; ?>
                                    <?php foreach($medicines as $medicine) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $medicine["name_medicine"]; ?></td>
                                        <td><?= $medicine["description_medicine"]; ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                <?php
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