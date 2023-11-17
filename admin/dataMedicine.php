<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$medicines = query("SELECT * FROM tbl_medicine ORDER BY name_medicine ASC");
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
        <div class="my-3">
            <a href="generateMedicine.php" class="btn btn-primary">Add data</a>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                <?php
                    if (isset($_GET['success'])) {
                        $msg = $_GET['success'];
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>'.$msg.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if (isset($_GET['failed'])) {
                        $msg = $_GET['failed'];
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>'.$msg.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    ?>
                    <div class="table">
                        <form action="" method="POST" name="process">
                            <table class="table table-bordered table-hover" id="medicine">
                                <thead>
                                    <tr>
                                        <th class="fw-semibold text-center">No</th>
                                        <th class="fw-semibold text-center">Name Medicine</th>
                                        <th class="fw-semibold text-center">Description Medicine</th>
                                        <th class="fw-semibold text-center">Stock Medicine</th>
                                        <th class="fw-semibold text-center">Price Medicine</th>
                                        <th class="text-center">
                                            <input type="checkbox" id="select_all" value="">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($medicines as $medicine) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $medicine['name_medicine'] ?></td>
                                        <td><?= $medicine['description_medicine'] ?></td>
                                        <td><?= $medicine['stock_medicine'] ?></td>
                                        <td><?= 'Rp ' . number_format($medicine['price_medicine'], 0, ',', '.') ?></td>
                                        <td class="text-center">
                                            <input type="checkbox" name="checked[]" class="check"
                                                value="<?= $medicine['id_medicine'] ?>" <?= $medicine['id_medicine'] ?>>
                                        </td>
                                    </tr>
                                    <?php
                                    ?>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </form>
                        <div class="float-end border-0">
                            <button class="btn btn-warning" onclick="edit()">Edit</button>
                            <button class="btn btn-danger" onclick="hapus()">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- JS Start -->
    <script>
        // Fungsi Checkbox
        $(document).ready(function () {
            $("#select_all").on('click', function () {
                if (this.checked) {
                    $('.check').each(function () {
                        this.checked = true;
                    });
                } else {
                    $('.check').each(function () {
                        this.checked = false;
                    });
                }
            });
            $('.check').on('click', function () {
                if ($('.check:checked').length == $('.check').length) {
                    $('#select_all').prop('checked', true)
                } else {
                    $('#select_all').prop('checked', false)
                }
            })
        });
        // Function Edit
        function edit() {
            document.process.action = 'editMedicine.php';
            document.process.submit();
        }
        // Function Delete
        function hapus() {
            var conf = confirm('Are you sure ?'); {
                if (conf) {
                    document.process.action = 'deleteMedicine.php';
                    document.process.submit();
                }
            }
        }
        // Data Tables
        $(document).ready(function () {
            $('#medicine').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 5,
                }],
            });
        });
    </script>
    <!-- JS End -->
    <!-- Footer Start -->
    <?php require '../partialsAdmin/footer.php' ?>
    <!-- Footer End -->
</body>

</html>