<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$specialists = query("SELECT * FROM tbl_specialist ORDER BY name_specialist ASC");
$page = 'specialist';
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
            <h1>Data Specialist</h1>
        </div>
        <div class="my-3">
            <a href="generateSpecialist.php" class="btn btn-primary">Add data</a>
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
                            <table id="specialist" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="fw-semibold">No</th>
                                        <th class="fw-semibold">Name Specialist</th>
                                        <th class="text-center">
                                            <input type="checkbox" id="select_all" value="">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($specialists as $specialist) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $specialist['name_specialist'] ?></td>
                                        <td class="text-center">
                                            <input type="checkbox" name="checked[]" class="check"
                                                value="<?= $specialist['id_specialist'] ?>" <?= $specialist['id_specialist'] ?>>
                                        </td>
                                    </tr>
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
        // Function Edit
        function edit() {
            document.process.action = 'editSpecialist.php';
            document.process.submit();
        }
        // Function Delete
        function hapus() {
            var conf = confirm('Are you sure ?'); {
                if (conf) {
                    document.process.action = 'deleteSpecialist.php';
                    document.process.submit();
                }
            }
        }
        // Data Tables
        $(document).ready(function () {
            $('#specialist').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 2,
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