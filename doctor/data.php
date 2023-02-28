<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$doctors = query("SELECT * FROM tbl_doctor ORDER BY name_doctor ASC");
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
            <h1>Data Doctor</h1>
        </div>
        <div class="my-3">
            <a href="add.php" class="btn btn-primary">Add data</a>
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
                            <table class="table table-bordered table-hover" id="doctor">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name Doctor</th>
                                        <th>Spesialis</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">
                                            <input type="checkbox" id="select_all" value="">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($doctors as $doctor) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $doctor['name_doctor'] ?></td>
                                        <td><?= $doctor['specialist_doctor'] ?></td>
                                        <td><?= $doctor['address_doctor'] ?></td>
                                        <td><?= $doctor['phone_doctor'] ?></td>
                                        <td class="text-center">
                                            <a href="edit.php?id=<?= $doctor['id_doctor'] ?>"
                                                class="btn btn-warning">Edit</a>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="checked[]" class="check"
                                                value="<?= $doctor['id_doctor'] ?>">
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </form>
                        <button class="btn btn-danger float-end" onclick="hapus()">Delete</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- JS Start -->
    <script>
        // Function Checkbox
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
        // Function Delete
        function hapus() {
            var conf = confirm('Are you sure ?'); {
                if (conf) {
                    document.proccess.action = 'delete.php';
                    document.proccess.submit();
                }
            }
        }
        // Data Tables
        $(document).ready(function () {
            $('#doctor').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [5,6],
                }]
            });
        });
    </script>
    <!-- JS End -->
    <!-- Footer Start -->
    <?php require '../admin/partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>