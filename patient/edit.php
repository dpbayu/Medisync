<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'doctor';
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
            <h1>Edit Data Patient</h1>
        </div>
        <div class="d-flex gap-1 mb-3">
            <a href="data.php" class="btn btn-secondary">Back</a>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <form action="function.php" method="POST">
                        <?php
                        $id = @$_GET['id'];
                        $sql_pasien = mysqli_query($db, "SELECT * FROM tbl_patient WHERE id_patient = '$id'");
                        $data = mysqli_fetch_array($sql_pasien);
                        ?>
                        <div class="form-group mb-3">
                            <label for="nik">NIK Patient</label>
                            <input type="hidden" name="id" value="<?= $data['id_patient'] ?>">
                            <input type="number" id="nik" name="nik" class="form-control" value="<?= $data['nik'] ?>"
                                required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label for="fullname">Fullname</label>
                            <input type="text" id="fullname" name="fullname" class="form-control"
                                value="<?= $data['fullname'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender">Gender</label>
                            <div class="d-flex gap-3">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="L"
                                        <?= $data['gender'] == "L" ? "checked" : null ?> required> Laki-laki
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="P"
                                        <?= $data['gender'] == "P" ? "checked" : null ?> required> Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="number" id="phone" name="phone" class="form-control"
                                value="<?= $data['phone'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" class="form-control"
                                required><?= $data['address'] ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="edit" value="Simpan">Simpan</button>
                        </div>
                    </form>
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