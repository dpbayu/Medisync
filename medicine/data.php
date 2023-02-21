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
            <h1>Data Medicine</h1>
        </div>
        <div class="d-flex gap-1 mb-3">
            <a href="#" class="btn btn-outline-dark"><i class="ri-refresh-fill"></i></a>
            <a href="add.php" class="btn btn-primary">Add data</a>
        </div>
        <div class="mb-3 w-25">
            <form class="d-flex gap-3" action="" method="POST">
                <div class="form-group">
                    <input type="text" name="pencarian" class="form-control" placeholder="Pencarian data">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="bi bi-search" aria-hidden="true"></span></button>
                </div>
            </form>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="medicine" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name Medicine</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $batas = 5;
                                $hal = @$_GET['hal'];
                                if (empty($hal)) {
                                    $posisi = 0;
                                    $hal = 1;
                                } else {
                                    $posisi = ($hal - 1) * $batas;
                                }
                                $no = 1;
                                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                    $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
                                    if ($pencarian != '') {
                                        $sql = "SELECT * FROM tbl_medicine WHERE medicine_name LIKE '%pencarian%'";
                                        $query = $sql;
                                        $queryJml = $sql;
                                    } else {
                                        $query = "SELECT * FROM tbl_medicine LIMIT $posisi, $batas";
                                        $queryJml = "SELECT * FROM tbl_medicine";
                                        $no = $posisi + 1;
                                    }
                                } else {
                                    $query = "SELECT * FROM tbl_medicine LIMIT $posisi, $batas";
                                    $queryJml = "SELECT * FROM tbl_medicine";
                                    $no = $posisi + 1;
                                }
                                $sql_obat = mysqli_query($db, $query);
                                if (mysqli_num_rows($sql_obat) > 0) {
                                    while ($data = mysqli_fetch_array($sql_obat)) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['name_medicine'] ?></td>
                                    <td><?= $data['description_medicine'] ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-warning btn-xs" href="edit.php?id=<?= $data['id_medicine'] ?>"><i
                                                class="ri-edit-2-line"></i></a>
                                        <a class="btn btn-danger btn-xs" href="delete.php?id=<?= $data['id_medicine'] ?>"
                                            onclick="return confirm('Are you sure ?')"><i
                                                class=" ri-chat-delete-line"></i></a>
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
                    </div>
                    <?php
                    if (isset($_POST['pencarian']) == '') {
                        ?>
                        <div class="float: left;">
                            <?php
                            $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                            echo "Jumlah Data : <b>$jml</b>"
                            ?>
                        </div>
                        <div style="float: right;">
                            <ul class="pagination pagination-sm" style="margin: 0;">
                                <?php
                                $jml_hal = ceil($jml / $batas);
                                for ($i = 1; $i <= $jml_hal; $i++) {
                                    if ($i != $hal) {
                                        echo '<li><a href="?hal='.$i.'">'.$i.'</a></li>';
                                    } else {
                                        echo '<li class="active"><a>'.$i.'</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                    } else {
                        echo "<div style=\"float:left;\">";
                        $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                        echo "Data hasil pencarian : <b>$jml</b>";
                        echo "</div>";
                    }
                    ?>
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