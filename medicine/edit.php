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
            <h1> Edit Data Medicine</h1>
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
                        $sql_medicine = mysqli_query($db, "SELECT * FROM tbl_medicine WHERE id_medicine = '$id'");
                        $data = mysqli_fetch_array($sql_medicine);
                        ?>
                        <div class="form-group mb-3">
                            <label for="name">Name Medicine</label>
                            <input type="hidden" name="id" value="<?= $data['id_medicine'] ?>">
                            <input type="text" id="name" name="name_medicine" class="form-control" value="<?= $data['name_medicine'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description Medicine</label>
                            <textarea id="description" name="description_medicine" class="form-control"><?= $data['description_medicine'] ?></textarea>
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