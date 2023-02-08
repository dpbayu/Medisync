<!-- PHP -->
<?php
require ("../function.php");
$page = "patient";
if (isset($_POST["submit"])) {
    if (add($_POST) > 0) {
        echo "<script>alert('data berhasil ditambahkan!');
                document.location.href = 'formPatient.php';
                </script>";
    } else {
        echo "<script>alert('data gagal ditambahkan!');
                document.location.href = 'formPatient.php';
                </script>";    
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
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="KTP" name="ktp" placeholder="KTP">
                        <label for="KTP">KTP</label>
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
                            <option value="Pria" selected>Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                        <label for="gender">Gender</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="date" class="col-1 col-form-label">Date</label>
                    <div class="col-5">
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control" id="date" />
                            <span class="input-group-append">
                                <span class="input-group-text bg-light d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
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
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Address" id="address" name="address"
                            style="height: 100px;"></textarea>
                        <label for="address">Address</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            <label for="city">City</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="col-md-2">
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
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="work" name="work" placeholder="Work">
                        <label for="work">Work</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="maritalStatus" name="marital_status">
                            <option value="Belum Menikah" selected>Belum Menikah</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Duda">Duda</option>
                            <option value="Janda">Janda</option>
                        </select>
                        <label for="maritalStatus">Marital Status</label>
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
    <script>
	$(function () {
		$('#datepicker').datepicker();
	});
</script>
    <?php require "partials/footer.php" ?>
    <!-- Footer End -->
</body>

</html>