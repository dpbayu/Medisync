<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
require ("function.php");
$page = "doctor";
$id = $_GET["id"];
$doctor = query("SELECT * FROM doctor WHERE id = $id")[0];
if (isset($_POST["submit"])) {
    if (edit_doctor($_POST) > 0) {
        echo "<script>document.location.href='doctor.php?success=Data success updated!';</script>";
    } else {
        echo "<script>document.location.href='doctor.php?failed=Data failed updated!';</script>";    
    }
}
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require "partials/head.php" ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require "partials/header.php" ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require "partials/sidebar.php" ?>
    <!-- Sidebar End -->
    <!-- Content Start -->
    <main id="main" class="main">
        <!-- Title Start -->
        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div>
        <!-- Title End -->
        <section class="section dashboard">
            <form action="" method="POST" class="row g-3">
                <input type="hidden" name="id" value="<?= $doctor["id"]; ?>">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="nip" name="nip" placeholder="NIP"
                            value="<?= $doctor["nip"] ?>">
                        <label for="nip">NIP</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="ktp" name="ktp" placeholder="KTP"
                            value="<?= $doctor["ktp"] ?>">
                        <label for="ktp">KTP</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname"
                            value="<?= $doctor["fullname"] ?>">
                        <label for="fullname">Fullname</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="gender" name="gender">
                            <option value="Man" <?= $doctor['gender'] == 'Man' ? ' selected="selected"' : '';?>>Man
                            </option>
                            <option value="Woman" <?= $doctor['gender'] == 'Woman' ? ' selected="selected"' : '';?>>
                                Woman</option>
                        </select>
                        <label for="gender">Gender</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="birthPlace" name="birth_place"
                            placeholder="Birth Place" value="<?= $doctor["birth_place"] ?>">
                        <label for="birthPlace">Birth Place</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" class="form-control pb-4" id="birthDate" name="birth_date"
                            value="<?= $doctor["birth_date"] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            value="<?= $doctor["password"] ?>" readonly>
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" id="address" name="address" placeholder="Address"
                            style="height: 100px;"><?= $doctor["address"] ?></textarea>
                        <label for="address">Address</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"
                            value="<?= $doctor["phone"] ?>">
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="bloodType" name="blood_type">
                            <option value="A" <?= $doctor['blood_type'] == 'A' ? ' selected="selected"' : '';?>>A
                            </option>
                            <option value="B" <?= $doctor['blood_type'] == 'B' ? ' selected="selected"' : '';?>>B
                            </option>
                            <option value="AB" <?= $doctor['blood_type'] == 'AB' ? ' selected="selected"' : '';?>>AB
                            </option>
                            <option value="O" <?= $doctor['blood_type'] == 'O' ? ' selected="selected"' : '';?>>O
                            </option>
                        </select>
                        <label for="bloodType">Blood Type</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="poly" name="poly">
                            <option value="GENERAL" <?= $doctor['poly'] == 'GENERAL' ? ' selected="selected"' : '';?>>
                                GENERAL
                            </option>
                            <option value="EDERLY" <?= $doctor['poly'] == 'EDERLY' ? ' selected="selected"' : '';?>>
                                EDERLY
                            </option>
                            <option value="DENTAL" <?= $doctor['poly'] == 'DENTAL' ? ' selected="selected"' : '';?>>
                                DENTAL
                            </option>
                            <option value="KIA-MTBS-KB"
                                <?= $doctor['poly'] == 'KIA-MTBS-KB' ? ' selected="selected"' : '';?>>KIA-MTBS-KB
                            </option>
                            <option value="NUTRITION"
                                <?= $doctor['poly'] == 'NUTRITION' ? ' selected="selected"' : '';?>>NUTRITION
                            </option>
                        </select>
                        <label for="poly">Poly</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="maritalStatus" name="marital_status">
                            <option value="Single"
                                <?= $doctor['marital_status'] == 'Single' ? ' selected="selected"' : '';?>>Single
                            </option>
                            <option value="Married"
                                <?= $doctor['marital_status'] == 'Married' ? ' selected="selected"' : '';?>>
                                Married</option>
                            <option value="Widower"
                                <?= $doctor['marital_status'] == 'Widower' ? ' selected="selected"' : '';?>>Widower
                            </option>
                            <option value="Widow"
                                <?= $doctor['marital_status'] == 'Widow' ? ' selected="selected"' : '';?>>Widow
                            </option>
                        </select>
                        <label for="maritalStatus">Marital Status</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="role" name="role">
                            <option value="Doctor" <?= $doctor['role'] == 'Doctor' ? ' selected="selected"' : '';?>>
                                Doctor
                            </option>
                            <option value="Nurse" <?= $doctor['role'] == 'Nurse' ? ' selected="selected"' : '';?>>
                                Nurse</option>
                            <option value="Psychologist"
                                <?= $doctor['role'] == 'Psychologist' ? ' selected="selected"' : '';?>>Psychologist
                            </option>
                        </select>
                        <label for="role">Role</label>
                    </div>
                </div>
                <div class="text-left">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-danger" href="doctor.php">Cancel</a>
                </div>
            </form>
        </section>
    </main>
    <!-- Content End -->
    <!-- Footer Start -->
    <?php require "partials/footer.php" ?>
    <!-- Footer End -->
</body>

</html>