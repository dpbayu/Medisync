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
            <h1>Data Poly</h1>
        </div>
        <div class="d-flex justify-content-end gap-1 mb-3">
            <a href="#" class="btn btn-outline-dark"><i class="ri-refresh-fill"></i></a>
            <a href="generate.php" class="btn btn-primary">Add data</a>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <form action="" method="POST" name="proses">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name Poly</th>
                                        <th>Floor</th>
                                        <th>
                                            <center>
                                                <input type="checkbox" id="select_all" value="">
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $no = 1;
                                $sql_poli = mysqli_query($db,  "SELECT * FROM tbl_poly ORDER BY name_poly ASC");
                                if (mysqli_num_rows($sql_poli) > 0) {
                                    while ($data = mysqli_fetch_array($sql_poli)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['name_poly'] ?></td>
                                        <td><?= $data['place_poly'] ?></td>
                                        <td align="center">
                                            <input type="checkbox" name="checked[]" class="check" value="<?= $data['id_poly'] ?>"
                                                <?= $data['id_poly'] ?>>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                } else {
                                    echo "<tr><td colspan=\"4\" align=\"center\">Data not found<td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </form>
                        <div class="box float-end">
                            <button class="btn btn-warning btn-sm" onclick="edit()">Edit</button>
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
        function edit() {
            document.proses.action = 'edit.php';
            document.proses.submit();
        }
        function hapus() {
            var conf = confirm('Are you sure ?'); {
                if (conf) {
                    document.proses.submit();
                }
            }
            document.proses.action = 'delete.php';
        }
    </script>
    <!-- JS End -->
    <!-- Footer Start -->
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>