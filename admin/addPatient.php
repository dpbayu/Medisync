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
            <h1>Data Patient</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <form action="function.php" method="POST">
                        <div class="form-group mb-3">
                            <label class="form-label" for="nik_patient">NIK Patient</label>
                            <input class="form-control" type="number" id="nik_patient" name="nik_patient"
                                placeholder="Input NIK" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name_patient">Name Patient</label>
                            <input class="form-control" type="text" id="name_patient" name="name_patient"
                                placeholder="Input name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="birth_date">Birth Date Patient</label>
                            <input class="form-control" type="date" id="birth_date" name="birth_date">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="gender_patient">Gender</label>
                            <div class="d-flex gap-3">
                                <label class="form-label" class="radio-inline">
                                    <input type="radio" name="gender_patient" id="gender_patient" value="Man" required> Man
                                </label>
                                <label class="form-label" class="radio-inline">
                                    <input type="radio" name="gender_patient" value="Woman" required> Woman
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="phone_patient">Phone</label>
                            <input class="form-control" type="number" id="phone_patient" name="phone_patient"
                                placeholder="Input phone" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="address_patient">Address</label>
                            <textarea class="form-control" id="address_patient" name="address_patient" rows="5"
                                style="resize: none;" placeholder="Input address" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="addPatient">Add data</button>
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