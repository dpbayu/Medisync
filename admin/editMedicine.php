<?php
$chk = @$_POST['checked'];
if (!isset($chk)) {
    echo "<script>window.location='dataMedicine.php?failed=No data selected!';</script>";
} else {
    // PHP
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
            <h1>Data Medicine</h1>
        </div>
        <div class="d-flex justify-content-end gap-1 mb-3">
            <div class="d-flex justify-content-end gap-1 mb-3">
                <a href="dataMedicine.php" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="function.php" method="POST">
                    <input type="hidden" name="total" value="<?= @$_POST['count_add'] ?>">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name Medicine</th>
                                <th>Description Medicine</th>
                                <th>Stock Medicine</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($chk as $id) {
                        $sql = mysqli_query($db, "SELECT * FROM tbl_medicine WHERE id_medicine = '$id'");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <input type="hidden" name="id[]" value="<?= $data['id_medicine'] ?>">
                                    <input type="text" name="name_medicine[]" value="<?= $data['name_medicine'] ?>"
                                        class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="description_medicine[]" value="<?= $data['description_medicine'] ?>"
                                        class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="stock_medicine[]" value="<?= $data['stock_medicine'] ?>"
                                        class="form-control" required>
                                </td>
                            </tr>
                            <?php
                        }
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="form-group d-flex justify-content-end">
                        <input type="submit" name="editMedicine" value="Edit All" class="btn btn-success">
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
<?php 
}
?>