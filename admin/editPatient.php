<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'patient';
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
            <h1>Edit Data Patient</h1>
        </div>
        <div class="d-flex gap-1 mb-3">
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <form action="function.php" method="POST">
                        <?php
                        $id = @$_GET['id'];
                        $sql_patient = mysqli_query($db, "SELECT * FROM tbl_patient WHERE id_user = '$id'");
                        $data = mysqli_fetch_array($sql_patient);
                        ?>
                        <div class="d-flex gap-5">
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="nik_patient">NIK Patient</label>
                                <input type="hidden" name="id" value="<?= $data['id_user'] ?>">
                                <input class="form-control" type="hidden" name="old_email"
                                    value="<?= $data['email_patient'] ?>">
                                <input class="form-control" type="number" id="nik_patient" name="nik_patient"
                                    value="<?= $data['nik_patient'] ?>" required autofocus>
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="name_patient">Name Patient</label>
                                <input class="form-control" type="text" id="name_patient" name="name_patient"
                                    value="<?= $data['name_patient'] ?>" required>
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="email_patient">Email Patient</label>
                                <input class="form-control" type="email" id="email_patient" name="email_patient"
                                    value="<?= $data['email_patient'] ?>" required>
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="password_patient">Password Patient</label>
                                <input class="form-control" type="password" id="password_patient"
                                    name="password_patient">
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="birth_place">Birth Place</label>
                                <input class="form-control" type="text" id="birth_place" name="birth_place"
                                    value="<?= $data['birth_place'] ?>" required>
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="birth_date">Birth Date Patient</label>
                                <input class="form-control" type="date" id="birth_date" name="birth_date"
                                    value="<?= date('Y-m-d',strtotime($data["birth_date"])) ?>">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="gender_patient">Gender</label>
                            <div class="d-flex gap-3">
                                <label class="form-label" class="radio-inline">
                                    <input type="radio" name="gender_patient" id="gender_patient" value="Man"
                                        <?= $data['gender_patient'] == "Man" ? "checked" : null ?> required> Man
                                </label>
                                <label class="form-label" class="radio-inline">
                                    <input type="radio" name="gender_patient" value="Woman"
                                        <?= $data['gender_patient'] == "Woman" ? "checked" : null ?> required> Woman
                                </label>
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="BloodType">Blood Type</label>
                                <select class="form-control" id="BloodType" name="blood_patient">
                                    <option value="A" <?= $data['blood_patient'] == "A" ? "selected" : '' ?>>A
                                    </option>
                                    <option value="B" <?= $data['blood_patient'] == "B" ? "selected" : '' ?>>B
                                    </option>
                                    <option value="AB" <?= $data['blood_patient'] == "AB" ? "selected" : '' ?>>AB
                                    </option>
                                    <option value="O" <?= $data['blood_patient'] == "O" ? "selected" : '' ?>>O</option>
                                </select>
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="phone_patient">Phone</label>
                                <input class="form-control" type="number" id="phone_patient" name="phone_patient"
                                    value="<?= $data['phone_patient'] ?>" required>
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="Religion">Religion</label>
                                <select class="form-control" id="Religion" name="religion_patient">
                                    <option value="Islam" <?= $data['religion_patient'] == "Islam" ? "selected" : '' ?>>
                                        Islam
                                    </option>
                                    <option value="Christian"
                                        <?= $data['religion_patient'] == "Christian" ? "selected" : '' ?>>Christian
                                    </option>
                                    <option value="Chatolic"
                                        <?= $data['religion_patient'] == "Chatolic" ? "selected" : '' ?>>Chatolic
                                    </option>
                                    <option value="Hindu" <?= $data['religion_patient'] == "Hindu" ? "selected" : '' ?>>
                                        Hindu</option>
                                    <option value="Budha" <?= $data['religion_patient'] == "Budha" ? "selected" : '' ?>>
                                        Budha</option>
                                </select>
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="MariaggePatient">Marital Status</label>
                                <select class="form-control" id="MariaggePatient" name="marriage_patient">
                                    <option value="Married"
                                        <?= $data['marriage_patient'] == "Married" ? "selected" : '' ?>>Married
                                    </option>
                                    <option value="Not Married"
                                        <?= $data['marriage_patient'] == "Not Married" ? "selected" : '' ?>>Not Married
                                    </option>
                                    <option value="Widow" <?= $data['marriage_patient'] == "Widow" ? "selected" : '' ?>>
                                        Widow</option>
                                    <option value="Widower"
                                        <?= $data['marriage_patient'] == "Widower" ? "selected" : '' ?>>Widower</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="address_patient">Address</label>
                            <textarea class="form-control" id="address_patient" name="address_patient" rows="5"
                                style="resize: none;" required><?= $data['address_patient'] ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="editPatient">Update</button>
                            <a href="dataPatient.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partialsAdmin/footer.php' ?>
    <!-- Footer End -->
</body>

</html>