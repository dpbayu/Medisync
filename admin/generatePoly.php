<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'poly';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require '../partialsAdmin/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partialsAdmin/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partialsAdmin/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Record Data Poly</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                    if (isset($_GET['failed'])) {
                        $msg = $_GET['failed'];
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>'.$msg.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                ?>
            </div>
            <div class="col-md-6">
                <form action="addPoly.php" method="POST">
                    <div class="form-group mb-3">
                        <label class="form-label" for="count_add">Data will be added</label>
                        <input class="form-control" type="text" name="count_add" id="count_add" maxlength="2"
                            pattern="[0-9]+" placeholder="1-9" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" name="generate" value="Generate" class="btn btn-success">
                        <a href="dataPoly.php" class="btn btn-primary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partialsAdmin/footer.php' ?>
    <!-- Footer End -->
</body>

</html>