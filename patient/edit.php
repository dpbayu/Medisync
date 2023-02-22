<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'patient';
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
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <form action="function.php" method="POST">
                        <?php
                        $id = @$_GET['id'];
                        $sql_patient = mysqli_query($db, "SELECT * FROM tbl_patient WHERE id_patient = '$id'");
                        $data = mysqli_fetch_array($sql_patient);
                        ?>
                        <div class="form-group mb-3">
                            <label for="nik_patient">NIK Patient</label>
                            <input type="hidden" name="id" value="<?= $data['id_patient'] ?>">
                            <input type="number" id="nik_patient" name="nik_patient" class="form-control" value="<?= $data['nik_patient'] ?>"
                                required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_patient">Name Patient</label>
                            <input type="text" id="name_patient" name="name_patient" class="form-control"
                                value="<?= $data['name_patient'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender_patient">Gender</label>
                            <div class="d-flex gap-3">
                                <label class="radio-inline">
                                    <input type="radio" name="gender_patient" id="gender_patient" value="Pria"
                                        <?= $data['gender_patient'] == "Pria" ? "checked" : null ?> required> Pria
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender_patient" value="Wanita"
                                        <?= $data['gender_patient'] == "Wanita" ? "checked" : null ?> required> Wanita
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_patient">Phone</label>
                            <input type="number" id="phone_patient" name="phone_patient" class="form-control"
                                value="<?= $data['phone_patient'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address_patient">Address</label>
                            <textarea id="address_patient" name="address_patient" class="form-control"
                                required><?= $data['address_patient'] ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="edit">Update</button>
                            <a href="data.php" class="btn btn-secondary">Back</a>
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