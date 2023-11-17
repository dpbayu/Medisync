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
            <a href="dataMedicine.php" class="btn btn-info">Data</a>
            <a href="generateMedicine.php" class="btn btn-primary">Add More</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="function.php" method="POST">
                    <input type="hidden" name="total" value="<?= @$_POST['count_add'] ?>">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Name Medicine</th>
                            <th>Description Medicine</th>
                            <th>Stock Medicine</th>
                            <th>Price Medicine</th>
                        </tr>
                        <?php
                            for ($i = 1; $i <= $_POST['count_add']; $i++) { 
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><input class="form-control" type="text" name="name_medicine-<?= $i ?>"
                                    placeholder="Input medicine" required></td>
                            <td><input class="form-control" type="text" name="description_medicine-<?= $i ?>"
                                    placeholder="Input description" required></td>
                            <td><input class="form-control" type="number" name="stock_medicine-<?= $i ?>"
                                    placeholder="Input stock" maxlength="2" pattern="[0-9]+" placeholder="1-9" required>
                            </td>
                            <td><input class="form-control" type="number" name="price_medicine-<?= $i ?>"
                                    placeholder="Input price" pattern="[0-9]+" placeholder="1-9" required>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <div class="form-group d-flex justify-content-end">
                        <input type="submit" name="addMedicine" value="Save All" class="btn btn-success">
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