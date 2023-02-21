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
            <h1>Data Doctor</h1>
        </div>
        <div class="d-flex gap-1 mb-3">
            <a href="data.php" class="btn btn-secondary">Back</a>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <form action="function.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="fullname">Name Doctor</label>
                            <input type="text" id="fullname" name="fullname" class="form-control" require autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label for="spesialis">Spesialis</label>
                            <input type="text" id="spesialis" name="spesialis" class="form-control" require>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="number" id="phone" name="phone" class="form-control" require>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" class="form-control" require></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="add" value="Simpan">Simpan</button>
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