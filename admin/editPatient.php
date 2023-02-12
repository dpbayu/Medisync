<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
require ("function.php");
$page = "patient";
$id = $_GET["id"];
$user = query("SELECT * FROM user WHERE id = $id")[0];
if (isset($_POST["submit"])) {
    if (edit_patient($_POST) > 0) {
        echo "<script>document.location.href='patient.php?success=Data success updated!';</script>";
    } else {
        echo "<script>document.location.href='formPatient.php?failed=Data failed updated!';</script>";    
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
    <main id="main" class="main" style="height: 84vh">
        <!-- Title Start -->
        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div>
        <!-- Title End -->
        <section class="section dashboard">
        <form action="" method="POST" class="row g-3">
            <input type="hidden" name="id" value="<?= $user["id"]; ?>">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="KTP" name="ktp" placeholder="KTP" value="<?= $user["ktp"] ?>">
                        <label for="KTP">KTP</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" value="<?= $user["fullname"] ?>">
                        <label for="fullname">Fullname</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $user["username"] ?>">
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="birthPlace" name="birth_place"
                            placeholder="Birth Place" value="<?= $user["birth_place"] ?>">
                        <label for="birthPlace">Birth Place</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="date" class="form-control pb-4" id="birthDate" name="birth_date">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="gender" name="gender">
                            <option value="Man" <?= $user['gender'] == 'Man' ? ' selected="selected"' : '';?>>Man</option>
                            <option value="Woman" <?= $user['gender'] == 'Woman' ? ' selected="selected"' : '';?>>Woman</option>
                        </select>
                        <label for="gender">Gender</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="bloodType" name="blood_type">
                            <option value="A" <?= $user['blood_type'] == 'A' ? ' selected="selected"' : '';?>>A</option>
                            <option value="B" <?= $user['blood_type'] == 'B' ? ' selected="selected"' : '';?>>B</option>
                            <option value="AB" <?= $user['blood_type'] == 'AB' ? ' selected="selected"' : '';?>>AB</option>
                            <option value="O" <?= $user['blood_type'] == 'O' ? ' selected="selected"' : '';?>>O</option>
                        </select>
                        <label for="bloodType">Blood Type</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" id="address" name="address" placeholder="Address" value="<?= $user["address"] ?>"
                            style="height: 100px;"></textarea>
                        <label for="address">Address</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?= $user["city"] ?>">
                            <label for="city">City</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="religion" name="religion">
                            <option value="Islam" <?= $user['religion'] == 'Islam' ? ' selected="selected"' : '';?>>Islam</option>
                            <option value="Protestant" <?= $user['religion'] == 'Protestant' ? ' selected="selected"' : '';?>>Protestant</option>
                            <option value="Hindu" <?= $user['religion'] == 'Hindu' ? ' selected="selected"' : '';?>>Hindu</option>
                            <option value="Buddha" <?= $user['religion'] == 'Buddha' ? ' selected="selected"' : '';?>>Buddha</option>
                            <option value="Kong Hu Cu" <?= $user['religion'] == 'Kong Hu Cu' ? ' selected="selected"' : '';?>>Kong Hu Cu</option>
                        </select>
                        <label for="religion">Religion</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="maritalStatus" name="marital_status">
                            <option value="Single" <?= $user['marital_status'] == 'Single' ? ' selected="selected"' : '';?>>Single</option>
                            <option value="Married" <?= $user['marital_status'] == 'Married' ? ' selected="selected"' : '';?>>Married</option>
                            <option value="Widower" <?= $user['marital_status'] == 'Widower' ? ' selected="selected"' : '';?>>Widower</option>
                            <option value="Widow" <?= $user['marital_status'] == 'Widow' ? ' selected="selected"' : '';?>>Widow</option>
                        </select>
                        <label for="maritalStatus">Marital Status</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="work" name="work" placeholder="Work">
                        <label for="work">Work</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="text-left">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
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