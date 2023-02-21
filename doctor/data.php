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
        <div class="d-flex justify-content-end gap-1 mb-3">
            <a href="#" class="btn btn-outline-dark"><i class="ri-refresh-fill"></i></a>
            <a href="add.php" class="btn btn-primary">Add data</a>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <form action="" method="POST" name="proses">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>
                                                <input type="checkbox" id="select_all" value="">
                                            </center>
                                        </th>
                                        <th>No</th>
                                        <th>Name Doctor</th>
                                        <th>Spesialis</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $no = 1;
                                $sql_poli = mysqli_query($db,  "SELECT * FROM tbl_doctor ORDER BY fullname ASC");
                                    while ($data = mysqli_fetch_array($sql_poli)) {
                                    ?>
                                    <tr>
                                        <td align="center">
                                            <input type="checkbox" name="checked[]" class="check"
                                                value="<?= $data['id_doctor'] ?>">
                                        </td>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['fullname'] ?></td>
                                        <td><?= $data['spesialis'] ?></td>
                                        <td><?= $data['address'] ?></td>
                                        <td><?= $data['phone'] ?></td>
                                        <td align="center">
                                            <a href="edit.php?id=<?= $data['id_doctor'] ?>"
                                                class="btn btn-warning btn-xs">Edit</a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </form>
                        <div class="box float-end">
                            <button class="btn btn-danger btn-sm" onclick="hapus()">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- JS Start -->
    <script>
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

        function hapus() {
            var conf = confirm('Are you sure ?'); {
                if (conf) {
                    document.proses.action = 'delete.php';
                    document.proses.submit();
                }
            }
        }
    </script>
    <!-- JS End -->
    <!-- Footer Start -->
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>