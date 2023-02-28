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
<?php require '../admin/partials/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../admin/partials/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../admin/partials/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Data Doctor</h1>
        </div>
        <div class="d-flex gap-1 mb-3">
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $id = @$_GET['id'];
                    $sql = mysqli_query($db, "SELECT * FROM tbl_doctor WHERE id_doctor = '$id'");
                    $data = mysqli_fetch_array($sql)
                    ?>
                    <form action="function.php" method="POST">
                        <div class="form-group mb-3">
                            <label class="form-label" for="fullname">Name Doctor</label>
                            <input class="form-control" type="hidden" name="id" value="<?= $data['id_doctor'] ?>">
                            <input class="form-control" type="text" id="fullname" name="name_doctor" value="<?= $data['name_doctor'] ?>"
                                require autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="specialist_doctor">Specialist</label>
                            <input class="form-control" type="text" id="specialist_doctor" name="specialist_doctor"
                                value="<?= $data['specialist_doctor'] ?>" require>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="phone_doctor">Phone</label>
                            <input class="form-control" type="number" id="phone_doctor" name="phone_doctor"
                                value="<?= $data['phone_doctor'] ?>" require>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="address_doctor">Address</label>
                            <textarea class="form-control" id="address_doctor" name="address_doctor" rows="5" style="resize: none;"
                                require><?= $data['address_doctor'] ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="edit">Edit data</button>
                            <a href="data.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../admin/partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>