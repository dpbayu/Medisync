<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
require ("function.php");
$page = "doctor";
if (isset($_POST["submit"])) {
    if (add_doctor($_POST) > 0) {
        echo "<script>document.location.href='doctor.php?success=Data already added!';</script>";
    } else {
        echo "<script>document.location.href='doctor.php?failed=Data failed added!';</script>";    
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
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="nip" name="nip" placeholder="NIP">
                        <label for="nip">NIP</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="ktp" name="ktp" placeholder="KTP">
                        <label for="ktp">KTP</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname">
                        <label for="fullname">Fullname</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="gender" name="gender">
                            <option value="Man">Man</option>
                            <option value="Woman">Woman</option>
                        </select>
                        <label for="gender">Gender</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="birthPlace" name="birth_place"
                            placeholder="Birth Place">
                        <label for="birthPlace">Birth Place</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" class="form-control pb-4" id="birthDate" name="birth_date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" id="address" name="address" placeholder="Address"
                            style="height: 100px;"></textarea>
                        <label for="address">Address</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="bloodType" name="blood_type">
                            <option value="A" selected>A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                        <label for="bloodType">Blood Type</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <select class="form-select" id="poly" name="poly">
                            <option value="GENERAL" selected>GENERAL</option>
                            <option value="EDERLY">EDERLY</option>
                            <option value="DENTAL">DENTAL</option>
                            <option value="KIA-MTBS-KB">KIA-MTBS-KB</option>
                            <option value="NUTRITION">NUTRITION</option>
                        </select>
                        <label for="poly">Poly</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                    <select class="form-select" id="role" name="role">
                            <option value="Doctor" selected>Doctor</option>
                            <option value="Nurse">Nurse</option>
                            <option value="Psychologist">Psychologist</option>
                        </select>
                        <label for="role">Role</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="maritalStatus" name="marital_status">
                            <option value="Single" selected>Single</option>
                            <option value="Married">Married</option>
                            <option value="Widower">Widower</option>
                            <option value="Widow">Widow</option>
                        </select>
                        <label for="maritalStatus">Marital Status</label>
                    </div>
                </div>
                <label for="profil">Profile</label><br>
                <div class="form-group">
                    <input type="file" class="form-control" id="profile" name="doctor_profile">
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