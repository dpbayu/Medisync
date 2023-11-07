<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'medical_record';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require '../partialsDoctor/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partialsDoctor/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partialsDoctor/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <?php
            $id = @$_GET['id'];
            $sql_patient = mysqli_query($db, "SELECT * FROM tbl_medical_record 
            INNER JOIN tbl_patient ON tbl_medical_record.id_patient = tbl_patient.id_patient
            WHERE id_hospital = '$id'");
            $data = mysqli_fetch_array($sql_patient);
            ?>
            <h1>Data Medicine <?= $data['name_patient'] ?></h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th class="fw-semibold text-center">Patient</th>
                            <th class="fw-semibold text-center">Diagnosis</th>
                            <th class="fw-semibold text-center">Illness</th>
                        </tr>
                        <tr>
                            <td><?= $data['name_patient'] ?></td>
                            <td><?= $data['diagnosis'] ?></td>
                            <td><?= $data['illness'] ?></td>
                        </tr>
                    </table>
                    <form action="function.php" method="POST">
                        <input class="form-control" type="hidden" name="id_hospital" value="<?= $data['id_hospital'] ?>">
                        <div class="control-group after-add-more">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="medicine">Medicine</label>
                                        <select class="form-control" name="id_medicine[]" id="medicine">
                                            <option value="">- Choose Medicine -</option>
                                            <?php
                                            $sql_medicine = mysqli_query($db, "SELECT * FROM tbl_medicine ORDER BY name_medicine");
                                            while ($data_medicine = mysqli_fetch_array($sql_medicine)) {
                                                echo '<option value="' . $data_medicine['id_medicine'] . '">' . $data_medicine['name_medicine'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="qty_medicine">Quantity</label>
                                    <input class="form-control" type="text" name="qty_medicine[]" id="qty_medicine" maxlength="2" pattern="[0-9]+" placeholder="1-9" required>
                                </div>
                                <div class="col position-relative">
                                    <button class="btn btn-info position-absolute bottom-0 start-0 mb-3 add-more" type="button">Add Form</button>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit" name="addMedicine">Finish</button>
                        <button class="btn btn-danger" type="reset" name="reset" value="Reset">Reset</button>
                    </form>
                    <div class="copy invisible">
                        <div class="control-group mb-3">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="medicine">Medicine</label>
                                        <select class="form-control" name="id_medicine[]" id="medicine">
                                            <option value="">- Choose Medicine -</option>
                                            <?php
                                            $sql_medicine = mysqli_query($db, "SELECT * FROM tbl_medicine");
                                            while ($data_medicine = mysqli_fetch_array($sql_medicine)) {
                                                echo '<option value="' . $data_medicine['id_medicine'] . '">' . $data_medicine['name_medicine'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="qty_medicine">Quantity</label>
                                    <input class="form-control" type="text" name="qty_medicine[]" id="qty_medicine" maxlength="2" pattern="[0-9]+" placeholder="1-9" required>
                                </div>
                                <div class="col position-relative">
                                    <button class="btn btn-danger position-absolute bottom-0 start-0 mb-3 remove" type="button">Remove</button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- JS -->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });
            $("body").on("click", ".remove", function() {
                $(this).parents(".control-group").remove();
            });
        });
    </script>
    <!-- JS -->
    <!-- Footer Start -->
    <?php require '../partialsDoctor/footer.php' ?>
    <!-- Footer End -->
</body>

</html>